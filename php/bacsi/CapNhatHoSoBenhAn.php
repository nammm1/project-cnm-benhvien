<?php
include '../layout/header.php';
require_once '../myclass/clsHoSoBenhAn.php';

    session_start();

    // if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    //     die("Bạn không có quyền truy cập vào trang này.");
    // }

    if (!isset($_GET['hoSoId'])) {
        die("Không tìm thấy mã hồ sơ bệnh án.");
    }
    $maBenhAn = intval($_GET['hoSoId']);

    $hoSoBenhAn = new ClsHoSoBenhAn();
    $sqlCheck = "SELECT trangThai, ketLuan FROM hosobenhan WHERE maHoSo = $maBenhAn";
    $hoSoHienTai = $hoSoBenhAn->laydulieu($sqlCheck);

    if (!$hoSoHienTai) {
        die("Không tìm thấy hồ sơ bệnh án.");
    }

    $trangThaiHienTai = $hoSoHienTai[0]['trangThai'];
    $ketLuanHienTai = $hoSoHienTai[0]['ketLuan'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $trangThaiMoi = $_POST['status'];
        $ketLuanMoi = $_POST['conclusion'];
        $sqlUpdate = "UPDATE hosobenhan SET trangThai = '$trangThaiMoi'";

        if ($ketLuanHienTai=='Chưa có kết luận') {
            $sqlUpdate .= ", ketLuan = '$ketLuanMoi'";
        }

        $sqlUpdate .= " WHERE maHoSo = $maBenhAn";
        $result = $hoSoBenhAn->themxoasua($sqlUpdate);

        if ($result) {
            header("Location: HoSoBenhAn.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Có lỗi xảy ra khi cập nhật hồ sơ bệnh án.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Cập Nhật Hồ Sơ Bệnh Án</title>
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4 text-center">Cập Nhật Hồ Sơ Bệnh Án</h3>
    <form method="POST" action="">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="conclusion" class="form-label">Kết luận</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="conclusion" 
                    name="conclusion" 
                    placeholder="Nhập kết luận mới" 
                    <?php if ($ketLuanHienTai!='Chưa có kết luận') echo 'readonly'; ?>
                    value="<?= htmlspecialchars($ketLuanHienTai ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Đang chờ xử lý" <?= $trangThaiHienTai === 'Đang chờ xử lý' ? 'selected' : '' ?>>Đang chờ xử lý</option>
                    <option value="Hoàn Thành" <?= $trangThaiHienTai === 'Hoàn Thành' ? 'selected' : '' ?>>Hoàn thành</option>
                    <option value="Đang chờ xét nghiệm" <?= $trangThaiHienTai === 'Đang chờ xét nghiệm' ? 'selected' : '' ?>>Đang chờ xét nghiệm</option>
                    <option value="Đang khám" <?= $trangThaiHienTai === 'Đang khám' ? 'selected' : '' ?>>Đang khám</option>
                    <option value="Hủy bỏ" <?= $trangThaiHienTai === 'Hủy bỏ' ? 'selected' : '' ?>>Hủy bỏ</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="HoSoBenhAn.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
