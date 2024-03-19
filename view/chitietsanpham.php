<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">
            <?php extract($onesanpham); ?>


            <div class="boxtitle">
                <h1><?= $name_sanpham ?></h1>
            </div>
            <div class="row boxcontent">
                <?php
                $hinh = $img_path . $img;
                echo '<div class="row margin_bottom chitiet" > 
                            <img src="' . $hinh . '" class="imgct"> 
                        </div>';
                echo "<p class='price'> $description </p>";
                echo "<p class='pro_name'> Price: $price </p>";

                echo "<div class='row formcontent'>
                        <form action='index.php?act=addtocart' method='post' >
                            <input type='hidden' name='id_sanpham' value='".$onesanpham['id_sanpham']."'>
                            <input type='hidden' name='name_sanpham' value='".$onesanpham['name_sanpham']."'>
                            <input type='hidden' name='img' value='".$onesanpham['img']."'>
                            <input type='hidden' name='price' value='".$onesanpham['price']."'>
                            <input type='submit' name='addtocart' value='Thêm vào giỏ hàng'>
                        </form>
                    </div>";
                ?>
            </div>
        </div>

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#binhluan").load("view/binhluan/binhluanform.php", {id_sanpham: <?= $idpro ?>});
            });
        </script>

        <div class="row " id="binhluan">
            <iframe src="view/binhluan/binhluanform.php?id_sanpham=<?php echo $id_sanpham?>" frameborder="0" width="100%" height="300px"></iframe>
            <?php //include "view/binhluan/binhluanform.php"; ?>
        </div>-->

        <div class="row">
            <iframe src="view/binhluan/binhluanform.php?id_sanpham=<?php echo $id_sanpham?>" frameborder="0" width="100%" height="300px"></iframe>
        </div>

        <div class="row margin_bottom">
            <div class="boxtitle">
                SẢN PHẨM CÙNG LOẠI
            </div>
            <div class="row boxcontent">
                <?php
                foreach ($spcungloai as $spcungloai) {
                    extract($spcungloai);
                    $linksp = "index.php?act=chitietsanpham&id_sanpham=" . $id_sanpham;
                    echo '<li> <a class="pro_name" href="' . $linksp . '"> ' . $name_sanpham . ' </a> </li>';
                }
                ?>
            </div>
        </div>

    </div>
    <div class="boxright ">
        <?php
        include "boxright.php"
        ?>
    </div>