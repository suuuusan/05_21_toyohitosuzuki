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

// 入力内容の取得($_SESSIONから主キーも含む)
$m_id = $_SESSION["m_id"];
$m_name = htmlspecialchars($_SESSION["m_name"], ENT_QUOTES, "UTF-8");
$m_mail = htmlspecialchars($_SESSION["m_mail"], ENT_QUOTES, "UTF-8");
$m_message = htmlspecialchars($_SESSION["m_message"], ENT_QUOTES, "UTF-8");

// データを変更
$sql = "UPDATE message SET 
        m_name = :m_name,
        m_mail = :m_mail,
        m_message = :m_message,
        m_dt = NOW()
        WHERE m_id = :m_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":m_id", $m_id);
$stmt->bindParam(":m_name", $m_name);
$stmt->bindParam(":m_mail", $m_mail);
$stmt->bindParam(":m_message", $m_message);
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
    <p>変更完了画面</p>
    <p><?php echo $m_message; ?></p>
    <table border="2">
        <tr>
            <td>お名前</td>
            <td>
                <?php echo $m_name; ?>
            </td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>
                <?php echo $m_mail; ?>
            </td>
        </tr>
        <tr>
            <td>メッセージ</td>
            <td>
                <?php echo nl2br($m_message); ?>
            </td>
        </tr>
    </table>
    <p><a href="guestindex.php">トップページへ</a></p>


</body>

</html>