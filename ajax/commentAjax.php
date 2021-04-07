<?php include_once '../model/commentModel.php';
$flag = "";

if (isset($_GET['idxoa'])) {
    $rs = commentModel::getInstance()->xoaComment($_GET['idxoa']);
    if ($rs)
        $flag = "Đã Xóa thành công!";
    else
        $flag = "Xóa không thành công!";
}


?>




<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
			<span>Quản lý phản hồi</span>
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


<script> $j(".nInformation").toggle(6000);
</script>

<div class="line"></div>


<!-- Message -->




<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Static table -->
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck" /></span>
			<h6>Danh sách phản hồi mới nhất</h6>
			<div class="num f12">
				<b>0</b> Đơn hàng
			</div>
		</div>


		<table cellpadding="0" cellspacing="0" width="100%"
			class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
					<td style="width: 21px;"><img src="../../image/crown/icons/tableArrows.png" /></td>
					<td style="width: 240px;">Tài khoản</td>
					<td style="width: 240px;">Sản phẩm</td>
					<td>Nội dung</td>
					<td style="width: 90px;">Ngày tạo</td>
					<td style="width: 80px;">Hành động</td>
				</tr>
			</thead>

			

			<tbody>
			
			<?php 
			include_once '../model/commentModel.php';
			     $rs = commentModel::getInstance()->getComment();
			     foreach ($rs as $item):
			?>
				<tr class='row'>
					<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

					<td class="textC"><?php echo $item['username']?></td>

					<td class="textC"><?php echo $item['name']?></td>

					<td class="textC"><?php echo $item['content']?></td>
					
					<td class="textC"><?php echo $item['created']?></td>

					<td class="option">
    					<a href="" title="Xem chi tiết" class="cmtDetail"> 
    						<img src="../../image/crown/icons/color/view.png" /> </a> 
    					<a href="http://localhost/webdongho_php/ajax/commentAjax.php?idxoa=<?php echo $item['id']?>" title="Xóa" class="tipXoa"> 
    						<img src="../../image/crown/icons/color/delete.png" /> </a>
					</td>
				</tr>
				<?php endforeach;?>
				
			</tbody>

		</table>
	</div>
</div>
<div class="clear mt30"></div>