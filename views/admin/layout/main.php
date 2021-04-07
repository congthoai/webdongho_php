<?php 
$flag = "";

if (isset($_GET['idxoa'])) {
    include_once '../../../model/orderModel.php';
    $rs = orderModel::getInstance()->xoaOrder($_GET['idxoa']);
    if ($rs)
        $flag = "Đã Xóa thành công!";
    else
        $flag = "Xóa không thành công!";
}

if (isset($_GET['id_duyet'])) {
    include_once '../../../model/orderModel.php';
    $rs = orderModel::getInstance()->duyet_order((int)$_GET['id_duyet']);
    if ($rs)
        $flag = "Đơn hàng đã được duyệt thành công!";
    else
            $flag = "Duyệt đơn hàng không thành công!";
}

?>


<?php 
    $query = "select sum(total_amount) as doanhso from `order` where status=1";
    $doanhso = P2SQL::getInstance()->executeReader($query);
    
    
    $query = "select sum(total_amount) from `order` where month(created)=". date('m') . " and year(created)=".date('20y');
    $doanhsothang = P2SQL::getInstance()->executeReader($query);
    
    $query = "select sum(total_amount) from `order` where created='" .date('20y-m-d') ."'";
    $doanhsongay = P2SQL::getInstance()->executeReader($query);
    
    $query = "select count(*) from `order`";
    $sogiaodich = P2SQL::getInstance()->executeReader($query);
    
    $query = "select count(*) from `watch`";
    $sosp = P2SQL::getInstance()->executeReader($query);
    
    $query = "select count(*) from `account` where type_id=2";
    $sokhachhang = P2SQL::getInstance()->executeReader($query);
    
    
?>

<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>

		<div class="clear"></div>
	</div>
</div>



<div class="line"></div>


<div class="wrapper">

	<div class="widgets">
		<!-- Stats -->

		<!-- Amount -->
		<div class="oneTwo">
			<div class="widget">
				<div class="title">
					<img
						src="../../image/crown/icons/dark/money.png"
						class="titleIcon">
					<h6>Doanh số</h6>
				</div>

				<table cellpadding="0" cellspacing="0" width="100%"
					class="sTable myTable">
					<tbody>

						<tr>
							<td class="fontB blue f13">Tổng doanh số</td>
							<td class="textR webStatsLink red" style="width: 120px;"><?php echo number_format($doanhso)?>
								đ</td>
						</tr>

						<tr>
							<td class="fontB blue f13">Doanh số hôm nay</td>
							<td class="textR webStatsLink red" style="width: 120px;"><?php echo number_format($doanhsongay)?> đ</td>
						</tr>

						<tr>
							<td class="fontB blue f13">Doanh số theo tháng</td>
							<td class="textR webStatsLink red" style="width: 120px;"><?php echo number_format($doanhsothang)?> đ</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>


		<!-- User -->
		<div class="oneTwo">
			<div class="widget">
				<div class="title">
					<img
						src="../../image/crown/icons/dark/users.png"
						class="titleIcon">
					<h6>Thống kê dữ liệu</h6>
				</div>

				<table cellpadding="0" cellspacing="0" width="100%"
					class="sTable myTable">
					<tbody>

						<tr>
							<td>
								<div class="left">Tổng số giao dịch</div>
								<div class="right f11">
									<a href="">Chi tiết</a>
								</div>
							</td>

							<td class="textC webStatsLink"><?php echo $sogiaodich?></td>
						</tr>

						<tr>
							<td>
								<div class="left">Tổng số sản phẩm</div>
								<div class="right f11">
									<a href="">Chi tiết</a>
								</div>
							</td>

							<td class="textC webStatsLink"><?php echo $sosp?></td>
						</tr>

						<tr>
							<td>
								<div class="left">Tổng số bài viết</div>
								<div class="right f11">
									<a href="">Chi tiết</a>
								</div>
							</td>

							<td class="textC webStatsLink">4</td>
						</tr>

						<tr>
							<td>
								<div class="left">Tổng số khách hàng</div>
								<div class="right f11">
									<a href="">Chi tiết</a>
								</div>
							</td>

							<td class="textC webStatsLink"><?php echo $sokhachhang?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="clear"></div>

		<!-- Giao dich thanh cong gan day nhat -->
		
		<?php

        if ($flag != "")
            echo "<div class='nNote nInformation hideit'>
        	<p>
        		<strong>INFORMATION: </strong> $flag
        	</p>
        </div>"
        ?>


        <script> $j(".nInformation").toggle(6000);
        </script>

		<div class="widget">
			<div class="title">
				<span class="titleIcon"><input type="checkbox" id="titleCheck"
					name="titleCheck"></span>
				<h6>Danh sách Giao dịch gần nhất</h6>
			</div>

			<table cellpadding="0" cellspacing="0" width="100%"
				class="sTable mTable myTable" id="checkAll">


				<thead>
					<tr>
						<td style="width: 60px;">Mã số</td>
    					<td style="width: 240px;">Tài khoản đặt</td>
    					<td style="width: 240px;">Tổng tiền</td>
    					<td>Ghi chú</td>
    					<td style="width: 90px;">Ngày tạo</td>
    					<td style="width: 110px;">Trạng thái</td>
    					<td style="width: 80px;">Hành động</td>
					</tr>
				</thead>

				<tfoot class="auto_check_pages">
					<tr>
						<td colspan="8">
							<div class="list_action itemActions">
								<a href="" id="submit" class="button blueB"
									url="admin/tran/del_all.html"> <span style="color: white;">Xóa
										hết</span>
								</a>
							</div>
						</td>
					</tr>
				</tfoot>

				<tbody class="list_item">

					<?php 
					   $query = "select o.*, a.username from `order` o join account a on o.account_id=a.id order by status limit 10";
					   $rs = P2SQL::getInstance()->executeQuery($query);
					   foreach ($rs as $item):
					?>
					<tr>

						<td class="textC"><?php echo $item['id']?></td>

						<td><?php echo $item['username']?></td>

						<td class="textC"><?php echo number_format($item['total_amount'])?></td>

						<td class="textC"><?php echo $item['message']?></td>
					
						<td class="textC"><?php echo $item['created']?></td>
						
						<td class="status textC"><span  <?php echo $item['status']>0 ? "class ='completed'> thành công" : "class ='pending'> chờ duyệt" ?>> </span> </td>

						<td class="option">
    					<?php if($item['status'] == 0):?>
        					<a href="http://localhost/webdongho_php/views/admin/layout/main.php?kiemduyet=1&id_duyet=<?php echo $item['id']?>" title="Duyệt đơn hàng này" class="tipS"> 
        						<img src="../../image/crown/icons/color/set_default.png" /> </a> 
        				<?php endif;?>
        					<a href="http://localhost/webdongho_php/ajax/order_detail_Ajax.php?id=<?php echo $item['id']?>"  class="tipS"> 
        						<img src="../../image/crown/icons/color/view.png" /> </a> 
        					<a href="http://localhost/webdongho_php/views/admin/layout/main.php?idxoa=<?php echo $item['id']?>" title="Xóa" class="tipXoa"> 
        						<img src="../../image/crown/icons/color/delete.png" /> </a>
    					</td>
					</tr>
					<?php endforeach;?>
				
				</tbody>

			</table>
		</div>

	</div>

</div>

<div class="clear mt30"></div>
