<?php include '../layout/header.php';
?>
<?php
// thiết lập mã hóa
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "benhvien";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý Thêm Lịch Hẹn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $maLichHen = $_POST['maLichHen'];
    $ngayTaoLichHen = $_POST['ngayTaoLichHen'];
    $ngayDatLich = $_POST['ngayDatLich'];
    $gioDatLich = $_POST['gioDatLich'];
    $trangThai = $_POST['trangThai'];
    $maBenhNhan = $_POST['maBenhNhan'];
    $type = $_POST['type'];
    $maBacSi = $_POST['maBacSi'];

    $sql = "INSERT INTO lichhen (maLichHen, ngayTaoLichHen, ngayDatLich, gioDatLich, trangThai, maBenhNhan, Type, maBacSi) 
            VALUES ('$maLichHen', '$ngayTaoLichHen', '$ngayDatLich', '$gioDatLich', '$trangThai', '$maBenhNhan', '$type', '$maBacSi')";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Xử lý Sửa Lịch Hẹn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $maLichHen = $_POST['maLichHen'];
    $ngayTaoLichHen = $_POST['ngayTaoLichHen'];
    $ngayDatLich = $_POST['ngayDatLich'];
    $gioDatLich = $_POST['gioDatLich'];
    $trangThai = $_POST['trangThai'];
    $maBenhNhan = $_POST['maBenhNhan'];
    $type = $_POST['type'];
    $maBacSi = $_POST['maBacSi'];

    $sql = "UPDATE lichhen SET ngayTaoLichHen='$ngayTaoLichHen', ngayDatLich='$ngayDatLich', gioDatLich='$gioDatLich', 
            trangThai='$trangThai', maBenhNhan='$maBenhNhan', Type='$type', maBacSi='$maBacSi' WHERE maLichHen='$maLichHen'";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $conn->error;
    }
}

// Xử lý Xóa Lịch Hẹn
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $maLichHen = $_GET['id'];
    $sql = "DELETE FROM lichhen WHERE maLichHen = '$maLichHen'";

    if (!$conn->query($sql)) {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy danh sách lịch hẹn
$sql = "SELECT * FROM lichhen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Lịch Hẹn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Quản lý Lịch Hẹn</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAppointmentModal">Thêm Lịch Hẹn</button>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Mã Lịch Hẹn</th>
            <th>Ngày Tạo</th>
            <th>Ngày Đặt</th>
            <th>Giờ Đặt</th>
            <th>Trạng Thái</th>
            <th>Mã Bệnh Nhân</th>
            <th>Type</th>
            <th>Mã Bác Sĩ</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['maLichHen'] ?></td>
                <td><?= $row['ngayTaoLichHen'] ?></td>
                <td><?= $row['ngayDatLich'] ?></td>
                <td><?= $row['gioDatLich'] ?></td>
                <td><?= $row['trangThai'] ?></td>
                <td><?= $row['maBenhNhan'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['maBacSi'] ?></td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $row['maLichHen'] ?>" data-toggle="modal" data-target="#editAppointmentModal">Sửa</button>
                    <a href="?action=delete&id=<?= $row['maLichHen'] ?>" class="btn btn-danger btn-sm">Hủy</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal Thêm Lịch Hẹn -->
<div class="modal" id="addAppointmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Lịch Hẹn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="maLichHen">Mã Lịch Hẹn</label>
                        <input type="text" class="form-control" name="maLichHen" required>
                    </div>
                    <div class="form-group">
                        <label for="ngayTaoLichHen">Ngày Tạo</label>
                        <input type="date" class="form-control" name="ngayTaoLichHen" required>
                    </div>
                    <div class="form-group">
                        <label for="ngayDatLich">Ngày Đặt</label>
                        <input type="date" class="form-control" name="ngayDatLich" required>
                    </div>
                    <div class="form-group">
                        <label for="gioDatLich">Giờ Đặt</label>
                        <input type="time" class="form-control" name="gioDatLich" required>
                    </div>
                    <div class="form-group">
                        <label for="trangThai">Trạng Thái</label>
                        <input type="text" class="form-control" name="trangThai" required>
                    </div>
                    <div class="form-group">
                        <label for="maBenhNhan">Mã Bệnh Nhân</label>
                        <input type="text" class="form-control" name="maBenhNhan" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" required>
                    </div>
                    <div class="form-group">
                        <label for="maBacSi">Mã Bác Sĩ</label>
                        <input type="text" class="form-control" name="maBacSi" required>
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

<!-- Modal Sửa Lịch Hẹn -->
<div class="modal" id="editAppointmentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Lịch Hẹn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="maLichHen" id="edit_maLichHen">
                    <div class="form-group">
                        <label for="ngayTaoLichHen">Ngày Tạo</label>
                        <input type="date" class="form-control" name="ngayTaoLichHen" id="edit_ngayTaoLichHen">
                    </div>
                    <div class="form-group">
                        <label for="ngayDatLich">Ngày Đặt</label>
                        <input type="date" class="form-control" name="ngayDatLich" id="edit_ngayDatLich">
                    </div>
                    <div class="form-group">
                        <label for="gioDatLich">Giờ Đặt</label>
                        <input type="time" class="form-control" name="gioDatLich" id="edit_gioDatLich">
                    </div>
                    <div class="form-group">
                        <label for="trangThai">Trạng Thái</label>
                        <input type="text" class="form-control" name="trangThai" id="edit_trangThai">
                    </div>
                    <div class="form-group">
                        <label for="maBenhNhan">Mã Bệnh Nhân</label>
                        <input type="text" class="form-control" name="maBenhNhan" id="edit_maBenhNhan">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" name="type" id="edit_type">
                    </div>
                    <div class="form-group">
                        <label for="maBacSi">Mã Bác Sĩ</label>
                        <input type="text" class="form-control" name="maBacSi" id="edit_maBacSi">
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

        $('#edit_maLichHen').val(id);
        $('#edit_ngayTaoLichHen').val(row.find('td:eq(1)').text());
        $('#edit_ngayDatLich').val(row.find('td:eq(2)').text());
        $('#edit_gioDatLich').val(row.find('td:eq(3)').text());
        $('#edit_trangThai').val(row.find('td:eq(4)').text());
        $('#edit_maBenhNhan').val(row.find('td:eq(5)').text());
        $('#edit_type').val(row.find('td:eq(6)').text());
        $('#edit_maBacSi').val(row.find('td:eq(7)').text());
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include '../layout/footer.php';
?>