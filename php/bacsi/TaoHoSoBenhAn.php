<?php
include '../layout/header.php';  
// require_once '../myclass/clsLichKham.php';
require_once '../myclass/clsHoSoBenhAn.php';
require_once '../myclass/clslichkham.php';

session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }

if (!isset($_GET['maLichKham'])) {
    die("Không tìm thấy mã lịch khám.");
}
$maLichKham = intval($_GET['maLichKham']);

$lichKham = new ClsLichKham();
$sqlLayLichKham = "SELECT lichkham.maBenhNhan, lichkham.maBacSi FROM lichkham WHERE maLichKham = '$maLichKham'";
$thongTinLichKham = $lichKham->laydulieu($sqlLayLichKham);

if (!$thongTinLichKham) {
    die("Không tìm thấy thông tin lịch khám.");
}   

$ngayHienTai = date('Y-m-d');
$maBenhNhan = $thongTinLichKham[0]['maBenhNhan'];
$maBacSi = $thongTinLichKham[0]['maBacSi'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ngayTao = $_POST['creationDate'];
    $chanDoan = $_POST['diagnosis'];
    $ketLuan = $_POST['conclusion'];
    $trangThai = $_POST['status'];

    if (!$trangThai) {
        $trangThai= 'Đang chờ xử lý';
    }

    if (!$ketLuan) {
        $ketLuan = 'Chưa có kết luận';
    }
    
    $hoSoBenhAn = new ClsHoSoBenhAn();

    $sqlInsert = "INSERT INTO hosobenhan (ngayTaoHoSo, maBenhNhan, maBacSi, chuanDoan, ketLuan, trangThai) VALUES ('$ngayTao', $maBenhNhan, $maBacSi, '$chanDoan', '$ketLuan', '$trangThai')";
    $result = $hoSoBenhAn->themxoasua($sqlInsert);

    if ($result) {
        echo "<div class='alert alert-success'>Hồ sơ bệnh án đã được tạo thành công.</div>";
        $lichKham->themxoasua("UPDATE lichkham SET trangThai = 'Hoàn thành' WHERE maLichKham = $maLichKham");
        header("Location: HoSoBenhAn.php");
    } else {
        echo "<div class='alert alert-danger'>Có lỗi xảy ra khi tạo hồ sơ bệnh án.</div>";
    }
}
?>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

<div class="container mt-5">
    <h3 class="mb-4 text-center">Tạo Hồ Sơ Bệnh Án</h3>
    <form method="POST" action="">
        <input type="hidden" class="form-control" id="doctorId" name="doctorId" value="<?= $maBacSi ?>" readonly>
        <input type="hidden" class="form-control" id="patientCode" name="patientCode" value="<?= $maBenhNhan ?>" readonly>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="creationDate" class="form-label">Ngày tạo</label>
                <input type="date" class="form-control" id="creationDate" name="creationDate" value="<?= $ngayHienTai ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="diagnosis" class="form-label">Chẩn đoán</label>
                <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Nhập chẩn đoán" required>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="conclusion" class="form-label">Kết luận</label>
                <input type="text" class="form-control" id="conclusion" name="conclusion" placeholder="Nhập kết luận">
                
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Trạng thái</label>
                <div class="input-group">
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Chọn trạng thái</option>
                        <option value="Đang chờ xử lý" <?= $trangThaiHienTai === 'Đang chờ xử lý' ? 'selected' : '' ?>>Đang chờ xử lý</option>
                        <option value="Hoàn Thành" <?= $trangThaiHienTai === 'Hoàn Thành' ? 'selected' : '' ?>>Hoàn thành</option>
                        <option value="Đang chờ xét nghiệm" <?= $trangThaiHienTai === 'Đang chờ xét nghiệm' ? 'selected' : '' ?>>Đang chờ xét nghiệm</option>
                        <option value="Đang khám" <?= $trangThaiHienTai === 'Đang khám' ? 'selected' : '' ?>>Đang khám</option>
                        <option value="Hủy bỏ" <?= $trangThaiHienTai === 'Hủy bỏ' ? 'selected' : '' ?>>Hủy bỏ</option>
                    </select>
                </div>
            </div>  

        </div>
            
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tạo Hồ Sơ</button>
            <a href="HoSoBenhAn.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>