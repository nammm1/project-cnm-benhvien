<?php include '../layout/header.php'; ?>
    <div class="contact-container1">
        <div class="contact-form-container1">
            <h3>Gửi tin nhắn cho chúng tôi</h3>
            <form action="" method="POST" class="contact-form1" id="contactForm">
                <div class="form-group1">
                    <label for="name">Họ và tên *</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group1">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group1">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="form-group1">
                    <label for="subject">Chủ đề *</label>
                    <select id="subject" name="subject" required>
                        <option value="">-- Chọn chủ đề --</option>
                        <option value="appointment">Đặt lịch khám</option>
                        <option value="inquiry">Thông tin dịch vụ</option>
                        <option value="feedback">Góp ý</option>
                        <option value="other">Khác</option>
                    </select>
                </div>

                <div class="form-group1">
                    <label for="message">Nội dung tin nhắn *</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn-submit1">Gửi tin nhắn</button>
            </form>
        </div>
        <div class="contact-info1">
            <div class="info-section1">
                <h3><i class="fas fa-map-marked-alt"></i> Địa chỉ</h3>
                <p align="center">0123 Some Place</p>
                <div class="map-container1">
                    <!-- Nhúng bản đồ Google Maps ở đây -->
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.743364019996!2d106.68127877503697!3d20.85386358013025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7a9e1d35bbc3%3A0x4b4b2578c196c8c8!2zQuG7h25oIHZp4buHbiBIw6NpIFBow7JuZw!5e0!3m2!1svi!2s!4v1682645632058!5m2!1svi!2s"
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <style>
.contact-container1 {
    width: 100%;
    display: flex; /* Sử dụng flex để sắp xếp hai phần tử */
    flex-direction: column; /* Sắp xếp theo chiều dọc */
    gap: 2rem;
}

.contact-form-container1 {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 100%; /* Đảm bảo rộng hết màn hình */
}

.contact-form-container1 h3 {
    color: #0056b3;
    margin-bottom: 1.5rem;
    text-align: center;
}

.contact-form1 {
    display: grid;
    gap: 1.5rem;
}

.form-group1 {
    display: grid;
    gap: 0.5rem;
    width: 50%; /* Đảm bảo các trường nhập liệu rộng hết */
}

.form-group1 label {
    font-weight: 500;
    color: #333;
    font-size: 1.1rem;
}

.form-group1 input,
.form-group1 select,
.form-group1 textarea {
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    width: 100%; /* Đảm bảo các trường nhập liệu rộng hết */
}

.form-group1 textarea {
    resize: vertical;
}

.btn-submit1 {
    background-color: #28a745;
    color: white;
    padding: 1rem;
    border: none;
    border-radius: 4px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 50%; /* Đảm bảo nút gửi rộng hết */
}

.btn-submit1:hover {
    background-color: #218838;
}

.contact-info1 {
    width: 100%;
}

.info-section1 {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 100%; /* Đảm bảo rộng hết màn hình */
}

.map-container1 {
    margin-top: 1rem;
    border-radius: 10px;
    overflow: hidden;
    width: 100%; /* Đảm bảo bản đồ rộng hết màn hình */
}

.map-container1 iframe {
    width: 100%; /* Đảm bảo iframe bản đồ rộng hết màn hình */
    height: 300px; /* Chiều cao của bản đồ */
}

@media (max-width: 768px) {
    .contact-container1 {
        flex-direction: column; /* Đảm bảo chỉ có một cột trên màn hình nhỏ */
    }
}
</style>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Hiển thị thông báo gửi thành công
    alert('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
    this.reset();
});
</script>

<?php include '../layout/footer.php'; ?>