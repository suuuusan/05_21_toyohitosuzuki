<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
</head>

<body>
    <h1>掲示板</h1>
    <!-- データフォーム入力 -->
    <form action="guestconfirm.php" method="POST">
        <table border='2'>
            <tr>
                <td>お名前</td>
                <td><input type="text" name='m_name' size="30"></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="m_mail" size="30"></td>
            </tr>
            <tr>
                <td>メッセージ</td>
                <td>
                    <textarea name="m_message" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="確認する">
                </td>
            </tr>
        </table>
    </form>

    <?php
    // 接続確認する
    $dbtype = 'mysql';
    $sv = 'localhost';
    $dbname = 'guestbook';
    $user = 'root';
    $pass = 'phppass10';
    // データベースに接続
    $dsn = "$dbtype:dbname=$dbname;host=$sv";
    $conn = new PDO($dsn, $user, $pass);
    // データの取得 DESCは大きいものから降順に並べる
    $sql = "SELECT * FROM message ORDER BY m_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // 取得したデータを一覧表示
    while ($row = $stmt->fetch()) {
        echo "<hr>{$row["m_id"]}:";
        if (!empty($row["m_mail"])) {
            echo "<a href=mailto:" . $row["m_mail"] . ">"
                . $row["m_name"] . "</a>";
        } else {
            echo $row["m_name"];
        }
        echo "(" . date("Y/m/d H:i", strtotime($row["m_dt"])) . ")";
        echo "<p>" . nl2br($row["m_message"]) . "</p>";
        // 変更、削除、詳細表示へのリンク
        echo "<a href=update.php?m_id=" . $row["m_id"] . ">変更 </a>";
        echo "<a href=delate-confirm.php?m_id=" . $row["m_id"] . ">削除 </a>";
        echo "<a href=detail.php?m_id=" . $row["m_id"] . ">詳細 <a/>";
    }
    ?>

</body>

</html>