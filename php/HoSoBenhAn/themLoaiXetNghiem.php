<title>Thêm loại xét nghiệm</title>
    <?php include '../layout/header.php'; ?>
    <?php
        include '../myclass/clsquanly.php';
        $p=new quanly();
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
            <p class="tenChucNang_cuthe">THÊM LOẠI XÉT NGHIỆM</p>
        </div>
        <div id="application">
            <form class="form-card" method="post">
                <div class="form-group mb-4">
                    <label class="form-label" for="tenloaixetnghiem">Tên loại xét nghiệm <span style="color: red;">*</span></label>
                    <input type="text" id="txttenloaixetnghiem" name="txttenloaixetnghiem" placeholder="Nhập tên loại xét nghiệm " class="form-control" />    
                </div>
                
                <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
                <input type="submit" name="nut" id="nut" value="Lưu">
                </div>
                <div align="center" class="mt-2">
                    <?php
                        if(isset($_REQUEST['nut'])=='Lưu')
                        {
                            $txttenloaixetnghiem=$_REQUEST['txttenloaixetnghiem'];
                            $checkten=$p->laycot("SELECT COUNT(*) as count FROM loaixetnghiem WHERE tenLoai LIKE '%$txttenloaixetnghiem%'");
                            if($txttenloaixetnghiem!='')
                            {
                                if($checkten<=0)
                                {
                                    if($p->themxoasua("INSERT INTO loaixetnghiem(tenLoai) 
                                    VALUES ('$txttenloaixetnghiem')")==1)
                                    {
                                        echo"<script>
                                            alert('Thêm loại xét nghiệm thành công.');
                                            window.location='loaiXetNghiem.php';
                                        </script>";
                                    }
                                    else{
                                        echo"<script>
                                            alert('Thêm không thành công.');
                                        </script>";
                                    }
                                }
                                else{
                                    echo"<script>
                                        alert('Loại xét nghiệm đã có.');
                                    </script>";
                                }
                            }
                            else{
                                echo"<script>
                                        alert('Bạn chưa nhập tên loại xét nghiệm.');
                                    </script>";
                            }
                            
                        }
                    
                    ?>
                </div>
            </form>
        </div>

    </div> 
<?php include '../layout/footer.php'; ?>





