        <div class="row margin_bottom ">

            <div class="boxleft margin_right">
                <div class="row">
                    <div class="banner">
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="view/images/DAM_Banner1-min.png" style="width:100%">
                        <div class="text"></div>
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="view/images/DAM_Banner2-min.png" style="width:100%">
                        <div class="text"></div>
                        </div>

                        <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="view/images/DAM_Banner3-min.png" style="width:100%">
                        <div class="text"></div>
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>

                </div>

                <!-- MAIN CONTENT -->
                <div class="row">
                    <?php
                        foreach ($spnew as $checkspnew ) {
                            extract($checkspnew);
                            $i = 0;
                            $linksp = "index.php?act=chitietsanpham&id_sanpham=".$id_sanpham;
                            if ($i == 2 || $i == 5 || $i == 8) {
                                $margin_right = "";
                            } else {
                                $margin_right = "margin_right";
                            }
                            echo '<div class="boxproduct '.$margin_right.' " >
                                        <div class="img row">
                                            <a href="'.$linksp.'">
                                                <img src="upload/' . $checkspnew["img"] . '" alt="">
                                            </a>
                                        </div>
                                        <p class="price">' . $checkspnew["price"] . '</p>
                                        <a class="pro_name" href="'.$linksp.'">' . $checkspnew["name_sanpham"] . '</a>

                                        <div class="row formcontent">
                                            <form action="index.php?act=addtocart" method="post" >
                                                <input type="hidden" name="id_sanpham" value="'.$checkspnew["id_sanpham"].'">
                                                <input type="hidden" name="name_sanpham" value="'.$checkspnew["name_sanpham"].'">
                                                <input type="hidden" name="img" value="'.$checkspnew["img"].'">
                                                <input type="hidden" name="price" value="'.$checkspnew["price"].'">
                                                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                                            </form>
                                        </div>
                                </div>';
                            $i+=1;
                        }
                    ?>
            </div>

        </div>
        <div class="boxright ">
            <?php
                include "boxright.php"
            ?>
        </div>

        