<?
if (is_array($bill)) {
    extract($bill);
}
?>
<div class="row">
    <div class="row formtitle">
        CẬP NHẬT ĐƠN HÀNG
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_bill" method="post" enctype="multipart/form-data">

            <div class="row margin_bottom">
                Tình trạng: <br>
                <input type="text" name="bill_status" id="" value="<?php echo $bill['bill_status'] ?>">
                <p style="color:gray">* Chú thích: 0.Đơn mới 1.Đang xử lý 2.Đang giao 3.Đã giao *</p>
                <?php //echo $bill['id_bill'] ?>
            </div>

            <div class="row margin_bottom">
                <input type="hidden" name="id_bill" value="<?php echo $bill['id_bill'] ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_bill"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
                
            ?>
        </form>
    </div>
</div>