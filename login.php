<?php
session_start();
$link= @mysqli_connect(
    '140.127.218.156',
    'travel',
    'tra1043342',
    'travel');
mysqli_query($link,'SET NAMES utf8');

  echo "<form method='post' action='adminindex.php'>
帳號:<input type='text'name='loginname'><br>
密碼:<input type='password'name='password1'>
<input type='submit' name='submit' value='送出'>
<input type='reset' name='clear' value='清除'>
</form>";

if(isset($_POST['loginname'])){

    $loginname=$_POST["loginname"];
    $password=$_POST["password1"];
    $login0="select * from login where login_username='$loginname' ";
    $login1=" and login_password='$password'";
    $logincheck=$login0.$login1;
    $sql=mysqli_query($link,$logincheck);
    $rows=mysqli_num_rows($sql);
    if($rows==""){

        ?>
        <script language="JavaScript">
        alert("沒有這個帳號，請重新輸入");
        history.back();
        </script>
    
<?php
    }  
    else{
        $list=mysqli_fetch_array($sql);
        $_SESSION["login_username"]=$list['login_username'];
        header("Location:./adminindex.php");   
 }

}
mysqli_close($link);
?>