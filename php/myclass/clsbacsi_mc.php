<?php
    // include('clsbenhvien.php');
    class bacsi extends hospital
    {
        public function  xemPhieuXetNghiem($sql,$inf_per_page,$current_page)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover" style="max-width: 1300px;">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">STT</th>
                                <th align="center" valign="middle">Mã phiếu</th>
                                <th align="center" valign="middle">Tên bệnh nhân</th>
                                <th align="center" valign="middle">Tên loại xét nghiệm</th>
                                <th align="center" valign="middle">Kết quả xét nghiệm</th>
                                <th align="center" valign="middle">Ngày xét nghiệm</th>
                                <th align="center" valign="middle">Giờ xét nghiệm</th>
                                <th align="center" valign="middle" style="width: 100px;">Ngày tạo</th>
                                <th align="center" valign="middle" style="width: 120px;"></th>
                            </tr>
                        </thead>
                        <tbody>';
                $count=1 + ($current_page - 1) * $inf_per_page;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maPhieu=$row['maPhieu'];
                    $ketQuaXetNghiem=$row['ketQuaXetNghiem'];
                    $ngayXetNghiem=$row['ngayXetNghiem'];
                    $gioXetNghiem=$row['gioXetNghiem'];
                    $ngayTaoPhieu=$row['ngayTaoPhieu'];
                    $trangThai=$row['trangThai'];
                    $maLoai=$row['maLoai'];
                    $maHoSo=$row['maHoSo'];
                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date = DateTime::createFromFormat('Y-m-d', $ngayXetNghiem);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayXetNghiem = $date->format('d/m/Y');

                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date_tao = DateTime::createFromFormat('Y-m-d', $ngayTaoPhieu);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayTaoPhieu = $date_tao->format('d/m/Y');
                    $trangThai=$row['trangThai'];
                    echo'<tr>
                            <td align="center" valign="middle" class="pt-3">'.$count.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$maPhieu.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['hoTenBenhNhan'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['tenLoaiXetNghiem'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$ketQuaXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$gioXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayTaoPhieu.'</td>'
                            ;
                            if($ketQuaXetNghiem===''){
                                echo '<td align="center" valign="middle" class="text" align="right"> 
                                <form action="" method="post">
                                    <a href="../HoSoBenhAn/suaPhieuXetNghiem.php?id_sua='.$maPhieu.'"><input type="button" class="btn btn-primary btn-sm" value="Sửa""></a>
                                    <input type="hidden" name="idxoa_maPhieu" value="'.$maPhieu.'">
                                </form>
                            </td>';
                            }
                    echo'</tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
            else {
                echo "Không có hồ sơ nào.";
            }
        }

        public function  xemPhieuXetNghiemTheoHoSo($sql,$inf_per_page,$current_page)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover" style="max-width: 1300px;">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">STT</th>
                                <th align="center" valign="middle">Mã phiếu</th>
                                <th align="center" valign="middle">Tên bệnh nhân</th>
                                <th align="center" valign="middle">Tên loại xét nghiệm</th>
                                <th align="center" valign="middle">Kết quả xét nghiệm</th>
                                <th align="center" valign="middle">Ngày xét nghiệm</th>
                                <th align="center" valign="middle">Giờ xét nghiệm</th>
                                <th align="center" valign="middle" style="width: 100px;">Ngày tạo</th>
                                <th align="center" valign="middle" style="width: 120px;"></th>
                            </tr>
                        </thead>
                        <tbody>';
                $count=1 + ($current_page - 1) * $inf_per_page;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maPhieu=$row['maPhieu'];
                    $ketQuaXetNghiem=$row['ketQuaXetNghiem'];
                    $ngayXetNghiem=$row['ngayXetNghiem'];
                    $gioXetNghiem=$row['gioXetNghiem'];
                    $ngayTaoPhieu=$row['ngayTaoPhieu'];
                    $trangThai=$row['trangThai'];
                    $maLoai=$row['maLoai'];
                    $maHoSo=$row['maHoSo'];
                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date = DateTime::createFromFormat('Y-m-d', $ngayXetNghiem);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayXetNghiem = $date->format('d/m/Y');

                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date_tao = DateTime::createFromFormat('Y-m-d', $ngayTaoPhieu);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayTaoPhieu = $date_tao->format('d/m/Y');
                    $trangThai=$row['trangThai'];
                    echo'<tr>
                            <td align="center" valign="middle" class="pt-3">'.$count.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$maPhieu.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['hoTenBenhNhan'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['tenLoaiXetNghiem'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$ketQuaXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$gioXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayTaoPhieu.'</td>'
                            ;
                            if($ketQuaXetNghiem===''){
                                echo '<td align="center" valign="middle" class="text" align="right"> 
                                <form action="" method="post">
                                    <a href="../HoSoBenhAn/suaPhieuXetNghiem.php?id_sua='.$maPhieu.'"><input type="button" class="btn btn-primary btn-sm" value="Sửa""></a>
                                    <input type="hidden" name="idxoa_maPhieu" value="'.$maPhieu.'">
                                </form>
                            </td>';
                            }
                    echo'</tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
            else {
                echo "Không có hồ sơ nào.";
            }
        }

        public function search($sql)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover" style="max-width: 1300px;">
                        <thead>
                            <tr>
                                <th align="center" valign="middle">STT</th>
                                <th align="center" valign="middle">Mã phiếu</th>
                                <th align="center" valign="middle">Tên bệnh nhân</th>
                                <th align="center" valign="middle">Tên loại xét nghiệm</th>
                                <th align="center" valign="middle">Kết quả xét nghiệm</th>
                                <th align="center" valign="middle">Ngày xét nghiệm</th>
                                <th align="center" valign="middle">Giờ xét nghiệm</th>
                                <th align="center" valign="middle" style="width: 100px;">Ngày tạo</th>
                                <th align="center" valign="middle" style="width: 120px;">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>';
                $count=1;// + ($current_page - 1) * $inf_per_page;;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maPhieu=$row['maPhieu'];
                    $ketQuaXetNghiem=$row['ketQuaXetNghiem'];
                    $ngayXetNghiem=$row['ngayXetNghiem'];
                    $gioXetNghiem=$row['gioXetNghiem'];
                    $ngayTaoPhieu=$row['ngayTaoPhieu'];
                    $trangThai=$row['trangThai'];
                    $maLoai=$row['maLoai'];
                    $maHoSo=$row['maHoSo'];
                    //Chuyển đổi chuỗi thành đối tượng DateTime
                    $date = DateTime::createFromFormat('Y-m-d', $ngayXetNghiem);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayXetNghiem = $date->format('d/m/Y');

                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date_tao = DateTime::createFromFormat('Y-m-d', $ngayTaoPhieu);
                    // Định dạng lại thành DD/MM/YYYY
                    $date_ngayTaoPhieu = $date_tao->format('d/m/Y');
                    $trangThai=$row['trangThai'];
                    echo'<tr>
                            <td align="center" valign="middle" class="pt-3">'.$count.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$maPhieu.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['hoTenBenhNhan'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$row['tenLoaiXetNghiem'].'</td>
                            <td align="center" valign="middle" class="pt-3">'.$ketQuaXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$gioXetNghiem.'</td>
                            <td align="center" valign="middle" class="pt-3">'.$date_ngayTaoPhieu.'</td>'
                            ;
                            if($ketQuaXetNghiem===''){
                                echo '<td align="center" valign="middle" class="text" align="right"> 
                                <form action="" method="post">
                                    <a href="../HoSoBenhAn/suaPhieuXetNghiem.php?id_sua='.$maPhieu.'"><input type="button" class="btn btn-primary btn-sm" value="Sửa""></a>
                                    <input type="hidden" name="idxoa_maPhieu" value="'.$maPhieu.'">
                                </form>
                            </td>';
                            }
                    echo'</tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
            else {
                echo "Không có hồ sơ nào.";
            }
        }


        public function duyetthem_maLoai($sql)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            $maLoai='';
            if(mysqli_num_rows($ketqua)>0)
            {
                $row=mysqli_fetch_array($ketqua);
                $maLoai=$row['maLoai'];
            }
            return $maLoai;
        }
        public function duyetthem_maHoSo($sql)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            $maHoSo='';
            if(mysqli_num_rows($ketqua)>0)
            {
                $row=mysqli_fetch_array($ketqua);
                $maHoSo=$row['maHoSo'];
            }
            return $maHoSo;
        }

        public function xemdsHoSo($sql,$inf_per_page,$current_page)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover">
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
                        <tbody>';
                $count=1+($current_page - 1) * $inf_per_page;;
                while($row=mysqli_fetch_array($ketqua))
                {   
                    $maHoSo=$row['maHoSo'];
                    $chuanDoan=$row['chuanDoan'];
                    $ketLuan=$row['ketLuan'];
                    $trangThai=$row['trangThai'];
                    $ngayTaoHoSo=$row['ngayTaoHoSo'];
                    $maBenhNhan=$row['maBenhNhan'];
                    $maBacSi=$row['maBacSi'];
                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date = DateTime::createFromFormat('Y-m-d', $ngayTaoHoSo);
                    // Định dạng lại thành DD/MM/YYYY
                    $formattedDate = $date->format('d/m/Y');
                    echo'<tr>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$count.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$row['hoTenBenhNhan'].'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$row['hoTenBacSi'].'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$chuanDoan.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$ketLuan.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$trangThai.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$formattedDate.'</a></td>
                        </tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
        }
        public function search_HoSo($sql)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover">
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
                        <tbody>';
                $count=1;
                while($row=mysqli_fetch_array($ketqua))
                {   
                    $maHoSo=$row['maHoSo'];
                    $chuanDoan=$row['chuanDoan'];
                    $ketLuan=$row['ketLuan'];
                    $trangThai=$row['trangThai'];
                    $ngayTaoHoSo=$row['ngayTaoHoSo'];
                    $maBenhNhan=$row['maBenhNhan'];
                    $maBacSi=$row['maBacSi'];
                    // Chuyển đổi chuỗi thành đối tượng DateTime
                    $date = DateTime::createFromFormat('Y-m-d', $ngayTaoHoSo);
                    // Định dạng lại thành DD/MM/YYYY
                    $formattedDate = $date->format('d/m/Y');
                    echo'<tr>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$count.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$row['hoTenBenhNhan'].'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$row['hoTenBacSi'].'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$chuanDoan.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$ketLuan.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$trangThai.'</a></td>
                            <td><a style="text-decoration: none; color: black;" href="?id='.$maHoSo.'">'.$formattedDate.'</a></td>
                        </tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
            else{
                echo 'Không có hồ sơ.';
            }
        }

    }
?>