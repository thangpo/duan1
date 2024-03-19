<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">
            <div class="boxtitle">ĐƠN HÀNG CỦA BẠN</div>
            
            <div class="row boxcontent">
                <table style="background-color: #fff; width: 100%; text-align: left;">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Số lượng</th>
                        <th>Tổng giá trị</th>
                        <th>Tình trạng</th>
                    </tr>

                    <?php
                        if (is_array($listbill)) {
                            foreach ($listbill as $checklistbill) {
                                extract($checklistbill);
                                $ttdonhang = get_ttdonhang($checklistbill['bill_status']);
                                $countsp = load_all_cart_count($checklistbill['id_bill']);
                               echo '<tr>
                                        <td>VJP-'.$checklistbill['id_bill'].'</td>
                                        <td>'.$checklistbill['ngaydathang'].'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$checklistbill['total'].'</td>
                                        <td>'.$ttdonhang.'</td>
                                    </tr>'; 
                            }
                        }
                    ?>

                    
                </table>
            </div>
        </div>

        
    </div>
    <div class="boxright ">
        <?php
            include "view/boxright.php"
        ?>
    </div>