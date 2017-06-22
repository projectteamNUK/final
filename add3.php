<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>
<body>

</body>
</html>


<?php
session_start();
$link= @mysqli_connect(
    'localhost',
    'travel',
    'tra1043342',
    'travel');
mysqli_query($link,'SET NAMES utf8');
if(isset($_POST["name"])){
  $userid=$_SESSION["U_ID"];

   $name=@$_POST["name"];
    $email=@$_POST["email"];
    $title=@$_POST["title"];
    $content=@$_POST["content"];
    $datetime= new DateTime('now',new DateTimeZone('Asia/Taipei'));
    $posttime=$datetime->format('Y-m-d H:i:s');
      
    echo $name."<br>";
    echo $email."<br>";
    echo $title."<br>";
    echo $content."<br>";
    // echo $datetime."<br>";
    echo $posttime."<br>";


   
    mysqli_query($link,"INSERT INTO `travel`.`comment` (`comment_id`, `comment_username`, `comment_email`, `comment_title`, `comment_content`, `comment_time`, `member_id`, `travel_id`) VALUES (NULL, '$name', '$email', '$title', '$content', '$posttime', NULL, NULL);");


    // mysqli_query($link," INSERT INTO comment (member_id,comment_username,comment_email,comment_title,comment_content,comment_time) VALUES ('$userid','$name','$email','$title','$content','$posttime')");
}
else {

    echo "not";
}


 ?>

 <script language=JavaScript>
     window.alert('資料新增了啦!');
     location.href='index1.php';
</script>
 
