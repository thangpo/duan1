<?
if (is_array($tk)) {
    extract($tk);
}
?>
<div class="row">
    <div class="row formtitle">
        CẬP NHẬT TÀI KHOẢN
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_tk" method="post" enctype="multipart/form-data">

            <div class="row margin_bottom">
                Vai trò: <br>
                <input type="text" name="role" id="" value="<?php echo $tk['role'] ?>">
                <p style="color:gray">* Chú thích: 0.Khách hàng 1.Admin *</p>
            </div>

            <div class="row margin_bottom">
                Password: <br>
                <input type="text" name="password" id="" value="<?php echo $tk['password'] ?>">
            </div>

            <div class="row margin_bottom">
                Địa chỉ: <br>
                <input type="text" name="address" id="" value="<?php echo $tk['address'] ?>">
            </div>

            <div class="row margin_bottom">
                Số điện thoại: <br>
                <input type="text" name="phonenum" id="" value="<?php echo $tk['phonenum'] ?>">
            </div>

            <div class="row margin_bottom">
                Email: <br>
                <input type="text" name="email" id="" value="<?php echo $tk['email'] ?>">
            </div>

            <div class="row margin_bottom">
                <input type="hidden" name="id_taikhoan" value="<?php echo $tk['id_taikhoan'] ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_tk"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
                
            ?>
        </form>
    </div>
</div>