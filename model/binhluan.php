<?php   
    function insert_binhluan($noidung,$id_sanpham,$id_taikhoan,$ngaybinhluan){
        $sql = "INSERT INTO binhluan(noidung,id_taikhoan,id_sanpham,ngaybinhluan) 
        VALUES ('$noidung','$id_taikhoan','$id_sanpham','$ngaybinhluan') ";
        pdo_execute($sql);
    }

    function load_all_binhluan($id_sanpham){
        $sql = "SELECT * FROM binhluan WHERE id_sanpham = '".$id_sanpham."' ORDER BY id_binhluan DESC";
        $listbl = pdo_query($sql);
        return $listbl;
    }

    function load_list_binhluan(){
        $sql = "SELECT * FROM binhluan";
        $listbl = pdo_query($sql);
        return $listbl;
    }

    function delete_bl($id_binhluan){
        $sql = "DELETE FROM binhluan WHERE id_binhluan='$id_binhluan'";
        pdo_execute($sql);
    }
?>