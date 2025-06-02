    <?php
    require_once '../../myclass/clsdonthuoc.php';
    session_start();

    if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
        die("Bạn không có quyền truy cập vào trang này.");
    }

    $hoSoId = $_POST['hoSoId'] ?? null;
    $ngayKeDon = $_POST['ngayKeDon'] ?? null;
    $ghiChu = $_POST['ghiChu']=='' ? null : $_POST['ghiChu'];
    $medicine = $_POST['medicine'] ?? [];
    $usage = $_POST['usage'] ?? [];
    $quantity = $_POST['quantity'] ?? [];

    if (!$hoSoId || !$ngayKeDon || empty($medicine) || empty($usage) || empty($quantity)) {
        die("Thông tin không đầy đủ. Vui lòng kiểm tra lại.");
    }
    $donThuoc = new Clsdonthuoc();

    $sqlInsertDonThuoc = "
        INSERT INTO donthuoc (ngayKeDon, maHoSo, ghiChu)
        VALUES ('$ngayKeDon', $hoSoId, '$ghiChu')
    ";
    if (!$donThuoc->themxoasua($sqlInsertDonThuoc)) {
        die("Lỗi khi thêm đơn thuốc.");
    }

    $maDonThuoc = $donThuoc->laycot("SELECT LAST_INSERT_ID()");

    foreach ($medicine as $index => $maThuoc) {
        $cachDung = $usage[$index] ?? '';
        $soLuong = $quantity[$index] ?? 0;

        if (!$maThuoc || !$cachDung || $soLuong <= 0) {
            die("Thông tin chi tiết đơn thuốc tại index $index không hợp lệ. Vui lòng kiểm tra lại.");
        }

        $sqlInsertChiTiet = "
            INSERT INTO chitietdonthuoc (maDonThuoc, maThuoc, cachDung, soLuong)
            VALUES ($maDonThuoc, $maThuoc, '$cachDung', $soLuong)
        ";
        if (!$donThuoc->themxoasua($sqlInsertChiTiet)) {
            die("Lỗi khi thêm chi tiết đơn thuốc tại index $index.");
        }
    }

    echo '<script>alert("Thêm đơn thuốc thành công!"); window.location.href="../ThemDonThuocThanhCong.php";</script>';
?>