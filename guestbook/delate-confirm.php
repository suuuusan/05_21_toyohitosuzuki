<?php
session_start();

// 削除データの主キーを取得
if (!isset($_GET["m_id"])) {
    exit;
} else {
    $m_id = $_GET["m_id"];
    $_SESSION["m_id"] = $m_id;  //主キーを$_SESSIONへ
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

//削除するデータを取得する
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
    <p>削除確認画面</p>
    <form action="delate-submit.php" method="POST">
        <table border="2">
            <tr>
                <td>お名前</td>
                <td><?php echo $row["m_name"]; ?>
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
                    <?php echo $row["m_message"]; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="削除する">
                    <p><a href="guestindex.php">戻る</a></p>

                </td>
            </tr>
        </table>
    </form>

</body>

</html>