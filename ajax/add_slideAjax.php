<?php 
    include_once '../model/slideModel.php';
    include_once '../model/uploadModel.php';
    
    $flag = $name = $image_link = $link = $sort=""; 
    $err_image_link = $err_sort = "";
    $checkAnh = false;
    if (isset($_POST['sort'])) {
        if ($_POST['sort'] != null) {
            $sort = $_POST['sort'];
            if (! is_numeric($_POST['sort']))
                $err_sort = "Kiểu số nguyên";
        } else
            $err_sort = "Please enter your sort";
        
       if (isset($_POST['name']) && $_POST['name'] != NULL)
           $name=$_POST['name'];
       if (isset($_POST['link']) && $_POST['link'] != NULL)
           $link=$_POST['link'];
       
       if($err_sort ==""){
           $checkAnh = uploadModel::getInstance()->uploadImage("../image/slide/", "uploadAnhSlide");
           if ($checkAnh == false)
               $err_image_link = "upload ảnh không thành công! thử ảnh khác";
           else {
               $rs = slideModel::getInstance()->addSlide($name, $checkAnh, $link, $sort);
               if ($rs)
                   $flag = 'Thêm mới thành công';
               else
                   $flag = 'Thêm không thành công!';
               }
       }
    }

?>

<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Quản lý nội dung</h5>
			<span>Slide</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_slideAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href="http://localhost/webdongho_php/ajax/slideAjax.php"> <img
						src="../../image/crown/icons/control/16/list.png" /> <span>Danh
							sách</span>
				</a></li>
			</ul>
		</div>

		<div class="clear"></div>
	</div>
</div>


<script>

$('#my_form_id').on('submit', function(e){
	 e.preventDefault(e);

	  var formData = new FormData(this);

	  $.ajax({
	    async: true,
	    type: 'post',
	    url: 'http://localhost/webdongho_php/ajax/add_slideAjax.php',
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


<?php

if ($flag != "")
    echo "<div class='nNote nInformation hideit'>
	<p>
		<strong>INFORMATION: </strong> $flag
	</p>
</div>"?>




<div class="line"></div>

<!-- Message -->

<div class="wrapper">

	<div class="widget">

		<div class="title">
			<img src="../../image/crown/icons/dark/edit.png" class="titleIcon" />
			<h6>Slide mới</h6>
		</div>

		<form class="form" id="my_form_id" action="" method="post"
			enctype="multipart/form-data">
			<fieldset>


				<div class="formRow">
					<label class="formLeft" for="param_name">Tên:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name"
							value="<?php echo $name;?>" _autocheck="true" type="text"></span>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
					<div class="formRight">
						<div class="left">
							<input type="file" id="uploadAnhSlide" name="uploadAnhSlide">
						</div>
						<div name="image_error" class="clear error"><?php echo $err_image_link;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_link">Link liên kết:<span class="req"></span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="link" id="param_link"
							value="<?php echo $link;?>" _autocheck="true" type="text"></span>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_sort">Sắp xếp:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="sort" id="param_sort"
							style='width: 100px' value="<?php echo $sort;?>"
							_autocheck="true" type="text"></span> 
						<div name="name_error" class="clear error"><?php echo $err_sort;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formSubmit">
					<input type="submit" value="Thêm mới" class="redB"
						name="addSlide">
				</div>

			</fieldset>
		</form>

	</div>



</div>

