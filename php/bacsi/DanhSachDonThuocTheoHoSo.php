<?php
include '../layout/header.php';
    require_once '../myclass/clsdonthuoc.php';

    session_start();

    // if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    //     die("Bạn không có quyền truy cập vào trang này.");
    // }

    $hoSoId = $_GET['hoSoId'] ?? null;
    if (!$hoSoId) {
        die("Không tìm thấy hồ sơ bệnh án.");
    }
    $donThuoc = new Clsdonthuoc();

    $limit = 3; 
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;

    $totalRecords = $donThuoc->laycot("
        SELECT COUNT(*) 
        FROM DonThuoc 
        WHERE maHoSo = $hoSoId
    ");
    $totalPages = ceil($totalRecords / $limit);
    $donThuocData = $donThuoc->layDanhSachDonThuocTheoHoSo($hoSoId, $offset, $limit);
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<style>
        .container {
            margin-top: 30px;
        }
        .table {
            width: 100%;
        }
        .table th,
        .table td {
            vertical-align: middle;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
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
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh Sách Đơn Thuốc của Hồ Sơ <?= htmlspecialchars($hoSoId) ?></h3>
    </div>

    <!-- Bảng đơn thuốc -->
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Mã đơn thuốc</th>
                <th>Ngày</th>
                <th>Bác sĩ</th>
                <th>Bệnh nhân</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($donThuocData)) : ?>
                <?php foreach ($donThuocData as $don) : ?>
                    <tr>
                        <td><?= htmlspecialchars($don['maDonThuoc']) ?></td>
                        <td><?= htmlspecialchars($don['ngayKeDon']) ?></td>
                        <td><?= htmlspecialchars($don['tenBacSi']) ?></td>
                        <td><?= htmlspecialchars($don['tenBenhNhan']) ?></td>
                        <td class="action-links">
                            <a href="../bacsi/HienThiDonThuoc.php?id=<?= htmlspecialchars($don['maDonThuoc']) ?>">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu.</td>
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

<?php include '../layout/footer.php'; ?>
