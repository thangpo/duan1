<div class="row">
    <div class="row formtitle margin_bottom">
        DANH SÁCH SÁCH
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <form action="index.php?act=list_tt" method="post">
                <input type="text" name="keyword" id="">

                <select name="id_danhmuc" id="">
                    <option value="0" selected> Tất cả </option>
                    <?php foreach ($listtacgia as $checktacgia){ 
                            extract($checktacgia); 
                            echo '<option value="'.$id_tacgia.'"> '.$ten_tac_gia.' </option>';
                        }?>

                </select>

                <input type="submit" name="listconfirm" value="Search">

            </form>
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>ID SÁCH</th>
                    <th>TIÊU ĐỀ</th>
                    <th>HÌNH</th>
                    <th>MÔ TẢ</th>
                    <th>GIÁ</th>
                    <th>ID TÁC GIẢ</th>
                    <th></th>
                </tr>
                <?php foreach ($listsach as $checksach ) {
                    extract($checksach);
                    $update_sach = "index.php?act=update_sach&id=".$id;
                    $delete_sach = "index.php?act=delete_sach&id=".$id;
                    $imgpath = "../upload/".$hinh_anh;
                    if (is_file($imgpath)) {
                        $hinh = "<img src='".$imgpath."' height='80'> </img>";
                    } else {
                        $hinh = "No img have been uploaded here";
                    }

                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id.'</td>
                            <td>'.$tieu_de.'</td>
                            <td><img src="'.$imgpath.'" height="80"> </img></td>
                            <td>'.$mo_ta.'</td>
                            <td>'.$gia.'</td>
                            <td>'.$id_tacgia.'</td>
                            <td>
                                <a href="'.$update_sach.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a onclick="return confirm(\'Bạn có chắc chắn muốn xoá không???\')" href="'.$delete_sach.'">
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
            <a href="index.php?act=add_sach"><input type="button" value="NHẬP THÊM"></a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xoá toàn bộ không???')" href="index.php?act=del_all_sach">
                <input type="button" value="XOÁ TOÀN BỘ DỮ LIỆU">
            </a>
        </div>
    </div>
</div>