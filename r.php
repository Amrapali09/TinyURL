<?php

require_once "core/config.php";
require_once "core/ShortUrl.php";

if (empty($_GET["c"])) {
    header("Location: shorten.html");
    exit;
}

$code = $_GET["c"];



$shortUrl = new ShortUrl();
try {
    $url = $shortUrl->shortCodeToUrl($code);
    header("Location: " . $url);
} catch (\Exception $e) {
    print_r($e);
    header("Location: error.html");
    exit;
}