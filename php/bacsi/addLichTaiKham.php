<?php
include '../layout/header.php';  
require_once '../myclass/clsLichKham.php';
require_once '../myclass/clsBacSi.php';

session_start();

if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    die("Bạn không có quyền truy cập vào trang này.");
}
$taikhoanId = $_SESSION['id'];
$bacsi = new ClsBacSi();
$sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";

$maBenhNhan = $_GET['maBenhNhan'] ?? null;
if (!$maBenhNhan) {
    die("Không tìm thấy hồ sơ bệnh án.");
}

$maBacSi = $bacsi->laycot($sqlGetMaBacSi);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ngayTaoLichHen = $_POST['ngayTaoLichHen'];
    $ngayDatLich = $_POST['ngayDatLich'];
    $gioDatLich = $_POST['gioDatLich'];
    $maBenhNhan = intval($_POST['maBenhNhan']);
    $maBacSi = intval($_POST['maBacSi']);
    $trangThai = 'Đang xử lý';

    // Lấy ngày hiện tại
    $ngayHienTai = date('Y-m-d');
    $ngayDatLichHen = date('Y-m-d', strtotime($ngayDatLich));
    // Kiểm tra ngày tạo lịch không được nhỏ hơn ngày hiện tại
    if ($ngayTaoLichHen < $ngayHienTai) {
        echo "<div class='alert alert-danger'>Ngày tạo lịch hẹn không được nhỏ hơn ngày hiện tại.</div>";
    }
    else if ($ngayDatLichHen < $ngayHienTai) {
        echo "<div class='alert alert-danger'>Ngày đặt lịch không được nhỏ hơn ngày hiện tại.</div>";
    } 
    else {
        $lichKham = new ClsLichKham();

        // Kiểm tra trùng lặp
        $sqlCheckDuplicate = "SELECT COUNT(*) as count 
                              FROM lichhen 
                              WHERE ngayDatLich = '$ngayDatLich' AND gioDatLich = '$gioDatLich' 
                                AND (maBenhNhan = $maBenhNhan OR maBacSi = $maBacSi)";
        $resultCheck = $lichKham->laycot($sqlCheckDuplicate);

        if ($resultCheck > 0) {
            echo "<div class='alert alert-danger'>Lịch tái khám bị trùng thời gian. Vui lòng chọn thời gian khác.</div>";
        } else {
            // Chèn dữ liệu nếu không trùng
            $sqlInsert = "INSERT INTO lichhen (ngayTaoLichHen, ngayDatLich, gioDatLich, maBenhNhan, maBacSi, trangThai, type) 
                          VALUES ('$ngayTaoLichHen', '$ngayDatLich', '$gioDatLich', $maBenhNhan, $maBacSi, '$trangThai', 'TK')";
            $result = $lichKham->themxoasua($sqlInsert);

            if ($result) {
                echo "<div class='alert alert-success'>Lịch tái khám đã được thêm thành công.</div>";
                header("Location: XemLichTaiKham.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Có lỗi xảy ra khi thêm lịch tái khám.</div>";
            }
        }
    }
}
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

<div class="container mt-5">
    <h3 class="mb-4 text-center">Thêm Lịch Tái Khám</h3>
    <form method="POST" action="">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ngayTaoLichHen" class="form-label">Ngày Tạo Lịch Hẹn</label>
                <input type="date" class="form-control" id="ngayTaoLichHen" name="ngayTaoLichHen" readonly>
            </div>
            <div class="col-md-6">
                <label for="ngayDatLich" class="form-label">Ngày Đặt Lịch</label>
                <input type="date" class="form-control" id="ngayDatLich" name="ngayDatLich" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gioDatLich" class="form-label">Giờ Đặt Lịch</label>
                <input type="time" class="form-control" id="gioDatLich" name="gioDatLich" required>
            </div>
            <div class="col-md-6">
                <label for="maBenhNhan" class="form-label">Mã Bệnh Nhân</label>
                <input type="number" class="form-control" id="maBenhNhan" name="maBenhNhan" value="<?= $maBenhNhan ?>" readonly>
            </div>
        </div>

        <input type="hidden" class="form-control" id="maBacSi" name="maBacSi" value="<?= $maBacSi ?>" readonly>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Thêm Lịch Tái Khám</button>
            <a href="XemLichTaiKham.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ngayTaoLichHen = document.getElementById("ngayTaoLichHen");
        const today = new Date().toISOString().split('T')[0];
        ngayTaoLichHen.value = today;
    });
</script>

<?php include '../layout/footer.php'; ?>
