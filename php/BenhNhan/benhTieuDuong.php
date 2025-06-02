<?php
    session_start();
    error_reporting(0);
    include ("../myclass/clslogin.php");
    $c = new login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bệnh Tiểu Đường </title>

    <link rel="stylesheet" href="../../css/tintuc.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="header">
                <div class="logo">MED<span class="highlight">DICAL</span></div>
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
                                $ten = $_SESSION['ten'];
                                echo '<span style="margin-right: 10px;">' . $ten . '</span>';
                                echo '<a href="../logout/index.php" class="user-link">Đăng xuất</a>';
                            } else {
                                echo '<a href="../login/index.php" class="user-link">Đăng nhập</a> / ';
                                echo '<a href="../register/register.php" class="user-link">Đăng ký</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Navbar -->
        <nav>
            <div class="navbar">
                <a href="../index.php">Trang chủ</a>
                <a href="../BenhNhan/chuyenGia.php">Chuyên gia</a>
                <a href="../BenhNhan/dichVudichVu.php">Dịch vụ</a>
                <a href="../BenhNhan/tinTucBenhHoc.php">Tin tức</a>
                
                <a href="lienLac.php">Liên lạc</a>

                <?php
                    if (isset($_SESSION['vaiTro'])) {
                        switch ($_SESSION['vaiTro']) {
                            case 'Bệnh nhân':
                                echo '<a href="../MinhCong/danhChoBenhNhan.php">Dành cho bệnh nhân</a>';
                                break;
                            case 'Bác sĩ':
                                echo '<a href="../MinhCong/danhChoBacSi.php">Dành cho bác sĩ</a>';
                                break;
                            case 'Quản lý':
                                echo '<a href="../MinhCong/danhChoQuanLy.php">Dành cho Quản lý</a>';
                                break;
                        }
                    }
                ?>
                
                <div class="search-booking">
                    <span class="icon">🔍</span>
                    <a href="datLichKham.php"><button type="button">Đặt lịch</button></a>
                </div>
            </div>
        </nav>

        <ul>
    <li>
    
        <!-- Bài viết bệnh tiểu đường -->
      
        <div class="t-news-container">
    <!-- Thanh bên trái -->
    <aside class="t-left-sidebar">
    <ul>
        <li><i class="fas fa-list"></i> <a href="tinTucBenhHoc.php">Tất cả</a></li>
        <li><i class="fas fa-heartbeat"></i> <a href="benhTim.php">Bệnh Tim Mạch</a></li>
        <li><i class="fas fa-stethoscope"></i> <a href="benhUngThu.php">Bệnh Ung Thư</a></li>
    </ul>
</aside>


    <!-- Nội dung chính -->
    <div class="t-main-content">
        <h1 class="t-news-title"> Đái tháo đường: Nguyên nhân, dấu hiệu, chẩn đoán và cách điều trị</h1>
        <div class="t-divider"></div>
        <div class="t-news-item">
            <h2> Bệnh tiểu đường là gì ? </h2>
            <p>
            Tiểu đường (hay đái tháo đường) là thuật ngữ dùng để
            đề cập tới một nhóm bệnh gây ảnh hưởng đến cách cơ thể sử dụng lượng đường (glucose) trong máu.
            </p>
            <p>
            Glucose rất quan trọng đối với sức khỏe vì đây là nguồn 
            năng lượng cần thiết giúp cho các tế bào trong cơ thể hoạt động bình thường, đặc biệt là tế bào não.
            </p>
            <p>
            Nguyên nhân gây bệnh rất đa dạng, tùy thuộc vào từng loại tiểu đường cụ thể. Tuy nhiên,
             dù mắc loại tiểu đường nào thì bệnh vẫn dẫn đến lượng đường trong máu cao, từ đó gây nên hàng loạt vấn đề sức khỏe nghiêm trọng.
            </p>
           <div class="image-tieuduong">
           <img src="../../img/tieuduong.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
        
            <h2>Các dạng đái tháo đường</h2>
            <h4 class="blue-text">Đái tháo đường típ 1</h4>
            <p> Đái tháo đường típ 1 hay tiểu đường tuýp 1, được cho là xảy ra do phản ứng tự miễn khiến cơ thể bạn ngừng sản xuất insulin. 
            Những người mắc bệnh sẽ phải dùng insulin nhân tạo mỗi ngày trong suốt cuộc đời.</p>
            <h4 class="blue-text">Đái tháo đường típ 2</h4>
            <p>Đái tháo đường típ 2 hay tiểu đường tuýp 2 ảnh hưởng đến cách cơ thể sử dụng insulin. Không giống như đái tháo đường típ 1, ở người mắc đái tháo đường típ 2, 
            các tế bào đề kháng insulin, nghĩa là không phản ứng hiệu quả với insulin như trước đây, mặc dù cơ thể vẫn tạo ra insulin. </p>
            <h4 class="blue-text">Đái tháo đường thai kỳ </h4>
            <p>Đái tháo đường thai kỳ hay tiểu đường thai kỳ xảy ra ở phụ nữ mang thai. Đây là giai đoạn cơ thể ít nhạy cảm hơn với insulin. 
            Tuy nhiên, không phải tất cả phụ nữ mang thai đều bị tiểu đường. Bên cạnh đó, bệnh có thể hết sau khi sinh.</p>
            <p>Các dạng bệnh ít phổ biến hơn gồm tiểu đường đơn gene (monogenic diabetes), 
            tiểu đường do xơ nang (cystic fibrosis-related diabetes), do thuốc, tiểu đường do viêm tụy, u tụy, phẫu thuật tụy, v.v…</p>
            <h3>Nguyên Nhân</h3>
            <h5>Nguyên nhân bị tiểu đường là gì?</h5>
            <div class="image-tieuduong">
            <img src="../../img/tieuduong1.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            </div>
            <p> Insulin là hormone (nội tiết tố) được sản sinh bởi tuyến tụy, đóng vai trò giảm lượng đường trong máu bằng cách “mở cửa” cho các phân tử glucose tiến vào
             trong tế bào để cung cấp năng lượng. Ở người bệnh, quá trình này bị cản trở bởi nhiều vấn đề khác nhau.</p>
             <h4>Nguyên nhân tiểu đường típ 1</h4>
             <p> Ở người bị tiểu đường típ 1, hệ miễn dịch của người bệnh sẽ tấn công các tế bào sản xuất insulin trong tuyến tụy, gây ra suy giảm nồng độ hormone này trong cơ thể. Lượng insulin quá thấp sẽ khiến glucose tiếp tục ở lại trong máu thay vì tiến vào tế bào, từ đó gây ra chỉ số đường huyết cao.

                Hiện nay, nguyên nhân chính xác gây bệnh tiểu đường típ 1 là gì vẫn chưa được xác định rõ. Tuy nhiên, một số giả thuyết cho rằng các yếu tố di truyền và môi trường có thể góp phần vào nguyên nhân tiểu đường.</p>
            <h4>Nguyên nhân tiểu đường típ 2 </h4>
            <p> Trong bệnh tiền đái tháo đường và tiểu đường típ 2, các tế bào cơ thể trở nên đề kháng với hoạt động
                 của insulin và tuyến tụy không thể sản xuất đủ insulin để chống lại sự đề kháng này. 
                 Thay vì di chuyển đến các tế bào, glucose sẽ tích tụ trong máu, dẫn đến mức đường huyết tăng.</p>
            <h4>Nguyên nhân tiểu đường thai kỳ </h4>
            <p>Trong thời gian mang thai, nhau thai sẽ tiết hormone để duy trì thai kỳ. Những hormone này khiến các tế bào trong cơ thể đề kháng insulin.
                Thông thường, tuyến tụy sẽ sản xuất đủ insulin để vượt qua sự đề kháng này. Tuy nhiên, đôi khi tuyến tụy vẫn không thể sản xuất kịp. Khi điều này xảy ra, 
                lượng glucose đến các tế bào giảm và mức đường huyết tăng lên, dẫn đến tiểu đường thai kỳ.</p>
            <h2>Chẩn đoán và điều trị</h2>
            <h4> Những phương pháp điều trị bệnh tiểu đường</h4>
            <img src="../../img/tieuduong2.jpg" alt="Hình ảnh người bệnh tiểu đường đang đo đường huyết">
            <p> Ăn uống lành mạnh: Bạn sẽ cần tập trung vào chế độ ăn nhiều trái cây, rau, protein nạc và ngũ cốc nguyên hạt. Đồng thời, cắt giảm chất béo bão hòa, carbohydrate tinh chế và đồ ngọt.</p>
            <p>Hoạt động thể chất: Tập thể dục có thể làm giảm chỉ số đường huyết bằng cách giúp tế bào giảm đề kháng insulin, nhờ đó glucose di chuyển vào các tế bào dễ dàng hơn. </p>
        </div>
        

        <!-- Chủ đề phổ biến -->
       
        <h2>Chủ đề phổ biến</h2>
        <div class="popular-tags">
        <a href="#" class="tag">#tiểu đường</a>
        <a href="#" class="tag">#Chăm Sóc Sức Khỏe</a>
        <a href="#" class="tag">#Dinh Dưỡng</a>
        </div>
                    <!-- Cập nhật và Chia sẻ -->
<div class="update-share">
    <div class="update-time">
        <p>Cập nhật lần cuối: <span class="time">17:16 29/11/2024</span></p>
    </div>

    <div class="share-icons">
        <p>Chia sẻ:</p>
        <a href="https://www.facebook.com/" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/?lang=vi&mx=2" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.pinterest.com/" class="social-icon pinterest"><i class="fab fa-pinterest"></i></a>
   
    </div>
</div>

        </div>
                    
        </div>
        </div>


        <!-- Contact Section -->
        <div class="contact">
            <div class="contact-section">
                <h1> Contact</h1>
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
        <?php include '../layout/chatbot.php'; ?>

        <!-- Footer -->
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
