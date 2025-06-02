<title>Lịch hẹn khám</title>
<?php 
    include '../layout/header.php'; 
    // include '../myclass/clsbenhnhan.php';
    $p=new benhnhan(); 

?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">LỊCH HẸN KHÁM</p>
        </div>
        <!-- <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div> -->
        <!-- <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Ngày tạo</th>
                <th>Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table> -->
        <?php
            $id_benhnhan = $_SESSION['id'];
            $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:5;
            $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
            $offset=($current_page-1)*$inf_per_page;
            $totalsql=mysqli_query($p->connectdb(),"SELECT *
            from lichhen 
            JOIN benhnhan on lichhen.maBenhNhan=benhnhan.maBenhNhan
            WHERE benhnhan.maTaiKhoan = $id_benhnhan");

            $totalsql=$totalsql->num_rows;
            $totalpages=ceil($totalsql/$inf_per_page);


            $p->xemlichhenkham("SELECT concat(benhnhan.hoTenDem,' ',benhnhan.ten) as hoTenBenhNhan, 
            lichhen.ngayDatLich, lichhen.gioDatLich,lichhen.ngayTaoLichHen,
            lichhen.trangThai 
            from lichhen 
            JOIN benhnhan on lichhen.maBenhNhan=benhnhan.maBenhNhan
            WHERE benhnhan.maTaiKhoan = $id_benhnhan
            ORDER BY lichhen.ngayTaoLichHen DESC limit $inf_per_page offset $offset",$current_page,$inf_per_page);
    
        ?>
        <div class="pagination"><?php include 'pagination.php';?></div> <!-- phân trang -->
        
        <div class="button">
        <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
        </div>
    </div>
<?php include '../layout/footer.php'; ?>
