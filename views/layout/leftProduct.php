<script>
	$("#sort").change(function(){
		var sort = $(this).val();
		$("#orderby").attr("value", sort);
	})

</script>


<form class="form" id="form" action=""  method="get" name="LocSanPham">
	
				<input type="hidden" id="orderby" name="orderby" value="">
			
				<div class="label" style="margin-top:19px"> THƯƠNG HIỆU
					<select name="brand" style="width:90%; margin:10px 0;font-size: 1.3em;" >
						<option value=""></option>
						<?php include_once '../model/watchModel.php';
						$listBrand = watchModel::getInstance()->getListBrand(1, 10);
						foreach ($listBrand as $b):?>
						<option value="<?php echo $b['id']?>"  <?php if(isset($_GET['brand']) && $_GET['brand'] == $b['id']) echo 'selected'?>><?php echo $b['name']?></option>
						<?php endforeach;?>
					</select>
				</div>

				<div class="label"> LOẠI ĐỒNG HỒ
					<select name="typewatch" style="width: 90%; margin: 10px 0; font-size: 1.3em;">
						<option value=""></option>
						<?php
                            include_once '../model/watchModel.php';
                            $listType = watchModel::getInstance()->getListTypeWatch();
                            foreach ($listType as $t) :
                                    ?>
						<option value="<?php echo $t['id']?>" <?php if(isset($_GET['typewatch']) && $_GET['typewatch'] == $t['id']) echo 'selected'?> ><?php echo $t['name']?></option>
						<?php endforeach;?>
					</select>
				</div>

            	<div class="label"> GIỚI TÍNH
            		<select name="gender" style="width: 90%; margin: 10px 0; font-size: 1.3em;">
            			<option value="" ></option>
		 				<option value="Nam" <?php if(isset($_GET['gender']) && $_GET['gender'] == 'Nam') echo 'selected'?> >Đồng hồ nam</option>
						<option value="Nữ" <?php if(isset($_GET['gender']) && $_GET['gender'] == 'Nữ') echo 'selected'?>>Đồng hồ nữ</option>
            		</select>
            	</div>


				<div class="label" > KHOẢNG GIÁ<br>
    				<input type="text" class="khoanggia" name="giabatdau" id="" value="<?php if(isset($_GET['giabatdau'])) echo $_GET['giabatdau']?>"  >
    				<span> - </span>
    				<input type="text" class="khoanggia" name="giaketthuc" id="" value="<?php if(isset($_GET['giaketthuc'])) echo $_GET['giaketthuc']?>"  >	
				</div>
				
				
				<input type="submit" value="Lọc sản phẩm" class="redB" name="CapNhat"
				 style="padding: 7px 18px 8px 18px; float: right; margin-right:17px;"> 
		 </form>
		 
