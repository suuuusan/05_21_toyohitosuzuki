<?php
// 表示データの主キーを取得
if (!isset($_GET["m_id"])) {
    exit;
} else {
    $m_id = $_GET["m_id"];
}

// 接続確認する
$dbtype = 'mysql';
$sv = 'localhost';
$dbname = 'guestbook';
$user = 'root';
$pass = 'phppass10';
// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO($dsn, $user, $pass);

//一件だけデータを取得する
$sql = "SELECT * FROM message WHERE (m_id = :m_id);";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":m_id", $m_id);
$stmt->execute();
$row = $stmt->fetch();
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
    <p>詳細表示画面</p>
    <table border="2">
        <tr>
            <td>お名前</td>
            <td>
                <?php echo $row["m_name"]; ?>
            </td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>
                <?php echo $row["m_mail"]; ?>
            </td>
        </tr>
        <tr>
            <td>メッセージ</td>
            <td>
                <?php echo nl2br($row["m_message"]); ?>
            </td>
        </tr>
    </table>
    <p><a href="guestindex.php">トップページへ</a></p>


</body>

</html>