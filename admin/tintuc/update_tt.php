<?php
    if (is_array($sp)) {
        extract($sp);
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
        CẬP NHẬT TIN TỨC
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_tt" method="post" enctype="multipart/form-data">
            <div class="row margin_bottom">
                Mã danh mục: <br>
                <select name="id_danhmuc" id="">
                    <option value="0" selected> Tất cả </option>
                    <?php foreach ($listdm as $checkdm){ 
                            if ($checkdm['id_danhmuc'] == $id_danhmuc) {
                                $s = "selected";
                            }else{
                                $s = "";
                            }
                            echo '<option value="'.$checkdm['id_danhmuc'].'" '.$s.'> '.$checkdm['ten_danhmuc'].' </option>';
                        }?>

                </select>
            </div>
            <div class="row margin_bottom">
                Tiêu đề: <br>
                <input type="text" name="tieu_de" id="" value="<?php echo $tieu_de ?>">
            </div>
            <div class="row margin_bottom">
                Hình ảnh: <br>
                <input type="file" name="hinh_anh" id="">
                <?php echo $hinh_anh ?>
            </div>
            <div class="row margin_bottom">
                Nội dung: <br>
                <textarea name="noi_dung" id="" cols="120" rows="10">
                    <?php echo $noi_dung ?>
                </textarea>
            </div>

            <div class="row margin_bottom">
                <input type="hidden" name="id_tintuc" value="<?php echo $id_tintuc ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
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