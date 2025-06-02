
<?php include '../layout/header.php'; ?>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/xemtt.css">
<div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">THÔNG TIN BỆNH NHÂN </p>
        </div>
        
        <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div>


    <?php
    // Lấy mã tài khoản của bác sĩ từ session
        $maTaiKhoanBacSi = $_SESSION['id'];

    // Bao gồm class xử lý
        include '../myclass/clsxembenhnhan.php'; 

    // Tạo đối tượng xử lý bệnh nhân
        $p = new xembenhnhan();

    // Câu SQL lấy thông tin bệnh nhân dựa vào tài khoản bác sĩ
        $sql = "
            SELECT benhnhan.*, 
             lichkham.ngayKham, 
            lichkham.gioKham
            FROM lichkham
            JOIN benhnhan ON lichkham.maBenhNhan = benhnhan.maBenhNhan
            WHERE lichkham.maBacSi = (SELECT maBacSi FROM bacsi WHERE maTaiKhoan = $maTaiKhoanBacSi)
        ";
    ?>

    <?php
    // Hiển thị thông tin bệnh nhân
    $p->xemThongTinBenhNhan($sql);
    ?>

    <div class="button">
        <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
        <input type="submit" name="nut" id="finishButton" value="Xong">
    </div>
    
</div>

<?php include '../layout/footer.php'; ?>