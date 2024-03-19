<?php

    session_start();
    include ("../../model/pdo.php");
    include ("../../model/binhluan.php");

    $idpro = $_REQUEST['id_sanpham'];

    $dsbinhluan = load_all_binhluan($idpro);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body{
            margin: 0;
        }
        *{
            font-size: 1.3vw;
            color: #333;
        }
        .binhluan table{
            width: 98%;
            margin-left: 5%;
        }
        .binhluan table td:nth-child(1){
            width: 50%;
        }
        .binhluan table td:nth-child(2){
            width: 20%;
        }
        .binhluan table td:nth-child(3){
            width: 30%;
        }
    </style>
</head>

<body>
<div class="row margin_bottom ">

<div class="boxtitle">
    BÌNH LUẬN
</div>


    <div class="boxcontent2 binhluan">
        <table>
            <?php
                foreach ($dsbinhluan as $checkdsbinhluan) {
                    extract($checkdsbinhluan);
                    echo '<tr><td>'.$noidung.'</td>';
                    echo '<td>'.$id_taikhoan.'</td>';
                    echo '<td>'.$ngaybinhluan.'</td></tr>';
                }
            ?>
        </table>
    </div>

<?php if(isset($_SESSION['username']) && (count($_SESSION['username']) > 0)) { ?>
    <div class="boxfooter searchbox formcontent">
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="id_sanpham" id="" value="<?= $idpro ?>">
            
            <input type="text" name="noidung" id="">
            <input type="submit" name="guibinhluan" value="Gửi bình luận">

        </form>
    
    </div>
<?php } ?>

<?php

    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $id_sanpham = $_POST['id_sanpham'];
        $noidung = $_POST['noidung'];
        $id_taikhoan = $_SESSION['username']['id_taikhoan'];
        $ngaybinhluan = date('h:i:sa d/m/Y');
        //echo $id_sanpham , $noidung, $id_taikhoan, $ngaybinhluan ;
        insert_binhluan($noidung,$id_sanpham,$id_taikhoan,$ngaybinhluan);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

?>

</div>
</body>
</html>
