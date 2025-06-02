<?php
	session_start();
    error_reporting(0);
	include ("../myclass/clslogin.php");
	$c=new login();
		
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ </title>
    <link rel="stylesheet" href="../../css/mau.css">
    <!-- Thêm Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
    <style>
        .section1 {
            width: 70%;
            height: auto;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 20px;
            margin-left: 225px ;
            padding: 30px;
            background-color: #f9f9f9;
        }

        .gioithieu {
            display: flex;
            justify-content: center;
            justify-items: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .gioithieu .image img {
            width: 300px;
            border-radius: 10px;
        }

        .gioithieu .content {
            flex: 1;
        }

        .gioithieu h2 {
            color: #008000;
            margin-bottom: 10px;
        }

        .dichvunoitbat {
            text-align: center;
        }

        .dichvunoitbat h2 {
            color: #008000;
            margin-bottom: 20px;
        }

        .dichvunoitbat .services {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .dichvunoitbat .service {
            width: calc(25% - 20px);
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dichvunoitbat .service img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .dichvunoitbat .service p {
            font-weight: bold;
            color: #333;
        }

        .section2 {
            width: 70%;
            height: auto;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 30px;
            margin-left: 225px ;
            padding: 30px;
            background-color: #f9f9f9;
        }

        .section2 .section-title {
            color: #008000;
            text-align: center;
            margin-bottom: 20px;
        }

        .chia-se-kinh-nghiem {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article {
            width: calc(25% - 20px);
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .article img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .article h3 {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        .article .date {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }

        .article .excerpt {
            font-size: 14px;
            color: #666;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header">
                <div class="logo"><a style="text-decoration: none; color: black;" href="index.php">MED<span class="highlight">DICAL</a></span>
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
                        <span class="icon-user">👤</span>
                            <?php
                                if(isset($_SESSION['ten'])){
                                    $ten=$_SESSION['ten'];
                                    echo'<span style="margin-right: 10px;">'.$ten.'</span>';
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
                <a href="index.php">Trang chủ</a>
                <a href="#">Chuyên gia</a>
                <a href="#">Dịch vụ</a>
                <a href="#">Thành tựu</a>
                <a href="#">Tin tức</a>
                <a href="#">Liên lạc</a>
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
                    <button type="button">Đặt lịch</button>
                </div>
            </div>
        </nav>
        
        <div class="Picture">
            <img src="../../img/anhbia.jpg" alt="Cover Image" class="cover-image" alt="">
        </div>
        

        <div class="section1" align="center">
            <!-- Giới thiệu -->
            <div class="gioithieu">
                <div class="image">
                    <img src="../../img/trangchu1.jpg" alt="Libra Health" />
                </div>
                <div class="content">
                    <h2>Giới thiệu</h2>
                    <p>
                        Chính thức đi vào hoạt động từ năm 2011, Hospital khẳng định vị thế thương hiệu là Bệnh viện đa khoa hàng đầu tại Hồ Chí Minh. Sự tin tưởng và đồng hành của hàng triệu người đã đổi với dịch vụ của chúng tôi trong gần một thập kỷ qua là sự phản ánh chân thực cho thái độ làm việc nghiêm túc, chuẩn mực cao trong chất lượng khám chữa bệnh.
                    </p>
                    <p>
                        Để tạo ra từng dấu ấn quan trọng trong sự phát triển, Libra Health kiên trì theo đuổi chiến lược mang lại sự bảo đảm cao nhất từ đội ngũ GS.BS chuyên khoa đầu ngành, chuyên môn sâu, tay nghề vững.
                    </p>
                </div>
            </div>

            <!-- Dịch vụ nổi bật -->
            <div class="dichvunoitbat">
                <h2>Dịch vụ nổi bật</h2>
                <div class="services">
                    <div class="service">
                        <img src="../../img/kskdk.jpg" alt="Khám sức khỏe định kỳ" />
                        <p>Khám sức khỏe định kỳ</p>
                    </div>
                    <div class="service">
                        <img src="../../img/kskthn.php" alt="Khám sức khỏe tiền hôn nhân" />
                        <p>Khám sức khỏe tiền hôn nhân</p>
                    </div>
                    <div class="service">
                        <img src="../../img/ktstm.jpg" alt="Khám tầm soát tim mạch" />
                        <p>Khám tầm soát tim mạch</p>
                    </div>
                    <div class="service">
                        <img src="../../img/xntyc.jpg" alt="Xét nghiệm theo yêu cầu" />
                        <p>Xét nghiệm theo yêu cầu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section2">
            <h2 class="section-title">Chia sẻ kinh nghiệm</h2>
            <div class="chia-se-kinh-nghiem">
                <div class="article">
                    <img src="../../img/kn1.jpg" alt="Kiết lỵ: nguyên nhân, triệu chứng">
                    <h3>Kiết lỵ: nguyên nhân, triệu chứng</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Bệnh kiết lỵ, là do vi khuẩn shigella gây viêm toàn bộ...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn2.jpg" alt="Chữa ung thư vòm họng ở đâu?">
                    <h3>Chữa ung thư vòm họng ở đâu?</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Nên chữa ung thư vòm họng ở đâu? Ung thư vòm họng là...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn3.jpg" alt="Ung thư tuyến giáp nên ăn gì">
                    <h3>Ung thư tuyến giáp nên ăn gì</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Rau lá xanh đóng vai trò quan trọng trong quá trình trao...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn4.jpg" alt="Nguyên nhân và triệu chứng bệnh loãng xương">
                    <h3>Nguyên nhân và triệu chứng bệnh loãng xương</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Nguyên nhân của hiện tượng loãng xương Các nguyên nhân chính dẫn đến...</p>
                </div>
            </div>
        </div>


        <div class="contact">
            <div class="contact-section">
                <h1>Contact</h1>
                <div class="contact-info-1">
                    <div class="contact-box">
                        <i class="fas fa-phone-alt"></i>
                        <h3>HOTLINE</h3>
                        <p>(237) 681-812-255<br>(237) 666-331-894</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>ĐỊA CHỈ</h3>
                        <p>0123 abc</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-envelope"></i>
                        <h3>EMAIL</h3>
                        <p>fildineeesoe@gmail.com<br>myebstudios@gmail.com</p>
                    </div>
                    <div class="contact-box">
                        <i class="fas fa-clock"></i>
                        <h3>GIỜ LÀM VIỆC</h3>
                        <p>Thứ 2 - Thứ 7 09:00-20:00<br>Chỉ khẩn cấp vào Chủ nhật</p>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-content">
                <div class="footer-box">
                    <h2>MEDDICAL</h2>
                    <p>Dẫn đầu về chất lượng y tế xuất sắc, dịch vụ chăm sóc đáng tin cậy.</p>
                </div>
                <div class="footer-box">
                    <h3>Liên kết</h3>
                    <p><a href="#">Đặt lịch</a><br><a href="#">Bác sĩ</a><br><a href="#">Dịch vụ</a><br><a href="#">Giới thiệu</a></p>
                </div>
                <div class="footer-box">
                    <h3>Liên hệ</h3>
                    <p>Call: (237) 123<br>Email: abc@gmail.com<br>Địa chỉ: 0123abc</p>
                </div>
                <div class="footer-box">
                    <h3>Bản tin</h3>
                    <div class="newsletter">
                        <input type="email" placeholder="Enter your email address">
                        <button><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2021 Hospital's name All Rights Reserved by PNTEC-LTD</p>
                <div class="icon-social">
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>