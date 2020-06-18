<?php
session_start();

// 入力した値の検証、加工
$m_name = chkString($_POST["m_name"], "お名前");
$m_mail = chkString($_POST["m_mail"], "メールアドレス", true);
$m_message = chkString($_POST["m_message"], "メッセージ");

// 入力値をセッション変数に格納
$_SESSION["m_name"] = $m_name;
$_SESSION["m_mail"] = $m_mail;
$_SESSION["m_message"] = $m_message;


function chkString($temp = "", $field, $accept_empty = false)
{
    // 未入力チェック
    if (empty($temp) and !$accept_empty) {
        echo "{$field}には何か入力して下さい";
        exit;
    }

    // 入力内容の安全性チェック
    $temp = htmlspecialchars($temp, ENT_QUOTES, "UTF-8");

    return $temp;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ゲストブック</title>
</head>

<body>
    <p>追加確認画面</p>
    <!-- 入力確認form -->
    <form action="guestsubmit.php" method="POST">
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
                    <?php echo $m_message; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="書き込む">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>