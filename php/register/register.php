<?php
session_start();
include("../myclass/clslogin.php");

$p = new login();
$message = ""; // Biến lưu trữ thông báo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = "Bệnh nhân"; // Mặc định là Bệnh nhân

    // Kiểm tra mật khẩu xác nhận
    if ($password === $confirm_password) {
        // Gọi phương thức đăng ký từ lớp login
        $result = $p->register($username, $phone, $password, $role);
        if ($result === true) {
            $message = "Đăng ký thành công!";
            header("refresh:2;url=../login/index.php"); // Chuyển hướng sau 2 giây
            exit;
        } else {
            $message = "Đăng ký thất bại: " . $result;
        }
    } else {
        $message = "Mật khẩu xác nhận không khớp!";
    }
}
?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        /* Thiết lập cơ bản */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F4F8FB; /* Nền xanh nhạt */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container chính của form */
        .form-container {
            width: 400px;
            background-color: #FFFFFF; /* Nền trắng */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng */
            text-align: center;
        }

        /* Logo hoặc tiêu đề */
        .form-header {
            margin-bottom: 20px;
        }

        .form-header img {
            width: 100px; /* Kích thước logo */
            margin-bottom: 10px;
        }

        .form-header h2 {
            font-size: 24px;
            margin: 0;
            color: #2A5368; /* Màu chữ chính */
        }

        /* Nhãn và ô nhập liệu */
        .form-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495E; /* Màu chữ */
        }

        .form-container input[type="text"], 
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #D6E4FF; /* Viền xanh nhẹ */
            border-radius: 5px;
            background-color: #F9FBFC;
            color: #2A5368; /* Chữ trong ô nhập liệu */
            box-sizing: border-box;
        }

        .form-container input[type="text"]::placeholder,
        .form-container input[type="password"]::placeholder {
            color: #A0AEC0; /* Placeholder màu xám nhạt */
        }

        /* Nút bấm */
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #D6E4FF; /* Màu xanh nhạt như yêu cầu */
            color: #2A5368; /* Chữ đậm dễ đọc */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-container button:hover {
            background-color: #BFCDE5; /* Màu xanh đậm hơn khi hover */
        }

        /* Thông báo lỗi */
        .error-message {
            color: #E74C3C; /* Màu đỏ cho lỗi */
            font-size: 14px;
            margin-top: 10px;
        }

        /* Link dưới cùng */
        .form-footer {
            margin-top: 15px;
        }

        .form-footer a {
            color: #2A5368; /* Màu chữ của liên kết */
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
           <!-- Logo mới với màu #D6E4FF -->
           <img src="https://img.icons8.com/ios-filled/100/D6E4FF/hospital-3.png" alt="Logo bệnh viện">
            <h2>Đăng ký tài khoản</h2>
        </div>
        <form method="post">
            <label for="username">Tên tài khoản:</label>
            <input id="username" name="username" type="text" placeholder="Nhập tên tài khoản" required>

            <label for="phone">Số điện thoại:</label>
            <input id="phone" name="phone" type="text" placeholder="Nhập số điện thoại" required>

            <label for="password">Mật khẩu:</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" required>

            <label for="confirm_password">Xác nhận mật khẩu:</label>
            <input id="confirm_password" name="confirm_password" type="password" placeholder="Xác nhận mật khẩu" required>

            <button type="submit">Đăng ký</button>
        </form>
        <div class="error-message">
            <?php echo $message; ?>
        </div>
        <div class="form-footer">
            <p>Đã có tài khoản? <a href="../login/index.php">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>
