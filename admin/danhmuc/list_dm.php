<div class="row">
    <div class="row formtitle">
        DANH SÁCH LOẠI HÀNG HOÁ
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th></th>
                </tr>
                <?php foreach ($listdm as $checkdm ) {
                    extract($checkdm);
                    $update_dm = "index.php?act=update_dm&id_danhmuc=".$id_danhmuc;
                    $delete_dm = "index.php?act=delete_dm&id_danhmuc=".$id_danhmuc;
                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id_danhmuc.'</td>
                            <td>'.$name_danhmuc.'</td>
                            <td>
                                <a href="'.$update_dm.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a href="'.$delete_dm.'">
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
            <a href="index.php?act=add_dm"><input type="button" value="NHẬP THÊM"></a>
        </div>
    </div>
</div>