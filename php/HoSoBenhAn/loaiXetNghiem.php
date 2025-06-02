<title>Loại xét nghiệm</title>
<?php include '../layout/header.php';
    include '../myclass/clsquanly.php';
    $p=new quanly();
?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <style>
        
    </style>
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">LOẠI XÉT NGHIỆM</p>
        </div>
        
        <form method="post">
            <div class="them">
            <a href="themLoaiXetNghiem.php"><button type="button" class="btn btn-success">THÊM LOẠI XÉT NGHIỆM</button></a>
            </div>
            <div class="search-container" align="right" style="margin-bottom: 20px;">
                <input type="text" id="searchInput" name="txtsearch" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
                <input type="submit" name="nut" class="btn btn-primary" value="Tìm kiếm">
            </div>
            <?php
                $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:5;
                $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
                $offset=($current_page-1) * $inf_per_page;
                $totalsql=mysqli_query($p->connectdb(),"SELECT maLoai,tenLoai FROM loaixetnghiem");
                $totalsql=$totalsql->num_rows;
                $totalpages=ceil($totalsql/$inf_per_page);
                // search
                $search=$_REQUEST['txtsearch'];
                if(!empty($_REQUEST['txtsearch']) && isset($_REQUEST['nut'])=='Tìm kiếm')
                {
                    $p->search("Select maLoai,tenLoai from loaixetnghiem
                                where tenLoai like '%$search%'");
                }
                else 
                {
                    $p->xemdsloaixetnghiem("Select maLoai,tenLoai from loaixetnghiem limit $inf_per_page offset $offset",$inf_per_page,$current_page);
                    echo "<div class='pagination'>";
                        include 'pagination.php';
                    echo"</div>";
                }
            ?>
            <div align='center'>
                <?php
                    if($_REQUEST['nut']=='Xóa')
                    {
                        $maLoai=$_REQUEST['idxoa_maLoai'];
                        echo $maLoai;
                        if($p->themxoasua("DELETE FROM loaixetnghiem WHERE maLoai='$maLoai'")==1)
                        {
                            echo'<script>
                                alert("Xóa thành công.");
                                window.location="loaiXetNghiem.php";
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


<script src="../../bootstrap/js/back_or_finish.js"></script>
<?php include '../layout/footer.php'; ?>
