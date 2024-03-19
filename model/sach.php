<?php
    function load_all_tacgia(){
        $sql = "SELECT*FROM tacgia ORDER BY id_tacgia DESC";
        $listtacgia = pdo_query($sql);
        return $listtacgia;
    }

    function insert_sach($tieu_de, $hinh_anh, $mo_ta, $id_tacgia, $gia){
        $sql = "INSERT INTO sach(tieu_de, hinh_anh, mo_ta, id_tacgia, gia) 
        VALUES ('$tieu_de', '$hinh_anh', '$mo_ta', '$id_tacgia', '$gia') ";
        pdo_execute($sql);
    }

    function load_all_sach($keyword,$id_tacgia){
        $sql = "SELECT*FROM sach WHERE 1";
        if ($keyword != "") {
            $sql.= " AND tieu_de LIKE '%".$keyword."%' ";
        }

        if ($id_tacgia > 0) {
            $sql.= " AND id_tacgia = '".$id_tacgia."' ";
        }  

        $sql.= " ORDER BY id DESC ";
        $listsach = pdo_query($sql);
        return $listsach;
    }
    function load_one_sach($id){
        $sql = "SELECT * FROM sach WHERE id=".$_GET['id'];
        $sach = pdo_query_one($sql);
        return $sach;
    }

    function delete_sach($id){
        $sql =  "DELETE FROM sach WHERE id = ".$_GET['id'];
        pdo_execute($sql);
    }

    function update_sach_1($id,$tieu_de,$hinh_anh,$gia,$id_tacgia,$mo_ta){
        $sql = "UPDATE sach SET id_tacgia='" . $id_tacgia . "', tieu_de='" . $tieu_de . "',
            hinh_anh='" . $hinh_anh . "', mo_ta='" . $mo_ta . "', gia='" . $gia . "'
            WHERE id=" . $id;
        pdo_execute($sql);
    }

    function update_sach_2($id,$tieu_de,$gia,$id_tacgia,$mo_ta){
        $sql = "UPDATE sach SET id_tacgia='" . $id_tacgia . "', tieu_de='" . $tieu_de . "',
            mo_ta='" . $mo_ta . "', gia='" . $gia . "'
            WHERE id=" . $id;
        pdo_execute($sql);
    }

    function delete_all_sach(){
        $sql = "DELETE FROM sach";
        pdo_execute($sql);
    }
?>