<?php   
    function insert_taikhoan($username,$password,$email){
        $sql = "INSERT INTO taikhoan(username, password, email) 
        VALUES ('$username', '$password', '$email') ";
        pdo_execute($sql);
    }

    function check_user($username,$password){
        $sql = "SELECT * FROM taikhoan WHERE username='".$username."' AND password='".$password."'";
        $checkuser = pdo_query_one($sql);
        return $checkuser;
    }

    function check_user_email($email){
        $sql = "SELECT * FROM taikhoan WHERE email='".$email."' ";
        $checkuseremail = pdo_query_one($sql);
        return $checkuseremail;
    }

    function update_taikhoan($id_taikhoan,$username,$password,$email,$address,$phonenum){
        $sql = "UPDATE taikhoan SET username='".$username."', password='".$password."', email='".$email."',
        address='".$address."', phonenum='".$phonenum."'
        WHERE id_taikhoan=".$id_taikhoan;
        pdo_execute($sql);
        
    }

    function load_one_taikhoan($id_taikhoan){
        $sql = "SELECT*FROM taikhoan WHERE id_taikhoan=".$id_taikhoan;
        
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function load_all_taikhoan(){
        $sql = "SELECT*FROM taikhoan ORDER BY id_taikhoan DESC";
        
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    function update_tk($role,$password,$address,$phonenum,$email,$id_taikhoan){
        $sql = "UPDATE taikhoan SET password='$password', email='$email', address='$address', phonenum='$phonenum', role='$role' 
        WHERE id_taikhoan = '$id_taikhoan'";
        pdo_execute($sql);
    }

    function delete_tk($id_taikhoan){
        $sql = "DELETE FROM taikhoan WHERE id_taikhoan='$id_taikhoan'";
        pdo_execute($sql);
    }
?>