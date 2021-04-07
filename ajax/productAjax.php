<?php
    include_once '../model/watchModel.php';	
    
    $flag = ""; $page=1; $limit=8;
    
    if(isset($_GET['page'])) $page=$_GET['page'];
    
    if(isset($_GET['idxoa'])){
        $rs = watchModel::getInstance()->xoaWatch($_GET['idxoa']);
        if($rs)
            $flag = "Đã xóa thành công!";
        else
            $flag = "Xóa không thành công!";
    }
    

    $listWatch = watchModel::getInstance()->getListWatch($page, $limit);
    $listBrand = watchModel::getInstance()->getThuongHieu();
    $tongso = (int)watchModel::getInstance()->getTongSoLuong();
    
    
    $id=$name=$brand="";
    if(isset($_GET['id']) && $_GET['id']!=null ||isset($_GET['name']) && $_GET['name'] || isset($_GET['brand']) && $_GET['brand']){
        if(isset($_GET['id'])) $id=$_GET['id'];
        if(isset($_GET['name'])) $name=$_GET['name'];
        if(isset($_GET['brand'])) $brand=$_GET['brand'];
        //echo "<script> alert('$id=$name=$brand');</script>";
        $listWatch = watchModel::getInstance()->sp_Loc_SP($id, $name, $brand, $page, $limit);
        $tongso = (int)watchModel::getInstance()->sp_get_TongSP($id, $name, $brand);
    }
    
?>

<script>

$("input[name='id_search']").change(function(){
// 	if(!parseFloat($(this).prop("value"))) 
// 		alert("Mã số là có kiểu dữ liệu là số nguyên!");
	$("input[name='name_search']").attr("value", "");
	$("select[name='catalog']").prop("selectedIndex", 0);
})

$("input[name='name_search']").change(function(){
	$("input[name='id_search']").attr("value", "");
})



$("select[name='catalog']").change(function(){
	$("input[name='id_search']").attr("value", "");
})

$("input[name='loc']").click(function(){
	var id= $("input[name='id_search']").attr("value");
	var name= $("input[name='name_search']").attr("value");
	var brand= $("select[name='catalog']").children("option:selected").val();
	if(id||name||brand){
	var url = "http://localhost/webdongho_php/ajax/productAjax.php?page=1&id="+id+"&name="+name+"&brand="+brand;
	//alert(url);
	$.get(url,function(data,status){
		$('#classmain').html(data);		        
 	});
	}
})

$("input[name='reset']").click(function(){
	var url = "http://localhost/webdongho_php/ajax/productAjax.php";
	//alert(url);
	$.get(url,function(data,status){
		$('#classmain').html(data);		        
 	});
})


$(".pagination a").click(function(e){
	e.preventDefault();
	var href = $(this).attr('href'); 
	//alert(href);        	
	$.get(href,function(data,status){
		$('#classmain').html(data);		        
 	});
})



</script>

<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sản phẩm</h5>
			<span>Quản lý sản phẩm</span>
		</div>

		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_productAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href=""> <img
						src="../../image/crown/icons/control/16/feature.png" /> <span>Tiêu biểu</span>
				</a></li>

				<li><a href=""> <img
						src="../../image/crown/icons/control/16/list.png" /> <span>Danh sách</span>
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


<script> $j(".nInformation").toggle(5000);
$('html,body').animate({
	scrollTop: 0
}, 'fast');
</script>

<div class="line"></div>



<!-- Message -->


<!-- Main content wrapper -->

