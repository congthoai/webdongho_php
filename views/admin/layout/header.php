<?php include_once '../../model/adminModel.php';?>

<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
			<span>Xin chào: <b><?php if(isset($_SESSION['username'])) echo adminModel::getInstance()->getName($_SESSION['username'])?>!</b></span>
		</div>

		<div class="userNav">
			<ul>
				<li><a href="http://localhost/webdongho_php" target="_blank"> <img style="margin-top: 7px;"
						src="../../css/admin/images/icons/light/home.png">
						<span>Trang chủ</span>
				</a></li>

				<!-- Logout -->
				<li><a href="http://localhost/webdongho_php/views/logout.php"> <img
						src="../../css/admin/images/icons/topnav/logout.png"
						alt=""> <span>Đăng xuất</span>
				</a></li>

			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>