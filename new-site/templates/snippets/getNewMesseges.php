<?php
$count = $modx->getCount('modUserMessage', [
        'recipient' => $modx->getUser()->id,
        'read' => 0
    ]);
$modx->setPlaceholder('new_messages_count', $count);