<?php
$modx->addPackage('evacme', $modx->getOption('core_path') . 'components/evacme/' . 'model/');

$query = $modx->newQuery('Invoice', ['createdby' => $modx->getUser()->id]);
$query->sortby('id', 'DESC');

$items = $modx->getCollection('Invoice', $query);
$pdoTools = $modx->getService('pdoTools');

$output = [];
foreach ($items as $item) {
    
    $output[] = $pdoTools->getChunk($tpl, [
        'subtotal'  => $item->subtotal,
        'createdon' => date("d.m.Y", strtotime($item->createdon)),
        'status'    => $item->status,
        'data'      => unserialize($item->data)
        ]);
}

return implode('',$output);