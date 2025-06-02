<?php
class Clslichkham {
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


    public function themxoasua($sql) {
        return mysqli_query($this->con, $sql);
    }

    public function layDanhSachLichKham ($maBacSi, $offset, $limit) {
        $link = $this->con;
        $sql = "
            SELECT 
                lichkham.maLichKham,
                CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                benhnhan.soDienThoai,
                CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi
            from lichkham    
            INNER JOIN benhnhan ON lichkham.maBenhNhan = benhnhan.maBenhNhan
            INNER JOIN bacsi on lichkham.maBacSi = bacsi.maBacSi
            WHERE bacsi.maBacSi = '$maBacSi' and lichkham.trangThai != 'Hoàn thành'
            LIMIT $offset, $limit
        ";
        
        $result = mysqli_query($link, $sql);
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            die("Query failed: " . mysqli_error($link));
        }
        return $data;
    }

    public function layTongSoLichKham($maBacSi) {
        $link = $this->con;
        $sql = "
            SELECT COUNT(*) as total
            from lichkham    
            INNER JOIN benhnhan ON lichkham.maBenhNhan = benhnhan.maBenhNhan
            INNER JOIN bacsi on lichkham.maBacSi = bacsi.maBacSi
            WHERE bacsi.maBacSi = '$maBacSi' and lichkham.trangThai != 'Hoàn thành'
        ";
        
        $result = mysqli_query($link, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        }
        return 0;
    }
}
?>
