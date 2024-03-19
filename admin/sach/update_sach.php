<?php
    if (is_array($sach)) {
        extract($sach);
    }
    $imgpath = "../upload/".$hinh_anh;
    if (is_file($imgpath)) {
        $hinh = "<img src='".$imgpath."' height='80'> </img>";
    } else {
        $hinh = "No img have been uploaded here";
    }
?>

<div class="row">
    <div class="row formtitle">
        CẬP NHẬT SÁCH
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_sach" method="post" enctype="multipart/form-data">
            <div class="row margin_bottom">
                Mã tác giả: <br>
                <select name="id_tacgia" id="">
                    <option value="0" selected> Tất cả </option>
                    <?php foreach ($listtacgia as $checktacgia){ 
                            if ($checktacgia['id_tacgia'] == $id_tacgia) {
                                $s = "selected";
                            }else{
                                $s = "";
                            }
                            echo '<option value="'.$checktacgia['id_tacgia'].'" '.$s.'> '.$checktacgia['ten_tac_gia'].' </option>';
                        }?>

                </select>
            </div>
            <div class="row margin_bottom">
                Tiêu đề: <br>
                <input type="text" name="tieu_de" id="" value="<?php echo $tieu_de ?>">
                <span style="color: red;"><?= $errTieuDe?></span>
            </div>
            <div class="row margin_bottom">
                Hình ảnh: <br>
                <input type="file" name="hinh_anh" id="">
                <span style="color: red;"><?= $errHinhAnh?></span>
                <?php echo $hinh_anh ?>
            </div>
            <div class="row margin_bottom">
                Giá: <br>
                <input type="text" name="gia" id="" value="<?php echo $gia ?>">
                <span style="color: red;"><?= $errGia?></span>
            </div>
            <div class="row margin_bottom">
                Mô tả: <br>
                <textarea name="noi_dung" id="" cols="120" rows="10">
                    <?php echo $mo_ta ?>
                </textarea>
                <span style="color: red;"><?= $errMoTa?></span>
            </div>

            <div class="row margin_bottom">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
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