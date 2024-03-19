
<div class="row">
    <div class="row formtitle">
        THÊM MỚI SẢN PHẨM
    </div>
    <div class="row formcontent">
        <form action="index.php?act=add_sp" method="post" enctype="multipart/form-data">
            <div class="row margin_bottom">
                Mã sản phẩm: <br>
                <input type="text" name="id_sanpham" id="" disabled>
            </div>
            <div class="row margin_bottom">
                Tên sản phẩm: <br>
                <input type="text" name="name_sanpham" id="">
            </div>
            <div class="row margin_bottom">
                Giá: <br>
                <input type="text" name="price" id="">
            </div>
            <div class="row margin_bottom">
                Hình ảnh: <br>
                <input type="file" name="img" id="">
            </div>
            <div class="row margin_bottom">
                Mô tả: <br>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="row margin_bottom">
                ID Danh mục: <br>
                <select name="id_danhmuc" id="">
                    <?php foreach ($listdm as $checkdm){ 
                        extract($checkdm); 
                        echo '<option value="'.$id_danhmuc.'"> '.$name_danhmuc.' </option>';
                    }?>
                    
                </select>
            </div>
            
            <div class="row margin_bottom">
                <input type="submit" name="themmoi" value="THÊM MỚI">
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