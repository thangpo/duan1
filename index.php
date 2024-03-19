<?php
session_start();

include "model/pdo.php";
include "model/taikhoan.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/cart.php";
include "view/header.php";
include "global.php";

$spnew = load_all_sanpham_home();
$dsdanhmuc = load_all_danhmuc();
$dstop10sp = load_all_sanpham_top10();

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'chitietsanpham':

            if (isset($_GET['id_sanpham']) && $_GET['id_sanpham'] > 0) {
                $id_sanpham = $_GET['id_sanpham'];
                $onesanpham = load_one_sanpham($id_sanpham);
                extract($onesanpham);

                $spcungloai = load_sanpham_cung_loai($id_sanpham, $id_danhmuc);
                // echo "<pre>";
                //      print_r($spcungloai);
                //      die;
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }

            break;

        case 'sanpham':
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] > 0) {
                $id_danhmuc = $_GET['id_danhmuc'];

            } else {
                $id_danhmuc = 0;
            }
            $dssanpham = load_all_sanpham($kyw, $id_danhmuc);
            $name_danhmuc = load_name_danhhmuc($id_danhmuc);
            include "view/sanpham.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $checkinguser = check_user($username, $password);
                if (is_array($checkinguser)) {
                    $_SESSION['username'] = $checkinguser;
                    // print_r($_SESSION['username']);
                    // die;
                    header('location:index.php');
                    $thongbao = "Log in successfully";
                } else {
                    $thongbao = "Invalid account. Please check your username or password or sign in to continue!";
                }

            }
            include "view/taikhoan/dangky.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                insert_taikhoan($username, $password, $email);
                $thongbao = "Sign in successfully. Please log in your account for shopping!";
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'quenmk':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                insert_taikhoan($username, $password, $email);
                $thongbao = "Sign in successfully. Please log in your account for shopping!";
            }
            include "view/taikhoan/quenmatkhau.php";
            break;

        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $id_taikhoan = $_POST['id_taikhoan'];
                $address = $_POST['address'];
                $phonenum = $_POST['phonenum'];

                update_taikhoan($id_taikhoan, $username, $password, $email, $address, $phonenum);
                $_SESSION['username'] = check_user($username, $password);
                header('location:index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;

        case 'quenmatkhau':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                ;

                $checkemail = check_user_email($email);
                if (is_array($checkemail)) {
                    $thongbao = "Your password is: " . $checkemail['password'];
                } else {
                    $thongbao = "Sorry we can't find your email.";
                }
            }
            include "view/taikhoan/quenmatkhau.php";
            break;

        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id_sanpham = $_POST['id_sanpham'];
                $name_sanpham = $_POST['name_sanpham'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $price * $soluong;
                $spadd = [$id_sanpham, $name_sanpham, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;

        case 'deletecart':
            if (isset($_GET['id_cart'])) {
                array_splice($_SESSION['mycart'], $_GET['id_cart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            // header('location:index.php?act=viewcart');
            include "view/cart/viewcart.php";

            break;

        case 'viewcart':

            include "view/cart/viewcart.php";
            break;

        case 'bill':

            include "view/cart/bill.php";
            break;

        case 'billconfirm':
            //Tạo bill
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if(isset($_SESSION['username'])){
                    $id_taikhoan=$_SESSION['username']['id_taikhoan'];
                }else {
                    $id_taikhoan = 0;
                }
                $username = $_POST['username'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phonenum = $_POST['phonenum'];
                $bill_payment = $_POST['payment'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                // echo '<pre>';
                // var_dump([$username, $email, $address, $phonenum, $bill_payment, $ngaydathang, $tongdonhang]);
                // die();
                $id_bill = insert_bill($id_taikhoan, $username, $email, $address, $phonenum, $bill_payment, $ngaydathang, $tongdonhang);

                //Insert into cart : $SESSION['mycart'] & $idbill

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['username']['id_taikhoan'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $id_bill);
                }

                $_SESSION['mycart'] = [];

            }
            var_dump($id_bill);
            if (isset($id_bill)) {
                $bill = load_one_bill($id_bill);
                $billchitiet = load_all_cart($id_bill);
            }
            include "view/cart/billconfirm.php";
            break;

        case 'mybill':
            $listbill = load_all_bill($_SESSION['username']['id_taikhoan']);
            include "view/cart/mybill.php";
            break;

        case 'thoat':
            session_destroy();
            header('location:index.php');
            break;

        case 'introduction':
            include "view/introduction.php";
            break;

        case 'contact':
            include "view/contact.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {

    include "view/home.php";
}

include "view/footer.php";
?>