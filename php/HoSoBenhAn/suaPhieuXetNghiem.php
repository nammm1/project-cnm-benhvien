<title>Sửa phiếu xét nghiệm</title>
    <?php include '../layout/header.php'; ?>
    <?php
        include '../myclass/clsbacsi_mc.php';
        $p=new bacsi();
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <style>
        #application{
            width: 80%;
            height: auto;
            border-radius: 20px;
            background-color: #F5F5F5;
        }
        .form-card{
            padding: 50px 10px;
        }
    </style>
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">SỬA PHIẾU XÉT NGHIỆM</p>
        </div>
        <div id="application">
            <form class="form-card" method="post">
                <?php
                    $id_sua=$_REQUEST['id_sua'];
                    $maPhieu=$p->laycot("select maPhieu from phieuxetnghiem where maPhieu='$id_sua'");
                    $hoTenBenhNhan=$p->laycot("SELECT concat(bn.hoTenDem, ' ', bn.ten) as  hoTenBenhNhan
                                    FROM loaixetnghiem lxn
                                        JOIN phieuxetnghiem pxn on lxn.maLoai= pxn.maLoai
                                        JOIN hosobenhan hsbn on pxn.maHoSo = hsbn.maHoSo
                                        JOIN benhnhan bn on hsbn.maBenhNhan=bn.maBenhNhan
                                        where pxn.maPhieu='$id_sua'");
                    $tenLoaiXetNghiem=$p->laycot("SELECT lxn.tenLoai
                                                FROM phieuxetnghiem  pxn 
                                                    JOIN loaixetnghiem lxn on pxn.maLoai=lxn.maLoai
                                                WHERE pxn.maPhieu='$id_sua'");
                    $ketquaxetnghiem=$p->laycot("SELECT ketQuaXetNghiem 
                                                FROM phieuxetnghiem
                                                WHERE maPhieu='$id_sua'");
                    $ngayXetNghiem=$p->laycot("SELECT ngayXetNghiem 
                                                FROM phieuxetnghiem
                                                WHERE maPhieu='$id_sua'");
                    $gioXetNghiem=$p->laycot("SELECT gioXetNghiem 
                                                FROM phieuxetnghiem
                                                WHERE maPhieu='$id_sua'");
                    $ngayTaoPhieu=$p->laycot("SELECT ngayTaoPhieu 
                                                FROM phieuxetnghiem
                                                WHERE maPhieu='$id_sua'");
                    $trangThai=$p->laycot("SELECT trangThai 
                                                FROM phieuxetnghiem
                                                WHERE maPhieu='$id_sua'");
                ?>
                <div class="row justify-content-between text-center">
                    <div class="form-group col-12"> 
                        <label class="form-control-label col-2 mb-4 text-center">Mã phiếu</label> 
                        <input type="text" id="txtmaphieu" class="col-9" name="txtmaphieu" value="<?php echo $maPhieu?>" placeholder="Mã phiếu" readonly> 
                    </div>
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Họ và tên</label> 
                        <input type="text" id="txthoten" class="col-9" name="txthoten" value="<?php echo $hoTenBenhNhan?>" placeholder="Họ và tên" readonly> 
                    </div>
                </div>
                <div class="row justify-content-between text-center">
                    <div class="form-group col-sm-12"> 
                        <label class="form-control-label col-2 mb-4 text-center">Tên loại xét nghiệm</label> 
                        <input type="text" id="txtloaixetnghiem" class="col-9" name="txtloaixetnghiem" value="<?php echo $tenLoaiXetNghiem?>" placeholder="Tên loại xét nghiệm" readonly> 
                    </div>
                    <div class="form-group col-sm-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Kết quả xét nghiệm</label> 
                        <input type="text" id="txtketquaxetnghiem" class="col-9" value="<?php echo $ketquaxetnghiem?>" name="txtketquaxetnghiem"  <?php echo !empty($ketquaxetnghiem) ? 'readonly' : '';?>> 
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Ngày xét nghiệm</label> 
                        <input type="date" class="col-9" id="date_ngayXetNghiem" value="<?php echo $ngayXetNghiem?>" name="date_ngayXetNghiem" readonly> 
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Giờ xét nghiệm</label> 
                        <input type="time" class="col-9" id="time_gioXetNghiem" value="<?php echo $gioXetNghiem?>" name="time_gioXetNghiem" readonly> 
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Ngày tạo phiếu</label> 
                        <input type="date" class="col-9" id="date_ngayTaoPhieu" value="<?php echo $ngayTaoPhieu?>" name="date_ngayTaoPhieu" readonly> 
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Trạng thái</label>
                        <select class="col-9 " name="select" id="select" <?php echo (!empty($ketquaxetnghiem)) ? 'disabled' : ''; ?>>
                            <option value="Đang xử lý" <?php echo ($trangThai == "Đang xử lý" && empty($ketquaxetnghiem)) ? 'selected' : ''; ?>>Đang xử lý</option>
                            <option value="Hoàn thành" <?php echo (!empty($ketquaxetnghiem) || $trangThai == "Hoàn thành") ? 'selected' : ''; ?>>Hoàn thành</option>
                            <option value="Hủy bỏ" <?php echo ($trangThai == "Hủy bỏ") ? 'selected' : ''; ?>>Hủy bỏ</option>
                        </select>
                    </div>
                </div>
                <div class="button">
                        <input type="submit" name="nut" id="backButton" value="Quay lại">
                        <input type="submit" name="nut" id="nut" value="Lưu">
                </div>
                <div align="center">
                    <?php
                        if($_REQUEST['nut']=='Lưu')
                        {
                            $txtmaphieu=$_REQUEST['txtmaphieu'];
                            $txthoten=$_REQUEST['txthoten'];
                            $txtloaixetnghiem=$_REQUEST['txtloaixetnghiem'];
                            $txtketquaxetnghiem=$_REQUEST['txtketquaxetnghiem'];
                            $date_ngayXetNghiem=$_REQUEST['date_ngayXetNghiem'];
                            $time_gioXetNghiem=$_REQUEST['time_gioXetNghiem'];
                            $date_ngayTaoPhieu=$_REQUEST['date_ngayTaoPhieu'];
                            
                            // Kiểm tra nếu có kết quả xét nghiệm
                            if (!empty($txtketquaxetnghiem)) {
                                $select = 'Hoàn thành';
                            } else {
                                $select = $_REQUEST['select'];
                            }
                            if($p->themxoasua("UPDATE phieuxetnghiem 
                                                SET ketQuaXetNghiem='$txtketquaxetnghiem',ngayXetNghiem='$date_ngayXetNghiem',
                                                gioXetNghiem='$time_gioXetNghiem',ngayTaoPhieu='$date_ngayTaoPhieu',trangThai='$select'
                                                where maPhieu='$txtmaphieu' limit 1")==1)
                            {
                                echo '<script>
                                        alert("Sửa thành công.");
                                        window.location="phieuXetNghiem.php";
                                        </script>'; 
                            }
                            else{
                                echo '<script>
                                        alert("Sửa không thành công.");
                                    </script>'; 
                            }
                        }
                    ?>
                </div>
            </form>
        </div>
        

    </div> 
<?php include '../layout/footer.php'; ?>





