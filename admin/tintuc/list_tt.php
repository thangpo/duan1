<div class="row">
    <div class="row formtitle margin_bottom">
        DANH SÁCH TIN TỨC
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <form action="index.php?act=list_tt" method="post">
                <input type="text" name="keyword" id="">

                <select name="id_danhmuc" id="">
                    <option value="0" selected> Tất cả </option>
                    <?php foreach ($listdm as $checkdm){ 
                            extract($checkdm); 
                            echo '<option value="'.$id_danhmuc.'"> '.$ten_danhmuc.' </option>';
                        }?>

                </select>

                <input type="submit" name="listconfirm" value="Search">

            </form>
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>ID TIN TỨC</th>
                    <th>TIÊU ĐỀ</th>
                    <th>HÌNH</th>
                    <th>NỘI DUNG</th>
                    <th></th>
                </tr>
                <?php foreach ($listtt as $checktt ) {
                    extract($checktt);
                    $update_tt = "index.php?act=update_tt&id_tintuc=".$id_tintuc;
                    $delete_tt = "index.php?act=delete_tt&id_tintuc=".$id_tintuc;
                    $imgpath = "../upload/".$hinh_anh;
                    if (is_file($imgpath)) {
                        $hinh = "<img src='".$imgpath."' height='80'> </img>";
                    } else {
                        $hinh = "No img have been uploaded here";
                    }

                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id_tintuc.'</td>
                            <td>'.$tieu_de.'</td>
                            <td><img src="'.$imgpath.'" height="80"> </img></td>
                            <td>'.$noi_dung.'</td>
                            <td>
                                <a href="'.$update_tt.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a onclick="return confirm(\'Bạn có chắc chắn muốn xoá không???\')" href="'.$delete_tt.'">
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
            <a href="index.php?act=add_tt"><input type="button" value="NHẬP THÊM"></a>
        </div>
    </div>
</div>