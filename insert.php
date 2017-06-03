<?php
session_start();
$link= @mysqli_connect(
    '140.127.218.156',
    'travel',
    'tra1043342',
    'travel');
mysqli_query($link,'SET NAMES utf8');
if(isset($_SESSION["member_id"])){
  $userid=$_SESSION["member_id"];

  echo "<form method='post' action='index1.php'>
姓名: <input type='text' name='name'>
電子郵件:<input type='text' name='email'>
留言主旨:<input type='text' name='title'><br>
留言內容:<textarea name='content' placeholder='陳述內容' rows='5' cols='50'></textarea><br>
<input type='submit' name='submit' value='送出'>
</form>";

if(!isset($_POST['name']) ){
die("請由表單輸入");
}
    else{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $title=$_POST["title"];
    $content=$_POST["content"];
    $datetime= new DateTime("now" new DateTimeZone('Asia/Taipei'));
    $posttime=$datetime->format('Y-m-d H:i:s');
      
   
    mysqli_query($link," INSERT INTO comment (member_id,comment_username,comment_email,comment_title,comment_content,comment_time) VALUES ('$userid','$name','$email','$title','$content','$posttime')");


}
}
mysqli_close($link);
?>