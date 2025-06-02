<?php

include '../layout/header.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/xemtt.css">

<style>
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        text-align: center;
    }
    .calendar-day {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .calendar-day.today {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }
    .filter-buttons {
    display: flex;
    justify-content: left;
    gap: 10px; /* Khoảng cách giữa các nút */
}

.filter-buttons .btn {
    background-color: #0056b3; /* Xanh dương đậm */
    color: white;
    border: 1px solid #004a9f;
    border-radius: 5px; /* Bo góc */
    padding: 10px 20px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.filter-buttons .btn:hover {
    background-color: #003f87; /* Màu khi hover */
    transform: translateY(-2px); /* Nhấn nút nổi lên một chút */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
}

.filter-buttons .btn:active {
    background-color: #002f66; /* Màu khi bấm nút */
    transform: translateY(0); /* Trả lại trạng thái bình thường */
    box-shadow: none;
}


.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.table-hover tbody tr:hover {
    background-color: #f2f2f2;
}



</style>

<div class="section1">
    <div class="tenChucNang">
        <p class="tenChucNang_cuthe"> LỊCH LÀM VIỆC </p>
    </div>

    <div class="filter-buttons" style="margin-bottom: 20px;">
        <button class="btn btn-secondary" onclick="filterLichLam('ngay')">Ngày</button>
        <button class="btn btn-secondary" onclick="filterLichLam('tuan')">Tuần</button>
        <button class="btn btn-secondary" onclick="filterLichLam('thang')">Tháng</button>
    </div>

    <?php
    session_start();
    $maTaiKhoanBacSi = $_SESSION['id']; // Lấy mã bác sĩ từ session

    include '../myclass/clsxemlichlam.php';
    $p = new xemlichlam();
   
    // Lọc theo chế độ xem: ngày, tuần, tháng
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'tuan'; // Mặc định là tuần
    $sql = "";

    switch ($filter) {
        case 'ngay': // Lịch làm việc trong ngày hiện tại
            $sql = "SELECT ngayLam, caLam 
                    FROM lichlam 
                    WHERE maBacSi = (SELECT maBacSi FROM bacsi WHERE maTaiKhoan = $maTaiKhoanBacSi) 
                    AND ngayLam = CURDATE()";
            $p->xemLichLamViec($sql);
            break;

        case 'tuan': // Lịch làm việc trong tuần hiện tại
            $sql = "SELECT ngayLam, caLam 
                    FROM lichlam 
                    WHERE maBacSi = (SELECT maBacSi FROM bacsi WHERE maTaiKhoan = $maTaiKhoanBacSi) 
                    AND YEARWEEK(ngayLam, 1) = YEARWEEK(CURDATE(), 1)";

            $link = $p->connectdb();
            $ketqua = mysqli_query($link, $sql);

            if ($ketqua && mysqli_num_rows($ketqua) > 0) {
                echo '<table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Thứ Hai</th>
                                <th>Thứ Ba</th>
                                <th>Thứ Tư</th>
                                <th>Thứ Năm</th>
                                <th>Thứ Sáu</th>
                                <th>Thứ Bảy</th>
                                <th>Chủ Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>';

                $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $schedule = [];

                while ($row = mysqli_fetch_array($ketqua)) {
                    $date = DateTime::createFromFormat('Y-m-d', $row['ngayLam']);
                    if ($date !== false) {
                        $weekday = $date->format('l');
                        $schedule[$weekday][] = $row['caLam'];
                    }
                }

                foreach ($daysOfWeek as $day) {
                    echo '<td>';
                    if (isset($schedule[$day])) {
                        foreach ($schedule[$day] as $caLam) {
                            echo $caLam . '<br>';
                        }
                    } else {
                        echo '-';
                    }
                    echo '</td>';
                }

                echo '</tr></tbody></table>';
            } else {
                echo "<p>Không có lịch làm việc trong tuần này.</p>";
            }
            mysqli_close($link);
            break;

        case 'thang': // Lịch làm việc trong tháng hiện tại
            $sql = "SELECT ngayLam, caLam 
                    FROM lichlam 
                    WHERE maBacSi = (SELECT maBacSi FROM bacsi WHERE maTaiKhoan = $maTaiKhoanBacSi) 
                    AND MONTH(ngayLam) = MONTH(CURDATE()) 
                    AND YEAR(ngayLam) = YEAR(CURDATE())";

            $link = $p->connectdb();
            $ketqua = mysqli_query($link, $sql);

            $currentYear = date('Y');
            $currentMonth = date('m');
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
            $firstDayOfMonth = DateTime::createFromFormat('Y-m-d', "$currentYear-$currentMonth-01");
            $startDayOfWeek = $firstDayOfMonth->format('N');

            echo '<div class="calendar-grid">';

            // Hiển thị tiêu đề các ngày trong tuần
            $daysOfWeek = ['Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy', 'Chủ Nhật'];
            foreach ($daysOfWeek as $day) {
                echo '<div class="calendar-day"><strong>' . $day . '</strong></div>';
            }

            // Hiển thị các ô trống trước ngày 1
            for ($i = 1; $i < $startDayOfWeek; $i++) {
                echo '<div class="calendar-day"></div>';
            }

            // Hiển thị các ngày trong tháng
            $schedule = [];
            while ($row = mysqli_fetch_array($ketqua)) {
                $schedule[$row['ngayLam']][] = $row['caLam'];
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $currentDate = "$currentYear-$currentMonth-" . str_pad($day, 2, '0', STR_PAD_LEFT);
                $isToday = ($currentDate == date('Y-m-d')) ? 'today' : '';
                echo "<div class='calendar-day $isToday'>";
                echo $day;

                if (isset($schedule[$currentDate])) {
                    echo '<br>';
                    foreach ($schedule[$currentDate] as $caLam) {
                        echo $caLam . '<br>';
                    }
                }
                echo '</div>';
            }

            echo '</div>';
            mysqli_close($link);
            break;

        default:
            echo "<p>Chế độ xem không hợp lệ!</p>";
            exit;
    }
    ?>


   <?php
            

            // Hiển thị danh sách lịch hẹn
            $sqlLichHen = "SELECT lichhen.ngayDatLich, lichhen.gioDatLich, benhnhan.hoTenDem, benhnhan.ten 
            FROM lichhen 
            INNER JOIN benhnhan ON lichhen.maBenhNhan = benhnhan.maBenhNhan
            WHERE lichhen.maBacSi = (SELECT maBacSi FROM bacsi WHERE maTaiKhoan = $maTaiKhoanBacSi)
            ORDER BY lichhen.ngayDatLich, lichhen.gioDatLich";

            echo '<div class="tenChucNang">';
            echo '<p class="tenChucNang_cuthe">DANH SÁCH LỊCH HẸN</p>';
            echo '</div>';
            echo'<div class="search-container" align="right" style="margin-bottom: 20px;">';
           echo  '<input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">';
           echo  '<button id="searchButton" class="btn btn-primary">Tìm kiếm</button>';
           echo '</div>';

            
            $p->xemDanhSachLichHen($sqlLichHen);
            
    ?>


    <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" id="finishButton" value="Xong">
        </div>
    </div>

<script>
function filterLichLam(filter) {
    window.location.href = '?filter=' + filter;
}
</script>


<?php include '../layout/footer.php'; ?>
