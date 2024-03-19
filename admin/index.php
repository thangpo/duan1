<?php
session_start();
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/cart.php";
include "../model/tintuc.php";
include "../model/sach.php";
include "../model/pdo.php";
include "header.php";
/* CONTROLLER */

//Kiểm tra đăng nhập

if (isset($_SESSION['username'])) {

    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {

            /* DANH MỤC */
            case 'add_dm':
                /* Kiểm tra người dùng có ấn add không */
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $name_danhmuc = $_POST['name_danhmuc'];
                    insert_danhmuc($name_danhmuc);
                    $thongbao = "Add new Successfully";
                }

                include "danhmuc/add_dm.php";
                break;

            case 'list_dm':
                $listdm = load_all_danhmuc();
                include "danhmuc/list_dm.php";
                break;

            case 'delete_dm':
                if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc']) > 0) {
                    delete_danhmuc($_GET['id_danhmuc']);
                }
                $listdm = load_all_danhmuc();
                include "danhmuc/list_dm.php";
                break;

            case 'update_dm':
                if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc']) > 0) {
                    $dm = load_one_danhmuc($_GET['id_danhmuc']);
                }

                include "danhmuc/update_dm.php";
                break;

            case 'capnhat_dm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $name_danhmuc = $_POST['name_danhmuc'];
                    $id_danhmuc = $_POST['id_danhmuc'];

                    update_danhmuc($id_danhmuc, $name_danhmuc);
                    $thongbao = "Update Successfully";
                }
                $listdm = load_all_danhmuc();
                include "danhmuc/list_dm.php";
                break;




            /* SẢN PHẨM */
            case 'add_sp':
                /* Kiểm tra người dùng có ấn add khoong */
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $name_sanpham = $_POST['name_sanpham'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $id_danhmuc = $_POST['id_danhmuc'];

                    $hinhanh = $_FILES['img']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['img']['name']);
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                        insert_sanpham($name_sanpham, $price, $hinhanh, $description, $id_danhmuc);
                    } else {
                        # code...
                    }
                    $thongbao = "Add new Successfully";
                }
                $listdm = load_all_danhmuc();
                include "sanpham/add_sp.php";
                break;

            case 'list_sp':
                if (isset($_POST['listconfirm']) && ($_POST['listconfirm'])) {
                    $keyword = $_POST['keyword'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                } else {
                    $keyword = '';
                    $id_danhmuc = 0;
                }

                $listdm = load_all_danhmuc();
                $listsp = load_all_sanpham($keyword, $id_danhmuc);
                include "sanpham/list_sp.php";
                break;

            case 'delete_sp':
                if (isset($_GET['id_sanpham']) && ($_GET['id_sanpham']) > 0) {
                    delete_sanpham($_GET['id_sanpham']);
                }
                $listsp = load_all_sanpham("", 0);
                include "sanpham/list_sp.php";
                break;

            case 'update_sp':
                if (isset($_GET['id_sanpham']) && ($_GET['id_sanpham']) > 0) {
                    $sp = load_one_sanpham($_GET['id_sanpham']);
                }
                $listdm = load_all_danhmuc();
                include "sanpham/update_sp.php";
                break;

            case 'capnhat_sp':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id_sanpham = $_POST['id_sanpham'];
                    $name_sanpham = $_POST['name_sanpham'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $id_danhmuc = $_POST['id_danhmuc'];

                    $hinhanh = $_FILES['img']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['img']['name']);

                    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                        $sql = "UPDATE sanpham SET id_danhmuc='" . $id_danhmuc . "', name_sanpham='" . $name_sanpham . "', price='" . $price . "',
                            img='" . $hinhanh . "', description='" . $description . "'
                            WHERE id_sanpham=" . $id_sanpham;

                    } else {
                        $sql = "UPDATE sanpham SET id_danhmuc='" . $id_danhmuc . "', name_sanpham='" . $name_sanpham . "', 
                            price='" . $price . "', description='" . $description . "'
                            WHERE id_sanpham=" . $id_sanpham;
                    }
                    pdo_execute($sql);
                    $thongbao = "Add new Successfully";
                }
                $listdm = load_all_danhmuc();
                $listsp = load_all_sanpham("", 0);
                include "sanpham/list_sp.php";
                break;

            //BILL
            case 'bill':
                if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = '';
                }
                $listbill = load_all_list_bill($keyword);
                include "bill/list_bill.php";
                break;

            case 'delete_bill':
                if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
                    delete_cart($_GET['id_bill']);
                    delete_bill($_GET['id_bill']);
                }

                if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = '';
                }
                $listbill = load_all_list_bill($keyword);
                include "bill/list_bill.php";
                break;

            case 'update_bill':
                if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
                    $bill = load_one_bill($_GET['id_bill']);
                }
                include "bill/update_bill.php";
                break;

            case 'capnhat_bill':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $bill_status = $_POST['bill_status'];
                    $id_bill = $_POST['id_bill'];

                    update_bill($id_bill, $bill_status);
                    $thongbao = "Update Successfully";
                }
                if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
                    $keyword = $_POST['keyword'];
                } else {
                    $keyword = '';
                }
                $listbill = load_all_list_bill($keyword);
                include "bill/list_bill.php";
                break;

            case 'thongke':
                $listthongke = load_all_thongke();
                include "thongke/list_thongke.php";
                break;

            case 'bieudo':
                $listthongke = load_all_thongke();
                include "thongke/bieudo.php";
                break;

            //TÀI KHOẢN
            case 'dskh':
                $listtaikhoan = load_all_taikhoan();
                include "taikhoan/list_tk.php";
                break;

            case 'update_tk':
                if (isset($_GET['id_taikhoan']) && ($_GET['id_taikhoan']) > 0) {
                    $tk = load_one_taikhoan($_GET['id_taikhoan']);
                }
                include "taikhoan/update_tk.php";
                break;

            case 'capnhat_tk':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $role = $_POST['role'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $phonenum = $_POST['phonenum'];
                    $email = $_POST['email'];
                    $id_taikhoan = $_POST['id_taikhoan'];

                    update_tk($role, $password, $address, $phonenum, $email, $id_taikhoan);
                    $thongbao = "Update Successfully";
                }
                $listtaikhoan = load_all_taikhoan();
                include "taikhoan/list_tk.php";
                break;

            case 'delete_tk':
                if (isset($_GET['id_taikhoan']) && ($_GET['id_taikhoan']) > 0) {
                    delete_tk($_GET['id_taikhoan']);
                }

                $listtaikhoan = load_all_taikhoan();
                include "taikhoan/list_tk.php";
                break;

            //BÌNH LUẬN 
            case 'dsbl':
                $listbinhluan = load_list_binhluan();
                include "binhluan/list_bl.php";
                break;

            case 'delete_bl':
                if (isset($_GET['id_binhluan']) && ($_GET['id_binhluan']) > 0) {
                    delete_bl($_GET['id_binhluan']);
                }

                $listbinhluan = load_list_binhluan();
                include "binhluan/list_bl.php";
                break;

            default:
                include "home.php";
                break;

            //TIN TỨC
            case 'add_tt':
                /* Kiểm tra người dùng có ấn add khoong */
                $errTieuDe = '';
                $errHinhAnh = '';
                $errNoiDung = '';

                $tieu_de = '';
                $noi_dung = '';
                $id_danhmuc = '';
                $hinh_anh = '';

                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tieu_de = $_POST['tieu_de'];
                    $noi_dung = $_POST['noi_dung'];
                    $id_danhmuc = $_POST['id_danhmuc'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh_anh']['name']);
                    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                        insert_tintuc($tieu_de, $hinh_anh, $noi_dung, $id_danhmuc);
                    } else {
                        # code...
                    }
                    $thongbao = "Add new Successfully";

                    //Validate
                    $isCheck = true;
                    if (!$tieu_de) {
                        $isCheck = false;
                        $errTieuDe = 'Không bỏ trống';
                    }
                    if (!$hinh_anh) {
                        $isCheck = false;
                        $errHinhAnh = 'Không bỏ trống';
                    }
                    if (!$noi_dung) {
                        $isCheck = false;
                        $errNoiDung = 'Không bỏ trống';
                    }
                }
                $listdm = load_all_danhmuc_tintuc();
                //var_dump($listdm);
                include "tintuc/add_tt.php";
                break;

            case 'list_tt':
                if (isset($_POST['listconfirm']) && ($_POST['listconfirm'])) {
                    $keyword = $_POST['keyword'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                } else {
                    $keyword = '';
                    $id_danhmuc = 0;
                }

                $listdm = load_all_danhmuc_tintuc();
                $listtt = load_all_tintuc($keyword, $id_danhmuc);
                include "tintuc/list_tt.php";
                break;

            case 'delete_tt':
                if (isset($_GET['id_tintuc']) && ($_GET['id_tintuc']) > 0) {
                    delete_tintuc($_GET['id_tintuc']);
                }
                $listtt = load_all_tintuc("", 0);
                include "tintuc/list_tt.php";
                break;

            case 'update_tt':
                if (isset($_GET['id_tintuc']) && ($_GET['id_tintuc']) > 0) {
                    $sp = load_one_tintuc($_GET['id_tintuc']);
                }
                $listdm = load_all_danhmuc_tintuc();
                include "tintuc/update_tt.php";
                break;

            case 'capnhat_tt':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id_tintuc = $_POST['id_tintuc'];
                    $tieu_de = $_POST['tieu_de'];
                    $noi_dung = $_POST['noi_dung'];
                    $id_danhmuc = $_POST['id_danhmuc'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh_anh']['name']);

                    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                        $sql = "UPDATE tintuc SET id_danhmuc='" . $id_danhmuc . "', tieu_de='" . $tieu_de . "',
                            hinh_anh='" . $hinh_anh . "', noi_dung='" . $noi_dung . "'
                            WHERE id_tintuc=" . $id_tintuc;

                    } else {
                        $sql = "UPDATE tintuc SET id_danhmuc='" . $id_danhmuc . "', tieu_de='" . $tieu_de . "', 
                            noi_dung='" . $noi_dung . "'
                            WHERE id_tintuc=" . $id_tintuc;
                    }
                    pdo_execute($sql);
                    $thongbao = "Add new Successfully";
                }
                $listdm = load_all_danhmuc_tintuc();
                $listtt = load_all_tintuc("", 0);
                include "tintuc/list_tt.php";
                break;

            //SÁCH
            case 'add_sach':
                /* Kiểm tra người dùng có ấn add khoong */
                $errTieuDe = '';
                $errHinhAnh = '';
                $errMoTa = '';
                $errGia = '';

                $tieu_de = '';
                $mo_ta = '';
                $id_danhmuc = '';
                $hinh_anh = '';
                $gia = '';

                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tieu_de = $_POST['tieu_de'];
                    $mo_ta = $_POST['mo_ta'];
                    $gia = $_POST['gia'];
                    $id_tacgia = $_POST['id_tacgia'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh_anh']['name']);
                    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                        insert_sach($tieu_de, $hinh_anh, $mo_ta, $id_tacgia, $gia);
                    } else {
                        # code...
                    }
                    $thongbao = "Add new Successfully";

                    //Validate
                    $isCheck = true;
                    if (!$tieu_de) {
                        $isCheck = false;
                        $errTieuDe = 'Không bỏ trống';
                    }
                    if (!$hinh_anh) {
                        $isCheck = false;
                        $errHinhAnh = 'Không bỏ trống';
                    }
                    if (!$mo_ta) {
                        $isCheck = false;
                        $errMoTa = 'Không bỏ trống';
                    }
                    if (!$gia) {
                        $isCheck = false;
                        $errGia = 'Không bỏ trống';
                    }
                }
                $listtacgia = load_all_tacgia();
                //var_dump($listdm);
                include "sach/add_sach.php";
                break;

            case 'list_sach':
                if (isset($_POST['listconfirm']) && ($_POST['listconfirm'])) {
                    $keyword = $_POST['keyword'];
                    $id_tacgia = $_POST['id_tacgia'];
                } else {
                    $keyword = '';
                    $id_tacgia = 0;
                }

                $listtacgia = load_all_tacgia();
                $listsach = load_all_sach($keyword, $id_tacgia);
                include "sach/list_sach.php";
                break;

            case 'delete_sach':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    delete_sach($_GET['id']);
                }
                $listsach = load_all_sach("", 0);
                include "sach/list_sach.php";
                break;

            case 'update_sach':
                $errTieuDe = '';
                $errHinhAnh = '';
                $errMoTa = '';
                $errGia = '';
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $sach = load_one_sach($_GET['id']);
                }
                $listtacgia = load_all_tacgia();
                include "sach/update_sach.php";
                break;

            case 'capnhat_sach':
                $errTieuDe = '';
                $errHinhAnh = '';
                $errMoTa = '';
                $errGia = '';

                $tieu_de = '';
                $mo_ta = '';
                $id_danhmuc = '';
                $hinh_anh = '';
                $gia = '';
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $tieu_de = $_POST['tieu_de'];
                    $mo_ta = $_POST['noi_dung'];
                    $id_tacgia = $_POST['id_tacgia'];
                    $gia = $_POST['gia'];

                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh_anh']['name']);

                    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                        // $sql = "UPDATE tintuc SET id_danhmuc='" . $id_danhmuc . "', tieu_de='" . $tieu_de . "',
                        //     hinh_anh='" . $hinh_anh . "', noi_dung='" . $noi_dung . "'
                        //     WHERE id_tintuc=" . $id_tintuc;
                        update_sach_1($id,$tieu_de,$hinh_anh,$gia,$id_tacgia,$mo_ta);
                    } else {
                        // $sql = "UPDATE tintuc SET id_danhmuc='" . $id_danhmuc . "', tieu_de='" . $tieu_de . "', 
                        //     noi_dung='" . $noi_dung . "'
                        //     WHERE id_tintuc=" . $id_tintuc;
                        update_sach_2($id,$tieu_de,$gia,$id_tacgia,$mo_ta);
                    }
                    //pdo_execute($sql);
                    $thongbao = "Add new Successfully";

                    $isCheck = true;
                    if (!$tieu_de) {
                        $isCheck = false;
                        $errTieuDe = 'Không bỏ trống';
                    }
                    if (!$hinh_anh) {
                        $isCheck = false;
                        $errHinhAnh = 'Không bỏ trống';
                    }
                    if (!$mo_ta) {
                        $isCheck = false;
                        $errMoTa = 'Không bỏ trống';
                    }
                    if (!$gia) {
                        $isCheck = false;
                        $errGia = 'Không bỏ trống';
                    }
                }
                $listtacgia = load_all_tacgia();
                $listsach = load_all_sach("", 0);
                include "sach/list_sach.php";
                break;

            case 'del_all_sach':
                delete_all_sach();
                $listtacgia = load_all_tacgia();
                $listsach = load_all_sach("", 0);
                include "sach/list_sach.php";
                break;
        }
    } else {
        echo '<a style="font-weight:bold" href="../index.php">Trở về mua sắm</a>';
        include "home.php";
    }

} else {
    include "home.php";
}

include "footer.php";
?>