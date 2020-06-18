<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
</head>

<body>
    <h1>アンケートフォーム（1.回答画面）</h1>
    <p>アンケートに回答して「確認する」ボタンをクリックしてください</p>
    <form method="POST" action="checkform.php">


        <table border="1">
            <tr>
                <td>お名前</td>
                <td><input type="text" name="username" size="50"></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="text" name="email" size="50"></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <!-- ２択ラジオボタン！！ -->
                    <input type="radio" name="gender" value="men">男性
                    <input type="radio" name="gender" value="wemen">女性
                </td>
            </tr>
            <tr>
                <td>職業</td>
                <td>
                    <!-- 選択メニュー!! -->
                    <select name="job">
                        <option value="">▼選択</option>
                        <option>学生</option>
                        <option>会社員</option>
                        <option>自営業</option>
                        <option>遊び人</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>サービスの満足度は？</td>
                <td>

                    <!-- 配列で組み込むのがうまくいかないためとりあえず普通にやる -->
                    <input type="radio" name="rate1" value="5"> めちゃ満足！
                    <input type="radio" name="rate1" value="4"> まあ良い！
                    <input type="radio" name="rate1" value="3"> 普通や
                    <input type="radio" name="rate1" value="2"> ちょい不満
                    <input type="radio" name="rate1" value="1"> クソ仕事

                    <!-- <?php
                            // 配列ラジオボタン作成！！
                            // $ar_rate = array(
                            //     "5" => "めちゃ満足",
                            //     "4" => "やや満足",
                            //     "3" => "普通",
                            //     "2" => "ちょい不満",
                            //     "1" => "最低や",

                            // );
                            // foreach 配列から要素を１つずつ取り出し最後まで来たら自動的に終了する構文

                            // foreach ($ar_rate as $key => $value) {
                            //     echo "<input type="radio" name="rate1" value="{$key}">{$value}";
                            //     // echo "{$key}{$value}";
                            // }
                            ?> -->
                </td>
            </tr>
            <tr>
                <td>本のボリュームは？</td>
                <td>

                    <input type="radio" name="rate2" value="5"> めちゃ満足！
                    <input type="radio" name="rate2" value="4"> まあ良い！
                    <input type="radio" name="rate2" value="3"> 普通や
                    <input type="radio" name="rate2" value="2"> ちょい不満
                    <input type="radio" name="rate2" value="1"> クソ仕事

                    <?php
                    // foreach ($ar_rate as $key => $value) {
                    //     // echo "<input type="radio" name="rate2" value="{$key}">{$value}";
                    //     echo "{$key}{$value}";
                    // }
                    ?>
                </td>
            </tr>
            <tr>
                <td>経験のある技術は？（複数回答可能）</td>
                <td>
                    <!-- チェックボッッッックス -->
                    <input type="checkbox" name="tec[]" value="PHP">PHP
                    <input type="checkbox" name="tec[]" value="Java">Java
                    <input type="checkbox" name="tec[]" value="CSS">CSS
                    <input type="checkbox" name="tec[]" value="JS">JS
                    <input type="checkbox" name="tec[]" value="React">React

                </td>
            </tr>
            <tr>
                <td>新刊本のお知らせ！</td>
                <td>
                    <!-- on off ２択！！ -->
                    <input type="checkbox" name="dm" checked>送付を希望する
                </td>
            </tr>
            <tr>
                <td>本の感想</td>
                <td>
                    <!-- メッセージ入力エリア -->
                    <textarea name="message" cols="40" rows="10"></textarea>
                </td>
            </tr>
            <td align="right" colspan="2">
                <input type="submit" value="確認する" name="sub1">
            </td>
        </table>
    </form>
</body>

</html>