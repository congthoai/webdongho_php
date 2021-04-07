<?php session_start();
include_once '../../model/P2SQL.php';?>

<?php 
if(!isset($_SESSION['account']) || (isset($_SESSION['account']) && $_SESSION['account'] != "admin") ){
        echo "<script> 
                    alert('Bạn không có quyền truy cập trang quản trị!');
                    window.location.href='http://localhost/webdongho_php';
             </script>";
    }

?>

<html>
    
<head>
    
	<?php include_once 'layout/head.php' ?>
	

    <script >
    
        $j(document).ready(function() {
		
			// Show lựa chọn Ajax
            $j(".sub a").click(function(event){
            	event.preventDefault();
            	var href = $j(this).attr('href');
				//alert(href);
				if(href != "")   
    			    $.get(href,function(data,status){
    			    		$('#classmain').html(data);		        
    			     });
			     
			
            });       


			// Delete - Update Admin User Watch
            $j("#classmain").on('click', '.option a', function(e){
            	e.preventDefault();
            	var href = $j(this).attr('href');         	
            	var action = $j(this).attr('class');
				if(action == "tipS"){  
					$.get(href,function(data,status){
			    		$('#classmain').html(data);		        
			     	});
				}
				else{
					if(action=='tipXoa'){
    					var r = confirm("Bạn có chắc chắn muốn xóa?");
    					if (r == true) {
    						$.get(href,function(data,status){
    							$('#classmain').html(data);		        
    						});
    					} 
					}					
				}
            });      


			
   

			// Submit Thêm mới - Cập nhật 
            $j("#classmain").on('submit', '#form', function(e){
            	e.preventDefault();
				var username = $j('#param_username').prop('value');
				var name = $j('#param_name').prop('value');
				var pass = $j('#param_pass').prop('value');
				var phone = $j('#param_phone').prop('value');
				var email = $j('#param_email').prop('value');
				var re_pass = $j('#param_re_pass').prop('value');

				var action = $j(this).attr('name');
				//alert(username);
				switch (action) {
				case "updateAdmin":
					var url = "http://localhost/webdongho_php/ajax/update_adminAjax_2.php?username="+username+"&name="+name+"&email="+email+"&phone="+phone+"&pass="+pass+"&re_pass="+re_pass+"&CapNhat=Cập+nhật";					
					break;
				case "updateUser":
					var url = "http://localhost/webdongho_php/ajax/update_userAjax_2.php?username="+username+"&name="+name+"&email="+email+"&phone="+phone+"&pass="+pass+"&re_pass="+re_pass+"&CapNhat=Cập+nhật";					
					break;
				case "addAdmin":
					var url = "http://localhost/webdongho_php/ajax/add_adminAjax.php?username="+username+"&name="+name+"&email="+email+"&phone="+phone+"&pass="+pass+"&re_pass="+re_pass+"&CapNhat=Thêm+mới";					
					break;
				case "addUser":
					var url = "http://localhost/webdongho_php/ajax/add_userAjax.php?username="+username+"&name="+name+"&email="+email+"&phone="+phone+"&pass="+pass+"&re_pass="+re_pass+"&CapNhat=Thêm+mới";					
					break;
			
				}

				 $.get(url,function(data,status){
			    		$('#classmain').html(data);		        
			     });		

				 $j(".nInformation").toggle(1500, function() {
			            $j(".nInformation").toggle(1000);
			        });		
            });    


			// Add  Admin User
            $j("#classmain").on('click', '.menu_action a', function(e){
            	e.preventDefault();
            	var href = $j(this).attr('href');  
            	if(href != "")       	
            		$.get(href,function(data,status){
    		    		$('#classmain').html(data);			        
    		     	});
                    	         	
            });   


            

            
               
        });
        
    </script>

</head>

<body>


	<div id='left_content'>
        	<?php include_once 'layout/left.php' ?>
	</div>

	<div id='rightSide'>
        	<?php include_once 'layout/header.php' ?>
		
		<!-- thay đổi -->


		<div id="classmain">

			<?php include_once 'layout/main.php' ?>
		</div>


		<!-- END thay đổi -->


		
		<?php include_once 'layout/footer.php' ?>
	</div>

	<div class="clear"></div>

</body>

</html>