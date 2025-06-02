<title>Phiếu xét nghiệm</title>
    <?php include '../layout/header.php'; ?>
    <?php
        include '../myclass/clsbacsi_mc.php';
        $p=new bacsi();
    ?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">PHIẾU XÉT NGHIỆM</p>
        </div>
        
        <form action="" method="post">
            <div class="search-container" align="right" style="margin-bottom: 20px;">
                <input type="text" id="searchInput" name="txtsearch" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
                <input type="submit" name="nut" class="btn btn-primary" value="Tìm kiếm">
            </div>
            <div class="them">
                <a href="themPhieuXetNghiem.php"><button type="button" class="btn btn-success">THÊM PHIẾU XÉT NGHIỆM</button></a>
            </div>

            <?php
                $id_user=$_SESSION['id'];
                //xử lý phân trang
                $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:10;
                $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
                $offset=($current_page-1) * $inf_per_page;
                $totalsql=mysqli_query($p->connectdb(),"SELECT * FROM phieuxetnghiem ");
                $totalsql=$totalsql->num_rows;
                $totalpages=ceil($totalsql/$inf_per_page);
                // search
                if(!empty($_REQUEST['txtsearch']) && isset($_REQUEST['nut'])=='Tìm kiếm')
                {
                    $p->search("SELECT pxn.maPhieu, concat(bn.hoTenDem, ' ', bn.ten) as  hoTenBenhNhan, lxn.tenLoai as tenLoaiXetNghiem, pxn.ketQuaXetNghiem,
                                    pxn.ngayXetNghiem,pxn.gioXetNghiem,pxn.ngayTaoPhieu
                                    FROM loaixetnghiem lxn
                                        JOIN phieuxetnghiem pxn on lxn.maLoai= pxn.maLoai
                                        JOIN hosobenhan hsbn on pxn.maHoSo = hsbn.maHoSo
                                        JOIN benhnhan bn on hsbn.maBenhNhan=bn.maBenhNhan
                                    where concat(bn.hoTenDem, ' ', bn.ten) like '%".$_REQUEST['txtsearch']."%'
                                    ORDER BY pxn.ngayTaoPhieu DESC");
                }
                else 
                {
                    $p->xemPhieuXetNghiem("SELECT pxn.maPhieu, concat(bn.hoTenDem, ' ', bn.ten) as  hoTenBenhNhan, lxn.tenLoai as tenLoaiXetNghiem, pxn.ketQuaXetNghiem,
                                    pxn.ngayXetNghiem,pxn.gioXetNghiem,pxn.ngayTaoPhieu
                                    FROM loaixetnghiem lxn
                                        JOIN phieuxetnghiem pxn on lxn.maLoai= pxn.maLoai
                                        JOIN hosobenhan hsbn on pxn.maHoSo = hsbn.maHoSo
                                        JOIN benhnhan bn on hsbn.maBenhNhan=bn.maBenhNhan
                                    ORDER BY pxn.ngayTaoPhieu DESC limit $inf_per_page offset $offset",$inf_per_page,$current_page);
                    echo "<div class='pagination'>";
                        include 'pagination.php';
                    echo"</div>";
                }
            ?>
            <div align='center'>
                <?php
                    if($_REQUEST['nut']=='Xóa')
                    {
                        $maPhieu=$_REQUEST['idxoa_maPhieu'];
                        if($p->themxoasua("DELETE FROM phieuxetnghiem WHERE maPhieu='$maPhieu'")==1)
                        {
                            echo'<script>
                                alert("Xóa thành công.");
                                window.location="phieuXetNghiem.php";
                            </script>';
                        }
                        else{
                            echo'<script>alert("Xóa không thành công.")</script>';
                        }
                    }
                ?>
            </div>
        </form>
        <div class="button">
        <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
        </div>    
    </div>
<?php include '../layout/footer.php'; ?>

