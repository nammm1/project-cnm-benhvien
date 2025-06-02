<?php
	session_start();
    error_reporting(0);
	include ("../myclass/clslogin.php");
    include '../myclass/clsbenhnhan.php'; 
    // include '../myclass/clsbacsi_mc.php';


	$c=new login();
    if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']) && isset($_SESSION['vaiTro']))
    {
        $c->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['vaiTro']);
    }
    else
    {
        header('location:../login/');	
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../css/mau.css">
    
</head>
<style>
    .search-booking a:hover{
            border-bottom: none;
        }
        
</style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header">
                <div class="logo"><a style="text-decoration: none; color: black;" href="../layout/trangchu.php">MED<span class="highlight">DICAL</a></span>
                </div>
                <div class="contact-info">
                    <div class="info">
                        <span class="icon">📞</span> HOTLINE <p>(237) 681-812-255</p>
                    </div>
                    <div class="info">
                        <span class="icon">⏰</span> GIỜ LÀM VIỆC <p>09:00 - 20:00 Everyday</p>
                    </div>
                    <div class="info">
                        <span class="icon">📍</span> ĐỊA CHỈ <p>0123 Some Place</p>
                    </div>
                    <div class="user">
                            <?php
                                $p = new benhnhan();
                                $id_user = $_SESSION['id'];
                                $anhDaiDien = $p->laycot("SELECT anhDaiDien FROM benhnhan WHERE maTaiKhoan = $id_user");
                                if (!empty($anhDaiDien)) {
                                    echo '<img src="../../img/anhDaiDien_bn/' . $anhDaiDien . '" alt="Ảnh đại diện" style="max-width: 30px; max-height: 30px;min-width: 30px; min-height: 30px; border-radius: 50%; vertical-align: middle;"/>';
                                }
                                if(isset($_SESSION['ten'])){
                                    $ten=$_SESSION['ten'];
                                    echo'<span style="margin-right: 10px; margin-left: 10px;">'.$ten.'</span>';
                                    echo '<a href="../logout/index.php" class="user-link">Đăng xuất</a>';
                                } 
                                else
                                {
                                    echo '<a href="../login/index.php" class="user-link">Đăng nhập</a> / ';
                                    echo '<a href="../register/register.php" class="user-link">Đăng ký</a>';
                                }
                            ?>
                        
                    </div>
                </div>
                
            </div>
        </header>
        <nav>
            <div class="navbar">
                <a href="../layout/trangchu.php">Trang chủ</a>
                <a href="../BenhNhan/chuyenGia.php">Chuyên gia</a>
                <a href="../BenhNhan/dichVu.php">Dịch vụ</a>
                <a href="../BenhNhan/tinTucBenhHoc.php">Tin tức</a>
                <a href="../BenhNhan/lienLac.php">Liên lạc</a>
              
                <?php
                    // Kiểm tra và hiển thị mục theo vai trò
                    if (isset($_SESSION['vaiTro'])) {
                        switch ($_SESSION['vaiTro']) {
                            case 'Bệnh nhân':
                                echo '<a href="../layout/danhChoBenhNhan.php">Dành cho bệnh nhân</a>';
                                break;
                            case 'Bác sĩ':
                                echo '<a href="../layout/danhChoBacSi.php">Dành cho bác sĩ</a>';
                                break;
                            case 'Quản lý':
                                echo '<a href="../layout/danhChoQuanLy.php">Dành cho Quản lý</a>';
                                break;
                        }
                    }
                ?>
                <div class="search-booking">
                    <span class="icon">🔍</span>
                    <?php 
                    if (isset($_SESSION['vaiTro'])) {
                        switch ($_SESSION['vaiTro']) {
                            case 'Bệnh nhân':
                                echo '<a href="../BenhNhan/datLichKham.php"><button type="button">Đặt lịch</button></a>';
                                break;
                        }
                    }
                    ?>
                
                </div>
            </div>
        </nav>