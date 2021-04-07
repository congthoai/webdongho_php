

<?php 
include_once '../model/userModel.php';

$username=$name=$email=$phone=$pass=$re_pass="";
$flag="Cập nhật không thành công!";
$err_phone=$err_email=$err_name=$err_repass="";

    $username = $_GET['username'];
    
    if ($_GET['phone'] == NULL)
        $err_phone = "Please enter your phone";
        else {
            $phone = $_GET['phone'];
        }
        
        if (! is_numeric($_GET['phone']) || strlen($_GET['phone']) <10)
            $err_phone = "SDT là dãy số >= 10 kí tự";
    
    
    
    if ($_GET['name'] == NULL)
        $err_name = "Please enter your name";
    else
        $name = $_GET['name'];
    
    if ($_GET['pass'] != NULL)
        $pass = $_GET['pass'];
    
    if ($_GET['re_pass'] == NULL)
        $err_repass = "Please enter your re-pass";
    else
        $re_pass = $_GET['re_pass'];
    
    if ($pass != $re_pass)
        $err_repass = 'Mật khẩu không khớp';
        
    $emailValid = userModel::getInstance()->emailValid($_GET['email']);
    if($emailValid == false)
        $err_email= "Email không hợp lệ";
    else
       $email = $_GET['email'];
    
    
       if ($emailValid && $pass && $re_pass && $pass==$re_pass && $err_phone=="" && $name)
     {
         $rs = userModel::getInstance()->updateUser($name, $pass, $phone, $email, $username);
          if($rs)
               $flag = 'Cập nhật thành công';
     }
       

?>



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Quản trị viên</h5>
			<span>Quản lý User</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/update_userAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href="http://localhost/webdongho_php/ajax/userAjax.php"> <img src="../../image/crown/icons/control/16/list.png" />
						<span>Danh sách</span>
				</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>

<div class="nNote nInformation hideit">
	<p>
		<strong>INFORMATION: </strong><?php echo $flag;?>
	</p>
</div>

<div class="line"></div>

<!-- Message -->

<div class="wrapper">

	<div class="widget">

		<div class="title">
			<img src="../../image/crown/icons/dark/edit.png" class="titleIcon" />
			<h6>Update User</h6>
		</div>

		<form class="form" id="form" action="#"  method="get" name="updateUser"
			enctype="multipart/form-data">
			<fieldset>


				<div class="formRow">
					<label class="formLeft" for="param_username">Username:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="username" id="param_username" readonly="readonly" value="<?php echo $username;?>" style="background-color: #ededc4;"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name" value="<?php echo $name;?>"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_name;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_email">E-mail:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="email" id="param_email" value="<?php echo $email;?>"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_email;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_phone">SĐT:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="phone" id="param_phone" value="<?php echo $phone;?>"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_phone;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_pass">Mật khẩu:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="pass" id="param_pass" value="<?php echo $pass;?>"
							_autocheck="true" type="password"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_re_pass">Nhập lại mật khẩu:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="re_pass" id="param_re_pass" value="<?php echo $re_pass;?>"
							_autocheck="true" type="password"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_repass;?></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formSubmit">
					<input type="submit" value="Cập nhật" class="redB" name="CapNhat"> 
				</div>


			</fieldset>
		</form>

	</div>



</div>

