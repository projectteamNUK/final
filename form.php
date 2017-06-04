<?php
    session_start();
    require_once("db_config.php");
    $userid=$_SESSION["U_ID"];
    if (isset($_POST['content'])) {
        $type = $_POST["type"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $contact = $userid.$type;

        $sql ="INSERT INTO contact VALUES ('$contact','$userid','$type','$title','$content')";
        if (mysqli_query($link, $sql)){
            $message = "留言成功!感謝您的意見!!<br/>";
        }else{
            $message = "留言失敗!請稍後再試!!";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<body>
    <form action="form.php" method="POST">
        <select name="type"  required="" id="type">
            <option value='旅遊諮詢'>旅遊諮詢</option>
            <option value='景點推薦'>景點推薦</option>
            <option value='服務品質'>服務品質</option>
            <option value='網站刊誤'>網站刊物</option>
            <option value='其他'>其他</option>
        </select>
<br>

    <input type="text" required="" name="title"><br>
    <textarea name="content" placeholder="陳述內容" rows="5" cols="50"></textarea><br>
    <input type="submit" name="submit" value="送出">
    </form>
    <?php
        if (isset($message)) {
            echo "<div>$message</div>";
            header("Refresh: 2; url=form.php");
        }
    ?>
                <a href="index.php">回到首頁</a>
</body>
</html>