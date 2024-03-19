<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">

            <div class="boxtitle">
                CẬP NHẬT TÀI KHOẢN
            </div>

            <div class="row boxcontent formTaiKhoan">
                <?php
                    if (isset($_SESSION['username']) && is_array($_SESSION['username'])) {
                        extract($_SESSION['username']);

                    }
                ?>
                <form action="index.php?act=edit_taikhoan" method="post">
                    <div class="row mb10 ">
                        Email:<input type="email" name="email" id="" value="<?= $email ?>">
                    </div>
                    
                    <div class="row mb10">
                        Tên đăng nhập:<input type="text" name="username" id="" value="<?= $username ?>">
                    </div>
                    
                    <div class="row mb10">
                        Mật khẩu:<input type="password" name="password" value="<?= $password ?>">
                    </div>

                    <div class="row mb10">
                        Địa chỉ:<input type="text" name="address" value="<?= $address ?>">
                    </div>

                    <div class="row mb10">
                        Số điện thoại:<input type="number" name="phonenum" value="<?= $phonenum ?>">
                    </div>
                    
                    <div class="row mb10">
                        <input type="hidden" name="id_taikhoan" value="<?= $id_taikhoan ?>">
                        <input type="submit" value="Cập nhật" name="capnhat">
                    </div>
                    
                    <div class="row mb10">
                        <input type="reset" value="Nhập lại">
                    </div>

                </form>
                <h2 class="thongbao">
                    <?php
                        if (isset($thongbao)&& $thongbao != "") {
                            echo $thongbao;
                        }
                    ?>
                </h2>
                
            </div>

        </div>

        

    </div>
    <div class="boxright ">
        <?php
            include "view/boxright.php"
        ?>
    </div>