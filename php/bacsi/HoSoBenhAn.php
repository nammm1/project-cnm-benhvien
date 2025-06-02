<?php
include '../layout/header.php';

require_once '../myclass/Clsdonthuoc.php';
require_once '../myclass/clsHoSoBenhAn.php';
require_once '../myclass/clsBacSi.php';

session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }

$taikhoanId = $_SESSION['id'];
$bacsi = new ClsBacSi();
$sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";

$maBacSi = $bacsi->laycot($sqlGetMaBacSi);

$hoSo = new clsHoSoBenhAn();
$limit = 5; 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;
$totalPages = ceil($hoSo->layTongSoHoSo($maBacSi) / $limit);
$dsHoSo = $hoSo->layDanhSachHoSo($maBacSi, $limit, $offset);

?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<style>
    .table thead {
        background-color: #d3d3d3;
    }

    .action-links a {
        margin-right: 10px;
        text-decoration: none;
    }

    .action-links a:hover {
        text-decoration: underline;
    }
    
        .pagination .page-item .page-link {
            background-color: #f8f9fa; 
            color: #007bff;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff; 
        }

        .pagination .page-item .page-link:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            background-color: #ffffff;
        }
</style>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh Sách Hồ Sơ Bệnh Án</h3>
    </div>

    <table class="table table-bordered mt-3">
        <thead class="thead-light">
            <tr>
                <th>Ngày Tạo</th>
                <th>Mã Bệnh Nhân</th>
                <th>Họ Tên Bệnh Nhân</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Chuẩn Đoán</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dsHoSo)) : ?>
                <?php foreach ($dsHoSo as $hoSo) : ?>
                    <tr>
                        <td><?= htmlspecialchars($hoSo['ngayTaoHoSo']) ?></td>
                        <td><?= htmlspecialchars($hoSo['maBenhNhan']) ?></td>
                        <td><?= htmlspecialchars($hoSo['hoTenDem'] . ' ' . $hoSo['ten']) ?></td>
                        <td><?= htmlspecialchars($hoSo['namSinh']) ?></td>
                        <td><?= htmlspecialchars($hoSo['gioiTinh']) ?></td>
                        <td><?= htmlspecialchars($hoSo['chuanDoan']) ?></td>
                        <td>
                            <?php if ($hoSo['trangThai'] === 'Đang xử lý') : ?>
                                <button type="button" class="btn btn-warning">Đang xử lý</button>
                            <?php elseif ($hoSo['trangThai'] === 'Hoàn Thành') : ?>
                                <button type="button" class="btn btn-success">Hoàn thành</button>
                            <?php elseif ($hoSo['trangThai'] === 'Hủy bỏ') : ?>
                                <button type="button" class="btn btn-danger">Hủy bỏ</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-warning"><?php echo $hoSo['trangThai'] ?></button>
                            <?php endif; ?>
                        </td>
                        <td class="action-links">
                            <?php if ($hoSo['trangThai'] === 'Đang chờ xử lý') : ?>
                                <a href="ThemDonThuoc.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Đơn Thuốc</a><br>
                                <a href="../HoSoBenhAn/themPhieuXetNghiem.php?id=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Xét Nghiệm</a><br>
                                <a href="CapNhatHoSoBenhAn.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Cập Nhật Hồ Sơ</a><br>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                            <?php elseif ($hoSo['trangThai'] === 'Đang chờ xét nghiệm') : ?>
                                <a href="ThemDonThuoc.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Đơn Thuốc</a><br>
                                <a href="../HoSoBenhAn/themPhieuXetNghiem.php?id=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Xét Nghiệm</a><br>
                                <a href="CapNhatHoSoBenhAn.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Cập Nhật Hồ Sơ</a><br>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                            <?php elseif ($hoSo['trangThai'] === 'Hoàn Thành') : ?>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                                <a href="addLichTaiKham.php?maBenhNhan=<?=$hoSo['maBenhNhan'] ?>">Tạo Lịch Tái Khám</a>
                            <?php elseif ($hoSo['trangThai'] === 'Hủy bỏ') : ?>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                            <?php else : ?>
                                <a href="ThemDonThuoc.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Đơn Thuốc</a><br>
                                <a href="../HoSoBenhAn/themPhieuXetNghiem.php?id=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Xét Nghiệm</a><br>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                                <a href="CapNhatHoSoBenhAn.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Cập Nhật Hồ Sơ</a><br>
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>    
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Không có hồ sơ bệnh án nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
     <!-- Phân trang -->
    <nav aria-label="Page navigation" class="pagination-container">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?hoSoId=<?= htmlspecialchars($hoSoId) ?>&page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?hoSoId=<?= htmlspecialchars($hoSoId) ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?hoSoId=<?= htmlspecialchars($hoSoId) ?>&page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

</div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>
