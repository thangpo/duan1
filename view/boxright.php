            <div class="row margin_bottom ">
                <div class="boxtitle">
                    TÀI KHOẢN
                </div>
                <div class="boxcontent formTaiKhoan">
                    <?php
                        if (isset($_SESSION['username'])) {
                            extract($_SESSION['username']);

                    ?>

                    <div class="row mb">
                        Xin chào<br>
                        <?= $username ?>
                    </div>

                    <div class="row mb">
                        <li>
                            <a href="index.php?act=quenmatkhau">Quên mật khẩu</a>
                        </li>
                        
                        <li>
                            <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                        </li>

                        <li>
                            <a href="index.php?act=mybill">Đơn hàng của tôi</a>
                        </li>

                        <?php
                            if ($role == 1) {
                        ?>
                        <li>
                            <a href="admin/index.php">Đăng nhập ADMIN</a>
                        </li>
                        <?php
                            }
                        ?>

                        <li>
                            <a href="index.php?act=thoat">LOGOUT</a>
                        </li>
                    </div>

                    <?php
                        }else {
                    ?>
                    <form action="index.php?act=dangnhap" method="post">
                        <div class="row mb">
                            Tên đăng nhập <br>
                            <input type="text" name="username" id="" required>
                        </div>

                        <div class="row mb">
                            Mật khẩu <br>
                            <input type="password" name="password" id="" required>
                        </div>

                        <div class="row mb">
                            <input type="checkbox" name="" id=""> Ghi nhớ tài khoản
                        </div>

                        <div class="row mb">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                        </div>

                    </form>
                    <li>
                        <a href="index.php?act=quenmatkhau">Quên mật khẩu</a>
                    </li>
                    <li>
                        <a href="index.php?act=dangky">Đăng kí thành viên</a>
                    </li>
                    <?php } ?>
                </div>
            </div>

            <div class="row margin_bottom ">
                <div class="boxtitle">
                    DANH MỤC
                </div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <?php foreach($dsdanhmuc as $checkdsdanhmuc){
                            extract($checkdsdanhmuc);
                            $linkdanhmuc = "index.php?act=sanpham&id_danhmuc=".$id_danhmuc;
                            echo '<li>
                                    <a href="'.$linkdanhmuc.'">'.$name_danhmuc.'</a>
                                </li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="boxfooter searchbox formTaiKhoan">
                    <form action="index.php?act=sanpham" method="post">
                        <input type="text" name="kyw" id="">
                        <input type="submit" name="search" value="Tìm kiếm">
                    </form>
                </div>
            </div>

            <div class="row ">
                <div class="boxtitle">
                    TOP 10 YÊU THÍCH
                </div>
                <div class="row boxcontent">
                    <?php foreach ($dstop10sp as $checkdstop10sp) {
                        extract ($checkdstop10sp);
                        $linksp = "index.php?act=chitietsanpham&id_sanpham=".$id_sanpham;
                        $hinh = $img_path.$img;
                        echo '<div class="row margin_bottom top10">
                                <img src="'.$hinh.'" alt="">
                                <a href="'.$linksp.'">'.$name_sanpham.'</a>
                            </div>';
                    }
                    ?>
                </div>
            </div>