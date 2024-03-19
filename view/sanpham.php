<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">
            <div class="boxtitle">
                SẢN PHẨM <strong><?= $name_danhmuc ?></strong>
            </div>
            <div class="row boxcontent">
                <?php
                    foreach ($dssanpham as $checkdssanpham ) {
                        extract($checkdssanpham);
                        $i = 0;
                        $linksp = "index.php?act=chitietsanpham&id_sanpham=".$id_sanpham;
                        if ($i == 2 || $i == 5 || $i == 8) {
                            $margin_right = "";
                        } else {
                            $margin_right = "margin_right";
                        }
                        echo '<div class="boxproduct '.$margin_right.' " >
                                <div class="img row">
                                    <img src="upload/' . $checkdssanpham["img"] . '"
                                            alt="">
                                </div>
                                    <p class="price">' . $checkdssanpham["price"] . '</p>
                                    <a class="pro_name" href="'.$linksp.'">' . $checkdssanpham["name_sanpham"] . '</a>

                                <div class="row formcontent">
                                    <form action="index.php?act=addtocart" method="post" >
                                        <input type="hidden" name="id_sanpham" value="'.$checkdssanpham["id_sanpham"].'">
                                        <input type="hidden" name="name_sanpham" value="'.$checkdssanpham["name_sanpham"].'">
                                        <input type="hidden" name="img" value="'.$checkdssanpham["img"].'">
                                        <input type="hidden" name="price" value="'.$checkdssanpham["price"].'">
                                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                    </form>
                                </div>
                            </div>';
                        $i+=1;
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