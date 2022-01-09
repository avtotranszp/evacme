<?php
if (!$empty) {
    $empty = '<p class="text-graySemiDark p-10 text-2xl font-medium text-center">' . $modx->lexicon('poly_lang_site_private_reviews_empty') . '</p>';
}

if (!$userId) {
    $user = $modx->getUser();
} else {
    $user = $modx->getObject('modUser', ['id' => $userId]);
}
$query = $modx->newQuery('modResource');
$query->where(array(
    array(
        'editedby' => $user->id
    ),
    array(
        'OR:createdby:=' => $user->id
    )
));
$query->where(array(
    array(
        'published' => 1
    ),
));
$resources = $modx->getCollection('modResource', $query);
$resourcesIds = [];
foreach ($resources as $resource) {
    $resourcesIds[] = 'resource-' . $resource->id;
}

if (!$resources) {
    $modx->setPlaceholder('reviews_body', $empty);
    return;
}
$resourcesIds = implode(',', $resourcesIds);
return $modx->runSNippet('ecMessages', [
    'tpl'        => 'tpl_review_item',
    'tplEmpty'   => 'empty_review',
    'tplWrapper' => 'commentsWrapperTpl',
    'threads'    => $resourcesIds
]);

$sql = "SELECT
            c.id, c.name, c.text, c.createdon, rating as average, th.resource
        FROM
            modx_tickets_comments as c
        LEFT JOIN 
            modx_tickets_threads as th
        ON 
            c.thread = th.id
        WHERE
             c.parent = 0 AND th.resource IN ($resourcesIds) $where
        ORDER BY
            c.createdon DESC";


$sql_positive = "SELECT
                    c.id, c.name, c.text, c.createdon, rating as average, th.resource
                FROM
                    modx_tickets_comments as c
                LEFT JOIN 
                    modx_tickets_threads as th
                ON 
                    c.thread = th.id
                WHERE
                    th.resource IN ($resourcesIds) AND c.rating > 3 AND c.parent = 0
                ORDER BY
                    c.createdon DESC";

$sql_negative = "SELECT
                    c.id, c.name, c.text, c.createdon, rating as average, th.resource
                FROM
                    modx_tickets_comments as c
                LEFT JOIN 
                    modx_tickets_threads as th
                ON 
                    c.thread = th.id
                WHERE
                    th.resource IN ($resourcesIds) AND c.rating <= 3 AND c.parent = 0
                ORDER BY
                    c.createdon DESC";

if ($filter == 'show_positive') {
  $sql = $sql_positive;
}

if ($filter == 'show_negative') {
  $sql = $sql_negative;
}

$reviews = $modx->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if (!$reviews) {
    $modx->setPlaceholder('reviews_body', $empty);
    return;
}

$pdoTools = $modx->getService('pdoTools');
$output = '';
foreach ($reviews as $review) {
    $output .= $pdoTools->getChunk($tpl, $review);
}

$modx->setPlaceholder('reviews_body', $output);
$modx->setPlaceholder('count_positive', count($modx->query($sql_positive)->fetchAll(PDO::FETCH_ASSOC)));
$modx->setPlaceholder('count_negative', count($modx->query($sql_negative)->fetchAll(PDO::FETCH_ASSOC)));

return;