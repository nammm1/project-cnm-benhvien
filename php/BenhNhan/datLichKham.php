<?php

include '../layout/header.php';
// include '../myclass/clsbenhvien.php';
$bv=new hospital();

?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="../../css/xemtt.css">

<div class="section1">
    <div class="tenChucNang">
        <p class="tenChucNang_cuthe">ĐẶT LỊCH KHÁM</p>
    </div>
    <div class="container">
        <?php
            $maTaikhoan=$_SESSION['id'];
            $hoTenDem=$bv->laycot("select hoTenDem from benhnhan where maTaiKhoan=$maTaikhoan");
            $ten=$bv->laycot("select ten from benhnhan where maTaiKhoan=$maTaikhoan");
            $maBenhNhan=$bv->laycot("select maBenhNhan from benhnhan where maTaiKhoan=$maTaikhoan");
        ?> 
        <form action="datLichKham.php" method="POST" class="mt-4">
       
        
            <div class="form-group mb-3">
                <label for="hotendem">Họ tên đệm</label>
                <input type="text" id="txthotendem" name="txthotendem" value="<?php echo $hoTenDem?>" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="ten">Tên </label>
                <input type="text" id="txtten" name="txtten" value="<?php echo $ten?>" class="form-control" required>
            </div>
           
            <div class="form-group mb-3">
                <label for="ngayKham">Chọn ngày khám</label>
                <input type="date" id="ngayKham" name="ngayKham" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="giokham">Chọn giờ khám</label>
                <input type="time" id="giokham" name="giokham" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="giokham">Ngày đặt lịch</label>
                <input type="date" id="ngaydatlich" name="ngaydatlich" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label for="trangthai">Trạng thái</label>
                <select name="select" id="select" class="form-control">
                    <option value="Chưa hoàn thành">Chưa hoàn thành</option>
                    <option value="Hoàn thành">Hoàn thành</option>
                    <option value="Hủy">Hủy</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="select_type">Chọn hình thức</label>
                <select name="select_type" id="select_type" class="form-control">
                    <option value="Mới">Mới</option>
                    <option value="Tái khám">Tái khám</option>
                </select>
            </div>


            

           
            
            <input type="submit" name="nut" value="Đặt lịch" class="btn btn-primary w-100">
            <div align="center">
            <?php
                if(isset($_REQUEST['nut'])=='Đặt lịch')
                {
                    $ngayKham=$_REQUEST['ngayKham'];
                    $giokham=$_REQUEST['giokham'];

                    $ngaydatlich=!empty($_REQUEST['ngaydatlich'])?$_REQUEST['ngaydatlich']:date('Y/m/d') ;
                    $select=$_REQUEST['select'];
                    $select_type=$_REQUEST['select_type'];
                    if($bv->themxoasua("INSERT INTO lichhen(ngayTaoLichHen, ngayDatLich, gioDatLich, trangThai, maBenhNhan, Type) 
                                            VALUES ('$ngaydatlich','$ngayKham','$giokham','$select','$maBenhNhan','$select_type')")==1)
                    {
                        echo"<script>
                            alert('Cập nhập thành công!');
                            window.location='../layout/danhChoBenhNhan.php';
                        </script>";
                    }
                    else{
                        echo"<script>
                            alert('Cập nhập không thành công!');
                        </script>";
                    }
                }
                
                
            ?>
            </div>
            
        </form>
    </div>
</div>
<?php include '../layout/footer.php'; ?>
