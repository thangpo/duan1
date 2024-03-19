<div class="row">
    <div class="row formtitle">
        THỐNG KÊ
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
                <?php foreach ($listthongke as $checklistthongke ) {
                    extract($checklistthongke);
                    //$update_bl = "index.php?act=update_bl&id_taikhoan=".$id_binhluan;
                    //$delete_bl = "index.php?act=delete_bl&id_taikhoan=".$id_binhluan;
                    echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td style="text-align: center;">'.$ma_dm.'</td>
                            <td>'.$ten_dm.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$minprice.'</td>
                            <td>'.$maxprice.'</td>
                            <td>'.$avg_price.'</td>
                            
                        </tr>';
                }?>
                        
            </table>
        </div>

        <div class="row margin_bottom">
            <!--<input type="button" value="CHỌN TẤT CẢ">
            <input type="button" value="BỎ CHỌN TẤT CẢ">
            <input type="button" value="XOÁ CÁC MỤC ĐÃ CHỌN">-->
            <a href="index.php?act=bieudo">
                <input type="button" value="KIỂM TRA BIỂU ĐỒ" tyle="background-color: #00BFFF; color: white;">
            </a>
        </div>
    </div>
</div>