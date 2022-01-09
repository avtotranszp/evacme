<?php

if (empty($_REQUEST['action'])) {
  die('Access denied');
}
else {
  $action = $_REQUEST['action'];
}

define('MODX_API_MODE', true);

$productionIndex = dirname(dirname(dirname(dirname(__FILE__)))). '/index.php';

if (file_exists($productionIndex)){
  require_once $productionIndex;
} else {
  exit('die');
}

$modx->getService('error', 'error.modError');
$modx->getRequest();
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget('FILE');
$modx->error->message = null;

$ctx = !empty($_REQUEST['ctx']) ? $_REQUEST['ctx'] : 'web';
if ($ctx != 'web') {
  $modx->switchContext($ctx);
}
require_once MODX_BASE_PATH . 'new-site/assets/add-evac/model/addObject.class.php';
$model = new addObject($modx);

if ($modx->error->hasError() || !($model instanceof addObject)) {
  die('Error');
}
switch ($action) {
    case 'votes':
        $page =  $modx->getObject('modResource', $_POST['id']);
        $votes = $page->getProperty('votes', 'ratingpage', $view);
        $sum = $page->getProperty('votesSum', 'ratingpage', $view);
        $votes++;
        $sum += $_POST['rating'];
        $page->setProperty('votes', $votes, 'ratingpage');
        $page->setProperty('votesSum', $sum, 'ratingpage');
        $page->save();
        $avg = $sum / $votes;
        $response = $modx->toJSON(['success' => true, 'votes' => $votes, 'rating' => number_format($avg, 1)]);
        break;
  case 'menu/get': 
  if(!$menu = $modx->cacheManager->get('menu_' . $_POST['context'] . '_' . $_POST['id'] . $_POST['lang'])) {
    $menu = $modx->runSnippet('pdoResources', [
      'parents'    => $_POST['id'],
      'templates'  => '2,3',
      'depth'      => 0,
      'showHidden' => 0,
      'tpl'        => $_POST['context'] == 'mobile' ? '@FILE chunk/menu-mob-2.php' : '@INLINE <li><a href="{$uri}">{$pagetitle}</a></li>',
      'limit'      => 0,
      'sortby'     => 'menuindex',
      'sortdir'    => 'ASC',
    ]);

    $modx->cacheManager->set('menu_' . $_POST['context'] . '_' . $_POST['id'] . $_POST['lang'], $menu, 3600 * 24);
  }
  
  $response = $modx->toJSON(array('success' => true, 'message' => $menu));
  break;
  
  default:
    $message = $_REQUEST['action'] != $action ? 'tickets_err_register_globals' : 'tickets_err_unknown';
    $response = $modx->toJSON(array('success' => false, 'message' => $modx->lexicon($message)));
}

if (is_array($response)) {
  $response = $modx->toJSON($response);
}

@session_write_close();
exit($response);