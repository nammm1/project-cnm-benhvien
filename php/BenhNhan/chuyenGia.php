<?php
	include ("../layout/header.php");
?>
     <style>
        .doctor {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .doctor img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }
        .doctor h3 {
            margin: 0 0 10px;
            color: #0066cc;
        }
        .doctor p {
            margin: 0;
        }
 
        .logo {
            font-size: 24px;
        }
        .user {
            display: flex;
            align-items: center;
        }
        .user-link {
            color: #fff;
            margin-left: 10px;
            text-decoration: none;
        }
        .user-link:hover {
            text-decoration: underline;
        }
  
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #0066cc;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>


   



        <!-- Chuyên mục Chuyên Gia  -->
        <div class="news-section">
            
            <h1 class="news-title" style="text-align: center; padding-top: 15px;"> Chuyên Gia -  Bác Sĩ </h1>
            <div class="divider"></div> <!-- Đường gạch chia cắt -->
                                <!-- Bác sĩ Duy -->
        <div class="doctor">
            <img src="https://i.imgur.com/9WFOAsC.png" alt="Bác sĩ Duy">
            <div>
                <h3>Bác sĩ Phạm Anh Duy</h3>
                <p>Chuyên gia trong lĩnh vực nội khoa với hơn 15 năm kinh nghiệm.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Tuấn -->
        <div class="doctor">
            <img src="https://i.imgur.com/6HJyv5Ab.jpg" alt="Bác sĩ Tuấn">
            <div>
                <h3>Bác sĩ Hà Anh Tuấn</h3>
                <p>Chuyên gia phẫu thuật với nhiều ca thành công đáng ngưỡng mộ.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>

        <!-- Bác sĩ Mạnh -->
        <div class="doctor">
            <img src="https://i.imgur.com/uNCbuUVb.jpg" alt="Bác sĩ Mạnh">
            <div>
                <h3>Bác sĩ Nguyễn Đức Mạnh</h3>
                <p>Chuyên gia y học cổ truyền, kết hợp hiện đại và truyền thống.</p>
                <a href="#">Xem chi tiết </a>
            </div>
        </div>
    
        </div>

        <!-- Footer -->
        <?php include "../layout/footer.php" ?>
        <?php include '../layout/chatbot.php'; ?>
