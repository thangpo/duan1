
<div class="row">
    <div class="row formtitle">
        THÊM MỚI TIN TỨC
    </div>
    <div class="row formcontent">
        <form action="index.php?act=add_tt" method="post" enctype="multipart/form-data">
            <div class="row margin_bottom">
                Mã tin tức: <br>
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
                Nội dung: <br>
                <textarea name="noi_dung" id="" cols="120" rows="10" ><?=$noi_dung?></textarea>
                <span style="color: red;"><?= $errNoiDung?></span>
            </div>

            <div class="row margin_bottom">
                ID Danh mục: <br>
                <select name="id_danhmuc" id="">
                    <?php foreach ($listdm as $checkdm){ 
                        extract($checkdm); 
                        echo '<option value="'.$id_danhmuc.'"> '.$ten_danhmuc.' </option>';
                    }?>
                    
                </select>
            </div>
            
            <div class="row margin_bottom">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_tt"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
                
            ?>
        </form>
    </div>
</div>