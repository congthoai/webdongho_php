<?php
    include_once '../model/slideModel.php';
   $flag="";
   
    if (isset($_GET['idxoa'])) {
        $rs = slideModel::getInstance()->xoaSlide($_GET['idxoa']);
        if ($rs == 1)
            $flag = "Đã xóa thành công!";
        else
            $flag = "Xóa không thành công! Cửa hàng còn nhiều SP của thương hiệu này!";
    }
   
    
   
  
?>



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Quản lý Nội dung</h5>
			<span>Slide</span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_slideAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href=""> <img src="../../image/crown/icons/control/16/list.png" />
						<span>Danh sách</span>
				</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>

<?php if($flag!="") echo "<div class='nNote nInformation hideit'>
	<p>
		<strong>INFORMATION: </strong> $flag
	</p>
</div>"
?>



<div class="line"></div>

<!-- Message -->







<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck" /></span>
			<h6>Danh sách Slide</h6>
			<div class="num f12">
				Tổng số: <b></b>
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
						<td>Slide</td>
						<td>Link liên kết</td>
						<td>Thứ tự hiển thị</td>
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

							<div class='pagination'>
						
							</div>
						</td>
					</tr>
				</tfoot>

				<tbody>
					<!-- Filter -->
					<?php 
					       include_once '../model/slideModel.php';		
					       $listSlide = slideModel::getInstance()->getListSlide();
					       foreach ($listSlide as $item):
					 ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

						<td class="textC"><?php echo $item['id']?></td>


						<td>
							<div class="image_thumb">
								<img src="../<?php echo $item['image_link']?>" height="50">
								<div class="clear"></div>
							</div> 

						</td>


						<td><?php echo $item['link']?></td>
						<td><?php echo $item['sort']?></td>



						<td class="option">
							<a href="http://localhost/webdongho_php/ajax/slideAjax.php?idxoa=<?php echo $item['id']?>" title="Xóa" class="tipXoa">
							 	<img src="../../image/crown/icons/color/delete.png" />
						</a></td>
					</tr>
					<?php endforeach;?>


				</tbody>
			</table>
		</form>
	</div>
</div>
<div class="clear mt30"></div>