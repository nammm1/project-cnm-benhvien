<?php
include '../layout/header.php';  
require_once '../myclass/clsLichLam.php';
require_once '../myclass/clsBacSi.php';

session_start();

if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    die("Bạn không có quyền truy cập vào trang này.");
}


$taikhoanId = $_SESSION['id'];
$bacsi = new ClsBacSi();
$sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";
$maBacSi = $bacsi->laycot($sqlGetMaBacSi);

$today = date('Y-m-d');
$weekday = date('w', strtotime($today));
$saturday = date('Y-m-d', strtotime($today . ' +' . (6 - $weekday) . ' days'));
$sunday = date('Y-m-d', strtotime($today . ' +' . (7 - $weekday) . ' days'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ngayLam = $_POST['ngayLam'];
    $caLam = $_POST['caLam'];

    if ($ngayLam !== $saturday && $ngayLam !== $sunday) {
        echo "<div class='alert alert-danger'>Chỉ được chọn ngày Thứ 7 hoặc Chủ Nhật của tuần hiện tại.</div>";
    } elseif (empty($caLam)) {
        echo "<div class='alert alert-danger'>Vui lòng chọn ca làm.</div>";
    } else {
        $lichLam = new ClsLichLam();

        $sqlCheck = "SELECT * FROM lichlam WHERE ngayLam = '$ngayLam' AND caLam = '$caLam' AND maBacSi = $maBacSi";
        $isDuplicate = $lichLam->kiemtra($sqlCheck);

        if ($isDuplicate) {
            echo "<div class='alert alert-danger'>Lịch làm đã tồn tại. Vui lòng chọn lịch khác.</div>";
        } else {
            $sqlInsert = "INSERT INTO lichlam (ngayLam, caLam, maBacSi) VALUES ('$ngayLam', '$caLam', $maBacSi)";
            $result = $lichLam->themxoasua($sqlInsert);

            if ($result) {
                echo "<div class='alert alert-success'>Lịch làm đã được thêm thành công.</div>";
            } else {
                echo "<div class='alert alert-danger'>Có lỗi xảy ra khi thêm lịch làm.</div>";
            }
        }
    }
}
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

<div class="container mt-5">
    <h3 class="mb-4 text-center">Đăng ký lịch làm</h3>
    <form method="POST" action="">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ngayLam" class="form-label">Ngày làm</label>
                <!-- Chỉ cho chọn từ Thứ 7 đến Chủ Nhật -->
                <input type="date" class="form-control" id="ngayLam" name="ngayLam" 
                       min="<?= $saturday ?>" max="<?= $sunday ?>" required>
            </div>
            <div class="col-md-6">
                <label for="caLam" class="form-label">Ca làm</label>
                <select class="form-control" id="caLam" name="caLam" required>
                    <option value="">Chọn ca làm</option>
                    <option value="Sáng">Buổi Sáng (7h30 - 11h30)</option>
                    <option value="Chiều">Buổi Chiều (13h00 - 16h30)</option>
                    <option value="Tối">Ngoài Giờ (17h00 - 19h30)</option>
                </select>
            </div>
        </div>
        <input type="hidden" class="form-control" id="maBacSi" name="maBacSi" value="<?= $maBacSi ?>" readonly>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Thêm lịch làm</button>
            <a href="HoSoBenhAn.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
