<?php
    function load_all_danhmuc_tintuc(){
        $sql = "SELECT*FROM danhmuctintuc ORDER BY id_danhmuc DESC";
        $listdmtt = pdo_query($sql);
        return $listdmtt;
    }

    function insert_tintuc($tieu_de, $hinh_anh, $noi_dung, $id_danhmuc){
        $sql = "INSERT INTO tintuc(tieu_de, hinh_anh, noi_dung, id_danhmuc) 
        VALUES ('$tieu_de', '$hinh_anh', '$noi_dung', '$id_danhmuc') ";
        pdo_execute($sql);
    }

    function load_all_tintuc($keyword,$id_danhmuc){
        $sql = "SELECT*FROM tintuc WHERE 1";
        if ($keyword != "") {
            $sql.= " AND tieu_de LIKE '%".$keyword."%' ";
        }

        if ($id_danhmuc > 0) {
            $sql.= " AND id_danhmuc = '".$id_danhmuc."' ";
        }  

        $sql.= " ORDER BY id_tintuc DESC ";
        $listtt = pdo_query($sql);
        return $listtt;
    }
    function load_one_tintuc($id_tintuc){
        $sql = "SELECT * FROM tintuc WHERE id_tintuc=".$_GET['id_tintuc'];
        $tt = pdo_query_one($sql);
        return $tt;
    }

    function delete_tintuc($id_tintuc){
        $sql =  "DELETE FROM tintuc WHERE id_tintuc = ".$_GET['id_tintuc'];
        pdo_execute($sql);
    }
?>