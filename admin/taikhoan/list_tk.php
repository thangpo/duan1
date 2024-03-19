<div class="row">
    <div class="row formtitle">
        DANH SÁCH TÀI KHOẢN
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>USER ID</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>ADDRESS</th>
                    <th>NUMBER</th>
                    <th>ROLE</th>
                    <th></th>
                </tr>
                <?php foreach ($listtaikhoan as $checklisttaikhoan ) {
                    extract($checklisttaikhoan);
                    $update_tk = "index.php?act=update_tk&id_taikhoan=".$id_taikhoan;
                    $delete_tk = "index.php?act=delete_tk&id_taikhoan=".$id_taikhoan;
                    echo '<tr>
                            
                            <td style="text-align: center;">'.$id_taikhoan.'</td>
                            <td>'.$username.'</td>
                            <td>'.$email.'</td>
                            <td>'.$password.'</td>
                            <td>'.$address.'</td>
                            <td>'.$phonenum.'</td>
                            <td>'.$role.'</td>
                            <td>
                                <a href="'.$update_tk.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a href="'.$delete_tk.'">
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
            <!--<a href="index.php?act=add_dm"><input type="button" value="NHẬP THÊM"></a>-->
        </div>
    </div>
</div>