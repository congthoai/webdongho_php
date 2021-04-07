<?php include_once '../model/loginModel.php';


 session_start();

 $error_user=$error_pass=$error_check="";

if(isset($_GET['login']))
{

$username=$pass="";
 if($_GET['username'] == NULL)
 {
  $error_user= "Please enter your username<br />";
 }
 else
 {
  $username=$_GET['username'];
 }

 if($_GET['pass'] == NULL)
 {
  $error_pass= "Please enter your password<br />";
 }
 else
 {
  $pass=$_GET['pass'];
 }

 if($username && $pass)
 {
     $login = loginModel::getInstance()->checkLogin($username, $pass);
     
    if((int)$login == 2){
        $_SESSION['username'] = $username;
        $_SESSION['account'] = "user";
        header('Location: http://localhost/webdongho_php/views/home.php');
    }
    elseif ((int)$login == 1){
        $_SESSION['username'] = $username;
        $_SESSION['account'] = "admin";
        header('Location: http://localhost/webdongho_php/views/admin');
    }
     else{
        $error_check= "Username or password is not correct, please try again";
    }
 }
 
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../image/uitlogo.png">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css"> 
</head>
<body>
    <div class="login">
        <img src="../image/slider1.png" class="login-img">
        <div class="login-box">
            <h2><strong>Đăng Nhập</strong></h2>
            <form class="login-form" method='get'>
                <p>Username:</p>
                <input type="text" name="username" placeholder="Tên đăng nhập...p" />
                <p style="color: red;"><?php echo $error_user ?></p>

                <p>Mật khẩu:</p>
                <input type="password" name="pass" placeholder="Mật khẩu..."/>
                <p style="color: red;"><?php echo $error_pass ?></p>
                <p style="color: red;"><?php echo $error_check ?></p>
                
                <input type="submit" name="login" value="Đăng nhập"/><br>
                <a href="#">Quên mật khẩu?</a><br>
                <a href="http://localhost/webdongho_php/views/register.php">Chưa có tài khoản?</a>
            </form>
            <div class="login-social">
                <p>Hoặc đăng nhập bằng:</p>
                <button class="social-fb"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</button><br>
                <button class="social-tw"><i class="fab fa-twitter"></i>&nbsp;Twitter</button><br>
                <button class="social-gg"><i class="fab fa-google-plus-g"></i>&nbsp;Google</button><br>
            </div>
        </div>
    </div>
</body>
</html>
