<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bệnh Nhân</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php require_once '../layout/header.php' ?>
    <?php
    require_once '../myclass/clsbacsi_va.php';
    $benhnhan = new Clsbacsi();

    $search = isset($_POST['search']) ? trim($_POST['search']) : '';

    $dsBenhNhan = $benhnhan->getBenhNhan($search);
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh sách Bệnh Nhân</h2>

        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm bệnh nhân..."
                    value="<?php echo htmlspecialchars($search); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>

        <!-- Bảng danh sách bệnh nhân -->
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
                if (empty($dsBenhNhan)) {
                    echo '<tr><td colspan="7" class="text-center">Không tìm thấy kết quả phù hợp.</td></tr>';
                } else {
                    $i = 0;
                    foreach ($dsBenhNhan as $account) {
                        $i++;
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo htmlspecialchars($account['hoTenDem'] . ' ' . $account['ten']); ?></td>
                            <td><?php echo htmlspecialchars($account['ngaySinh']); ?></td>
                            <td><?php echo htmlspecialchars($account['soDienThoai']); ?></td>
                            <td><?php echo htmlspecialchars($account['gioiTinh']); ?></td>
                            <td><?php echo htmlspecialchars($account['email']); ?></td>
                            <td><?php echo htmlspecialchars($account['diaChi']); ?></td>
                            <td class="text-center">
                            <?php if ($account['vaiTro'] === 'Bệnh nhân Khóa') { ?>
                                        <button class="btn btn-danger  btn-sm">Khóa</button>
                                    <?php } else { ?>
                                        <button class="btn btn-success btn-sm">Hoạt động</button>
                                    <?php } ?>
                            </td>
                            <td class="text-center">
                                    <a href="lock_benh_nhan.php?id=<?= htmlspecialchars($account['maBenhNhan']); ?>"
                                        class="btn btn-primary btn-sm edit-btn">
                                        Sửa
                                    </a>
                                </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<?php require_once '../layout/footer.php' ?>

</html>