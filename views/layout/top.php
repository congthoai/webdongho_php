
<script>
    
   $(document).ready(function() {
    	$('#search_click').click(function(event){
    		event.preventDefault();
    		var input = $('.search_input').prop('value');
    		if(input!="")
    			window.location.href="http://localhost/webdongho_php/views/product.php?search="+input+"&";	
        });  
   });
   
        
</script>


<div class="top">
            <div class="logo">
                <a href="http://localhost/webdongho_php" title="UIT"> 
                    <img width="120" height="40" src="../image/uitlogo.png" alt="linklogo">
                </a>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="http://localhost/webdongho_php" title="Trang chủ" class="TrangChu">TRANG CHỦ</a></li>
                    <li><a href="http://localhost/webdongho_php/views/product.php?gender=Nam" title="Đồng hồ nam">ĐỒNG HỒ NAM</a></li>
                    <li><a href="http://localhost/webdongho_php/views/product.php?gender=Nữ" title="Đồng hồ nữ">ĐỒNG HỒ NỮ</a></li>
                    <li class='ThuongHieu'><a href="#" title="Phụ kiện">THƯƠNG HIỆU</a>
                        <div class="ThuongHieu-dropdown">
                            <?php
                                include_once '../model/watchModel.php';
                                $brand = watchModel::getInstance()->getThuongHieu();
                                foreach ($brand as $item){
                                    echo " <a href='http://localhost/webdongho_php/views/product.php?brand=".$item['id']."'>".$item['name']."</a>";  
                                }

                            ?>
                        </div>
                    </li>
                    <li><a href="#" title="Tin tức">TIN TỨC</a></li>
                    <li><a href="#" title="Liên hệ">LIÊN HỆ</a></li>
                </ul>
            </div>
            
            <div class="menu_icon">
                <ul>
                    <li class="icon-search">
                        <a class="menuicon" href="#"><i id="timkiem" class="fas fa-search"></i></a>
                        <ul id="search-dropdown">
                            <form class="searchbar">
                                <input class="search_input" type="text" name="" placeholder="Search...">
                                <a id='search_click' href="" class="search_icon"><i class="fas fa-search"></i></a>
                            </form>

                        </ul>
                    </li>
                    <li id='user'>
                        <a class="menuicon" href="#"><i id='usericon' class="fas fa-user"></i></a>
                        <div id='user-dropdown'>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo ' <a href="http://localhost/webdongho_php/views/login.php">Đăng nhập</a>';    
                                    echo '<a href="http://localhost/webdongho_php/views/register.php" >Tạo tài khoản</a>';
                                }
                                else{
                                    echo ' <a href="#">'.$_SESSION['username'].'</a>';    
                                    if(isset($_SESSION['account'])) if($_SESSION['account']=="admin") echo '<a href="http://localhost/webdongho_php/views/admin" >Trang quản trị</a>';
                                    echo '<a href="http://localhost/webdongho_php/views/order.php" >Đơn hàng</a>';
                                    echo '<a href="http://localhost/webdongho_php/views/logout.php" >Đăng xuất</a>';
                                }
                            ?>

                        </div>
                    </li>
                    
                    <li><a class="menuicon" href="http://localhost/webdongho_php/views/checkout.php">
                    	<i id="view_cart" class="fas fa-shopping-bag"><sup id="qty_cart_ajax" style="font-size:19px;color:#FFF999"><?php include_once '../ajax/add_cart_Ajax.php';?></sup></i>
                    </a></li>
                    
                </ul>
            </div>

</div>