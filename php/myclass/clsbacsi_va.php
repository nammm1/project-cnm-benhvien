<?php
function connDB() {
    $host = "mysql:host=localhost;dbname=benhvien;charset=utf8";
    $user = "root";
    $pass = "";

    try {
        $conn = new PDO($host, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        return null; 
    }
}

class Clsbacsi {

    public $conn;

    function __construct() {
        $this->conn = connDB();
        if ($this->conn === null) {
            die("Connection to the database failed.");
        }
    }

    public function getbacSi() {
        $sql = "SELECT * FROM bacsi";
        return $this->conn->query($sql)->fetchAll();
    }

    public function getTotalBacSi() {
        $sql = "SELECT COUNT(*) AS total FROM bacsi";
        try {
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetch();
            return $result['total'];
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return 0;
        }
    }

    public function getTotalBenhNhan() {
        $sql = "SELECT COUNT(*) AS total FROM benhnhan";
        try {
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetch();
            return $result['total'];
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return 0;
        }
    }

    public function getBacSiByPage($offset, $limit) {
        $sql = "SELECT * FROM bacsi bs JOIN taikhoan tk on bs.maTaiKhoan=tk.maTaiKhoan LIMIT :offset, :limit";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }
    public function getBenhNhanByPage($offset, $limit) {
        $sql = "SELECT * FROM benhnhan bn JOIN taikhoan tk on bn.maTaiKhoan=tk.maTaiKhoan LIMIT :offset, :limit";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    public function getBenhNhan($search = '') {
        $sql = "SELECT * FROM benhnhan bn JOIN taikhoan tk on bn.maTaiKhoan=tk.maTaiKhoan";
    
        if (!empty($search)) {
            $sql .= " WHERE hoTenDem LIKE :search OR ten LIKE :search OR email LIKE :search";
        }
    
        $stmt = $this->conn->prepare($sql);
    
        if (!empty($search)) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function updateBacSi($maBacSi, $hoTenDem, $ten, $email, $diachi, $soDienThoai, $ngaySinh, $gioiTinh)
{
    $sql = "UPDATE bacsi SET
            hoTenDem = :hoTenDem,
            ten = :ten,
            email = :email,
            diachi = :diachi,
            soDienThoai = :soDienThoai,
            ngaySinh = :ngaySinh,
            gioiTinh = :gioiTinh
            WHERE maBacSi = :maBacSi";

    try {
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':hoTenDem', $hoTenDem);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':diachi', $diachi);
        $stmt->bindParam(':soDienThoai', $soDienThoai);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':maBacSi', $maBacSi);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Lỗi cập nhật: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

    public function updateTrongTaiKhoan($maTaiKhoan , $hoTenDem , $tenTaiKhoan , $soDienThoai, $vaiTro){
        $sql = "UPDATE taikhoan SET
            hoTenDem = :hoTenDem,
            tenTaiKhoan = :tenTaiKhoan,
            soDienThoai = :soDienThoai,
            vaiTro = :vaiTro
            WHERE maTaiKhoan = :maTaiKhoan";
        
        try {
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindParam(':hoTenDem', $hoTenDem);
            $stmt->bindParam(':tenTaiKhoan', $tenTaiKhoan);
            $stmt->bindParam(':soDienThoai', $soDienThoai);
            $stmt->bindParam(':maTaiKhoan', $maTaiKhoan);
            $stmt->bindParam(':vaiTro', $vaiTro);
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Lỗi cập nhật: " . implode(", ", $stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
        

    }
    public function updateBenhNhan($id, $hoTenDem, $ten, $email, $diachi, $soDienThoai, $ngaySinh, $gioiTinh)
{
    $sql = "UPDATE benhnhan SET
            hoTenDem = :hoTenDem,
            ten = :ten,
            email = :email,
            diaChi = :diaChi,
            soDienThoai = :soDienThoai,
            ngaySinh = :ngaySinh,
            gioiTinh = :gioiTinh
            WHERE maBenhNhan = :id";

    try {
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':hoTenDem', $hoTenDem);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':diaChi', $diachi);
        $stmt->bindParam(':soDienThoai', $soDienThoai);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Lỗi cập nhật: " . implode(", ", $stmt->errorInfo());
            return false;
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}



    public function layThongTinBacSi($maBacSi){
        $sql = "SELECT * FROM bacsi WHERE maBacSi = '$maBacSi'";
        return $this->conn->query($sql)->fetch();
    }

    public function layThongTinBenhNhan($id){
        $sql = "SELECT * FROM benhnhan WHERE maBenhNhan = '$id'";
        return $this->conn->query($sql)->fetch();
    }

    
}
?>