<?php
// formが空の場合の処理
if (empty($_POST)) {
    echo "処理終了";
    exit;
}
// 評価用の数値と文字列の関連付け うまくいかず
$ar_rate = array(
    '5' => 'めちゃ満足',
    '4' => 'やや満足',
    '3' => '普通',
    '2' => 'ちょい不満',
    '1' => '最低や',

);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
</head>

<body>
    <h1>アンケートフォーム（2.回答確認画面）</h1>
    <p>回答を確認して下さい！！！</p>

    <?php
    // var_dump($_POST);
    ?>

    <?php
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    if (empty($username)) {
        echo "お名前を入力して下さい。";
        exit;
    }

    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    if (empty($email)) {
        echo "メールアドレスを入力して下さい。";
        exit;
    }

    $gender = htmlspecialchars($_POST["gender"], ENT_QUOTES, "UTF-8");
    if (empty($gender)) {
        echo "性別を選択して下さい。";
        exit;
    }

    $job = htmlspecialchars($_POST["job"], ENT_QUOTES, "UTF-8");
    if (empty($job)) {
        echo "職業を選択して下さい。";
        exit;
    }

    $rate1 = htmlspecialchars($_POST["rate1"], ENT_QUOTES, "UTF-8");
    if (empty($rate1)) {
        echo "書籍の満足度を選択して下さい。";
        exit;
    }

    $rate2 = htmlspecialchars($_POST["rate2"], ENT_QUOTES, "UTF-8");
    if (empty($rate2)) {
        echo "書籍のボリュームを評価して下さい。";
        exit;
    }

    if (empty($_POST["tec"])) {
        $tec = "なし";
    } else {
        // implode関数で配列で帰ってきたtecを結合する
        $tec = implode(" ", $_POST["tec"]);
    }

    $tec = htmlspecialchars($tec, ENT_QUOTES, "UTF-8");

    if ($_POST["dm"] == "on") {
        $dm = "送付希望";
    } else {
        $dm = "不要";
    }



    $message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");
    if (empty($message)) {
        echo "感想書いてちょ！";
        exit;
    }

    ?>
    <!-- アンケート回答の確認 -->
    <form action="submit.php" method="POST">
        <table border="1">
            <tr>
                <td>お名前</td>
                <td><?php echo $username ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <td>性別</td>
                <td><?php echo $gender ?></td>
            </tr>
            <tr>
                <td>職業</td>
                <td><?php echo $job ?></td>
            </tr>
            <tr>
                <td>書籍の満足度</td>
                <td><?php echo $ar_rate[$rate1] ?></td>
            </tr>
            <tr>
                <td>書籍のボリューム</td>
                <td><?php echo $ar_rate[$rate2] ?></td>
            </tr>
            <tr>
                <td>普段使っている技術</td>
                <td><?php echo $tec ?></td>
            </tr>
            <tr>
                <td>新刊情報のお届け</td>
                <td><?php echo $dm ?></td>
            </tr>
            <tr>
                <td>書籍の感想</td>
                <td><?php echo nl2br($message) ?></td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input type="submit" value="回答を送信する" name="sub1">
                </td>
            </tr>

        </table>
        <!-- hidden フィーーーールド！ 入力値を次に渡す前にhidden フィールドに格納する-->
        <input type="hidden" name="qid" value="<?php echo $qid; ?>">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="gender" value="<?php echo $gender; ?>">
        <input type="hidden" name="job" value="<?php echo $job; ?>">
        <input type="hidden" name="rate1" value="<?php echo $rate1; ?>">
        <input type="hidden" name="rate2" value="<?php echo $rate2; ?>">
        <input type="hidden" name="tec" value="<?php echo $tec; ?>">
        <input type="hidden" name="dm" value="<?php echo $dm; ?>">
        <input type="hidden" name="message" value="<?php echo $message; ?>">

    </form>
</body>

</html>