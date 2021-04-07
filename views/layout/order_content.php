<?php 
if (!isset($_SESSION)) session_start();
?>

<?php 
$flag="";
if (isset($_GET['idxoa'])) {
    include_once '../../model/orderModel.php';
    $rs = orderModel::getInstance()->xoaOrder($_GET['idxoa']);
    if ($rs)
        $flag = "Đã Xóa thành công!";
    else
        $flag = "Xóa không thành công!";
}
?>


<script>
$(document).ready(function() {
$(".option a").click(function(e){
	e.preventDefault();
	var href = $(this).attr('href');   
	alert(href);    	
	$.get(href,function(data,status){
		$('#content').html(data);		        
 	});
});

$(".nInformation").toggle(6000);

});

</script>

<?php if($flag!="") echo "<div class='nNote nInformation hideit'>
	<p>
		<strong>INFORMATION: </strong> $flag
	</p>
</div>"
?>



<div>

		<table cellpadding="0" cellspacing="0" border="1" width="100%" >

				<tr style="text-align: center;">
					<th style="width: 240px;">Tài khoản đặt</th>
					<th style="width: 180px;">Tổng tiền</th>
					<th>Ghi chú</th>
					<th style="width: 120px;">Ngày tạo</th>
					<th style="width: 130px;">Trạng thái</th>
					<th style="width: 80px;">Hành động</th>
				</tr>
			<?php 
			$rs = orderModel::getInstance()->getOrderbyUser($_SESSION['username']);
			     foreach ($rs as $item):
			?>
				<tr style="text-align: center; height:35">

					<td ><?php echo $item['username']?></td>

					<td ><?php echo number_format($item['total_amount'])?> vnđ</td>

					<td ><?php echo $item['message']?></td>
					
					<td ><?php echo $item['created']?></td>
					<td ><?php echo $item['status']>0 ? "đã duyệt" : "chờ duyệt" ?></td>

					<td class="option"> 
    					<a  href="http://localhost/webdongho_php/views/layout/order_detail_content.php?id=<?php echo $item['id']?>" title="Xem chi tiết" class="tipS"> 
    						<img src="../image/crown/icons/color/view.png" /> </a>
    					<a href="http://localhost/webdongho_php/views/layout/order_content.php?idxoa=<?php echo $item['id']?>" title="Hủy đặt" class="tipXoa"> 
    						<img src="../image/crown/icons/color/delete.png" /> </a>
					</td>
				</tr>
				<?php endforeach;?>

		</table>

</div>