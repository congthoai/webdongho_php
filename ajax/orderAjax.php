<?php include_once '../model/orderModel.php';
$flag = "";

if (isset($_GET['idxoa'])) {
    $rs = orderModel::getInstance()->xoaOrder($_GET['idxoa']);
    if ($rs)
        $flag = "Đã Xóa thành công!";
    else
        $flag = "Xóa không thành công!";
}

if (isset($_GET['id_duyet'])) {
    $rs = orderModel::getInstance()->duyet_order((int)$_GET['id_duyet']);
    if ($rs)
        $flag = "Đơn hàng đã được duyệt thành công!";
    else
            $flag = "Duyệt đơn hàng không thành công!";
}

?>


<?php 
include_once '../model/orderModel.php';
$rs = orderModel::getInstance()->getOrder_ChuaDuyet();
$chuaduyet="activeTab";
$daduyet="";
if(isset($_GET['kiemduyet']) && $_GET['kiemduyet']==1){
    $rs = orderModel::getInstance()->getOrder_DaDuyet();
    $daduyet="activeTab";
    $chuaduyet="";
}

?>



<script>

$(".kiemduyet").click(function(e){
	e.preventDefault();
	var href = $(this).attr('href'); 
	//alert(href);        	
	$.get(href,function(data,status){
		$('#classmain').html(data);		        
 	});
})

</script>



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Đơn đặt hàng</h5>
			<span>Quản lý đơn hàng</span>
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
			<h6>Danh sách Đơn Đặt Hàng</h6>
			<div class="num f12">
				<b>0</b> Đơn hàng
			</div>
		</div>

		<ul class="tabs">
			<li class="<?php echo $chuaduyet?>"><a class="kiemduyet" href="http://localhost/webdongho_php/ajax/orderAjax.php?kiemduyet=0">Chưa kiểm duyệt</a></li>
			<li class="<?php echo $daduyet?>"><a class="kiemduyet" href="http://localhost/webdongho_php/ajax/orderAjax.php?kiemduyet=1">Đã kiểm duyệt</a></li>
		</ul>

		<table cellpadding="0" cellspacing="0" width="100%"
			class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
					<td style="width: 21px;"><img src="../../image/crown/icons/tableArrows.png" /></td>
					<td style="width: 240px;">Tài khoản đặt</td>
					<td style="width: 240px;">Tổng tiền</td>
					<td>Ghi chú</td>
					<td style="width: 90px;">Ngày tạo</td>
					<td style="width: 110px;">Trạng thái</td>
					<td style="width: 80px;">Hành động</td>
				</tr>
			</thead>

			

			<tbody>
			
			<?php 
			     foreach ($rs as $item):
			?>
				<tr class='row'>
					<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

					<td class="textC"><?php echo $item['username']?></td>

					<td class="textC"><?php echo number_format($item['total_amount'])?></td>

					<td class="textC"><?php echo $item['message']?></td>
					
					<td class="textC"><?php echo $item['created']?></td>
					<td class="textC"><?php echo $item['status']>0 ? "đã duyệt" : "chờ duyệt" ?></td>

					<td class="option">
					<?php if($chuaduyet != ""):?>
    					<a href="http://localhost/webdongho_php/ajax/orderAjax.php?kiemduyet=1&id_duyet=<?php echo $item['id']?>" title="Duyệt đơn hàng này" class="tipS"> 
    						<img src="../../image/crown/icons/color/set_default.png" /> </a> 
    				<?php endif;?>
    					<a href="http://localhost/webdongho_php/ajax/order_detail_Ajax.php?id=<?php echo $item['id']?>" title="Xem chi tiết" class="tipS"> 
    						<img src="../../image/crown/icons/color/view.png" /> </a> 
    					<a href="http://localhost/webdongho_php/ajax/orderAjax.php?idxoa=<?php echo $item['id']?>" title="Xóa" class="tipXoa"> 
    						<img src="../../image/crown/icons/color/delete.png" /> </a>
					</td>
				</tr>
				<?php endforeach;?>
				
			</tbody>

		</table>
	</div>
</div>
<div class="clear mt30"></div>