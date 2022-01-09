<?php
$page =  $modx->resource;
$view = 0;

$votes = $page->getProperty('votes', 'ratingpage', $view);
$sum = $page->getProperty('votesSum', 'ratingpage', $view);
if(!$votes) $votes = 0;
if(!$sum) $sum = 0;

if(!$votes) {
    $avg = 0;
} else {
    $avg = $sum / $votes;
}

$modx->setPlaceholder('votes', $votes);
$modx->setPlaceholder('rating', number_format($avg, 1));