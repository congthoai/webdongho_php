


<!-- Main content wrapper -->
<div class="wrapper2">

	<!-- Static table -->
	<div class="widget">

<div id="thongtinthanhtoan">
<?php 
include_once '../../model/orderModel.php';
		$rs = orderModel::getInstance()->getOrderDetailbyID($_GET['id']);
		foreach ($rs as $order)
?>
       <h5 style="text-align: center;color: gray;">THÔNG TIN KHÁCH HÀNG</h5>
       <table  width="100%" style="margin: 15px;" >
       	<tr>
       		<td>Họ tên:</td><th><?php echo $order['name']?></th>
       		<td>SĐT:</td><th><?php echo $order['phone']?></th>
       		<td>E-mail:</td><th><?php echo $order['email']?></th>
       	</tr>
       	       	<tr>
       		<td>Địa chỉ:</td><th><?php echo $order['address']?></th>
       		<td>Ghi chú:</td><th><?php echo $order['message']?></th>
       		<td>Trị giá đơn hàng:</td><th style="font-size: 1.4em; color:red"><?php echo number_format($order['total_amount'])?> vnđ</th>
       	</tr>
       	
       	</table>
             
</div>


		<div class="title">
			<strong>Chi Tiết Đơn Đặt Hàng</strong>
		</div>
	
	<div class="table" style="height: 450px; overflow: scroll;">	
		<table cellpadding="0" cellspacing="0" border="1" width="100%" >
			
				<tr style="text-align: center;">
					<th style="width: 240px;" >Sản phẩm</th>
					<th  >Tên</th>
					<th style="width: 240px;">Đơn giá</th>
					<th style="width: 90px;">Số lượng</th>
					<th>Tổng tiền</th>
				</tr>
			
			<?php include_once '../../model/orderModel.php';
			     $tongcong = 0;
			     $rs = orderModel::getInstance()->getOrderDetail($_GET['id']);
			     foreach ($rs as $item):
				 	$tongcong += $item['amount'];
			?>
				<tr style="text-align: center;">
				
						<td class="product-thumbnail">
							<img width="100" height="100" src="<?php echo $item['image_link']?>" >							
						</td>
						
						<td class="product-name" data-title="Sản phẩm"><?php echo $item['name']?> </td>

						<td class="product-price" data-title="Giá"><?php echo number_format($item['price']); ?>vnđ</td>
						
						<td class="product-name" data-title="Sản phẩm"><?php echo $item['qty']?> </td>

						<td class="product-subtotal" data-title="Tổng cộng"><?php echo number_format($item['amount']); ?>vnđ</td>
					</tr>
				<?php endforeach;?>


		</table>
	</div>
	</div>
</div>
<div class="clear mt30"></div>