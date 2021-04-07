<?php
include 'C:\xampp\htdocs\webdongho_php\model\watchModel.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $rs=watchModel::getInstance()->updateviewinwatch($id);
    $product=watchModel::getInstance()->getWatch($id);
    $brand=watchModel::getInstance()->getBrandofWatchByID($id);
    while ($row = $brand->fetch_row()) {
        $nameBrand = $row[0];
        $descriptBrand = $row[1];
    }
   
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../image/uitlogo.png">
    <title>CHI TIẾT SẢN PHẨM</title>
    <link rel="stylesheet" href="../css/style_3.css" type="text/css">

    <link rel="stylesheet" href="../css/Detail.css" type="text/css">

    <script language="javascript" src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../font/fontawesome/css/all.min.css" type="text/css">
    <!--Font Icon-->

<script>
$(document).ready(function() {
            $(".bt_cmt").click(function(){
                

            });
</script>
</head>

<body>

    <div id='wrapper'>

        <div class='top2'><?php include 'layout/top.php';?></div>

        <div id="main">

            <div class="title">
                <a style="color:gray;text-decoration: none;" href='http://localhost/webdongho_php'>Trang Chủ </a>
                / CHI TIẾT SẢN PHẨM


            </div>

            <div id="product_details">
                <form action="" method="get">
                    <?php
                foreach ($product as $dh):
                ?>
                    <div class="p-float">
                        <img class="p-img" src="<?php echo $dh['image_link']?>" />
                        <div class="p-float-in">

                            <div class="p-name"><?php  echo 'Sản Phẩm: '.$dh['name']?></div>
                            <div class="p-final-price">Giá:
                                <?php echo number_format((int)$dh['price'] - (int)$dh['discount']) ?></div>
                            <div class="p-price">
                                <?php if((int)$dh['discount']!=0) echo number_format((int)$dh['price']) ?> </div>

                            <div class="quantity">
                                <?php $quantity=(int)$dh['quantity'] ?>Số Lượng: <input type="number" min="1"  max = <?php echo $quantity ?> id="quantity"></div>
                            <button class="p-add">Thêm Vào Giỏ Hàng<i class="fas fa-cart-plus"></i></button>
                        </div>
                    </div>
                    <?php endforeach;?>
                </form>
                <hr>
                <div class="detail">
                    <form action="" method="get">
                        <h2 id="detail_title">Chi Tiết Sản Phẩm</h2>

                        <table class="tableDetail" border="1">
                            <tr>
                                <th class="FCol">Thương Hiệu :</th>
                                <th class="SCol"><?php echo $nameBrand; ?></th>
                            </tr>
                            <tr>
                                <td class="FCol">Bảo Hành (Tháng):</td>
                                <td class="SCol"><?php echo $dh['warranty'] ?></td>
                            </tr>
                            <tr>
                                <td class="FCol">Đồng Hồ Dành Cho:</td>
                                <td class="SCol"><?php echo $dh['gender'] ?></td>
                            </tr>
                            <tr>
                                <td class="FCol">Kích Thước:</td>
                                <td class="SCol"><?php echo $dh['size'] ?></td>
                            </tr>
                            <tr>
                                <td class="FCol">Độ Chống Nước:</td>
                                <td class="SCol"><?php echo $dh['waterproof'] ?></td>
                            </tr>
                            <tr>
                                <td class="FCol">Chất Liệu:</td>
                                <td class="SCol"><?php echo $dh['material'] ?></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="descript_Brand">
                    <div class="descript">
                        <hr class="hr_descript">
                        <h2>THƯƠNG HIỆU <?php echo $nameBrand ?></h2>
                        <p id='id_descript'><?php echo $descriptBrand ?></p>
                        <hr class="hr_descript">
                    </div>
                </div>
                <hr>



                <div class="comment">
                    <div class="add_comment">
                        <hr class="hr_descript">
                        <h2>Bình Luận </h2>
                        <input class="txt_cmt" type="text" placehoder="Hãy cho biết cảm nghĩ của bạn về sản phẩm" name="comment">
                        <button class="bt_cmt">Bình Luận</button>
                        <hr class="hr_descript">
                        <?php
                        include '../model/P2SQL.php';
                        $query="select content,created from COMMENT ";
                        $rs=P2SQL::getInstance()->executeQuery($query);
                        foreach ($rs as $cmt) :
                
                            ?>
                        <div class="oldcomment">
                            <div class="created">
                                <?php echo $cmt['created']?>
                            </div>
                            <div class="content">
                               <input type="text" class="content" value = <?php echo $cmt['content']?>>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>
                <hr>
            </div>

        </div>



        <footer>
            <?php include 'layout/footer.php';?>
        </footer>
    </div>

</body>

</html>