<div class="row">
    <div class="row formtitle">
        DANH SÁCH BÌNH LUẬN
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>ID BÌNH LUẬN</th>
                    <th>NỘI DUNG</th>
                    <th>USER ID</th>
                    <th>ID PRODUCT</th>
                    <th>DATE</th>
                    <th></th>
                </tr>
                <?php foreach ($listbinhluan as $checklistbinhluan ) {
                    extract($checklistbinhluan);
                    $update_bl = "index.php?act=update_bl&id_binhluan=".$id_binhluan;
                    $delete_bl = "index.php?act=delete_bl&id_binhluan=".$id_binhluan;
                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id_binhluan.'</td>
                            <td>'.$noidung.'</td>
                            <td>'.$id_taikhoan.'</td>
                            <td>'.$id_sanpham.'</td>
                            <td>'.$ngaybinhluan.'</td>
                            <td>
                                <a href="'.$delete_bl.'">
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
            <input type="button" value="XOÁ CÁC MỤC ĐÃ CHỌN">
            <a href="index.php?act=add_dm"><input type="button" value="NHẬP THÊM"></a>-->
        </div>
    </div>
</div>