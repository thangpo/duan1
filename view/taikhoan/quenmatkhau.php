<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">

            <div class="boxtitle">
                QUÊN MẬT KHẨU
            </div>

            <div class="row boxcontent formTaiKhoan">

                <form action="index.php?act=quenmatkhau" method="post">
                    <div class="row mb10 ">
                        Email:<input type="email" name="email" required>
                    </div>
                    
                    
                    
                    <div class="row mb10">
                        <input type="submit" value="Gửi" name="guiemail">
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