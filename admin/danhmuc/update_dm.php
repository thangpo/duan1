<div class="row">
    <div class="row formtitle">
        CẬP NHẬT LOẠI HÀNG HOÁ
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_dm" method="post">
            <div class="row margin_bottom">
                Mã loại: <br>
                <input type="text"  id="" disabled value="<?= (isset($dm['id_danhmuc']) && $dm['id_danhmuc'] > 0) ? $dm['id_danhmuc'] : ''; ?>">
            </div>
            <div class="row margin_bottom">
                Tên loại: <br>
                <input type="text" name="name_danhmuc" id="" value="<?= isset($dm['name_danhmuc']) ? $dm['name_danhmuc'] : ""; ?>">
            </div>
            <div class="row margin_bottom">
                <input type="hidden" name="id_danhmuc" value="<?= (isset($dm['id_danhmuc']) && $dm['id_danhmuc'] > 0) ? $dm['id_danhmuc'] : ''; ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_dm"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
            ?>
        </form>
    </div>
</div>