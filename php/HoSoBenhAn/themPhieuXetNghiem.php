<title>Thêm phiếu xét nghiệm</title>
    <?php include '../layout/header.php'; ?>
    <?php
        include '../myclass/clsbacsi_mc.php';
        $p=new bacsi();
    ?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <style>
        #application{
            width: 80%;
            height: auto;
            border-radius: 20px;
            background-color: #F5F5F5;
        }
        .form-card{
            padding: 50px 80px;
        }
    </style>
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">THÊM PHIẾU XÉT NGHIỆM</p>
        </div>
        <div id="application">
            <form class="form-card" method="post" onsubmit="return rangBuocForm()">
                <?php
                    $id_maHoSo=$_REQUEST['id'];
                ?>
            <div class="form-group mb-4">
                    <label class="form-label" for="mahoso">Mã hồ sơ<span style="color: red;">*</span></label>
                    <input type="text" id="txtmahoso" name="txtmahoso" value="<?php echo $id_maHoSo ?>" placeholder="Nhập mã hồ sơ " readonly class="form-control" />    
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="tenloaixetnghiem">Tên loại xét nghiệm <span style="color: red;">*</span></label>
                    <input type="text" id="txttenloaixetnghiem" name="txttenloaixetnghiem" placeholder="Nhập tên loại xét nghiệm " class="form-control" />    
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="ketquaxetnghiem">Kết quả xét nghiệm</label>
                    <input type="text" id="txtketquaxetnghiem" name="txtketquaxetnghiem" placeholder="Nhập kết quả xét nghiệm ( nếu có ) " class="form-control" />    
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="ngayxetnghiem">Ngày xét nghiệm</label>
                    <input type="date" id="date_ngayxetnghiem" name="date_ngayxetnghiem" class="form-control" />    
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="gioxetnghiem">Giờ xét nghiệm</label>
                    <input type="time" id="time_gioxetnghiem" name="time_gioxetnghiemm" class="form-control" />    
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="ngaytaophieu">Ngày tạo phiếu</label>
                    <input type="date" id="date_ngaytaophieu" name="date_ngaytaophieu" class="form-control" />    
                </div>
                <div class="form-group mb-4"> 
                    <label class="form-label">Trạng thái</label>
                    <select class="form-control" name="select" id="select">
                        <option value="Đang xử lý">Đang xử lý</option>
                        <option value="Hoàn thành">Hoàn thành</option>
                        <option value="Hủy bỏ">Hủy bỏ</option>
                    </select>
                </div>
                
                <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
                <input type="submit" name="nut" id="nut" value="Lưu">
                </div>
                <div align="center" class="mt-2">
                    <?php
                        if(isset($_REQUEST['nut'])=='Lưu')
                        {
                            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ cho Việt Nam
                            $txtmahoso=$_REQUEST['txtmahoso'];
                            $txttenloaixetnghiem=$_REQUEST['txttenloaixetnghiem'];
                            $txtketquaxetnghiem=$_REQUEST['txtketquaxetnghiem'];

                            $date_ngayxetnghiem = !empty($_REQUEST['date_ngayxetnghiem']) ? $_REQUEST['date_ngayxetnghiem'] : date('Y-m-d');

                            $time_gioxetnghiem = !empty($_REQUEST['time_gioxetnghiemm']) ? $_REQUEST['time_gioxetnghiemm'] : date('H:i:s');

                            $date_ngaytaophieu = !empty($_REQUEST['date_ngaytaophieu']) ? $_REQUEST['date_ngaytaophieu'] : date('Y-m-d');
                            $select=$_REQUEST['select'];
                            
                            // Kiểm tra dữ liệu
                            $errors = [];
                            if ($date_ngaytaophieu > date('Y-m-d') ) {
                                $errors[] = "Ngày tạo phiếu không được lớn hơn ngày hiện tại.";
                            }
                            else{
                                if(!empty($txttenloaixetnghiem))
                                {
                                    $p->connectdb();
                                    $maLoai=$p->duyetthem_maLoai(" select maLoai
                                                from loaiXetNghiem
                                                where tenLoai like '%$txttenloaixetnghiem%'");
                                    if(!$maLoai=='')
                                    {       
                                        if($p->themxoasua("INSERT INTO phieuxetnghiem(ketQuaXetNghiem, ngayXetNghiem, gioXetNghiem, ngayTaoPhieu, trangThai, maLoai,maHoSo) 
                                                            VALUES ('$txtketquaxetnghiem','$date_ngayxetnghiem','$time_gioxetnghiem','$date_ngaytaophieu','$select','$maLoai','$txtmahoso')")==1)
                                        {
                                            echo '<script>
                                            alert("Thêm thành công.");
                                            window.location="phieuXetNghiem.php";
                                            </script>';        
                                        }
                                        else{
                                            echo '<script>
                                            alert("Thêm không thành công.");
                                            </script>';
                                        }
                                    }
                                    else{
                                        echo '<script>
                                            alert("Không tìm thấy mã loại được nhập.");
                                        </script>';
                                    }
                                    
                                }
                                else
                                {
                                    echo"<script>
                                        alert('Vui lòng nhập đầy đủ thông tin có dấu * !')
                                    </script>";
                                }
                            }
                            
                        }
                    
                    ?>
                </div>
                <script>
                    function rangBuocForm() {
                        // Lấy giá trị từ các trường
                        var ngaySinh = new Date(document.getElementById("date_ngaytaophieu").value);
                        var today = new Date();         
                        // Ràng buộc ngày sinh không được quá ngày hiện tại
                        if (ngaySinh > today) {
                            alert("Ngày tạo phiếu không được lớn hơn ngày hiện tại.");
                            return false;
                        }
                        // Nếu tất cả các ràng buộc đều hợp lệ, cho phép gửi form
                        return true;
                    }
                </script>
            </form>
        </div>
        
        <div class="mt-5">
            <div align="center">
                <h4>Danh sách hồ sơ bệnh nhân</h4>
            </div>
            <form action="" method="post">
            <div class="search-container" align="right" style="margin-bottom: 20px;">
                <input type="text" id="searchInput" name="txtsearch" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
                    <input type="submit" name="nut_search" class="btn btn-primary" value="Tìm kiếm">
                </div>
                <?php
                    $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:10;
                    $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
                    $offset=($current_page-1) * $inf_per_page;
                    $totalsql=mysqli_query($p->connectdb(),"SELECT 
                                    hoSoBenhAn.maHoSo,
                                    CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                                    CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi,
                                    hoSoBenhAn.chuanDoan,
                                    hoSoBenhAn.ketLuan,
                                    hoSoBenhAn.trangThai,
                                    hoSoBenhAn.ngayTaoHoSo
                                FROM hoSoBenhAn
                                JOIN benhnhan ON hoSoBenhAn.maBenhNhan = benhnhan.maBenhNhan
                                JOIN bacsi ON hoSoBenhAn.maBacSi = bacsi.maBacSi");
                    $totalsql=$totalsql->num_rows;
                    $totalpages=ceil($totalsql/$inf_per_page);
                    // search
                    if(!empty($_REQUEST['txtsearch']) && isset($_REQUEST['nut_search'])=='Tìm kiếm')
                    {
                        $p->search_HoSo("SELECT 
                                    hoSoBenhAn.maHoSo,
                                    CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                                    CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi,
                                    hoSoBenhAn.chuanDoan,
                                    hoSoBenhAn.ketLuan,
                                    hoSoBenhAn.trangThai,
                                    hoSoBenhAn.ngayTaoHoSo
                                FROM hoSoBenhAn
                                JOIN benhnhan ON hoSoBenhAn.maBenhNhan = benhnhan.maBenhNhan
                                JOIN bacsi ON hoSoBenhAn.maBacSi = bacsi.maBacSi
                                where CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) like '%".$_REQUEST['txtsearch']."%'
                                ORDER BY hoSoBenhAn.ngayTaoHoSo DESC");
                    }
                    else 
                    {
                        $p->xemdsHoSo("SELECT 
                                    hoSoBenhAn.maHoSo,
                                    CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                                    CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi,
                                    hoSoBenhAn.chuanDoan,
                                    hoSoBenhAn.ketLuan,
                                    hoSoBenhAn.trangThai,
                                    hoSoBenhAn.ngayTaoHoSo
                                FROM hoSoBenhAn
                                JOIN benhnhan ON hoSoBenhAn.maBenhNhan = benhnhan.maBenhNhan
                                JOIN bacsi ON hoSoBenhAn.maBacSi = bacsi.maBacSi
                                where concat(benhnhan.hoTenDem, ' ', benhnhan.ten) like '%".$_REQUEST['txtsearch']."%'
                                ORDER BY hoSoBenhAn.ngayTaoHoSo DESC limit $inf_per_page offset $offset",$inf_per_page,$current_page);
                        echo "<div class='pagination'>";
                            include 'pagination.php';
                        echo"</div>";
                    }
                ?>
                    
            </form>
        </div>

    </div> 
<?php include '../layout/footer.php'; ?>





