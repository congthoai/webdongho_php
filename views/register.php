<?php include_once '../model/registerModel.php';?>

<?php 
session_start(); 

$flag=$err_phone= $err_pass=$err_email=$err_name=$err_repass=$err_username="";
$username = $email = $pass =$re_pass= $phone = $name = "";

if(isset($_POST['Register'])){
    
    if ($_POST['username'] == NULL)
        $err_username= "Please enter your username";
    else 
        $username = $_POST['username'];

            
    if ($_POST['phone'] == NULL  )
        $err_phone= "Please enter your phone";
    else {
        $phone= $_POST['phone'];
    }
    
    if(!is_numeric($_POST['phone']))
        $err_phone= "SDT sai dinh dang";
    
    if ($_POST['name'] == NULL)
        $err_name = "Please enter your name";
    else
        $name = $_POST['name'];
    
    if ($_POST['pass'] == NULL)
        $err_pass = "Please enter your pass";
    else
        $pass = $_POST['pass'];
    
    if ($_POST['re_pass'] == NULL)
        $err_repass = "Please enter your re-pass";
    else
        $re_pass = $_POST['re_pass'];
    
    if ($pass != $re_pass)
        $err_repass = 'Mật khẩu không khớp';
    
    $emailValid = registerModel::getInstance()->emailValid($_POST['email']);
    if($emailValid == false)
        $err_email= "Email không hợp lệ";
    else 
        $email = $_POST['email'];

    $checkUsername = registerModel::getInstance()->checkUsername($_POST['username']);
    if($checkUsername)
        $err_username= "Username đã tồn tại!";

    
    if ($emailValid &&  !$checkUsername && $pass && $re_pass && $pass==$re_pass && is_numeric($phone) && $name) 
    {   
        $rs = registerModel::getInstance()->addUser($name, $username, $pass, $phone, $email);
        if($rs < 0)
            $flag = 'Thêm không thành công';
        else{
            $flag = 'Đăng kí thành công!';
            $url='http://localhost/webdongho_php/views/login.php?username='.$username.'&pass='.$pass.'&login=Đăng+nhập';
            echo "<script>
                var r = confirm('Đăng kí thành công! Login bạn đến trang chủ ?');
                if(r==true){
                    window.location.href='$url';
                }
            </script>";
        }
    }
    
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../image/uitlogo.png">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css"> 
</head>
<body>
    <div class="login">
        <img src="../image/slider1.png" class="login-img">
        <div class="register-box">
            <h2><strong>Đăng Ký</strong></h2>
            <form class="register-form" method='post'>
                
                <p>Họ và tên:</p>
                <input type="text" name="name" placeholder="Họ tên..." value='<?php echo $name?>'/>
                        <h6 style="color: red;"><?php echo $err_name?></h6>

                 <p>Tên đăng nhập:</p>
                <input type="text" name="username" placeholder="Username..." value='<?php echo $username?>'/>
                        <h6 style="color: red;"><?php echo $err_username?></h6>        

                <p>Mật khẩu:</p>
                <input type="password" name="pass" placeholder="Mật khẩu" value='<?php echo $pass?>'/><br>
                        <h6 style="color: red;"><?php echo $err_pass ?></h6>

                <p>Nhập lại mật khẩu:</p>
                <input type="password" name="re_pass" placeholder="Nhập lại mật khẩu" value='<?php echo $re_pass?>'/><br>
                        <h6 style="color: red;"><?php echo $err_repass ?></h6>

                <p>Số điện thoại:</p>
                <input type="text" name="phone" placeholder="Số điện thoại..." value='<?php echo $phone?>'/>
                         <h6 style="color: red;"><?php echo $err_phone ?></h6>

                <p>Email:</p>
                <input type="text" name="email" placeholder="Email" value='<?php echo $email?>'/>
                        <h6 style="color: red;"><?php echo $err_email ?></h6>
                                
                <input type="submit" name="Register" value="Đăng ký tài khoản"/><br>
                        <h4 style="color: red;"><?php echo $flag;?></h4>



                <div class="alreadymember">
                  <p>Đã có tài khoản?</p><br>
                  <a href="http://localhost/webdongho_php/views/login.php">Login here</a>
                </div>

            </form>

            <div class="register-social">
                <p>Hoặc đăng nhập bằng:</p>
                <button class="social-fb"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</button><br>
                <button class="social-tw"><i class="fab fa-twitter"></i>&nbsp;Twitter</button><br>
                <button class="social-gg"><i class="fab fa-google-plus-g"></i>&nbsp;Google</button><br>
            </div>
        </div>
    </div>
</body>
</html>

