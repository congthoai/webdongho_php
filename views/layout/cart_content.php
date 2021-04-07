<?php 
    if(isset($_POST['CapNhat'])){
        foreach ($_POST['qty'] as $key => $val)
            $_SESSION['cart'][$key] = $val;
    }
?>


<?php 
    include_once '../model/P2SQL.php';
    $listCart;
    $total_price_cart = 0;
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $key=>$val)
            $listCart[]=$key;
    }
    if(!empty($listCart)):{
    $in = implode(",", $listCart);
    $query = "select * from watch where id in ($in)";
    $list = P2SQL::getInstance()->executeQuery($query);
    }
       
?>

     <script>
        $(document).ready(function() {
            $(".removeCart").click(function(event){
            	event.preventDefault();
                var href = $(this).attr('href');
                $.get(href,function(data,status){
                    $("#content_cart").html(data);
                });
            });

            $(".bt-checkout").click(function(){
            	window.location.href='order_pay.php';
            });
        });
    </script>


<div id="giohang">

	<form class="cart_detail" action="" method="post">
	
	<table class="list_cart" cellspacing="0">
				<thead>
					<tr>
						<th class="product-name" colspan="3">Sản phẩm</th>
						<th class="product-price">Giá</th>
						<th class="product-quantity">Số lượng</th>
						<th class="product-subtotal">Tổng cộng</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($list as $cart):
					   $price = (int)$cart['price'] - (int)$cart['discount'];
					   $qty = $_SESSION['cart'][$cart['id']];
					   $total_price = $qty*$price;
					   $total_price_cart += $total_price;
					?>
					<tr class="cart_item">

						<td class="product-remove"><a class="removeCart" href="http://localhost/webdongho_php/ajax/removeCart_Ajax.php?id=<?php echo $cart['id']?>" >X</a></td>

						<td class="product-thumbnail">
							<img width="100" height="100" src="<?php echo $cart['image_link']?>" >
						</td>

						<td class="product-name" data-title="Sản phẩm"><?php echo $cart['name']?>
						</td>

						<td class="product-price" data-title="Giá"><?php echo number_format($price); ?></td>

						<td > <input type="number" name="qty[<?php echo $cart['id']?>]" min="1" max="10" value="<?php echo $qty?>"></td>

						<td class="product-subtotal" data-title="Tổng cộng"><?php echo number_format($total_price); ?></td>
					</tr>
					
					<?php endforeach;?>
					
				</tbody>
			</table>

		<input type="submit" value="Cập nhật" name="CapNhat"
			style="padding: 3px; float: right; margin-right: 17px;">
	</form>


</div>




<div class="tongcong">

<form class="form-totalcart">
                <table class="total_cart" border=1>
                    <tbody><tr>
                        <th colspan='2'>Tổng Giỏ Hàng</th>
                    </tr>
                    <tr>
                        <td>Tổng tiền sản phẩm</td>
                        <td><?php echo number_format($total_price_cart)?> vnđ</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td>FreeShip</td>
                    </tr>
                    <tr>
                        <td>Tổng tiền</td>
                        <td><?php echo number_format($total_price_cart)?> vnđ</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" class="bt-checkout" value="Thanh Toán">    <i class="fas fa-arrow-right"></i></td>
                    </tr>
                    <tr>
                        <td colspan="2">Mã giảm giá    <i class="fas fa-tag"></i></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" placeholder="Nhập mã giảm giá" id="idcoupon"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button class="">Áp dụng</button></td>
                    </tr>
                </tbody></table>
            </form>
</div>

<?php 
else :
    echo "<br><br><h3 style='color:#ff9999'>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG!</h3>";
endif;
?>
