<?php


define('MODX_API_MODE', true);

$productionIndex = dirname(dirname(dirname(dirname(__FILE__)))). '/index.php';

if (file_exists($productionIndex)){
  require_once $productionIndex;
} else {
  exit('die');
}

if(isset($_GET['term'])) {
    $lang = $_COOKIE['polylang:web:language'] ?? 'ru';
    if($lang === 'ru') {
        $field = 'pagetitle';
    } else {
        $field = 'longtitle';
    }
    $pdoFetch = $modx->getService('pdoFetch');
    $data     = $pdoFetch->getCollection('modResource', [$field. ':LIKE' => '%'.$_GET['term'].'%', 'template' => 3]);
    $response = [];
    foreach($data as $res) {
        $response[] = $res[$field];
    }
    if (is_array($response)) {
      $response = $modx->toJSON($response);
    }
    
    @session_write_close();
    exit($response);
}
if (empty($_REQUEST['action'])) {
  die('Access denied');
}
else {
  $action = $_REQUEST['action'];
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
require_once MODX_BASE_PATH . 'new-site/models/SMS.php';

if ($modx->error->hasError()) {
  die('Error');
}
$user = $modx->user;
switch ($action) {
    case 'sms/send':
        $code = rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);
        if($sms = $modx->getObject('UserSms', ['user_id' => $user->id]) && (time() - $sms->created_at) < 120) {
            $response = ['status' => false, 'message' => 'Exist'];
            break;
        }
        if(isset($sms) && is_object($sms)) {
            $sms->remove();
        }
        $sms = $modx->newObject('UserSms');
        $sms->user_id = $user->id;
        $sms->code = $code;
        $sms->status = 0;
        $sms->created_at = time();
        $sms->save();
        SMS::send($user->getOne('Profile')->phone, 'Код подтверждения - ' . $code);
        $response = ['status' => true, 'message' => 'Sms send'];
        break;
        
    case 'sms/verify':
        if($sms = $modx->getObject('UserSms', ['user_id' => $user->id, 'code' => $_POST['code']])) {
            $sms->status = 1;
            $sms->save();
            $response = ['status' => true, 'message' => 'Code verify success'];
            break;
        }
        $response = ['status' => false, 'message' => 'Code not found'];
        break;
    case 'user/avatar':
        $modx->runSnippet('updateUserAvatar');
        $response = ['status' => true, 'message' => 'Avatar uploaded'];
        break;
    case 'user/logo':
        $modx->runSnippet('updateUserBrandLogo');
        $response = ['status' => true, 'message' => 'Logo uploaded'];
        break;
    case 'reviews/filter':
        $modx->runSnippet('getUserReviews', ['tpl' => 'tpl_review_item', 'filter' => $_REQUEST['filter']]);
        $response = ['status' => true, 'body' => $modx->getPlaceholder('reviews_body')];
        break;
    case 'message/filter':
        $response = [
            'status' => true,
            'body' => $modx->runSnippet('getUserMessages', ['tpl' => 'tpl_message_item', 'filter' => $_REQUEST['filter'], 'sortBy' => explode(':',$_REQUEST['sort'])])
        ];
        break;
    case 'message/unread':
        if (!$_REQUEST['item']) {
           $response = ['status' => false, 'message' => 'No item for update'];
           break;
        }
        
        $message = $modx->getObject('modUserMessage', ['id' => $_REQUEST['item']]);
        $message->read = 1;
        $message->save();
        
        $modx->runSnippet('getNewMesseges');
        $response = [
            'status' => true,
            'body' => $modx->getPlaceholder('new_messages_count')
        ];
        break;
    case 'company/images':
        $response = [
            'status' => true,
            'message' => 'Image uploaded',
            'type' => $_REQUEST['type'],
            'path' => $modx->runSnippet('updateCompanyImages', ['type' => $_REQUEST['type']]),
        ];
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