<?php 
    error_reporting(0);
    include ("../myclass/clslogin.php");
    $p = new login();
?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập </title>
    <style>
        /* Thiết lập cơ bản */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F4F8FB; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container chính của form */
        .form-container {
            width: 400px;
            background-color: #FFFFFF; 
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            text-align: center;
        }

        /* Logo hoặc tiêu đề */
        .form-header {
            margin-bottom: 20px;
        }

        .form-header img {
            width: 80px; 
            margin-bottom: 10px;
        }

        .form-header h2 {
            font-size: 24px;
            margin: 0;
            color: #2A5368; 
        }

        /* Nhãn và ô nhập liệu */
        .form-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495E; 
        }

        .form-container input[type="text"], 
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #D6E4FF; 
            border-radius: 5px;
            background-color: #F9FBFC;
            color: #2A5368; 
            box-sizing: border-box;
        }

        .form-container input[type="text"]::placeholder,
        .form-container input[type="password"]::placeholder {
            color: #A0AEC0; 
        }

        /* Nút bấm */
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #D6E4FF; 
            color: #2A5368; 
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-container button:hover {
            background-color: #BFCDE5; 
        }

        /* Thông báo lỗi */
        .error-message {
            color: #E74C3C;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <!-- Logo mới với màu #D6E4FF -->
            <img src="https://img.icons8.com/ios-filled/100/D6E4FF/hospital-3.png" alt="Logo bệnh viện">
            <h2> Đăng Nhập </h2>
        </div>
        <form id="form1" name="form1" method="post">
            <label for="txtten">Số điện thoại:</label>
            <input name="txtten" type="text" id="txtten" placeholder="Nhập số điện thoại" required>

            <label for="txtpass">Mật khẩu:</label>
            <input name="txtpass" type="password" id="txtpass" placeholder="Nhập mật khẩu" required>

            <button type="submit" name="chon" id="chon" value="Đăng nhập">Đăng nhập</button>
        </form>
        <div class="error-message">
            <?php
                if (isset($_REQUEST['chon']) && $_REQUEST['chon'] == 'Đăng nhập') {
                    $user = $_REQUEST['txtten'];
                    $pass = $_REQUEST['txtpass'];
                    if ($user != '' && $pass != '') {
                        if ($p->mylogin($user, $pass) == 0) {
                            echo 'Sai tài khoản hoặc mật khẩu!';    
                        }
                    } else {
                        echo 'Vui lòng nhập đầy đủ thông tin';    
                    }
                }
            ?>
        </div>
        <div class="form-footer">
            <p> Quên mật khẩu ? <a href="quenmk.php"> Quên mật khâủ </a></p>
        </div>
        
        <div class="form-footer">
            <p>Bạn chưa  có tài khoản? <a href="../register/register.php">Đăng Ký</a></p>
        </div>
    </div>
</body>
</html>
