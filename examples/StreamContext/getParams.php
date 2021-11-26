<?php
require_once "../../vendor/autoload.php";

use Fize\IO\StreamContext;

$context = new StreamContext();
$params = ["notification" => "stream_notification_callback"];
$context->setParams($params);

$params = $context->getParams();
var_dump($params);