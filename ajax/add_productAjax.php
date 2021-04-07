

<?php
include_once '../model/watchModel.php';
include_once '../model/uploadModel.php';


$flag = $name = $image = $brand = $typewatch = $price = $warranty = $quantity =$size=$material=$waterproof=$discount=$gender= "";
$err_name = $err_image = $err_brand = $err_typewatch = $err_price = $err_discount = $err_warranty = $err_quantity=$err_size=$err_material=$err_waterproof="";
$checkAnh = false;

if(isset($_POST['name']) || isset($_POST['price']) || isset($_POST['brand']) || isset($_POST['typewatch'])|| isset($_POST['size']) || isset($_POST['discount'])){
    if (isset($_POST['name']) && $_POST['name'] != NULL) {
        $name = $_POST['name'];
        $checkName = watchModel::getInstance()->checkNameWatch($_POST['name']);
        if ($checkName)
            $err_name = "Tên sp đã tồn tại!";
    } else
        $err_name = "Please enter your name";
    
    if (isset($_POST['brand']) && $_POST['brand'] != NULL)
        $brand = $_POST['brand'];
    else
        $err_brand = "Please enter your brand";
    
    
    if (isset($_POST['typewatch']) && $_POST['typewatch'] != NULL)
        $typewatch = $_POST['typewatch'];
    else
        $err_typewatch = "Please enter your typewatch";
    
    if (isset($_POST['price']) && $_POST['price'] != NULL){
        $price = $_POST['price'];
        if (! is_numeric($_POST['price']))
            $err_price = "sai dinh dang";
    }       
    else
        $err_price = "Please enter your price";
    
    if (isset($_POST['discount']) && $_POST['discount'] != NULL){
        $discount = $_POST['discount'];
        if (! is_numeric($_POST['discount']))
            $err_discount = "sai dinh dang";
    }        
    else
        $err_discount = "Please enter your discount";
    
    if (isset($_POST['warranty']) && $_POST['warranty'] != NULL){
        $warranty = $_POST['warranty'];
        if (! is_numeric($_POST['warranty']))
            $err_warranty = "sai dinh dang";
    }       
    else
        $err_warranty = "Please enter your warranty";
    
    if (isset($_POST['quantity']) && $_POST['quantity'] != NULL){
        $quantity = $_POST['quantity'];
        if (! is_numeric($_POST['quantity']))
            $err_quantity = "sai dinh dang";
    }
    else
        $err_quantity = "Please enter your quantity";
    
        if (isset($_POST['size']) && $_POST['size'] != NULL){
            $size = $_POST['size'];
            if (! is_numeric($_POST['size']))
                $err_size = "sai dinh dang";
        }
    else
        $err_size = "Please enter your size";
    
    if (isset($_POST['material']) && $_POST['material'] != NULL){        
        $material = $_POST['material'];
    }
    
    else
        $err_material = "Please enter your material";
    
    if (isset($_POST['waterproof']) && $_POST['waterproof'] != NULL){        
        $waterproof = $_POST['waterproof'];
        if (! is_numeric($_POST['waterproof']))
            $err_waterproof = "sai dinh dang";
    }
    else
        $err_waterproof = "Please enter your waterproof";
    
    if (isset($_POST['gender']) && $_POST['gender'] != NULL)
        $gender = $_POST['gender'];
        
        // $checkAnh =uploadModel::getInstance()->uploadImage("../image/watch/", "uploadAnhWatch");
        
    // if($checkAnh==false)
        // $err_image = "upload ảnh không thành công! thử ảnh khác";
    if ($err_name == "" && $err_brand == "" && $err_typewatch == "" && $err_price == "" && $err_discount == "" && $err_warranty == "" && $err_quantity == "" && $err_size == "" && $err_material == "" && $err_waterproof == "") {
        $checkAnh = uploadModel::getInstance()->uploadImage("../image/watch/", "uploadAnhWatch");
        if ($checkAnh == false)
            $err_image = "upload ảnh không thành công! thử ảnh khác";
        else {
            $rs = watchModel::getInstance()->addWatch($typewatch, $brand, $name, $gender, $price, $discount, $checkAnh, $warranty, $quantity, $size, $material, $waterproof);
            if ($rs)
                $flag = 'Thêm mới thành công';
            else
                $flag = 'Thêm không thành công!';
        }
    }
}

?>

<script>

$('#my_form_id').on('submit', function(e){
	 e.preventDefault(e);

	  var formData = new FormData(this);

	  $.ajax({
	    async: true,
	    type: 'post',
	    url: 'http://localhost/webdongho_php/ajax/add_productAjax.php',
	    data: formData,
	    cache: false,
	    processData: false,
	    contentType: false,

	    success: function (data) {
	    	$('#classmain').html(data);		
	        console.log("success")
	      }
	    });
})

</script>



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Quản lý Sản phẩm</h5>
			<span>Đồng hồ</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_productAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href="http://localhost/webdongho_php/ajax/productAjax.php"> <img
						src="../../image/crown/icons/control/16/list.png" /> <span>Danh
							sách</span>
				</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>