<div class="wrapper" id="main_product">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck" /></span>
			<h6>Danh sách sản phẩm</h6>
			<div class="num f12">
				Số lượng: <b><?php echo $tongso?></b>
			</div>
		</div>

		<table cellpadding="0" cellspacing="0" width="100%"
			class="sTable mTable myTable" id="checkAll">

			<thead class="filter">
				<tr>
					<td colspan="6">
						<form class="list_filter form"
							action="index.php/admin/product.html" method="get">
							<table cellpadding="0" cellspacing="0" width="80%">
								<tbody>

									<tr>
										<td class="label"  style="width: 40px;"><label for="filter_id">Mã
												số</label></td>
										<td class="item"><input name="id_search" value="" id="filter_id"
											type="text" style="width: 55px;" /></td>

										<td class="label" style="width: 60px;"><label
											for="filter_status">Thương hiệu</label></td>
										<td class="item"><select name="catalog">
												<option value=""></option>
												<!-- kiem tra danh muc co danh muc con hay khong -->
												<?php foreach ($listBrand as $b):?>
												<option value="<?php echo $b['id']?>"><?php echo $b['name']?></option>
												<?php endforeach;?>
															


										</select></td>

										<td class="label"  style="width: 40px;"><label for="filter_id">Tên</label></td>
										<td class="item" style="width: 155px;"><input name="name_search"
											value="" id="filter_iname" type="text" style="width: 155px;" /></td>



										<td style='width: 150px'>
											<input type="button" class="button blueB" name="loc" value="Lọc" /> 
											<input type="reset" class="basic" value="Reset" name="reset" >
										</td>

									</tr>
								</tbody>
							</table>
						</form>
					</td>
				</tr>
			</thead>

			<thead>
				<tr>
					<td style="width: 21px;"><img src="../../image/crown/icons/tableArrows.png" /></td>
					<td style="width: 60px;">Mã số</td>
					<td>Tên</td>
					<td>Giá</td>
					<td style="width: 75px;">Bảo hành</td>
					<td style="width: 120px;">Hành động</td>
				</tr>
			</thead>

			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB"
								url="admin/product/del_all.html"> <span style='color: white;'>Xóa
									hết</span>
							</a>
						</div>

						<div class="pagination">
						<?php $p = $tongso / $limit;
						      if($tongso%$limit!=0) $p++;
						      if($p>1)
                                  for($i=1; $i<=$p; $i++){
                                     if(isset($_GET['page']) && $i == $_GET['page'])
                                         echo "<strong>$i</strong>";
                                     else
                                         echo  "<a href='http://localhost/webdongho_php/ajax/productAjax.php?page=$i&id=$id&name=$name&brand=$brand'>$i</a>";
                                  }
						?>

						</div>
						
					</td>
				</tr>
			</tfoot>

			<tbody class="list_item">
				
				<?php foreach ($listWatch as $item ):?>
				
				<tr class='row_<?php echo $item['id']?>'>
					<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

					<td class="textC"><?php echo $item['id']?></td>

					<td>
						<div class="image_thumb">
							<img src="../<?php echo $item['image_link']?>" height="50">
							<div class="clear"></div>
						</div> <a href="product/view/2.html" class="tipS" title=""
						target="_blank"> <b><?php echo $item['name']?></b>
					</a>

						<div class="f11">Đã bán: 0 | Xem: <?php echo $item['view']?></div>

					</td>
					
					

					<td class="textR" style="color: red;"><?php echo number_format((int)$item['price'] - (int)$item['discount']) ?>đ
						<p style='text-decoration: line-through; color:#219FD1;'><?php if((int)$item['discount']!=0) echo number_format((int)$item['price']).'đ' ?></p>

					</td>


					<td class="textC"><?php echo $item['warranty']?> tháng</td>

					<td class="option textC"><a href="" title="SP tiêu biểu"
						class="tipE"> <img src="../../image/crown/icons/color/star.png" />
					</a> <a href="http://localhost/webdongho_php/ajax/update_productAjax.php?updateID=<?php echo $item['id']?>" target='_blank' class='tipS'
						title="Xem chi tiết sản phẩm"> <img
							src="../../image/crown/icons/color/view.png" />
					</a> <a href="http://localhost/webdongho_php/ajax/update_productAjax.php?updateID=<?php echo $item['id']?>" title="Chỉnh sửa"
						class="tipS"> <img src="../../image/crown/icons/color/edit.png" />
					</a> <a
						<?php echo " href='http://localhost/webdongho_php/ajax/productAjax.php?id=$id&name=$name&brand=$brand&idxoa=".$item['id']."'";?>
						title="Xóa" class="tipXoa"> <img
							src="../../image/crown/icons/color/delete.png" />
					</a></td>
				</tr>
				
				<?php endforeach;?>
			</tbody>

		</table>
	</div>

</div>
<div class="clear mt30"></div>