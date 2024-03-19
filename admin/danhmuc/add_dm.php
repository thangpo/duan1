
<div class="row">
    <div class="row formtitle">
        THÊM MỚI LOẠI HÀNG HOÁ
    </div>
    <div class="row formcontent">
        <form action="index.php?act=add_dm" method="post">
            <div class="row margin_bottom">
                Mã loại: <br>
                <input type="text" name="id_danhmuc" id="" disabled>
            </div>
            <div class="row margin_bottom">
                Tên loại: <br>
                <input type="text" name="name_danhmuc" id="">
            </div>
            <div class="row margin_bottom">
                <input type="submit" name="themmoi" value="THÊM MỚI">
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