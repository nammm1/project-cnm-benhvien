<title>Sửa loại xét nghiệm</title>
    <?php include '../layout/header.php'; ?>
    <?php
        include '../myclass/clsquanly.php';
        $p=new quanly();
    ?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
            <p class="tenChucNang_cuthe">SỬA LOẠI XÉT NGHIỆM</p>
        </div>
        <div id="application">
            <form class="form-card" method="post">
                <?php
                    $id_sua=$_REQUEST['id_sua'];
                    $maLoai=$p->laycot("select maLoai from loaixetnghiem where maLoai='$id_sua'");
                    $tenLoai=$p->laycot("select tenLoai from loaixetnghiem where maLoai='$id_sua'");
                ?>
                <div class="row justify-content-between text-center">
                    <div class="form-group col-12"> 
                        <label class="form-control-label col-2 mb-4 text-center">Mã loại</label> 
                        <input type="text" id="txtmaloai" class="col-9" name="txtmaloai" value="<?php echo $maLoai?>"readonly> 
                    </div>
                    <div class="form-group col-12 text-center"> 
                        <label class="form-control-label col-2 mb-4 text-center">Tên loại</label> 
                        <input type="text" id="txttenloai" class="col-9" name="txttenloai" value="<?php echo $tenLoai?>"> 
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
                            $txtmaloai=$_REQUEST['txtmaloai'];
                            $txttenloai=$_REQUEST['txttenloai'];
                            if($p->themxoasua("UPDATE loaixetnghiem 
                                                SET tenLoai='$txttenloai'
                                                where maLoai='$txtmaloai' limit 1")==1)
                            {
                                echo '<script>
                                        alert("Sửa thành công.");
                                        window.location="loaiXetNghiem.php";
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





