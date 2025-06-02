<?php 
include '../layout/header.php';
    require_once '../myclass/clsBacSi.php';
    require_once '../myclass/clslichkham.php';
        
    session_start();

    // if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    //     die("Bạn không có quyền truy cập vào trang này.");
    // }

    $taikhoanId = $_SESSION['id'];
    $bacsi = new ClsBacSi();
    $sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";

    $maBacSi = $bacsi->laycot($sqlGetMaBacSi);
    $lichkham = new Clslichkham();
    $limit = 5;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;
    $totalPages = ceil($lichkham->layTongSoLichKham($maBacSi) / $limit);
    $dsLichKham = $lichkham->layDanhSachLichKham($maBacSi, $offset, $limit);
?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <style>
        .table thead {
            background-color: #d3d3d3;
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


    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Danh Sách Khám Bệnh</h3>
        </div>


        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên bệnh nhân</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dsLichKham as $lichKham) : ?>
                    <tr>
                        <td><?= $lichKham['maLichKham'] ?></td>
                        <td><?= $lichKham['hoTenBenhNhan'] ?></td>
                        <td><?= $lichKham['soDienThoai'] ?></td>
                        <td><?= $lichKham['hoTenBacSi'] ?></td>
                        <td>
                            <a href="../bacsi/TaoHoSoBenhAn.php?maLichKham=<?= $lichKham['maLichKham'] ?>">Tạo hồ sơ bệnh án</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
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