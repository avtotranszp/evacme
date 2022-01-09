<?php
if ($_GET['delete'] != md5($modx->user->id)) {
    $modx->sendRedirect($url = $modx->makeUrl(1, '', array('delete' => 'error')));
    return;
}

$resources = $modx->getCollection('modResource', ['createdby' => $modx->user->id]);
if ($resources) {
    foreach ($resources as $resource) {
        if (!$resource->remove()) {
            $modx->sendRedirect($url = $modx->makeUrl(1, '', array('delete' => 'error')));
            return;
        }
    }    
}
if (!$modx->user->remove()) {
    $modx->sendRedirect($url = $modx->makeUrl(1, '', array('delete' => 'error')));
    return;
}

$modx->sendRedirect($url = $modx->makeUrl(1, '', array('delete' => 'success')));

return;