<?php

use model\Url;

require __DIR__ . "/../config/database.php";

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$segmentCount = (count($uriSegments));

if ($segmentCount == 2 && $uriSegments[$segmentCount - 1] != '') {
    $key = $uriSegments[$segmentCount - 1];
    $urlObj = Url::where('key', $key)->first();

    if (!empty($urlObj)) {
        header("Location:" . $urlObj->url);
        die();
    } else {
        $pageNotFound = true;
    }
}
