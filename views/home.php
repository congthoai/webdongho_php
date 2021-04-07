<?php 
    include '../model/P2SQL.php';
    session_start(); 
?>
	
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DongHo_NCT</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/style-grid-product.css" type="text/css">
    <script language="javascript" src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css"> <!--Font Icon--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
    
      
    
    
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
            if($(document).scrollTop() ) {
                $('.top').addClass('shrink');
                    }
            else {
                $('.top').removeClass('shrink');
                    }
            });

            $(".p-add").click(function(){
				var isLogin = $('#isLogin').prop("name");
				if(isLogin != ""){
					var id_add_cart = $(this).prop("value");
	                //alert(id_add);
	            	$.get("http://localhost/webdongho_php/ajax/add_cart_Ajax.php?id_add_cart="+id_add_cart,function(data,status){
		            	$("#qty_cart_ajax").html(data);
	            	});
				}
				else
					alert("Bạn cần đăng nhập để mua hàng!");
            });

            $("#view_cart").click(function(event){
            	event.preventDefault();
                var qty = $("#qty_cart_ajax").text();
                if(qty=="")
                    alert("KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ!");
                else{
                	//header("location: http://localhost/webdongho_php/views/checkout.php");
                	window.location.href='checkout.php';
                }
            });
            
        });
    </script>

</head>


<body>

	<input type="hidden" id="isLogin" name="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>">
	
    <div id='wrapper'>

        <?php include 'layout/top.php';?>

        <?php include 'layout/banner.php';?>

        <div id="main">
            
            <div id="DH-nam" class="grid-dh">
                <div class="title-grid">
                    <h3>SẢN PHẨM BÁN CHẠY</h3>
                </div>
                <div id="p-float">
             <?php 
            $query='select * from watch order by buyed desc limit 10';
            $rs= P2SQL::getInstance()->executeQuery($query);
            foreach ($rs as $dh):
            
            ?>
                    <div class="p-float"><div class="p-float-in">
                    <a href=<?php echo $dh['id'] ?>></a>
                      <img class="p-img" src="<?php echo $dh['image_link']?>"/>
                      <div class="p-name"><?php  echo $dh['name']?></div>
                      <div class="p-final-price"><?php echo number_format((int)$dh['price'] - (int)$dh['discount']) ?></div>
					  <div class="p-price"><?php if((int)$dh['discount']!=0) echo number_format((int)$dh['price']) ?> </div>
                      <button class="p-add" value="<?php echo $dh['id']?>"><i class="fas fa-cart-plus"></i></button>
                    </div></div>
            <?php endforeach;?>
                    
               </div>
            
            </div>
           
            <br><br>
            <div style="width: 1028px; margin: 0px auto">
                <a   href="#">
                    <img src="../image/quangcao1.png" alt="quang cao" style="width: 100%; height: 100px;">
                </a>
            </div>


            <div id="DH-nu" class="grid-dh">
                <div class="title-grid">
                    <h3>SẢN PHẨM ĐƯỢC XEM NHIỀU</h3>
                </div>

				<div id="p-float">
             <?php
            $query = 'select * from watch order by view limit 10';
            $rs = P2SQL::getInstance()->executeQuery($query);
            foreach ($rs as $dh) :
                
                ?>
                    <div class="p-float">
						<div class="p-float-in">
                        <a href=<?php echo $dh['id'] ?>></a>
							<img class="p-img" src="<?php echo $dh['image_link']?>" />
							<div class="p-name"><?php  echo $dh['name']?></div>
							<div class="p-final-price"><?php echo number_format((int)$dh['price'] - (int)$dh['discount']) ?></div>
							<div class="p-price"><?php if((int)$dh['discount']!=0) echo number_format((int)$dh['price']) ?> </div>
							<button class="p-add" value="<?php echo $dh['id']?>">
								<i class="fas fa-cart-plus"></i>
							</button>
						</div>
					</div>
            <?php endforeach;?>
                    
               </div>
			</div>
            
        </div>

        <br><br>
       
        <footer>
        <?php include 'layout/footer.php';?>
        </footer>

    </div>

</body>