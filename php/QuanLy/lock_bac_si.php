<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Bác Sĩ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php require_once '../layout/header.php'; ?>

    <?php
    require_once '../myclass/clsbacsi_va.php';
    $bacsi = new Clsbacsi();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $info = $bacsi->layThongTinBacSi($id);
    } else {
        echo "<script>alert('Không tìm thấy thông tin bác sĩ!'); window.location.href='danh_sach_bac_si.php';</script>";
        exit;
    }

    if (isset($_POST['btn_update'])) {
        $id = $_POST['id'];
        $hoTenDem = $_POST['hoTenDem'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $soDienThoai = $_POST['soDienThoai'];
        $date = $_POST['ngaySinh'];    
        $gioiTinh = $_POST['gioiTinh'];
        $diachi = $_POST['diachi'];
        $trangThai = $_POST['trangThai']=='inactive' ? 'Bác sĩ Khóa' : 'Bác sĩ';
        $maTaiKhoan = $_POST['maTaiKhoan'];
        
        $bacsi->updateBacSi($info['maBacSi'], $hoTenDem, $ten, $email, $diachi, $soDienThoai, $date, $gioiTinh);
        $result=$bacsi->updateTrongTaiKhoan($maTaiKhoan , $hoTenDem , $ten , $soDienThoai,$trangThai);
        echo "<script>alert('Cập nhật thông tin bác sĩ thành công!'); window.location.href='quan_li_tai_khoan_bac_si.php';</script>";

    }
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Sửa Thông Tin Bác Sĩ</h2>

        <form id="formUpdate" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($info['maBacSi']); ?>">
            <input type="hidden" name="maTaiKhoan" value="<?php echo htmlspecialchars($info['maTaiKhoan']); ?>">

            <div class="form-group">
                <label for="hoTenDem">Họ và tên đệm:</label>
                <input type="text" class="form-control" id="hoTenDem" name="hoTenDem" value="<?php echo htmlspecialchars($info['hoTenDem']); ?>" >
                <span class="text-danger" id="hoTenDemError"></span>
            </div>

            <div class="form-group">
                <label for="ten">Tên:</label>
                <input type="text" class="form-control" id="ten" name="ten" value="<?php echo htmlspecialchars($info['ten']); ?>" >
                <span class="text-danger" id="tenError"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($info['email']); ?>" >
                <span class="text-danger" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="soDienThoai">Số điện thoại:</label>
                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?php echo htmlspecialchars($info['soDienThoai']); ?>" >
                <span class="text-danger" id="soDienThoaiError"></span>
            </div>

            <div class="form-group">
                <label for="ngaySinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo htmlspecialchars($info['ngaySinh']); ?>" >
                <span class="text-danger" id="ngaySinhError"></span>
            </div>

            <div class="form-group">
                <label for="gioiTinh">Giới tính:</label>
                <select class="form-control" id="gioiTinh" name="gioiTinh" >
                    <option value="Nam" <?php if ($info['gioiTinh'] === 'Nam') echo 'selected'; ?>>Nam</option>
                    <option value="Nữ" <?php if ($info['gioiTinh'] === 'Nữ') echo 'selected'; ?>>Nữ</option>
                </select>
                <span class="text-danger" id="gioiTinhError"></span>
            </div>

            <div class="form-group">
                <label for="diachi">Địa chỉ:</label>
                <textarea class="form-control" id="diachi" name="diachi" rows="3" ><?php echo htmlspecialchars($info['diachi']); ?></textarea>
                <span class="text-danger" id="diachiError"></span>
            </div>

            <div class="form-group">
                <label for="trangThai">Trạng thái:</label>
                <select class="form-control" id="trangThai" name="trangThai" >
                    <option value="active" <?php if ($info['trangThai'] === 'active') echo 'selected'; ?>>Hoạt động</option>
                    <option value="inactive" <?php if ($info['trangThai'] === 'inactive') echo 'selected'; ?>>Khóa</option>
                </select>
                <span class="text-danger" id="trangThaiError"></span>
            </div>

            <button type="submit" name="btn_update" class="btn btn-primary">Cập nhật</button>
            <a href="quan_li_tai_khoan_bac_si.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <?php require_once '../layout/footer.php'; ?>

    <script>
        document.getElementById('formUpdate').addEventListener('submit', function (event) {
            let isValid = true;

            // Reset all error messages
            document.getElementById('hoTenDemError').innerText = '';
            document.getElementById('tenError').innerText = '';
            document.getElementById('emailError').innerText = '';
            document.getElementById('soDienThoaiError').innerText = '';
            document.getElementById('ngaySinhError').innerText = '';
            document.getElementById('gioiTinhError').innerText = '';
            document.getElementById('diachiError').innerText = '';
            document.getElementById('trangThaiError').innerText = '';

            const hoTenDem = document.getElementById('hoTenDem').value.trim();
            if (hoTenDem === '') {
                document.getElementById('hoTenDemError').innerText = 'Họ và tên đệm không được để trống.';
                isValid = false;
            }

            const ten = document.getElementById('ten').value.trim();
            if (ten === '') {
                document.getElementById('tenError').innerText = 'Tên không được để trống.';
                isValid = false;
            }

            const email = document.getElementById('email').value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerText = 'Email không hợp lệ.';
                isValid = false;
            }

            const soDienThoai = document.getElementById('soDienThoai').value.trim();
            const phonePattern = /^\d{10,11}$/;
            if (!phonePattern.test(soDienThoai)) {
                document.getElementById('soDienThoaiError').innerText = 'Số điện thoại phải có 10-11 chữ số.';
                isValid = false;
            }

            const ngaySinh = document.getElementById('ngaySinh').value.trim();
            if (ngaySinh === '') {
                document.getElementById('ngaySinhError').innerText = 'Ngày sinh không được để trống.';
                isValid = false;
            }

            const diachi = document.getElementById('diachi').value.trim();
            if (diachi === '') {
                document.getElementById('diachiError').innerText = 'Địa chỉ không được để trống.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
