<title>Chỉnh sửa thông tin</title>
<?php include '../layout/header.php'; ?>

<?php 
    // include '../myclass/clsbenhnhan.php'; 
    // $p=new benhnhan();
?>
<style>
    .section1 {
        width: 80%;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }

    .tenChucNang {
        background-color: #e9ecef;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 20px;
    }

    .tenChucNang_cuthe {
        font-size: 20px;
        font-weight: bold;
        color: #495057;
    }

    form {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 15px;
        align-items: center;
    }

    .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
        font-weight: bold;
    }

    .col-md-2 {
        flex: 0 0 16.666667%;
        max-width: 16.666667%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-md-4 {
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-md-10 {
        flex: 0 0 83.333333%;
        max-width: 83.333333%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-select {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .button {
        text-align: center;
        margin-top: 20px;
    }

    .button input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 10px;
    }

    .button input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .img-center {
        display: flex;
        justify-content: center;
    }

    img {
        max-width: 200px;
        max-height: 200px;
        margin-top: 10px;
    }

    /* CSS cho spinner */
    .loading-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        flex-direction: column; /* Sắp xếp spinner và chữ theo cột */
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin-bottom: 10px; /* Khoảng cách giữa spinner và chữ */
    }
    .loading-text {
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    @media (max-width: 768px) {
        .section1 {
            width: 95%;
        }

        .col-md-2,
        .col-md-4,
        .col-md-10 {
            flex: 0 0 100%;
            max-width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .control-label {
            text-align: left;
        }
    }
</style>

<!-- Thêm div cho spinner -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <p class="loading-text">Đang quét mã độc vui lòng chờ!...</p>
</div>

<div class="section1">
    <div class="tenChucNang">
        <p class="tenChucNang_cuthe">CHỈNH SỬA THÔNG TIN</p>
    </div>
    <?php
        $id_user = $_SESSION['id'];
        $hoTenDem = $p->laycot('select hoTenDem from benhnhan where maTaiKhoan='.$id_user.'');
        $ten = $p->laycot('select ten from benhnhan where maTaiKhoan='.$id_user.'');
        $email = $p->laycot('select email from benhnhan where maTaiKhoan='.$id_user.'');
        $diaChi = $p->laycot('select diaChi from benhnhan where maTaiKhoan='.$id_user.'');
        $soDienThoai = $p->laycot('select soDienThoai from benhnhan where maTaiKhoan='.$id_user.'');
        $ngaySinh = $p->laycot('select ngaySinh from benhnhan where maTaiKhoan='.$id_user.'');
        $gioiTinh = $p->laycot('select gioiTinh from benhnhan where maTaiKhoan='.$id_user.'');
        $anhDaiDien = $p->laycot('select anhDaiDien from benhnhan where maTaiKhoan='.$id_user.''); 
    ?>
    <form id="formcstt" name="formcstt" method="post" enctype="multipart/form-data" onsubmit="showLoading()">
        <div class="row mb-3">
            <label for="txthotendem" class="col-md-2 control-label">Họ tên đệm</label>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?php echo $hoTenDem ?>" id="txthotendem" name="txthotendem" placeholder="Nhập họ tên đệm ..." required>
            </div>
            <label for="txtten" class="col-md-2 control-label">Tên</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="txtten" name="txtten" value="<?php echo $ten ?>" placeholder="Nhập tên ..." required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ngaysinh" class="col-md-2 control-label">Ngày sinh</label>
            <div class="col-md-4">
                <input type="datetime" class="form-control" id="ngaysinh" value="<?php echo $ngaySinh ?>" name="ngaysinh">
            </div>
            <label for="txtsdt" class="col-md-2 control-label">Số điện thoại</label>
            <div class="col-md-4">
                <input type="text" class="form-control" id="txtsdt" name="txtsdt" value="<?php echo $soDienThoai ?>" placeholder="Nhập số điện thoại ...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="gioitinh" class="col-md-2 control-label">Giới tính</label>
            <div class="col-md-4">
                <select class="form-select" id="gioitinh" value='Chọn' name="gioitinh">
                    <option value="Nam" <?php echo $gioiTinh=='Nam'? 'selected':''?>>Nam</option>
                    <option value="Nữ" <?php echo $gioiTinh=='Nữ'? 'selected':''?>>Nữ</option>
                    <option value="Khác" <?php echo $gioiTinh=='Khác'? 'selected':''?>>Khác</option>
                </select>
            </div>
            <label for="txtemail" class="col-md-2 control-label" style="line-height: 20px;">Email</label>
            <div class="col-md-4">
                <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?php echo $email ?>" placeholder="Nhập email ...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="txtdiachi" class="col-md-2 control-label">Địa chỉ</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="txtdiachi" name="txtdiachi" value="<?php echo $diaChi ?>" placeholder="Nhập địa chỉ ...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="file" class="col-md-2 control-label">Ảnh đại diện</label>
            <div class="col-md-10">
                <input type="file" class="form-control" id="file" name="file">
            </div>
        </div>
        <div class="img-center">
            <img src="../../img/anhDaiDien_bn/<?php echo $anhDaiDien; ?>" alt="Ảnh đại diện" style="max-width: 200px; max-height: 200px; margin-top: 10px;"/>
        </div>
        <div class="button">
            <input type="submit" name="nut" id="backButton" value="Quay lại">
            <input type="submit" name="nut" value="Lưu">
        </div>
        <div align='center'>
            <?php
                switch ($_REQUEST['nut']) 
                {
                    case 'Lưu':
                    {
                        $txthotendem = $_POST['txthotendem'];
                        $txtten = $_POST['txtten'];
                        $ngaysinh = $_POST['ngaysinh'];
                        $txtsdt = $_POST['txtsdt'];
                        $gioitinh = $_POST['gioitinh'];
                        $txtemail = $_POST['txtemail'];
                        $txtdiachi = $_POST['txtdiachi'];
                        $file_name = $_FILES['file']['name'];
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $type = $_FILES['file']['type'];
                        $default_name = $_SESSION['id'].".jpg";

                        // Kiểm tra dữ liệu
                        $errors = [];
                        if (new DateTime($ngaysinh) > new DateTime()) {
                            $errors[] = "Ngày sinh không được lớn hơn ngày hiện tại.";
                        }
                        if (!preg_match('/^0\d{7,9}$/', $txtsdt)) {
                            $errors[] = "Số điện thoại không được chứa chữ cái và 8-10 số và đầu từ số 0.";
                        }
                        if (!preg_match('/@gmail\.com$/', $txtemail)) {
                            $errors[] = "Email phải có đuôi @gmail.com.";
                        }

                        // Kiểm tra tệp tải lên với ClamAV
                        if (isset($file_name) && $file_name != '') {
                            if ($type == 'image/jpg' || $type == 'image/png' || $type == 'image/jpeg') {
                                // Quét tệp bằng ClamAV
                                $clamscan_path = '"C:\\Program Files\\ClamAV\\clamscan.exe"';
                                $clamscan_command = $clamscan_path . ' --no-summary ' . escapeshellarg($tmp_name);
                                $output = shell_exec($clamscan_command);
                                // Log đầu ra để kiểm tra
                                echo '<script>alert("Output ClamAV: ' . htmlspecialchars($output) . '");</script>';
                                // Kiểm tra nếu có "FOUND" (tệp độc hại) hoặc $output rỗng/thất bại
                                if ($output === null || strpos($output, 'FOUND') !== false) {
                                    $errors[] = "Tệp chứa mã độc và đã bị chặn.";
                                }
                            } else {
                                $errors[] = "Chỉ nhận file .jpg, .png, .jpeg";
                            }
                        }

                        // Ẩn loading sau khi quét hoàn tất
                        echo '<script>hideLoading();</script>';

                        // Nếu có lỗi, hiển thị thông báo
                        if (!empty($errors)) {
                            for ($i = 0; $i < count($errors); $i++) {
                                echo '<script>alert("' . $errors[$i] . '");</script>';
                            }
                        } else {
                            // Xử lý lưu dữ liệu vào cơ sở dữ liệu
                            if (isset($file_name) && $file_name != '') {
                                if ($p->uploadfile($file_name, $tmp_name, $default_name, "../../img/anhDaiDien_bn")) {
                                    if ($p->themxoasua("UPDATE benhnhan 
                                            SET hoTenDem = '$txthotendem', ten = '$txtten', email = '$txtemail', diaChi = '$txtdiachi', soDienThoai = '$txtsdt', 
                                            ngaySinh = '$ngaysinh', gioiTinh = '$gioitinh', anhDaiDien = '$default_name'
                                            WHERE maTaiKhoan = '$id_user'") == 1) {
                                        if ($p->themxoasua("UPDATE taikhoan 
                                                SET hoTenDem='$txthotendem', tenTaiKhoan='$txtten', soDienThoai='$txtsdt'
                                                WHERE maTaiKhoan='$id_user'") == 1) {
                                            echo '<script>
                                                        alert("Cập nhật thông tin và ảnh thành công");
                                                        window.location.href = "../BenhNhan/chinhSuaThongTin.php";
                                                        </script>';
                                        } else {
                                            echo '<script>alert("Cập nhật thông tin vào tài khoản không thành công");</script>';
                                        }
                                    } else {
                                        echo '<script>alert("Cập nhật thông tin không thành công");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Upload hình không thành công");</script>';
                                    exit; 
                                }
                            } else {
                                if ($p->themxoasua("UPDATE benhnhan 
                                            SET hoTenDem = '$txthotendem', ten = '$txtten', email = '$txtemail', diaChi = '$txtdiachi', soDienThoai = '$txtsdt', 
                                            ngaySinh = '$ngaysinh', gioiTinh = '$gioitinh'
                                            WHERE maTaiKhoan = '$id_user'") == 1) {
                                    if ($p->themxoasua("UPDATE taikhoan 
                                                        SET hoTenDem='$txthotendem', tenTaiKhoan='$txtten', soDienThoai='$txtsdt'
                                                        WHERE maTaiKhoan='$id_user'") == 1) {
                                        echo '<script>alert("Cập nhật thông tin thành công");
                                            window.location.href = "../BenhNhan/chinhSuaThongTin.php";
                                        </script>';
                                    } else {
                                        echo '<script>alert("Cập nhật thông tin vào tài khoản không thành công");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Cập nhật thông tin không thành công");</script>';
                                }
                            }
                        }
                        break;
                    }
                    case 'Quay lại':
                    {
                        echo '<script>
                        window.location="../layout/danhChoBenhNhan.php";
                        </script>';
                        break;
                    }
                }   
            ?>
        </div>
    </form>
</div>

<!-- Thêm JavaScript để điều khiển loading -->
<script>
    function showLoading() {
        document.getElementById('loadingOverlay').style.display = 'flex';
    }

    function hideLoading() {
        document.getElementById('loadingOverlay').style.display = 'none';
    }
</script>

<?php include '../layout/footer.php'; ?>
<?php include '../layout/chatbot.php'; ?>
