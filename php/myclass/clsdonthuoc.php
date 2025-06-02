<?php
class Clsdonthuoc {
    private $con;

    public function __construct() {
        $this->connectdb();
    }

    private function connectdb() {
        $this->con = mysqli_connect("localhost", "root", "", "benhvien");
        if (!$this->con) {
            die('Không thể kết nối đến database: ' . mysqli_connect_error());
        }
        mysqli_set_charset($this->con, "utf8");
    }

    public function laycot($sql) {
        $ketqua = mysqli_query($this->con, $sql);
        if (!$ketqua) {
            die('Lỗi truy vấn: ' . mysqli_error($this->con));
        }
        $giatri = '';
        if (mysqli_num_rows($ketqua) > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $giatri = $row[0];
            }
        }
        return $giatri;
    }

    public function themxoasua($sql) {
        return mysqli_query($this->con, $sql);
    }

    public function laydulieu($sql) {
        $ketqua = mysqli_query($this->con, $sql);
        if (!$ketqua) {
            die('Lỗi truy vấn: ' . mysqli_error($this->con));
        }
        $data = [];
        if (mysqli_num_rows($ketqua) > 0) {
            while ($row = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function __destruct() {
        if ($this->con) {
            mysqli_close($this->con);
        }
    }

    public function layDanhSachDonThuocTheoHoSo($maHoSo, $offset, $limit)
    {
        $link = $this->con;
        $sql = "
            SELECT 
                DonThuoc.maDonThuoc, 
                DonThuoc.ngayKeDon, 
                CONCAT(BacSi.hoTenDem, ' ', BacSi.ten) AS tenBacSi, 
                CONCAT(BenhNhan.hoTenDem, ' ', BenhNhan.ten) AS tenBenhNhan
            FROM 
                donthuoc
            INNER JOIN 
                HoSoBenhAn ON DonThuoc.maHoSo = HoSoBenhAn.maHoSo
            INNER JOIN 
                BacSi ON HoSoBenhAn.maBacSi = BacSi.maBacSi
            INNER JOIN 
                BenhNhan ON HoSoBenhAn.maBenhNhan = BenhNhan.maBenhNhan
            WHERE HoSoBenhAn.maHoSo = '$maHoSo'
            LIMIT $offset, $limit
        ";
        
        $result = mysqli_query($link, $sql);
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            // In ra lỗi nếu truy vấn thất bại
            die("Query failed: " . mysqli_error($link));
        }
        return $data;
    }


}
?>
