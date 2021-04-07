

<?php
include_once '../model/watchModel.php';

$flag = $name = $place = $descrip = $err_name = $err_place = $err_descrip = $id="";
$action = "Thêm mới";

if(isset($_GET['updateID'])){
    $id = (int) $_GET['updateID'];
    $action = "Cập nhật";
    $brand = watchModel::getInstance()->getBrand($id);
    foreach ($brand as $br) {
        $name = $br['name'];
        $id = $br['id'];
        $place= $br['place'];
        $descrip=$br['descrip'];
    }
}

if(isset($_GET['name']) || isset($_GET['place']) || isset($_GET['descrip'])){
    if (isset($_GET['name']) && $_GET['name'] != NULL) {
        $name = $_GET['name'];
    } else
        $err_name = "Please enter your name";
    
    if (isset($_GET['place']) && $_GET['place'] != NULL)
        $place = $_GET['place'];
    else
        $err_place = "Please enter your place";
    
    if (isset($_GET['descrip']) && $_GET['descrip'] != NULL)
        $descrip = $_GET['descrip'];
    else
        $err_descrip = "Please enter your descript";
    
    if ( $err_descrip == "" && $err_place == "") {
        if(!isset($_GET['update'])){
            $checkName = watchModel::getInstance()->checkNameBrand($_GET['name']);
            if ($checkName)
                $err_name = "Tên thương hiệu đãtồn tại!";
            else
                $rs = watchModel::getInstance()->addBrand($name, $place, $descrip);
        }
        else 
            $rs = watchModel::getInstance()->updateBrand($name, $place, $descrip, $_GET['update']);
        
        if ($rs)
            $flag = 'Thành công!';
        else
            $flag = 'Không thành công!';
    }
}

?>

<script>

$("input[name='button']").click(function(){
	var name = $('#param_name').prop('value');
	var place = $('#param_place').prop('value');
	var descrip = $('#param_descrip').prop('value');

	var action = $(this).attr('value');
	if(action=='Thêm mới')
		var url = "http://localhost/webdongho_php/ajax/add_brandAjax.php?name="+name+"&place="+place+"&descrip="+descrip;	
	else
		var url = "http://localhost/webdongho_php/ajax/add_brandAjax.php?name="+name+"&place="+place+"&descrip="+descrip+"&update="+$('#param_id').prop('value');  	
	alert(url);
	$.get(url,function(data,status){
		$('#classmain').html(data);		        
 	});
})

</script>



<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Quản lý Sản phẩm</h5>
			<span>Thương hiệu</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_brandAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href="http://localhost/webdongho_php/ajax/brandAjax.php"> <img
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
			<h6>Thương hiệu mới</h6>
		</div>

		<form class="form" id="form" action="#" method="get" name="addAdmin"
			enctype="multipart/form-data">
			<fieldset>

				<input type="hidden" name="id" id='param_id' value="<?php echo $id;?>">

				<div class="formRow">
					<label class="formLeft" for="param_name">Tên thương hiệu:<span
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
					<label class="formLeft" for="param_place">Nơi xuất xứ:<span
						class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="place" id="param_place"
							value="<?php echo $place;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_place;?></div>
					</div>
					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_descrip">Mô tả:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="descrip" id="param_descrip"
							value="<?php echo $descrip;?>" _autocheck="true" type="text"></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo $err_descrip;?></div>
					</div>
					<div class="clear"></div>
				</div>


				<div class="formSubmit">
					<input type="button" value="<?php echo $action?>" class="redB" name="button">
				</div>


			</fieldset>
		</form>

	</div>



</div>

