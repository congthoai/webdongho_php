<?php include_once '../../model/adminModel.php';?>

<div id="leftSide" style="padding-top: 30px;">

	<!-- Account panel -->

	<div class="sideProfile">
		<a href="#" title="" class="profileFace"><img width="40"
			src="http://localhost/webdongho_php/css/admin/images/user.png"></a> <span>Xin
			chào: <strong>admin!</strong>
		</span> <span><?php if(isset($_SESSION['username'])) echo adminModel::getInstance()->getName($_SESSION['username'])?></span>
		<div class="clear"></div>
	</div>
	<div class="sidebarSep"></div>
	<!-- Left navigation -->

	<ul id="menu" class="nav">

		<li class="home"><a href="http://localhost/webdongho_php/views/admin" class="active" id="current"> <span>Bảng
					điều khiển</span> <strong></strong>
		</a></li>

		<li class="product"><a href="admin/product.html" class=" exp"> <span>Sản
					phẩm</span> <strong>4</strong>
		</a>

			<ul class="sub">
				<li><a href="../../ajax/productAjax.php?page=1"> Đồng hồ </a></li>
				<li><a href="../../ajax/brandAjax.php?page=1"> Thương hiệu </a></li>
				<li><a href="../../ajax/commentAjax.php?"> Phản hồi </a></li>
				<li><a href="../../ajax/orderAjax.php?page=1"> Đơn đặt hàng </a></li>
			</ul></li>

		<li class="account"><a href="#" class=" exp"> <span>Tài khoản</span> <strong>2</strong>
		</a>

			<ul class="sub">
				<li><a href="../../ajax/adminAjax.php?page=1"> Ban quản trị </a></li>
				<li><a href="../../ajax/userAjax.php?page=1"> Thành viên </a></li>
			</ul></li>
		<li class="support"><a href="admin/support.html" class=" exp"> <span>Hỗ
					trợ và liên hệ</span> <strong>2</strong>
		</a>

			<ul class="sub">
				<li><a href=""> Hỗ trợ </a></li>
				<li><a href=""> Liên hệ </a></li>
			</ul></li>
		<li class="content"><a href="admin/content.html" class=" exp"> <span>Nội
					dung</span> <strong>3</strong>
		</a>

			<ul class="sub">
				<li><a href="../..//ajax/slideAjax.php"> Slide </a></li>
				<li><a href=""> Tin tức </a></li>
				<li><a href=""> Trang thông tin </a></li>
			</ul></li>

	</ul>

</div>

<div class="clear"></div>



