<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tài Khoản Bác Sĩ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    require_once '../myclass/clsbacsi_va.php';
    $bacsi = new Clsbacsi();

    $limit = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1);

    $totalBacSi = $bacsi->getTotalBacSi();
    $totalPages = ceil($totalBacSi / $limit);

    $page = min($page, $totalPages);

    $offset = ($page - 1) * $limit;
    $dsbacsi = $bacsi->getBacSiByPage($offset, $limit);

    $search = isset($_POST['search']) ? trim($_POST['search']) : '';
    ?>

    <?php require_once '../layout/header.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh sách Tài Khoản Bác Sĩ</h2>

        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tài khoản..." value="<?php echo htmlspecialchars($search); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Họ và Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Số Điện Thoại</th>
                    <th>Giới Tính</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($dsbacsi)) {
                    echo '<tr><td colspan="9" class="text-center">Không tìm thấy kết quả phù hợp.</td></tr>';
                } else {
                    $i = $offset;
                    foreach ($dsbacsi as $account) {
                        if (empty($search) || strpos($account['hoTenDem'], $search) !== false || strpos($account['email'],      $search) !== false) {
                            $i++;
                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo htmlspecialchars($account['hoTenDem'] . ' ' . $account['ten']); ?></td>
                                <td><?php echo htmlspecialchars($account['ngaySinh']); ?></td>
                                <td><?php echo htmlspecialchars($account['soDienThoai']); ?></td>
                                <td><?php echo htmlspecialchars($account['gioiTinh']); ?></td>
                                <td><?php echo htmlspecialchars($account['email']); ?></td>
                                <td><?php echo htmlspecialchars($account['diachi']); ?></td>
                                <td class="text-center">
                                    <?php if ($account['vaiTro'] === 'Bác sĩ Khóa') { ?>
                                        <button class="btn btn-danger  btn-sm">Khóa</button>
                                    <?php } else { ?>
                                        <button class="btn btn-success btn-sm">Hoạt động</button>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="lock_bac_si.php?id=<?= htmlspecialchars($account['maBacSi']); ?>"
                                        class="btn btn-primary btn-sm edit-btn">
                                        Sửa
                                    </a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" tabindex="-1">« PREV</a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">NEXT »</a>
                </li>
            </ul>
        </nav>

    </div>

    <?php require_once '../layout/footer.php'; ?>
</body>

</html>