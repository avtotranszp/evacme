<?php
$data = [
    'name' => $hook->getValue('name'),
    'email' => $hook->getValue('email'),
    'message' => $hook->getValue('message'),
    ];

$msg = $modx->newObject('modUserMessage');

$msg->fromArray([
        'sender' => 0,
        'recipient' => $modx->resource->get('createdby'),
        'message' => json_encode($data),
        'read' => 0,
        'private' => 1,
        'date_sent'=> strftime('%Y-%m-%d %T'),
    ]);

if ($msg->save()) {
    return true;    
}
return false;