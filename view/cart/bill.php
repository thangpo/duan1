<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <form action="index.php?act=billconfirm" method="post">

            <div class="row margin_bottom">

                <div class="boxtitle">
                    THÔNG TIN ĐẶT HÀNG
                </div>

                <div class="row boxcontent cart formcontent">

                    <table style="background-color: #fff; width: 100%; text-align: left;">

                        <?php
                            if (isset($_SESSION['username'])) {
                                $name = $_SESSION['username']['username'];
                                $address = $_SESSION['username']['address'];
                                $email = $_SESSION['username']['email'];
                                $phonenum = $_SESSION['username']['phonenum'];
                            }else {
                                $name = "";
                                $address = "";
                                $email = "";
                                $phonenum = "";
                            }
                        ?>

                        <tr>
                            <td>Người đặt</td>
                            <td><input type="text" name="username" id="" value="<?= $name ?>"></td>
                        </tr>

                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="address" id="" value="<?= $address ?>"></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" id="" value="<?= $email ?>"></td>
                        </tr>

                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="phonenum" id="" value="<?= $phonenum ?>"></td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="row margin_bottom bill">
                <div class="boxtitle">
                    PHƯƠNG THỨC THANH TOÁN
                </div>
                <div class="row boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" name="payment" id="" checked>Thanh toán khi nhận hàng</td>
                            <td><input type="radio" name="payment" id="" >Thanh toán qua thẻ ngân hàng</td>
                            <td><input type="radio" name="payment" id="" >Thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row margin_bottom">

            <div class="boxtitle">
                GIỎ HÀNG CỦA BẠN
            </div>

            <div class="row boxcontent cart formcontent">

                <table style="background-color: #fff; width: 100%; text-align: left;">

                    <?php
                        viewcart(0);
                    ?>

                </table>
                
            </div>
            <div class="row margin_bottom formcontent">
                <!-- <a href="index.php?act=billconfirm"> -->
                    <input type="submit" name="dongydathang" value="ĐỒNG Ý ĐẶT HÀNG"> 
                <!-- </a> -->
            </div>

        </div>
        </form>

    </div>
    


    <div class="boxright ">
        <?php
            include "view/boxright.php"
        ?>
    </div>