<?php session_start();
    include_once '../model/orderModel.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../image/uitlogo.png">
    <title>ĐƠN ĐẶT HÀNG</title>
    <link rel="stylesheet" href="../css/style_3.css" type="text/css">
    
    <script language="javascript" src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css"> <!--Font Icon--> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


</head>
<body>
       
        <div id='wrapper'>
        <div class='top2'><?php include 'layout/top.php';?></div>

		<div id="main">
		
			<div class="title" >
				<a style="color:gray;text-decoration: none;" href='http://localhost/webdongho_php'>Trang Chủ  </a> 
				/  ĐƠN ĐẶT HÀNG
							
				
			</div>
			
			<div id="content">
    		
    			<?php include_once 'layout/order_content.php';?>
    		
    		</div>
	
		</div>

    </div>
	
		<footer>
        <?php include 'layout/footer.php';?>
        </footer>
       
       
</body>

</html>