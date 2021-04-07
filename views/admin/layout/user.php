
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Thành viên</h5>
			<span>Quản lý thành viên</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="user/add.html"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href="user.html"> <img src="../../image/crown/icons/control/16/list.png" />
						<span>Danh sách</span>
				</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

<!-- Message -->







<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck" /></span>
			<h6>Danh sách Thành viên</h6>
			<div class="num f12">
				Tổng số: <b>0</b>
			</div>
		</div>

		<form action="http://localhost/webphp/index.php/admin/user.html"
			method="get" class="form" name="filter">
			<table cellpadding="0" cellspacing="0" width="100%"
				class="sTable mTable myTable withCheck" id="checkAll">
				<thead>
					<tr>
						<td style="width: 10px;"><img src="../../image/crown/icons/tableArrows.png" /></td>
						<td style="width: 80px;">Mã số</td>
						<td>Tên</td>
						<td>Username</td>
						<td>Email</td>
						<td>Điện thoại</td>
						<td style="width: 100px;">Hành động</td>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="7">
							<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB"
									url="user/del_all.html"> <span style='color: white;'>Xóa hết</span>
								</a>
							</div>

							<div class='pagination'></div>
						</td>
					</tr>
				</tfoot>

				<tbody>
					<!-- Filter -->
					<?php 
					       include_once '../../../model/userModel.php';					
					       $listUser = userModel::getInstance()->getListUser();
					       foreach ($listUser as $item):
					 ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

						<td class="textC"><?php echo $item['id']?></td>


						<td><span title="<?php echo $item['name']?>" class="tipS"> <?php echo $item['name']?> </span></td>


						<td><span title="<?php echo $item['username']?>" class="tipS">
								<?php echo $item['username']?> </span></td>

						<td><?php echo $item['email']?></td>

						<td><?php echo $item['phone']?></td>


						<td class="option"><a href="user/edit/19.html" title="Chỉnh sửa"
							class="tipS "> <img src="../../image/crown/icons/color/edit.png" />
						</a> <a href="user/del/19.html" title="Xóa"
							class="tipS verify_action"> <img
								src="../../image/crown/icons/color/delete.png" />
						</a></td>
					</tr>
					<?php endforeach;?>


				</tbody>
			</table>
		</form>
	</div>
</div>
<div class="clear mt30"></div>