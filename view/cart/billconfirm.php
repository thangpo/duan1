<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">
            <div class="boxtitle">CẢM ƠN</div>
            <div class="row boxcontent" style="text-align:center">
                <h2>Cảm ơn quý khách đã đặt hàng</h2>
            </div>
        </div>

        <?php 
            if (isset($bill)&&is_array($bill)) {
                extract($bill);
                
            }
        ?>

        <div class="row margin_bottom">
            <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
            <div class="row boxcontent" style="text-align:center">
                <li>Mã đơn hàng: VJP-<?= $bill['id_bill'] ?></li>
                <li>Ngày đặt hàng: <?= $bill['ngaydathang'] ?></li>
                <li>Tổng đơn hàng: <?= $bill['total'] ?></li>
                <li>Phương thức thanh toán: <?= $bill['bill_payment'] ?></li>
            </div>
        </div>

        <div class="row margin_bottom">

            <div class="boxtitle">
                THÔNG TIN ĐẶT HÀNG
            </div>

            <div class="row boxcontent cart formcontent">

                <table style="background-color: #fff; width: 100%; text-align: left;">

                    <tr>
                        <td>Người đặt hàng</td>
                        <td><?= $bill['bill_name'] ?></td>
                    </tr>

                    <tr>
                        <td>Địa chỉ</td>
                        <td><?= $bill['bill_address'] ?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><?= $bill['bill_email'] ?></td>
                    </tr>

                    <tr>
                        <td>Điện thoại</td>
                        <td><?= $bill['bill_phonenum'] ?></td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="row margin_bottom">

            <div class="boxtitle">
                Chi tiết giỏ hàng
            </div>

            <div class="row boxcontent cart formcontent">

                <table style="background-color: #fff; width: 100%; text-align: left;">

                    <tr>
                        <th>STT</th>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>

                    <?php
                        bill_chitiet($billchitiet)
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