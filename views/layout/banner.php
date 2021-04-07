<div id="banner">

	<div id="demo" class="carousel slide" data-ride="carousel">


		<ul class="carousel-indicators">
			<?php
            include_once '../model/slideModel.php';
            $list = slideModel::getInstance()->getListSlide();
            $j = 0;
            foreach ($list as $item) :
            ?>
			<li data-target="#demo" data-slide-to="<?php echo $j; $j++?>"  <?php if($j==0) echo "class='active'";?>></li>
			<?php endforeach;?>
		</ul>


		<div class="carousel-inner">


        	<?php
            include_once '../model/slideModel.php';
            $list = slideModel::getInstance()->getListSlide();
            $i = 1;
            foreach ($list as $item) :
            ?>
			<div class="carousel-item <?php if($i==1) echo 'active'; $i++;?>">
				<a href="<?php echo $item['link']?>"> <img
					src="<?php echo $item['image_link']?>" alt="" width="1100"
					height="500"></a>
			</div>

			<?php endforeach;?>

		</div>


		<a class="carousel-control-prev" href="#demo" data-slide="prev"> <span
			class="carousel-control-prev-icon"></span>
		</a> <a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>


</div>