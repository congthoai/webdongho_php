
<?php
    include_once '../model/uploadModel.php';
//     uploadModel::getInstance()->uploadImage("../image/watch/", "uploadAnhWatch");
    $check =uploadModel::getInstance()->uploadImage("../image/watch/", "uploadAnhWatch");
    echo "<script>alert($check);</script>";

?>

<<script >
// $('#my_form_id').on('submit', function(e){
// 	e.preventDefault();
// 	alert("vao vao");
// 	$.post('http://localhost/webdongho_php/ajax/add_productAjax.php', $('#my_form_id').serialize(), function(data,status){
// 		$('#classmain').html(data);		
// 	});
// 	alert("vao vao 22");
// })

</script>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<form action="../ajax/test.php" method="post" enctype="multipart/form-data" name=">
	<div class="formRow">
		<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
		<div class="formRight">
			<div class="left">
				<input type="file" id="uploadAnhWatch" name="uploadAnhWatch">
			</div>
			<div name="image_error" class="clear error"></div>
		</div>
		<div class="clear"></div>
		<input type="submit" value="Đăng ảnh" name="submit">
	</div>


</form>


<div >
<?php echo $check?>
<?php

if (isset($_POST))
    echo "               ";
print_r($_POST);?>
</div>
