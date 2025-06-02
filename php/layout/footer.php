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
<script>
        // Lấy vai trò từ PHP để sử dụng trong JavaScript
        let userRole = "<?php echo isset($_SESSION['vaiTro']) ? $_SESSION['vaiTro'] : ''; ?>";
        document.addEventListener("DOMContentLoaded", function () {
            const backButton = document.getElementById("backButton");
            if (backButton) {
                backButton.onclick = function (event) {
                    event.preventDefault(); // Ngăn chặn hành động mặc định
                    window.history.back(); // Quay lại trang trước
                };
            }
        });

        document.getElementById("finishButton").onclick = function (event) {
            // Kiểm tra vai trò và điều hướng đến trang phù hợp
            event.preventDefault()
            switch (userRole) {
                case 'Bệnh nhân':
                    window.location.href = "../MinhCong/danhChoBenhNhan.php";
                    break;
                case 'Bác sĩ':
                    window.location.href = "../MinhCong/danhChoBacSi.php";
                    break;
                case 'Quản lý':
                    window.location.href = "../MinhCong/danhChoQuanLy.php";
                    break;
                default:
                    alert("Vai trò không hợp lệ!");
                    break;
            }
        };
    
</script>
</html>