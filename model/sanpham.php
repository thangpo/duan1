<?php

    function insert_sanpham($name_sanpham, $price, $hinhanh, $description, $id_danhmuc){
        $sql = "INSERT INTO sanpham(name_sanpham, price, img, description, id_danhmuc) 
        VALUES ('$name_sanpham', '$price', '$hinhanh', '$description', '$id_danhmuc') ";
        pdo_execute($sql);
    }

    function delete_sanpham($id_sanpham){
        $sql =  "DELETE FROM sanpham WHERE id_sanpham = ".$_GET['id_sanpham'];
        pdo_execute($sql);
    }

    function load_all_sanpham($keyword,$id_danhmuc){
        $sql = "SELECT*FROM sanpham WHERE 1";
        if ($keyword != "") {
            $sql.= " AND name_sanpham LIKE '%".$keyword."%' ";
        }

        if ($id_danhmuc > 0) {
            $sql.= " AND id_danhmuc = '".$id_danhmuc."' ";
        }  

        $sql.= " ORDER BY id_sanpham DESC ";
        $listsp = pdo_query($sql);
        return $listsp;
    }

    function load_all_sanpham_home() {
        $sql = "SELECT*FROM sanpham WHERE 1 ORDER BY id_sanpham DESC LIMIT 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function load_one_sanpham($id_sanpham){
        $sql = "SELECT * FROM sanpham WHERE id_sanpham=".$_GET['id_sanpham'];
        $sp = pdo_query_one($sql);
        return $sp;
    }

    function load_sanpham_cung_loai($id_sanpham, $id_danhmuc){
        $sql = "SELECT * FROM sanpham WHERE id_danhmuc = $id_danhmuc and id_sanpham != $id_sanpham";
        $listspcungloai = pdo_query($sql);
        return $listspcungloai;
    }

    function load_all_sanpham_top10(){
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY view DESC LIMIT 0,10";
        $listsanphamtop10 = pdo_query($sql);
        return $listsanphamtop10;
    }

    function update_sanpham($id_sanpham,$name_sanpham,$price,$hinhanh,$description,$id_danhmuc){
        if ($hinhanh != "") {
            $sql = "UPDATE sanpham SET id_danhmuc='".$id_danhmuc."', name_sanpham='".$name_sanpham."', price='".$price."',
            hinhanh='".$hinhanh."', description='".$description."'
            WHERE id_sanpham=".$id_sanpham;
        } else {
            $sql = "UPDATE sanpham SET id_danhmuc='".$id_danhmuc."', name_sanpham='".$name_sanpham."', 
            price='".$price."', description='".$description."'
            WHERE id_sanpham=".$id_sanpham;
        }
        pdo_execute($sql);
        
    }

    function load_name_danhhmuc($id_danhmuc){
        if ($id_danhmuc > 0) {
            $sql = "SELECT * FROM danhmuc WHERE id_danhmuc=$id_danhmuc";
            $dm=pdo_query_one($sql);
            extract($dm);
            return $name_danhmuc;
        }else {
            return "";
        }
        
    }
?>