<?php

ini_set('display_errors', 1);
define('MAX_FILE_SIZE', 1 * 1024 * 1024); // 1MB
define('THUMBNAIL_WIDTH', 400);
define('IMAGES_DIR', __DIR__ . '/images');
define('THUMBNAIL_DIR', __DIR__ . '/thumbs');

// GDがインストールされているかチェックする
if (!function_exists('imagecreatetruecolor')) {
    echo 'GD not installed';
    exit;
}
// エスケープするための関数
function h($s)
{
    return htmlentities($s, ENT_QUOTES, 'UTF-8');
}

require 'ImageUploader.php';

$uploader = new \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploader->upload();
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image uploader</title>
</head>
<style>
    body {
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- 画像のサイズを決めるための隠し指定 -->
        define('MAX_FILE_SIZE',1*1024*1024);// 1MB
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php h(MAX_FILE_SIZE); ?>>

    <input type=" file" name="image">
        <input type="submit" value="upload">
    </form>


</body>

</html>