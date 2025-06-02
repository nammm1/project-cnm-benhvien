<?php
    error_reporting(0);
    include '../myclass/clsbenhvien.php';
    $p=new hospital();
?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Mật Khẩu</title>
    
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
            <img src="https://img.icons8.com/ios-filled/100/D6E4FF/hospital-3.png" alt="Logo bệnh viện">
            <h2>Cập Nhật Mật Khẩu</h2>
        </div>
        <form method="POST">
            <label for="maduphong">Nhập mã dự phòng:</label>
            <input name="txtmaduphong" type="text" id="txtmaduphong" placeholder="Nhập mã dự phòng" required>
            <label for="txtnewpass">Mật khẩu mới:</label>
            <input name="txtnewpass" type="password" id="txtnewpass" placeholder="Nhập mật khẩu mới" required>


              <button type="submit" name="nut" id="nut" value="Cập nhật mật khẩu ">Cập nhật mật khẩu </button>
            <div align="center">
                <?php
                    if(isset($_REQUEST['nut'])=="Cập nhật mật khẩu")
                    {
                        $maDuPhong=$_REQUEST['txtmaduphong'];
                        $txtnewpass=$_REQUEST['txtnewpass'];
                        $maDuPhong_db=$p->laycot("select maDuPhong from taikhoan where maDuPhong='$maDuPhong'");
                        if(isset($maDuPhong) && $maDuPhong=$maDuPhong_db)
                        {   
                            $txtnewpass=md5($txtnewpass);
                            if($p->themxoasua("UPDATE taikhoan
                                                    SET password='$txtnewpass'
                                                    WHERE maDuPhong='$maDuPhong'")==1)
                            {
                                echo "<script>alert('Đổi mật khẩu thành công');
                                                window.location='index.php';
                                        </script>";
                            }
                            
                        }
                        else{
                            echo 'mã dự phòng ko tồn tại';
                        }
                    }
                ?>
            </div>
            
        </form>

        
    </div>
</body>
</html>
