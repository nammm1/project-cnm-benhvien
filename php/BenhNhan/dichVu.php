<?php include '../layout/header.php'; ?>

<div class="section1">
    
    <div class="services-content">
        <div class="service-category">
            <h2 align="center" style="padding-top: 10px;">Dịch vụ khám bệnh</h2>
            <div class="service-grid">
                <div class="service-item">
                    <img src="../../img/kskdk.jpg" alt="Khám sức khỏe định kỳ">
                    <h3>Khám sức khỏe định kỳ</h3>
                    <p>Dịch vụ khám sức khỏe tổng quát định kỳ, giúp phát hiện sớm các vấn đề về sức khỏe.</p>
                    <a href="#" class="btn-service">Xem chi tiết</a>
                </div>
                <div class="service-item">
                    <img src="../../img/ktstm.jpg" alt="Khám theo chuyên khoa">
                    <h3>Khám theo chuyên khoa</h3>
                    <p>Dịch vụ khám chuyên sâu theo từng chuyên khoa với đội ngũ bác sĩ giàu kinh nghiệm.</p>
                    <a href="#" class="btn-service">Xem chi tiết</a>
                </div>
                <div class="service-item">
                    <img src="../../img/kskthn.jpg" alt="Khám sức khỏe trước hôn nhân">
                    <h3>Khám sức khỏe tiền hôn nhân</h3>
                    <p>Dịch vụ khám sức khỏe toàn diện cho các cặp đôi chuẩn bị kết hôn.</p>
                    <a href="#" class="btn-service">Xem chi tiết</a>
                </div>
            </div>
        </div>

        <div class="service-category">
            <h2 align="center">Dịch vụ xét nghiệm</h2>
            <div class="service-grid">
                <div class="service-item">
                    <img src="../../img/xntyc.jpg" alt="Xét nghiệm tổng yếu cầu">
                    <h3>Xét nghiệm theo yêu cầu</h3>
                    <p>Thực hiện các xét nghiệm theo nhu cầu của khách hàng với độ chính xác cao.</p>
                    <a href="#" class="btn-service">Xem chi tiết</a>
                </div>
                <!-- Thêm các dịch vụ xét nghiệm khác nếu cần -->
            </div>
        </div>
    </div>
</div>

<style>
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 2rem;
}

.service-item {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease;
}

.service-item:hover {
    transform: translateY(-5px);
}

.service-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}

.service-item h3 {
    margin: 1rem 0;
    color: #333;
}

.btn-service {
    display: inline-block;
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 1rem;
    transition: background-color 0.3s ease;
}

.btn-service:hover {
    background-color: #0056b3;
}

.emergency-service {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 10px;
    margin: 2rem;
}

.emergency-content {
    max-width: 800px;
    margin: 0 auto;
}

.emergency-phone {
    font-size: 2rem;
    color: #dc3545;
    font-weight: bold;
}
</style>

<?php include '../layout/footer.php'; ?>
