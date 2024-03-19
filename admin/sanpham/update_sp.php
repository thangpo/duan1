<?php
    if (is_array($sp)) {
        extract($sp);
    }
    $imgpath = "../upload/".$img;
    if (is_file($imgpath)) {
        $hinh = "<img src='".$imgpath."' height='80'> </img>";
    } else {
        $hinh = "No img have been uploaded here";
    }
?>

<div class="row">
    <div class="row formtitle">
        CẬP NHẬT SẢN PHẨM
    </div>
    <div class="row formcontent">
        <form action="index.php?act=capnhat_sp" method="post" enctype="multipart/form-data">
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
                            echo '<option value="'.$checkdm['id_danhmuc'].'" '.$s.'> '.$checkdm['name_danhmuc'].' </option>';
                        }?>

                </select>
            </div>
            <div class="row margin_bottom">
                Tên sản phẩm: <br>
                <input type="text" name="name_sanpham" id="" value="<?php echo $name_sanpham ?>">
            </div>
            <div class="row margin_bottom">
                Giá: <br>
                <input type="text" name="price" id="" value="<?php echo $price ?>">
            </div>
            <div class="row margin_bottom">
                Hình ảnh: <br>
                <input type="file" name="img" id="">
                <?php echo $hinh ?>
            </div>
            <div class="row margin_bottom">
                Mô tả: <br>
                <textarea name="description" id="" cols="30" rows="10">
                    <?php echo $description ?>
                </textarea>
            </div>

            <div class="row margin_bottom">
                <input type="hidden" name="id_sanpham" value="<?php echo $id_sanpham ?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=list_sp"><input type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao) && ($thongbao!="")) {
                    echo $thongbao;
                }
                
            ?>
        </form>
    </div>
</div>