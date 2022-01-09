<?php

if (empty($_REQUEST['action'])) {
  die('Access denied');
}
else {
  $action = $_REQUEST['action'];
}

define('MODX_API_MODE', true);

$productionIndex = dirname(dirname(dirname(dirname(dirname(__FILE__))))). '/index.php';

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
  case 'gallery/upload': $response = $model->fileUpload($_POST);break;

  case 'gallery/delete': $response = $model->deleteFile($_POST);break;  

  case 'product/save': $response = $model->productSave($_POST, [], isset($_POST['id'])); break;

  case 'cite/get': $response = $model->getCityList($_POST['area']); break;

  case 'order/create': $response = $model->createOrder($_POST); break;
  
  case 'order/refill': $response = $model->createOrderRefill($_POST); break;
  
  case 'order/createByBalance': $response = $model->createOrderByBalance($_POST); break;

  case 'product/disable': $response = $model->productDisable($_POST); break;

  case 'product/enable': $response = $model->productEnable($_POST); break;
  
  case 'product/limitCity':
      if($modx->user->id == 405) {
          $response = ['success' => true, 'message' => 'Limit city 0'];
          break;
      }
      $res = $modx->getCount('msProduct', ['createdby' => $modx->user->id, 'parent' => $_POST['parent']]);
      if(!empty($res)) {
          $response = ['success' => false, 'message' => 'Limit city ' . $res];
      } else {
          $response = ['success' => true, 'message' => 'Limit city 0'];
      }
      break;
      
  case 'check-phone':
    //   if($modx->user->id === 405) {
          $response = ['success' => true, 'message' => 'Limit city 0'];
          break;
    //   }
        $query = $modx->newQuery('msProductData');
        $query->where(['phone' => $_POST['phone']]);
        $query->where(['phone_2' => $_POST['phone']], xPDOQuery::SQL_OR);
        $query->where(['phone_3' => $_POST['phone']], xPDOQuery::SQL_OR);
        if(!empty($_POST['id'])) {
            $parent = $modx->getObject('modResource', $_POST['id']);
            $query->where(['id:!=' => $_POST['id']], xPDOQuery::SQL_AND);
            $query->where(['parent' => $parent->id], xPDOQuery::SQL_AND);
        }
        $res = $modx->getCount('msProductData', $query);
        if($res > 0) {
          $response = ['success' => false, 'message' => 'Limit city ' . $res];
        } else {
          $response = ['success' => true, 'message' => 'Limit city 0'];
        }
        break;
  
  default:
    $message = $_REQUEST['action'] != $action ? 'tickets_err_register_globals' : 'tickets_err_unknown';
    $response = $modx->toJSON(array('success' => false, 'message' => $modx->lexicon($message)));
    break;
}

if (is_array($response)) {
  $response = $modx->toJSON($response);
}

@session_write_close();
exit($response);