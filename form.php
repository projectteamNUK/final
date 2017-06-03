
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

  echo "<form method='post' action=''>
<select name='type[]'>
<option value='旅遊諮詢'>旅遊諮詢</option>
<option value='景點推薦'>景點推薦</option>
<option value='服務品質'>服務品質</option>
<option value='網站刊誤'>網站刊物</option>
<option value='其他'>其他</option>
</select>
<br>

<input type='text' placeholder='主旨' name='title'><br>
<textarea name='content' placeholder='陳述內容' rows='5' cols='50'></textarea><br>
<input type='submit' name='submit' value='送出'>
</form>";



    $type=$_POST["type"];
    $title=$_POST["title"];
    $content=$_POST["content"];
      
   
    mysqli_query($link," INSERT INTO contact (member_id,type,title,,content) VALUES ('$userid','$type','$title','$content')");
}
mysqli_close($link);
?>