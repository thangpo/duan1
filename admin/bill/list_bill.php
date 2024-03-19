<div class="row">
    <div class="row formtitle margin_bottom">
        DANH SÁCH ĐƠN HÀNG
    </div>
    <div class="row formcontent">
        <div class="row margin_bottom formdsloai">
            <form action="index.php?act=bill" method="post">
                <input type="text" name="keyword" id="">

                <input type="submit" name="listconfirm" value="Search">

            </form>
            <table>
                <tr>
                    <!--<th><td><input type="checkbox" name="" id=""></td></th>-->
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LUỌNG</th>
                    <th>GIÁ TRỊ</th>
                    <th>TÌNH TRẠNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th></th>
                </tr>
                <?php foreach ($listbill as $checklistbill ) {
                    extract($checklistbill);
                    $khachhang = $checklistbill["bill_name"]. '
                    <br> '.$checklistbill["bill_email"].'
                    <br> '.$checklistbill["bill_address"].'
                    <br> '.$checklistbill["bill_phonenum"].' ';
                    $countsp = load_all_cart_count($checklistbill['id_bill']);
                    $ttdh = get_ttdonhang($checklistbill['bill_status']);
                    $update_bill = "index.php?act=update_bill&id_bill=".$checklistbill['id_bill'];
                    $delete_bill = "index.php?act=delete_bill&id_bill=".$checklistbill['id_bill'];

                    echo '<tr>
                            
                            <td style="text-align: center;">VJP-'.$checklistbill['id_bill'].'</td>
                            <td>'.$khachhang.'</td>
                            <td>'.$countsp.'</td>
                            <td><strong>'.$checklistbill['total'].'</strong></td>
                            <td>'.$ttdh.'</td>
                            <td>'.$checklistbill['ngaydathang'].'</td>
                            <td>
                                <a href="'.$update_bill.'">
                                    <input type="button" value="SỬA">
                                </a>
                                <a href="'.$delete_bill.'">
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
            <a href="index.php?act=add_sp"><input type="button" value="NHẬP THÊM"></a>-->
        </div>
    </div>
</div>