<?php
// form空なら終了！！
if (empty($_POST)) {
    echo "処理終了";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
</head>

<body>
    <h1>アンケートフォーム（3.回答完了画面）</h1>

    <?php
    // 入力値の取得
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $gender = htmlspecialchars($_POST["gender"], ENT_QUOTES, "UTF-8");
    $job = htmlspecialchars($_POST["job"], ENT_QUOTES, "UTF-8");
    $rate1 = htmlspecialchars($_POST["rate1"], ENT_QUOTES, "UTF-8");
    $rate2 = htmlspecialchars($_POST["rate2"], ENT_QUOTES, "UTF-8");
    $tec = htmlspecialchars($_POST["tec"], ENT_QUOTES, "UTF-8");
    $dm = htmlspecialchars($_POST["dm"], ENT_QUOTES, "UTF-8");
    $message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");

    // 回答を書き込む前の準備
    $line = array($username, $email, $gender, $job, $rate1, $rate2, $tec, $dm, $message);

    // ファイルへの書き込み
    $file_name = "answer.csv";
    // fopen関数 aはファイルに追記するモード
    $fp = fopen($file_name, "a");
    $return = fputcsv($fp, $line);
    fclose($fp);

    if ($return) {
        $result_message = "ご回答ありがとうございました。";
    } else {
        $result_message = "エラーが発生したばい！";
    }
    ?>
    <p><?php echo $result_message; ?></p>

</body>

</html>