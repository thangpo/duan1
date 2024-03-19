<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">

            <div class="boxtitle">
                ĐĂNG KÝ THÀNH VIÊN
            </div>

            <div class="row boxcontent formTaiKhoan">

                <form action="index.php?act=dangky" method="post">
                    <div class="row mb10 ">
                        Email:<input type="email" name="email" id="" required>
                    </div>
                    
                    <div class="row mb10">
                        Tên đăng nhập:<input type="text" name="username" id="" required>
                    </div>
                    
                    <div class="row mb10">
                        Mật khẩu:<input type="password" name="password" required>
                    </div>
                    
                    <div class="row mb10">
                        <input type="submit" value="Đăng kí" name="dangky">
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