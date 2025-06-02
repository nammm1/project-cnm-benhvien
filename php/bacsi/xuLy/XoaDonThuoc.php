<?php
require_once '../../myclass/clsdonthuoc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $maDonThuoc = $data['maDonThuoc'] ?? null;

    if ($maDonThuoc) {
        $donThuoc = new Clsdonthuoc();
        $sql = "DELETE FROM DonThuoc WHERE maDonThuoc = $maDonThuoc";
        $result = $donThuoc->themxoasua($sql);

        echo json_encode(['success' => $result]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
