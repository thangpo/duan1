<?php

    function insert_danhmuc($name_danhmuc){
        $sql = "INSERT INTO danhmuc(name_danhmuc) VALUES ('$name_danhmuc') ";
        pdo_execute($sql);
    }

    function delete_danhmuc($id_danhmuc){
        $sql =  "DELETE FROM danhmuc WHERE id_danhmuc = ".$_GET['id_danhmuc'];
        pdo_execute($sql);
    }

    function load_all_danhmuc(){
        $sql = "SELECT*FROM danhmuc ORDER BY id_danhmuc DESC";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function load_one_danhmuc($id_danhmuc){
        $sql = "SELECT * FROM danhmuc WHERE id_danhmuc=".$_GET['id_danhmuc'];
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($id_danhmuc, $name_danhmuc){
        $sql = "UPDATE danhmuc SET name_danhmuc='$name_danhmuc' WHERE id_danhmuc='$id_danhmuc'";
        pdo_execute($sql);
    }
?>