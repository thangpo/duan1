
<div class="row">
    <div class="row formtitle">
        THÊM MỚI SÁCH
    </div>
    <div class="row formcontent">
        <form action="index.php?act=add_sach" method="post" enctype="multipart/form-data">
            <div class="row margin_bottom">
                Mã sách: <br>
                <input type="text" name="id_tintuc" id="" disabled>
            </div>
            <div class="row margin_bottom">
                Tiêu đề: <br>
                <input type="text" name="tieu_de" id="" value="<?=$tieu_de?>">
                <span style="color: red;"><?= $errTieuDe?></span>
            </div>
            <div class="row margin_bottom">
                Hình ảnh: <br>
                <input type="file" name="hinh_anh" id="" >
                <span style="color: red;"><?= $errHinhAnh?></span>
            </div>
            <div class="row margin_bottom">
                Giá: <br>
                <input type="text" name="gia" id="" value="<?=$gia?>">
                <span style="color: red;"><?= $errGia?></span>
            </div>
            <div class="row margin_bottom">
                Mô tả: <br>
                <textarea name="mo_ta" id="" cols="120" rows="10" ><?=$mo_ta?></textarea>
                <span style="color: red;"><?= $errMoTa?></span>
            </div>

            <div class="row margin_bottom">
                ID tác giả: <br>
                <select name="id_tacgia" id="">
                    <?php foreach ($listtacgia as $checktacgia){ 
                        extract($checktacgia); 
                        echo '<option value="'.$id_tacgia.'"> '.$ten_tac_gia.' </option>';
                    }?>
                    
                </select>
            </div>
            
            <div class="row margin_bottom">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_sach"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
                
            ?>
        </form>
    </div>
</div>