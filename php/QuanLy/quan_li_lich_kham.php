<?php include '../layout/header.php'; ?>
<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benhvien";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý Thêm Lịch Khám
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $maLichKham = $_POST['maLichKham'];
    $ngayKham = $_POST['ngayKham'];
    $gioKham = $_POST['gioKham'];
    $ngayTaoLich = $_POST['ngayTaoLich'];
    $trangThai = $_POST['trangThai'];
    $maBacSi = $_POST['maBacSi'];
    $maLichHen = $_POST['maLichHen'];
    $maBenhNhan = $_POST['maBenhNhan'];

    $sql = "INSERT INTO lichkham (maLichKham, ngayKham, gioKham, ngayTaoLich, trangThai, maBacSi, maLichHen, maBenhNhan) 
            VALUES ('$maLichKham', '$ngayKham', '$gioKham', '$ngayTaoLich', '$trangThai', '$maBacSi', '$maLichHen', '$maBenhNhan')";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Xử lý Sửa Lịch Khám
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $maLichKham = $_POST['maLichKham'];
    $ngayKham = $_POST['ngayKham'];
    $gioKham = $_POST['gioKham'];
    $ngayTaoLich = $_POST['ngayTaoLich'];
    $trangThai = $_POST['trangThai'];
    $maBacSi = $_POST['maBacSi'];
    $maLichHen = $_POST['maLichHen'];
    $maBenhNhan = $_POST['maBenhNhan'];

    $sql = "UPDATE lichkham SET ngayKham='$ngayKham', gioKham='$gioKham', ngayTaoLich='$ngayTaoLich', 
            trangThai='$trangThai', maBacSi='$maBacSi', maLichHen='$maLichHen', maBenhNhan='$maBenhNhan' 
            WHERE maLichKham='$maLichKham'";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $conn->error;
    }
}

// Xử lý Xóa Lịch Khám
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $maLichKham = $_GET['id'];
    $sql = "DELETE FROM lichkham WHERE maLichKham = '$maLichKham'";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy danh sách lịch khám
$sql = "SELECT * FROM lichkham";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Lịch Khám</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Quản lý Lịch Khám</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAppointmentModal">Thêm Lịch Khám</button>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Mã Lịch Khám</th>
            <th>Ngày Khám</th>
            <th>Giờ Khám</th>
            <th>Ngày Tạo Lịch</th>
            <th>Trạng Thái</th>
            <th>Mã Bác Sĩ</th>
            <th>Mã Lịch Hẹn</th>
            <th>Mã Bệnh Nhân</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['maLichKham'] ?></td>
                <td><?= $row['ngayKham'] ?></td>
                <td><?= $row['gioKham'] ?></td>
                <td><?= $row['ngayTaoLich'] ?></td>
                <td><?= $row['trangThai'] ?></td>
                <td><?= $row['maBacSi'] ?></td>
                <td><?= $row['maLichHen'] ?></td>
                <td><?= $row['maBenhNhan'] ?></td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $row['maLichKham'] ?>" data-toggle="modal" data-target="#editAppointmentModal">Sửa</button>
                    <a href="?action=delete&id=<?= $row['maLichKham'] ?>" class="btn btn-danger btn-sm">Hủy</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal Thêm Lịch Khám -->
<div class="modal" id="addAppointmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Lịch Khám</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="maLichKham">Mã Lịch Khám</label>
                        <input type="number" class="form-control" name="maLichKham" required>
                    </div>
                    <div class="form-group">
                        <label for="ngayKham">Ngày Khám</label>
                        <input type="date" class="form-control" name="ngayKham" required>
                    </div>
                    <div class="form-group">
                        <label for="gioKham">Giờ Khám</label>
                        <input type="time" class="form-control" name="gioKham" required>
                    </div>
                    <div class="form-group">
                        <label for="ngayTaoLich">Ngày Tạo Lịch</label>
                        <input type="date" class="form-control" name="ngayTaoLich" required>
                    </div>
                    <div class="form-group">
                        <label for="trangThai">Trạng Thái</label>
                        <input type="text" class="form-control" name="trangThai" required>
                    </div>
                    <div class="form-group">
                        <label for="maBacSi">Mã Bác Sĩ</label>
                        <input type="number" class="form-control" name="maBacSi" required>
                    </div>
                    <div class="form-group">
                        <label for="maLichHen">Mã Lịch Hẹn</label>
                        <input type="number" class="form-control" name="maLichHen" required>
                    </div>
                    <div class="form-group">
                        <label for="maBenhNhan">Mã Bệnh Nhân</label>
                        <input type="number" class="form-control" name="maBenhNhan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Sửa Lịch Khám -->
<div class="modal" id="editAppointmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Lịch Khám</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="maLichKham" id="edit_maLichKham">
                    <div class="form-group">
                        <label for="ngayKham">Ngày Khám</label>
                        <input type="date" class="form-control" name="ngayKham" id="edit_ngayKham">
                    </div>
                    <div class="form-group">
                        <label for="gioKham">Giờ Khám</label>
                        <input type="time" class="form-control" name="gioKham" id="edit_gioKham">
                    </div>
                    <div class="form-group">
                        <label for="ngayTaoLich">Ngày Tạo Lịch</label>
                        <input type="date" class="form-control" name="ngayTaoLich" id="edit_ngayTaoLich">
                    </div>
                    <div class="form-group">
                        <label for="trangThai">Trạng Thái</label>
                        <input type="text" class="form-control" name="trangThai" id="edit_trangThai">
                    </div>
                    <div class="form-group">
                        <label for="maBacSi">Mã Bác Sĩ</label>
                        <input type="number" class="form-control" name="maBacSi" id="edit_maBacSi">
                    </div>
                    <div class="form-group">
                        <label for="maLichHen">Mã Lịch Hẹn</label>
                        <input type="number" class="form-control" name="maLichHen" id="edit_maLichHen">
                    </div>
                    <div class="form-group">
                        <label for="maBenhNhan">Mã Bệnh Nhân</label>
                        <input type="number" class="form-control" name="maBenhNhan" id="edit_maBenhNhan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.edit-btn').click(function () {
        const id = $(this).data('id');
        const row = $(this).closest('tr');

        $('#edit_maLichKham').val(id);
        $('#edit_ngayKham').val(row.find('td:eq(1)').text());
        $('#edit_gioKham').val(row.find('td:eq(2)').text());
        $('#edit_ngayTaoLich').val(row.find('td:eq(3)').text());
        $('#edit_trangThai').val(row.find('td:eq(4)').text());
        $('#edit_maBacSi').val(row.find('td:eq(5)').text());
        $('#edit_maLichHen').val(row.find('td:eq(6)').text());
        $('#edit_maBenhNhan').val(row.find('td:eq(7)').text());
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../layout/footer.php'; ?>

