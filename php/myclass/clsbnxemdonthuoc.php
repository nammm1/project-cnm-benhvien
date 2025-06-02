<?php
class xemdonthuoc {
    public function connectdb() {
        $con = mysqli_connect("localhost", "root", "", "benhvien");
        if (!$con) {
            die("Không thể kết nối đến database: " . mysqli_connect_error());
        }
        mysqli_set_charset($con, 'utf8');
        return $con;
    }

    public function xemThongTinDonThuoc($maTaiKhoanBenhNhan) {
        $link = $this->connectdb();

        $sql = "
            SELECT 
                benhnhan.maBenhNhan, 
                CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                thuoc.tenThuoc, 
                chitietdonthuoc.soLuong, 
                chitietdonthuoc.cachDung,
                donthuoc.ngayKeDon, 
                hosobenhan.chuanDoan,
                CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS tenBacSi
            FROM taikhoan
            JOIN benhnhan ON taikhoan.maTaiKhoan = benhnhan.maTaiKhoan
            JOIN hosobenhan ON benhnhan.maBenhNhan = hosobenhan.maBenhNhan
            JOIN donthuoc ON hosobenhan.maHoSo = donthuoc.maHoSo
            JOIN chitietdonthuoc ON donthuoc.maDonThuoc = chitietdonthuoc.maDonThuoc
            JOIN thuoc ON chitietdonthuoc.maThuoc = thuoc.maThuoc
            JOIN bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
            WHERE taikhoan.maTaiKhoan = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, 'i', $maTaiKhoanBenhNhan);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Bệnh Nhân</th>
                                <th>Họ Tên</th>
                                <th>Tên Thuốc</th>
                                <th>Số Lượng</th>
                                <th>Cách Dùng</th>
                                <th>Ngày Kê Đơn</th>
                                <th>Chẩn Đoán</th>
                                <th>Tên Bác Sĩ</th>
                            </tr>
                        </thead>
                        <tbody>';
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $count++ . '</td>';
                    echo '<td>' . $row['maBenhNhan'] . '</td>';
                    echo '<td>' . $row['hoTenBenhNhan'] . '</td>';
                    echo '<td>' . $row['tenThuoc'] . '</td>';
                    echo '<td>' . $row['soLuong'] . '</td>';
                    echo '<td>' . $row['cachDung'] . '</td>';
                    echo '<td>' . date('d/m/Y', strtotime($row['ngayKeDon'])) . '</td>';
                    echo '<td>' . $row['chuanDoan'] . '</td>';
                    echo '<td>' . $row['tenBacSi'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo "Không có dữ liệu đơn thuốc.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Lỗi khi chuẩn bị truy vấn: " . mysqli_error($link);
        }
        mysqli_close($link);
    }
}
?>
