<?php
require_once "core/config.php";
require_once "core/ShortUrl.php";

if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST["url"])) {
    header("Location: shorten.html");
    exit;
}

$shortUrl = new ShortUrl();

try {
    $code = $shortUrl->urlToShortCode($_POST["url"]);
} catch (\Exception $e) {
    header("Location: error.html");
    exit;
}
$url = SHORTURL_PREFIX . $code;
?>
<html>
    <head>
        <title>URL Shortener</title>
    </head>
    <body>

        <div style=" width: 60%; height:200px;margin: 15% auto; ">
            <h1 align="center" style="color: #f85b20;">URL Shortner</h1>
            <p><h3 align="center"><strong>Short URL:</strong> <a style="font-size:20px; font-weight: 300; color: #f85b20; padding: 2px 6px;" href="<?php echo $url; ?>"><?php echo $url; ?></a></h3></p>
    </div>
</body>
</html>