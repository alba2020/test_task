<?php

require "bootstrap.php";

$controller = new Controller();
$response = $controller->notFound();

switch ($_SERVER['REQUEST_URI']) {
    case '/test_task/api/Table':
        $response = $controller->tables();
        break;
    case '/test_task/api/SessionSubscribe':
        $response = $controller->subscribe();
        break;
    default:
        $response = $controller->notFound();
        break;
}

header('Content-Type: application/json');
echo $response->toJson();
