<?php
include '../layout/header.php';
require_once '../myclass/clsHoSoBenhAn.php';

session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }

$hoSoId = $_GET['hoSoId'] ?? null;
if (!$hoSoId) {
    die("Không tìm thấy hồ sơ bệnh án.");
}

$hoSo = new clsHoSoBenhAn();

$hoSoData = $hoSo->layDanhSachHoSoTheoMaHoSo($hoSoId);
$currentRecord = array_filter($hoSoData, fn($item) => $item['maHoSo'] == $hoSoId);

if (empty($currentRecord)) {
    die("Không tìm thấy thông tin hồ sơ.");
}
$currentRecord = array_shift($currentRecord);

$dsThuoc = $hoSo->layDanhSachThuoc();
?>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<script src="../../js/donThuoc.js"></script>

<style>
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

<div class="container mt-5">
    <h1 class="text-center mb-4">Thêm Đơn Thuốc</h1>
    <form id="prescriptionForm" method="POST" action="./xuly/LuuDonThuoc.php">
        <div class="form-section">
            <div class="section-header">Thông Tin Bệnh Nhân</div>
                <input type="hidden" name="hoSoId" value="<?= htmlspecialchars($hoSoId) ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="patientName">Bệnh nhân</label>
                        <input type="text" class="form-control" id="patientName" 
                            value="<?= htmlspecialchars($currentRecord['hoTenDem'] . ' ' . $currentRecord['ten']) ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="doctor">Bác sĩ</label>
                        <input type="text" class="form-control" id="doctor" 
                            value="<?= htmlspecialchars($currentRecord['bsHoTenDem'] . ' ' . $currentRecord['bsTen']) ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="date">Ngày</label>
                        <input type="text" class="form-control" name="ngayKeDon" id="date" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="diagnosis">Chẩn đoán</label>
                        <input type="text" class="form-control" name="chuanDoan" 
                            value="<?= htmlspecialchars($currentRecord['chuanDoan']) ?>" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="diagnosis">Ghi chú</label>
                        <input type="text" class="form-control" name="ghiChu" placeholder="Vui lòng nhập ghi chú">
                    </div>
                </div>
        </div>

        <div class="form-section">
            <div class="section-header">Chi Tiết Đơn Thuốc</div>
                <div id="medicationList">
                    <!-- Template medication item -->
                    <div class="form-row medication-item" data-index="0">
                        <div class="form-group col-md-4">
                            <label for="medicine">Thuốc</label>
                            <select class="form-control" name="medicine[0]" required>
                                <option value="">Chọn thuốc</option>
                                <?php foreach ($dsThuoc as $thuoc): ?>
                                    <option value="<?= htmlspecialchars($thuoc['maThuoc']) ?>">
                                        <?= htmlspecialchars($thuoc['tenThuoc']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usage">Cách dùng</label>
                            <input type="text" class="form-control" name="usage[0]" placeholder="Nhập cách dùng" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="quantity">Số lượng</label>
                            <input type="number" class="form-control" name="quantity[0]" value="1" min="1" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="button" class="btn btn-success btn-add" onclick="addMedication()">+</button>
                    <button type="button" class="btn btn-danger btn-remove" onclick="removeMedication()">-</button>
                </div>
            
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Thêm đơn thuốc</button>
            </div>
        
        </div>
    </form>

</div>
<script src="../../js/donThuoc.js"></script>


<?php include '../layout/footer.php'; ?>