<?php if($flag!="") echo "<div class='nNote nInformation hideit'>
	<p>
		<strong>INFORMATION: </strong> $flag
	</p>
</div>"
?>



<div class="line"></div>

<!-- Message -->

<div class="wrapper">

	<div class="widget">

		<div class="title">
			<img src="../../image/crown/icons/dark/edit.png" class="titleIcon" />
			<h6>Đồng hồ mới</h6>
		</div>

		<form class="form" id="my_form_id" action="" method="post" enctype="multipart/form-data"> 
			<fieldset>



				<div class="formRow">
					<label class="formLeft" for="param_name">Tên đồng hồ:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name"
							value="<?php echo $name;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_name;?></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formRow">
					<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
					<div class="formRight">
						<div class="left">
							<input type="file" id="uploadAnhWatch" name="uploadAnhWatch">
						</div>
						<div name="image_error" class="clear error"><?php echo $err_image;?></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formRow">
					<label class="formLeft" for="param_typewatch">Loại đồng hồ:<span
						class="req">*</span></label>
					<div class="formRight">
						<select name="typewatch" _autocheck="true" id='param_cat' class="left">
							<!-- kiem tra danh muc co danh muc con hay khong -->
							<?php $listType = watchModel::getInstance()->getLoaiDongHo(); foreach ($listType as $b):?>
							<option value="<?php echo $b['id']?>"><?php echo $b['name']?></option>
							<?php endforeach;?>
						</select> <span name="cat_autocheck" class="autocheck"></span>
						<div name="cat_error" class="clear error"><?php echo $err_typewatch;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_gender">Giới tính:<span
						class="req">*</span></label>
					<div class="formRight">
						<select name="gender" _autocheck="true" id="param_gender"
							class="left">
							<!-- kiem tra danh muc co danh muc con hay khong -->
							<option value="Nam" <?php if($gender=='Nam') echo ' selected';?>>Đồng hồ nam</option>
							<option value="Nữ" <?php if($gender=='Nữ') echo ' selected';?>>Đồng hồ nữ</option>
						</select> <span name="cat_autocheck" class="autocheck"></span>
						<div name="cat_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_brand">Thương hiệu:<span class="req">*</span></label>
					<div class="formRight">
						<select name="brand" _autocheck="true" id='param_brand' class="left">
							<!-- kiem tra danh muc co danh muc con hay khong -->
							<?php $listBrand = watchModel::getInstance()->getThuongHieu(); foreach ($listBrand as $b):?>
							<option value="<?php echo $b['id']?>"><?php echo $b['name']?></option>
							<?php endforeach;?>
						</select> <span name="cat_autocheck" class="autocheck"></span>
						<div name="cat_error" class="clear error"><?php echo $err_brand;?></div>
					</div>
					<div class="clear"></div>
				</div>



				<!-- Price -->
				<div class="formRow">
					<label class="formLeft" for="param_price"> Giá sp: <span class="req">*</span>
					</label>
					<div class="formRight">
						<span class="oneTwo"> <input name="price" style='width: 100px' value="<?php echo $price;?>"
							id="param_price" class="format_number" _autocheck="true"
							type="text" /> <img class='tipS'
							title='Giá gốc của sản phẩm' style='margin-bottom: -8px'
							src='../../css/admin/crown/images/icons/notifications/information.png' />
						</span> <span name="price_autocheck" class="autocheck"></span>
						<div name="price_error" class="clear error"><?php echo $err_price;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_discount"> Mức giảm giá(vnđ): <span class="req">*</span>
					</label>
					<div class="formRight">
						<span class="oneTwo"> <input name="discount" style='width: 100px' value="<?php echo $discount;?>"
							id="param_discount" class="format_number" _autocheck="true"
							type="text" /> <img class='tipS'
							title='Số tiền giảm giá' style='margin-bottom: -8px'
							src='../../css/admin/crown/images/icons/notifications/information.png' />
						</span> <span name="price_autocheck" class="autocheck"></span>
						<div name="price_error" class="clear error"><?php echo $err_discount;?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				
				

				<div class="formRow">
					<label class="formLeft" for="param_warranty">Bảo hành(tháng):<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="warranty" id="param_warranty" style='width: 100px'
							value="<?php echo $warranty;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_warranty;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_quantity">Số lượng:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="quantity" id="param_quantity" style='width: 100px'
							value="<?php echo $quantity;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_quantity;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_size">Kich thước:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="size" id="param_size" style='width: 100px'
							value="<?php echo $size;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_size;?></div>
					</div>
					<div class="clear"></div>
				</div>



				<div class="formRow">
					<label class="formLeft" for="param_waterproof">Chống nước:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="waterproof" id="param_waterproof" style='width: 100px'
							value="<?php echo $waterproof;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_waterproof;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_material">Mô tả chất liệu:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="material" id="param_material"
							value="<?php echo $material;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_material;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formSubmit">
					<input type="submit" value="Thêm mới" class="redB" name="addProduct">
				</div>


			</fieldset>
		</form>

	</div>



</div>

