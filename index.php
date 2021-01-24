<?php

require __DIR__ . '/vendor/autoload.php';
include 'GPBMetadata/Search.php';
use App\Proto\Search;

echo 'Create message' . PHP_EOL;

$from = new Search();
$from->setQuery('This is a test');
$from->setPageNumber(1);
$from->setResultPerPage(10);

$to = new Search();

$data = $from->serializeToString();

try {
    $to->mergeFromString($data);
    echo 'Read query: ' . $to->getQuery() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
