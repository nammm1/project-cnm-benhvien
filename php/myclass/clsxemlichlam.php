<?php
class xemlichlam {
    // Kết nối cơ sở dữ liệu
    public function connectdb() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "benhvien";

        $link = mysqli_connect($server, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Set mã hóa UTF-8 cho kết nối
        mysqli_set_charset($link, 'utf8');
        return $link;
    }

    // Hiển thị lịch làm việc theo ngày/tuần/tháng
    public function xemLichLamViec($sql) {
        $link = $this->connectdb();
        $ketqua = mysqli_query($link, $sql);
    
        if ($ketqua && mysqli_num_rows($ketqua) > 0) {
            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày Làm</th>
                            <th>Thứ</th>
                            <th>Ca Làm</th>
                        </tr>
                    </thead>
                    <tbody>';
    
            $count = 1;
            while ($row = mysqli_fetch_array($ketqua)) {
                $ngayLam = $row['ngayLam'];
                $caLam = $row['caLam'];
    
                // Format ngày làm
                $format_ngayLam = 'Chưa rõ';
                $thuTrongTuan = 'Không xác định';
                if ($ngayLam) {
                    $date_ngayLam = DateTime::createFromFormat('Y-m-d', $ngayLam);
                    if ($date_ngayLam !== false) {
                        $format_ngayLam = $date_ngayLam->format('d/m/Y');
                        $thuTrongTuan = $date_ngayLam->format('l'); // Lấy thứ
                    }
                }
    
                // Dịch thứ sang tiếng Việt
                $thuTiengViet = [
                    'Monday' => 'Thứ Hai',
                    'Tuesday' => 'Thứ Ba',
                    'Wednesday' => 'Thứ Tư',
                    'Thursday' => 'Thứ Năm',
                    'Friday' => 'Thứ Sáu',
                    'Saturday' => 'Thứ Bảy',
                    'Sunday' => 'Chủ Nhật'
                ];
                $thuTrongTuan = isset($thuTiengViet[$thuTrongTuan]) ? $thuTiengViet[$thuTrongTuan] : $thuTrongTuan;
    
                // Hiển thị thông tin
                echo '<tr>';
                echo '<td>' . $count . '</td>';
                echo '<td>' . $format_ngayLam . '</td>';
                echo '<td>' . $thuTrongTuan . '</td>';
                echo '<td>' . $caLam . '</td>';
                echo '</tr>';
                $count++;
            }
    
            echo '</tbody></table>';
        } else {
            echo "<p>Không có dữ liệu lịch làm việc.</p>";
        }
    
        mysqli_close($link);
    }
    

    public function xemDanhSachLichHen($sql) {
        $link = $this->connectdb();
        $ketqua = mysqli_query($link, $sql);
    
        if ($ketqua && mysqli_num_rows($ketqua) > 0) {
            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Bệnh Nhân</th>
                            <th>Ngày Đặt Lịch</th>
                            <th>Giờ Đặt Lịch</th>
                          
                        </tr>
                    </thead>
                    <tbody>';
    
            $count = 1;
            while ($row = mysqli_fetch_array($ketqua)) {
                $ngayDatLich = $row['ngayDatLich'];
                $gioDatLich = $row['gioDatLich'];
                $tenBenhNhan = $row['hoTenDem'] . ' ' . $row['ten'];
    
                // Format ngày đặt lịch
                $format_ngayDatLich = 'Chưa rõ';
                if ($ngayDatLich) {
                    $date_ngayDatLich = DateTime::createFromFormat('Y-m-d', $ngayDatLich);
                    if ($date_ngayDatLich !== false) {
                        $format_ngayDatLich = $date_ngayDatLich->format('d/m/Y');
                    }
                }
    
                echo '<tr>';
                echo '<td>' . $count . '</td>';
                echo '<td>' . $tenBenhNhan . '</td>';
                echo '<td>' . $format_ngayDatLich . '</td>';
                echo '<td>' . $gioDatLich . '</td>';
              
                echo '</tr>';
                $count++;
            }
    
            echo '</tbody></table>';
        } else {
            echo "<p>Không có lịch hẹn.</p>";
        }
    
        mysqli_close($link);
    }
    
}
?>
