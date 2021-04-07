<?php 
    include '../model/P2SQL.php';
    session_start(); 
    $page=1; $limit=8;
    if(isset($_GET['page'])) $page=$_GET['page'];
    $where = "true ";
    
    if(isset($_GET['brand']) && $_GET['brand']!=null)
        $where .= " and brand_id=". $_GET['brand'];
    
    if (isset($_GET['typewatch']) && $_GET['typewatch'] != null)
        $where .= " and type_id=". $_GET['typewatch'];
    if (isset($_GET['gender']) && $_GET['gender'] != null)
        $where .= " and gender='" . $_GET['gender'] ."'";
    
    if (isset($_GET['giabatdau']) && $_GET['giabatdau'] != null)
        $where .= " and price>=" . $_GET['giabatdau'];
    if (isset($_GET['giaketthuc']) && $_GET['giaketthuc'] != null)
        $where .= " and price<=" . $_GET['giaketthuc'];
    
    if (isset($_GET['search']) && $_GET['search'] != null){
        $search = $_GET['search'];
        $where = " name like concat('%',REPLACE('$search',' ','%'), '%') ";
    }
    
    if (isset($_GET['orderby']) && $_GET['orderby'] != null)
        $where .=  $_GET['orderby'];
?>
	
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DongHo_NCT</title>
    <link rel="stylesheet" href="../css/style_2.css" type="text/css">
    <link rel="stylesheet" href="../css/style-grid-product_2.css" type="text/css">
    <script language="javascript" src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css"> <!--Font Icon--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
 <script>
        $(document).ready(function() {
         
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
            
        });
    </script>

</head>


<body>

    <div id='wrapper'>
        <div class='top2'><?php include 'layout/top.php';?></div>

		<div id="main">
		
			<div class="title" style=" height:50px;font-weight: bold; padding:13px">
				<a style="color:gray;text-decoration: none;" href='http://localhost/webdongho_php'>Trang Chủ  </a> 
				/  Đồng Hồ  <?php if(isset($_GET['gender']) && $_GET['gender']!=NULL) ECHO $_GET['gender'];?>  
								
            		<select id="sort" name="sort" style=" font-size: 1.3em; float:right">
            			<option value="" >Thứ tự mặc định</option>
            			<option value=" order by price asc" <?php if(isset($_GET['orderby']) && $_GET['orderby']==" order by price asc") echo "selected"?> >Thứ tự theo giá: thấp đến cao</option>
            			<option value=" order by price desc" <?php if(isset($_GET['orderby']) && $_GET['orderby']==" order by price desc") echo "selected"?> >Thứ tự theo giá: cao xuống thấp</option>        
            			<option value=" order by view desc" <?php if(isset($_GET['orderby']) && $_GET['orderby']==" order by view desc") echo "selected"?> >Thứ tự theo có nhiều lượt xem nhất</option> 
            			   			           			
            		</select>
				
			</div>

			<div id='left'>
			
				<?php include 'layout/leftProduct.php';?>
				
			</div>

			<div id='content'>
			
				<div id="DH-nam" class="grid-dh">
         
                <div id="p-float">
                
                     <?php
                    $p2 = ($page-1)*$limit;
                    $query="select * from watch where $where limit $p2, $limit ";
                    $rs= P2SQL::getInstance()->executeQuery($query);
                    $i=0;
                    foreach ($rs as $dh):
                    $i++;
                    
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
            		
            		<?php if($i==0) echo '<br><h4>Không tìm được kết quả phù hợp!</h4>';?>
                    
               </div>
            
            </div>
            

            <div class="pagination">
						<?php 						
						$query="select count(*) from watch where $where";
						$tongso = (int)P2SQL::getInstance()->executeReader($query);
						$p = (int)($tongso / $limit);
						if($tongso%$limit!=0) $p++;
						if($p>1)
						    for($i=1; $i<=$p; $i++){
						        if($i == $page)
						            echo "<strong>$i</strong>";
						        else
						            echo  "<a href='http://localhost".$_SERVER['REQUEST_URI']."?&page=$i'>$i</a>";
						}
						?>

						</div>
			
			</div>
		</div>


		<footer>
        <?php include 'layout/footer.php';?>
        </footer>

    </div>

</body>