<?php 
function viewcart($del){
    global $img_path;
    $tong=0;
    $id_cart = 0;
    if ($del == 1) {
        $xoaspcart_th = '<th>THAO TÁC</th>';
        $xoaspcart_td2 = '<td></td>';
    }else {
        $xoaspcart_th = '';
        $xoaspcart_td2 = '';
    }
    echo'<tr>
        <th>HÌNH</th>
        <th>SẢN PHẨM</th>
        <th>ĐƠN GIÁ</th>
        <th>SỐ LƯỢNG</th>
        <th>THÀNH TIỀN</th>
        '.$xoaspcart_th.'
    </tr>';
    foreach ($_SESSION['mycart'] as $checkmycart) {
        $hinh = $img_path .$checkmycart[2];
        $thanhtien = $checkmycart[3]*$checkmycart[4];
        $tong+=$thanhtien;  
        //$xoaspcart = '<a href="index.php?act=deletecart$id_cart='.$id_cart.'"><input type="button" value="XOÁ"></a>';
        if ($del == 1) {
            $xoaspcart_td = '<td><a href="index.php?act=deletecart&id_cart='.$id_cart.'"><input type="submit" name="submit" value="XOÁ"></a></td>';
        }else {
            $xoaspcart_td = '';
        }
        echo '
            <tr>
                <td><img src="'.$hinh.'" alt="" height="80px" width="80px"></td>
                <td>'.$checkmycart[1].'</td>
                <td>'.$checkmycart[3].'</td>
                <td>'.$checkmycart[4].'</td>
                <td>'.$thanhtien.'</td>
                '.$xoaspcart_td.'
                                        
            </tr>';
            $id_cart+=1;
        }
        echo '<tr>
                <td colspan="4">TỔNG ĐƠN HÀNG</td>
                                    
                <td>'.$tong.'</td>
                '.$xoaspcart_td2.'
            </tr>';
}

function tongdonhang(){
    
    $tong=0;
    
    foreach ($_SESSION['mycart'] as $checkmycart) {
        $thanhtien = $checkmycart[3]*$checkmycart[4];
        $tong+=$thanhtien;  
    }
    return $tong;
}

function insert_bill($id_taikhoan,$username,$email,$address,$phonenum,$bill_payment,$ngaydathang,$tongdonhang){
    $sql = "INSERT INTO bill(id_taikhoan, bill_name, bill_address, bill_phonenum, bill_email, bill_payment, ngaydathang, total) 
    VALUES ('$id_taikhoan','$username','$address','$phonenum','$email','$bill_payment','$ngaydathang','$tongdonhang') ";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($id_taikhoan,$id_sanpham,$img,$name_sanpham,$price,$soluong,$thanhtien,$id_bill){
    $sql = "INSERT INTO cart(id_taikhoan,id_sanpham,img,name_sanpham,price,soluong,thanhtien,id_bill) 
    VALUES ('$id_taikhoan','$id_sanpham','$img','$name_sanpham','$price','$soluong','$thanhtien','$id_bill') ";
    return pdo_execute($sql);
}

function load_one_bill($id_bill){
    $sql = "SELECT * FROM bill WHERE id_bill=".$id_bill;
    $bill = pdo_query_one($sql);
    return $bill;
}

function load_all_cart($id_bill){
    $sql = "SELECT * FROM cart WHERE id_bill=".$id_bill;
    $bill = pdo_query($sql);
    return $bill;
}

function load_all_bill($id_taikhoan){
    $sql = "SELECT * FROM bill WHERE id_taikhoan=".$id_taikhoan;
    $listbill = pdo_query($sql);
    return $listbill;
}

function load_all_list_bill($keyword){
    //$sql = "SELECT * FROM bill WHERE 1";
    $sql = "SELECT*FROM bill WHERE 1";
    if ($keyword != "") {
        $sql.= " AND id_bill LIKE '%".$keyword."%' ";
    }
    $listbill = pdo_query($sql);
    return $listbill;
}

function load_list_key_bill($keyword=""){
    if($keyword != ""){
        $sql = "SELECT * FROM bill WHERE id_bill LIKE '%".$keyword."%' ";
    }
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdonhang($n){
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;

        case '1':
            $tt = 'Đang xử lí';
            break;

        case '2':
            $tt = 'Đang giao hàng';
            break;

        case '3':
            $tt = 'Đã giao';
            break;
        
        default:
            $tt = 'Đơn hàng mới';
            break;
    }
    return $tt;
}

function load_all_cart_count($id_bill){
    $sql="SELECT * FROM cart WHERE id_bill=".$id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function bill_chitiet($listbill){
    global $img_path;
    $tong=0;
    $id_cart = 0;
    echo'<tr>
        <th>HÌNH</th>
        <th>SẢN PHẨM</th>
        <th>ĐƠN GIÁ</th>
        <th>SỐ LƯỢNG</th>
        <th>THÀNH TIỀN</th>
    </tr>';
    foreach ($listbill as $checkmycart) {
        $hinh = $img_path .$checkmycart['img']; 
        $tong+=$checkmycart['thanhtien'];  
        
        echo '
            <tr>
                <td><img src="'.$hinh.'" alt="" height="80px" width="80px"></td>
                <td>'.$checkmycart['name_sanpham'].'</td>
                <td>'.$checkmycart['price'].'</td>
                <td>'.$checkmycart['soluong'].'</td>
                <td>'.$checkmycart['thanhtien'].'</td>                                     
            </tr>';
            $id_cart+=1;
        }
        echo '<tr>
                <td colspan="4">TỔNG ĐƠN HÀNG</td>
                                    
                <td>'.$tong.'</td>
                
            </tr>';
}

function load_all_thongke(){
    $sql = "SELECT danhmuc.id_danhmuc as ma_dm, danhmuc.name_danhmuc as ten_dm, COUNT(sanpham.id_sanpham) as countsp, 
    MIN(sanpham.price) as minprice, MAX(sanpham.price) as maxprice, AVG(sanpham.price) as avg_price
    FROM sanpham JOIN danhmuc ON danhmuc.id_danhmuc = sanpham.id_danhmuc
    GROUP BY danhmuc.id_danhmuc ORDER BY danhmuc.id_danhmuc DESC";

    $list_thongke = pdo_query($sql);
    return $list_thongke;
}

function update_bill($id_bill,$bill_status){
    $sql = "UPDATE bill SET bill_status= '$bill_status' WHERE id_bill = '$id_bill'";
    pdo_execute($sql);
}

function delete_bill($id_bill){
    $sql = "DELETE FROM bill WHERE id_bill='$id_bill'";
    pdo_execute($sql);
}

function delete_cart($id_bill){
    $sql = "DELETE FROM cart WHERE id_bill='$id_bill'";
    pdo_execute($sql);
}
?>