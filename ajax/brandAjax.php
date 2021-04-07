<?php
    include_once '../model/watchModel.php';
    
    $flag = ""; $page=1; $limit=3;
    
    if(isset($_GET['page'])) $page=$_GET['page'];
    
    if(isset($_GET['idxoa'])){
        $rs = watchModel::getInstance()->xoaBrand($_GET['idxoa']);
        if($rs==1)
            $flag = "Đã xóa thành công!";
        else
            $flag = "Xóa không thành công! Cửa hàng còn nhiều SP của thương hiệu này!";
    }
    
    $tongso = (int)watchModel::getInstance()->getTongSoLuong_Brand();
?>


<script>

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
			<h5>Quản lý sản phẩm</h5>
			<span>Thương hiệu</span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li><a href="http://localhost/webdongho_php/ajax/add_brandAjax.php"> <img
						src="../../image/crown/icons/control/16/add.png" /> <span>Thêm mới</span>
				</a></li>

				<li><a href=""> <img src="../../image/crown/icons/control/16/list.png" />
						<span>Danh sách</span>
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


<script> $j(".nInformation").toggle(6000);
</script>

<div class="line"></div>

<!-- Message -->







<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widget">

		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck"
				name="titleCheck" /></span>
			<h6>Danh sách thương hiệu</h6>
			<div class="num f12">
				Tổng số:<?php echo $tongso?> <b></b>
			</div>
		</div>

		<form action="http://localhost/webphp/index.php/admin/user.html"
			method="get" class="form" name="filter">
			<table cellpadding="0" cellspacing="0" width="100%"
				class="sTable mTable myTable withCheck" id="checkAll">
				<thead>
					<tr>
						<td style="width: 10px;"><img src="../../image/crown/icons/tableArrows.png" /></td>
						<td style="width: 80px;">Mã số</td>
						<td>Tên</td>
						<td>Xuất xứ</td>
						<td>Mô tả</td>
						<td style="width: 100px;">Hành động</td>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="7">
							<div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB"
									url="user/del_all.html"> <span style='color: white;'>Xóa hết</span>
								</a>
							</div>

							<div class='pagination'>
							<?php $p = $tongso / $limit;
							 if($tongso%$limit!=0) $p++;
						      if($p>1)
                                  for($i=1; $i<=$p; $i++){
                                     if(isset($_GET['page']) && $i == $_GET['page'])
                                         echo "<strong>$i</strong>";
                                     else
                                         echo  "<a href='http://localhost/webdongho_php/ajax/brandAjax.php?page=$i'>$i</a>";
                                  }
						      ?>
							</div>
						</td>
					</tr>
				</tfoot>

				<tbody>
					<!-- Filter -->
					<?php 
					       include_once '../model/watchModel.php';		
					       $listBrand = watchModel::getInstance()->getListBrand($page, $limit);
					       foreach ($listBrand as $item):
					 ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $item['id']?>" /></td>

						<td class="textC"><?php echo $item['id']?></td>


						<td><span title="<?php echo $item['name']?>" class="tipS"> <?php echo $item['name']?> </span></td>


						<td><?php echo $item['place']?></td>

						<td><?php echo $item['descrip']?></td>


						<td class="option">
							<a href="http://localhost/webdongho_php/ajax/add_brandAjax.php?updateID=<?php echo $item['id']?>" title="Chỉnh sửa" class="tipS"> 
								<img src="../../image/crown/icons/color/edit.png" /> </a> 
								
							<a href="http://localhost/webdongho_php/ajax/brandAjax.php?idxoa=<?php echo $item['id']?>" title="Xóa" class="tipXoa">
							 	<img src="../../image/crown/icons/color/delete.png" />
						</a></td>
					</tr>
					<?php endforeach;?>


				</tbody>
			</table>
		</form>
	</div>
</div>
<div class="clear mt30"></div>