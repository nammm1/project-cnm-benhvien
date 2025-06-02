<?php
class ClsLichLam {
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

    // Kiểm tra trùng lặp
    public function kiemtra($sql) {
        $result = $this->con->query($sql);
        return $result->num_rows > 0;
    }
}
?>
