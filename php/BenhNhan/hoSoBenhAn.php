    <title>Hồ sơ bệnh án</title>
    <?php 
        include '../layout/header.php';  
        // include '../myclass/clsbenhnhan.php';
        $p=new benhnhan();
    ?>
    <style>
    /* Section Styles */


.tenChucNang {
    text-align: center;
    margin-bottom: 2rem;
    margin-top: 100px;
    width: 100%;
    height: auto;
    font-size: 20px;
    align-items: center;
}

.tenChucNang_cuthe {
    font-size: 1.8rem;
    color: #0056b3;
    font-weight: bold;
    margin: 0;
    padding-bottom: 0.5rem;
    border-bottom: 3px solid #007bff;
    display: inline-block;
    width: 30%;
    background-color: #D6E4FF;
    text-align: center;
    padding: 20px;
    border-radius: 8px;
}

.them {
    width: 80%;
    text-align: center;
    margin-bottom: 20px;
}

.them button {
    background-color: #D6E4FF;
    font-weight: bold;
}

/* Form Styles */
.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

#formcstt, .table,#formlhk,#formhsba,
#formlhk,#formpxn,#formtpxn,#formspxn,#formlxn {
    text-align: center;
}

.table th {
    background-color: #D6E4FF;
}

.text button[type="button"] {
    font-weight: bold;
}

.button input[type="submit"] {
    width: 120px;
    height: 40px;
    background-color: #D6E4FF; 
    border: none;
    margin: 0px 10px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    border-radius: 8px;
}

.button input[type="submit"]:hover {
    background-color: #008CBA; 
    cursor: pointer;
    color: white;
    font-weight: bold;
}

.button {
    text-align: center;
    margin-top: 50px;
}

input[type="text"],
input[type="datetime"],
input[type="file"],
input[type="time"],
input[type="date"],
select {
    border: none;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    outline-color: #b0c7f4;
}

input:focus {
    outline: none; /* Ẩn outline mặc định nếu dùng box-shadow */
    box-shadow: 0 0 0 3px rgba(155, 203, 255, 0.916); /* Tạo outline lớn hơn */
}


/* Button Styles */



/* Pagination Styles */
.pagination {
    margin-top: 50px;
    display: block;
    text-align: center;
}

.pagination .page_item {
    display: inline; /* Để các nút nằm ngang */
    padding: 5px 10px; /* Khoảng cách bên trong */
    margin: 5px; /* Khoảng cách giữa các nút */
    /* background-color: #007bff; Màu nền */
    color: rgb(0, 0, 0); /* Màu chữ */
    text-decoration: none; /* Bỏ gạch chân */
    border-radius: 5px; /* Bo góc */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
}

.pagination .page_item:hover {
    background-color:#8fa8db; /* Màu nền khi hover */
    color: rgb(255, 255, 255);
}


/* Common Components */
.grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    padding: 2rem;
}

.card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

/* Table Styles */
.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem 0;
}

th, td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

th {
    background-color: #f8f9fa;
    font-weight: bold;
}

tr:hover {
    background-color:rgb(185, 188, 190);
}




        
    </style>
    <div class="section1">

        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">HỒ SƠ BỆNH ÁN</p>
        </div> 
        <!-- <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div> -->
        <!-- <div class="date-filter" align="right" style="margin-bottom: 20px;">
            <label for="startDate" class="form-label">Từ ngày:</label>
            <input type="date" id="startDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <label for="endDate" class="form-label">Đến ngày:</label>
            <input type="date" id="endDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <button id="filterButton" class="btn btn-primary">Lọc</button>
        </div> -->
        <!-- <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Bác sĩ khám</th>
                <th>Chuẩn đoán</th>
                <th>Kết luận</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
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
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table> -->
        <?php
            $id_benhnhan = $_SESSION['id'];
            //số phần tử mỗi trang
            $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:5;
            // đặt trang gốc
            $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
            // công thức tính cho offset (bắt đầu từ 0)
            $offset=($current_page-1)*$inf_per_page;
            $totalsql=mysqli_query($p->connectdb(),"SELECT *
                                FROM hosobenhan
                                JOIN benhnhan ON hosobenhan.maBenhNhan = benhnhan.maBenhNhan
                                JOIN bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
                                LEFT JOIN phieuxetnghiem ON hosobenhan.maHoSo = phieuxetnghiem.maHoSo
                                LEFT JOIN loaixetnghiem ON phieuxetnghiem.maLoai = loaixetnghiem.maLoai
                                WHERE benhnhan.maTaiKhoan = $id_benhnhan");
            $totalsql=$totalsql->num_rows;
            //ceil làm tròn 1.5 ==> 2
            $totalpages=ceil($totalsql/$inf_per_page);
            //Hàm này sẽ in ra giá trị của biến $totalsql, cho phép bạn xem số lượng hồ sơ bệnh án đã tìm thấy.
            //var_dump($totalsql);exit;

            $p->xemHoSoBenhAn("SELECT 
                                CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                                CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi,
                                hosobenhan.chuanDoan,
                                loaixetnghiem.tenLoai,
                                hosobenhan.ketLuan,
                                hosobenhan.trangThai,
                                hosobenhan.ngayTaoHoSo
                            FROM hosobenhan
                            JOIN benhnhan ON hosobenhan.maBenhNhan = benhnhan.maBenhNhan
                            JOIN bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
                            LEFT JOIN phieuxetnghiem ON hosobenhan.maHoSo = phieuxetnghiem.maHoSo
                            LEFT JOIN loaixetnghiem ON phieuxetnghiem.maLoai = loaixetnghiem.maLoai
                            WHERE benhnhan.maTaiKhoan = $id_benhnhan
                            ORDER BY hoSoBenhAn.ngayTaoHoSo DESC limit $inf_per_page offset $offset;
                            ",$current_page,$inf_per_page);
    
        ?>
        
        <div class="pagination"><?php include 'pagination.php';?></div> <!-- phân trang -->
        
        <div class="button">
        <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
        </div>
    </div>
<?php include '../layout/footer.php'; ?>
