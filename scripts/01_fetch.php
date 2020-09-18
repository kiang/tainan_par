<?php
$rawPath = dirname(__DIR__) . '/raw';
if(!file_exists($rawPath)) {
    mkdir($rawPath, 0777, true);
}
$dataset = json_decode(file_get_contents('https://data.tainan.gov.tw/api/3/action/package_search?q=par'), true);
foreach($dataset['result']['results'][0]['resources'] AS $resource) {
    $rawFile = $rawPath . '/' . $resource['name'] . '.csv';
    file_put_contents($rawFile, file_get_contents($resource['url']));
}