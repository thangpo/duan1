<div class="row">
    <div class="row formtitle margin_bottom">
        DANH SÁCH SẢN PHẨM
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <form action="index.php?act=list_sp" method="post">
                <input type="text" name="keyword" id="">

                <select name="id_danhmuc" id="">
                    <option value="0" selected> Tất cả </option>
                    <?php foreach ($listdm as $checkdm){ 
                            extract($checkdm); 
                            echo '<option value="'.$id_danhmuc.'"> '.$name_danhmuc.' </option>';
                        }?>

                </select>

                <input type="submit" name="listconfirm" value="Search">

            </form>
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN LOẠI</th>
                    <th>HÌNH</th>
                    <th>GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>
                <?php foreach ($listsp as $checksp ) {
                    extract($checksp);
                    $update_sp = "index.php?act=update_sp&id_sanpham=".$id_sanpham;
                    $delete_sp = "index.php?act=delete_sp&id_sanpham=".$id_sanpham;
                    $imgpath = "../upload/".$img;
                    if (is_file($imgpath)) {
                        $hinh = "<img src='".$imgpath."' height='80'> </img>";
                    } else {
                        $hinh = "No img have been uploaded here";
                    }

                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id_sanpham.'</td>
                            <td>'.$name_sanpham.'</td>
                            <td>'.$hinh.'</td>
                            <td>'.$price.'</td>
                            <td>'.$view.'</td>
                            <td>
                                <a href="'.$update_sp.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a href="'.$delete_sp.'">
                                    <input type="button" value="XOÁ">
                                </a>
                            </td>
                        </tr>';
                }?>

            </table>
        </div>

        <div class="row margin_bottom">
            <!--<input type="button" value="CHỌN TẤT CẢ">
            <input type="button" value="BỎ CHỌN TẤT CẢ">
            <input type="button" value="XOÁ CÁC MỤC ĐÃ CHỌN">-->
            <a href="index.php?act=add_sp"><input type="button" value="NHẬP THÊM"></a>
        </div>
    </div>
</div>