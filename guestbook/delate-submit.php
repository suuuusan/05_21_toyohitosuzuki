<?php
session_start();
if (empty($_SESSION)) {
    exit;
}

// 接続確認する
$dbtype = 'mysql';
$sv = 'localhost';
$dbname = 'guestbook';
$user = 'root';
$pass = '';
// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO($dsn, $user, $pass);

// 削除内容の取得
$m_id = $_SESSION["m_id"];


// データを削除
$sql = "DELETE  FROM message 
        WHERE m_id = :m_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":m_id", $m_id);
$stmt->execute();

// セッションデータの破棄
$_SESSION = array();
session_destroy();
?>
<!-- 処理結果の表示 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ゲストブック</title>
</head>

<body>
    <p>削除しました</p>



    <p><a href="guestindex.php">トップページへ</a></p>


</body>

</html>