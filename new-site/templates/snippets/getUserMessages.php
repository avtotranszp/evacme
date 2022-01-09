<?php
if (!$tpl) {
    return;
}
if (!$empty) {
    $empty = '<p class="text-graySemiDark p-10 text-2xl font-medium text-center">' . $modx->lexicon('poly_lang_site_private_message_empty') . '</p>';
}
if (!$userId) {
    $userId = $modx->getUser()->id;
}
$output = '';

$query = $modx->newQuery('modUserMessage');

$where = ['recipient' => $userId];
if ($filter == 'show_unread') {
    $where['read'] = 0;    
}

$query->where($where);

if ($sortBy) {
    $query->sortby($sortBy[0], $sortBy[1]);    
}

$messages = $modx->getCollection('modUserMessage', $query);
$pdoTools = $modx->getService('pdoTools');

if (!$messages) {
    return $empty;
}
foreach($messages as $item) {
    $data = json_decode($item->message, true);
    
    $data['date_sent'] = $item->date_sent;
    $data['id'] = $item->id;
    $data['read'] = $item->read;
   
    $output .= $pdoTools->getChunk($tpl, $data);
}

return $output;