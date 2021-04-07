



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Đơn đặt hàng</h5>
			<span>Quản lý đơn hàng</span>
		</div>
		<div class="clear"></div>
	</div>
</div>


<div class="line"></div>


<!-- Message -->




<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Static table -->
	<div class="widget">

<div id="thongtinthanhtoan">
<?php include_once '../model/orderModel.php';
		$rs = orderModel::getInstance()->getOrderDetailbyID($_GET['id']);
		foreach ($rs as $order)
?>
       <h5 style="text-align: center;color: gray;">THÔNG TIN KHÁCH HÀNG</h5>
       <table border='1' width="100%" style="margin: 15px;" >
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
			<h6>Chi Tiết Đơn Đặt Hàng</h6>
		</div>
	

		<table cellpadding="0" cellspacing="0" width="100%"
			class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
					<td style="width: 240px;" >Sản phẩm</td>
					<td  >Tên</td>
					<td style="width: 240px;">Đơn giá</td>
					<td style="width: 90px;">Số lượng</td>
					<td>Tổng tiền</td>
				</tr>
			</thead>

			

			<tbody>
			
			<?php include_once '../model/orderModel.php';
			     $tongcong = 0;
			     $rs = orderModel::getInstance()->getOrderDetail($_GET['id']);
			     foreach ($rs as $item):
				 	$tongcong += $item['amount'];
			?>
				<tr class="cart_item">
				
						<td class="product-thumbnail">
							<img width="100" height="100" src="<?php echo "../".$item['image_link']?>" >							
						</td>
						
						<td class="product-name" data-title="Sản phẩm"><?php echo $item['name']?> </td>

						<td class="product-price" data-title="Giá"><?php echo number_format($item['price']); ?>vnđ</td>
						
						<td class="product-name" data-title="Sản phẩm"><?php echo $item['qty']?> </td>

						<td class="product-subtotal" data-title="Tổng cộng"><?php echo number_format($item['amount']); ?>vnđ</td>
					</tr>
				<?php endforeach;?>
					
			</tbody>

		</table>
	</div>
</div>
<div class="clear mt30"></div>