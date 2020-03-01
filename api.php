<?php
session_start();

use model\Url;

require "config/database.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$requestData = $_POST;

if (empty($_POST['_token']) && !hash_equals($_SESSION['token'], $requestData['_token'])) {
    echo json_encode([
        'success' => false,
        'message' => 'CSRF token mismatch.'
    ]);
    die();
}

if (!filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
    echo json_encode([
        'success' => false,
        'message' => 'The given URL in not valid.'
    ]);
    die();
}

$data = Url::Create(['key' => uniqid(), 'url' => $_POST['url']]);

if ($data) {
    echo json_encode([
        'success' => true,
        'message' => 'Tiny URL generated successfully',
        'key' => $data->key,
        'url' => 'http://' . $_SERVER['SERVER_NAME'] . '/' . $data->key
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Whoops!! Something went wrong please try again later.',
        'key' => $data->key
    ]);
}
die();
?>