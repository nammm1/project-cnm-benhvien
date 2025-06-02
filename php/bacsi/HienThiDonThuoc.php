<?php
include '../layout/header.php';
require_once '../myclass/clsdonthuoc.php';
session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }



$maDonThuoc = $_GET['id'] ?? null;

if (!$maDonThuoc) {
    die("Không tìm thấy mã đơn thuốc.");
}

$donThuoc = new Clsdonthuoc();
$sql = "
    SELECT 
        DonThuoc.ngayKeDon,
        CONCAT(BacSi.hoTenDem, ' ', BacSi.ten) AS tenBacSi,
        CONCAT(BenhNhan.hoTenDem, ' ', BenhNhan.ten) AS tenBenhNhan,
        HoSoBenhAn.chuanDoan AS chuanDoan,
        DonThuoc.ghichu
    FROM DonThuoc
    INNER JOIN HoSoBenhAn ON DonThuoc.maHoSo = HoSoBenhAn.maHoSo
    INNER JOIN BacSi ON HoSoBenhAn.maBacSi = BacSi.maBacSi
    INNER JOIN BenhNhan ON HoSoBenhAn.maBenhNhan = BenhNhan.maBenhNhan
    WHERE DonThuoc.maDonThuoc = $maDonThuoc";

$data = $donThuoc->laydulieu($sql);
if (!$data) {
    die("Không tìm thấy thông tin đơn thuốc.");
}

$details = $data[0];

$sqlChiTiet = "
    SELECT 
        Thuoc.tenThuoc, 
        ChiTietDonThuoc.soLuong, 
        ChiTietDonThuoc.cachDung
    FROM ChiTietDonThuoc
    INNER JOIN Thuoc ON ChiTietDonThuoc.maThuoc = Thuoc.maThuoc
    WHERE ChiTietDonThuoc.maDonThuoc = $maDonThuoc";

$medications = $donThuoc->laydulieu($sqlChiTiet);
?>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<style>
    .container {
        margin-top: 30px;
    }

    .form-section {
        border: 1px solid #ddd;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .section-header {
        font-weight: bold;
        font-size: 1.2em;
        color: #007bff;
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }

    .medication-item {
        padding-bottom: 15px;
        border-bottom: 1px dashed #ddd;
        margin-bottom: 15px;
        background-color: #ffffff;
        padding: 15px;
        border-radius: 5px;
    }

    .btn-add,
    .btn-remove {
        width: 40px;
        height: 40px;
    }
</style>

<div class="container">
    <h1 class="text-center mb-4">Xem Đơn Thuốc</h1>

    <div class="form-section">
        <div class="section-header">Thông Tin Bệnh Nhân</div>
        <form id="editPrescriptionForm">
            <input type="hidden" name="maDonThuoc" value="<?= $maDonThuoc ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patientName">Bệnh nhân</label>
                    <input type="text" class="form-control" id="patientName" name="patientName" 
                           value="<?= htmlspecialchars($details['tenBenhNhan']) ?>" readonly disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="doctor">Bác sĩ</label>
                    <input type="text" class="form-control" id="doctor" name="doctor" 
                           value="<?= htmlspecialchars($details['tenBacSi']) ?>" readonly disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="date">Ngày</label>
                    <input type="text" class="form-control" id="date" name="date" 
                           value="<?= htmlspecialchars($details['ngayKeDon']) ?>" readonly disabled>
                </div>
                
                <div class="form-group col-md-3">
                    <label for="diagnosis">Chẩn đoán</label>
                    <input type="text" class="form-control" id="diagnosis" name="diagnosis" 
                           value="<?= htmlspecialchars($details['chuanDoan']) ?>" disabled>
                </div>

            </div>

            <div class="form-row">
                
            <div class="form-group col-md-12">
                    <label for="diagnosis">Ghi chú</label>
                    <input type="text" class="form-control" id="note" name="note" 
                           value="<?= htmlspecialchars($details['ghichu']) ?>" disabled>
                </div>
            </div>
            
    </div>

    <div class="form-section">
        <div class="section-header">Chi Tiết Đơn Thuốc</div>
        <div id="medicationList">
            <?php foreach ($medications as $medication) : ?>
                <div class="form-row medication-item">
                    <div class="form-group col-md-4">
                        <label for="medicine">Thuốc</label>
                        <input type="text" class="form-control" name="medicine[]" 
                               value="<?= htmlspecialchars($medication['tenThuoc']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="usage">Cách dùng</label>
                        <input type="text" class="form-control" name="usage[]" 
                               value="<?= htmlspecialchars($medication['cachDung']) ?>" disabled>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" name="quantity[]" 
                               value="<?= htmlspecialchars($medication['soLuong']) ?>" readonly disabled>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    </form>
</div>

<?php include '../layout/footer.php'; ?>
