

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
        	$('.thongtin').on('submit', function(e){
            	alert($(this).serialize());
            	e.preventDefault();
            	$.post('http://localhost/webdongho_php/ajax/add_order_Ajax.php', $(this).serialize(),function(data,status){
                	$("#content").html(data);
            	});
            });

        });
    </script>


<div id="thongtinthanhtoan">

	<form class="thongtin" method="post" acction="">
        	<?php     
        	$query = "select * from account where username=?";
            $account = P2SQL::getInstance()->executeQuery($query,array($_SESSION['username']));
            foreach ($account as $acc)
            ?>
            <h5><strong>THÔNG TIN ĐẶT HÀNG</strong></h5>
            Họ teen:
            <input type="text" placeholder="Họ" class="input-BD" name="name" value="<?php echo $acc['name']?>">
            <br>
            Số điện thoại:
            <input type="text" placeholder="Số điện thoại" class="input-BD" name="phone" value="<?php echo $acc['phone']?>">
            <br>   
            Email:
            <input type="text" placeholder="Email" class="input-BD" name="email" value="<?php echo $acc['email']?>">
            <br>  
            Địa Chỉ:
            <input type="text" placeholder="Địa chỉ" class="input-BD" name="address" value="">
            <br> 
            Ghi chú:
            <input type="text" placeholder="Ghi chú về đơn hàng của bạn" class="input-BD" name="message" >
            <br>   
             
               <input type="submit" value="Đặt hàng" name="dathang"
			style="padding: 3px;  margin: 30px auto;">
	    </form>
</div>




<div class="donhang">


                <table class="total_cart">
                   <tr>
                        <th colspan='2' style="padding-left: 50px">ĐƠN HÀNG CỦA BẠN</th>
                    </tr>
                                            <tr>
                        	<td>Sản phẩm</td><td>Số tiền</td>
                        </tr>
                    <?php foreach ($list as $cart):
					   $price = (int)$cart['price'] - (int)$cart['discount'];
					   $qty = $_SESSION['cart'][$cart['id']];
					   $total_price = $qty*$price;
					   $total_price_cart += $total_price;
					?>
                    
                    <tr>
                    	<td><?php echo $cart['name'] . "&nbsp&nbsp&nbsp&nbsp x$qty"?></td>
                    	<td> <?php echo number_format($total_price)?> vnđ</td>
                    </tr>
                    <?php endforeach;?>
                    
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
                        <td> <?php echo number_format($total_price_cart)?> vnđ</td>
                    </tr>
               </table>

</div>
<?php 
else :
    echo "<br><br><h3 style='color:#ff9999'>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG!</h3>";
endif;
?>

