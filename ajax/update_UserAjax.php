<?php 
    include_once '../model/userModel.php';
    $username=$name=$email=$phone=$pass=$re_pass="";
    $action = "Thêm mới";
    $action2 = "addUser";
    if(isset($_GET['updateID'])){
        $action = "Cập nhật";
        $action2 = "updateUser";
        $id = (int)$_GET['updateID'];
        $user = userModel::getInstance()->getUser($id);
     
        foreach ($user as $admin){
            $username = $admin['username'];
            $name = $admin['name'];
            $email = $admin['email'];
            $phone = $admin['phone'];
            $pass = $admin['password'];
        }
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
<div class="line"></div>

<!-- Message -->

<div class="wrapper">

	<div class="widget">

		<div class="title">
			<img src="../../image/crown/icons/dark/edit.png" class="titleIcon" />
			<h6>Update User</h6>
		</div>

		<form class="form" id="form" action=""  method="get" name="<?php echo $action2 ?>";
			enctype="multipart/form-data">
			<fieldset>


				<div class="formRow">
					<label class="formLeft" for="param_username">Username:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="username" id="param_username" <?php if($action=="Cập nhật") echo " readonly='readonly' style='background-color: #ededc4;' ";?>   value="<?php echo $username;?>" 
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
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_email">E-mail:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="email" id="param_email" value="<?php echo $email;?>"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_phone">SĐT:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="phone" id="param_phone" value="<?php echo $phone;?>"
							_autocheck="true" type="text"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
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
						<span class="oneTwo"><input name="re_pass" id="param_re_pass" value="<?php echo $pass;?>"
							_autocheck="true" type="password"></span> <span name="name_autocheck"
							class="autocheck"></span>
						<div name="name_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formSubmit">
					<input type="submit" value="<?php echo $action?>" class="redB" name="CapNhat"> 
				</div>


			</fieldset>
		</form>

	</div>



</div>



