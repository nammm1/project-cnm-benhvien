<?php
    // include 'clsbenhvien.php';
    class quanly extends hospital
    {
        public function  xemdsloaixetnghiem($sql,$inf_per_page,$current_page)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo '<table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã loại</th>
                                <th>Tên loại xét nghiệm</th>
                                <th></th>
                            </tr>
                            </thead>
                        <tbody>';
                $count=1 + ($current_page - 1) * $inf_per_page;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maLoai=$row['maLoai'];
                    $tenLoai=$row['tenLoai'];
                    echo'<tr>
                            <td class="pt-3">'.$count.'</td>
                            <td class="pt-3">'.$maLoai.'</td>
                            <td class="pt-3">'.$tenLoai.'</td>
                            <td align="center" valign="middle" class="text" align="right">
                                <form action="" method="post">
                                    <a href="suaLoaiXetNghiem.php?id_sua='.$maLoai.'"><input type="button" class="btn btn-primary btn-sm" value="Sửa""></a>
                                    <input type="hidden" name="idxoa_maLoai" value="'.$maLoai.'">
                                    <input id="nut_xoa" type="submit" name="nut" class="btn " value="Xóa">
                                </form>
                            </td>
                        </tr>';
                    $count++;
                }
                echo '</tbody>
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
                echo '<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã loại</th>
                                    <th>Tên loại xét nghiệm</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody>';
                $count=1;// + ($current_page - 1) * $inf_per_page;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maLoai=$row['maLoai'];
                    $tenLoai=$row['tenLoai'];
                    echo'<tr>
                            <td class="pt-3">'.$count.'</td>
                            <td class="pt-3">'.$maLoai.'</td>
                            <td class="pt-3">'.$tenLoai.'</td>
                            <td align="center" valign="middle" class="text" align="right">
                                <form action="" method="post">
                                    <a href="suaLoaiXetNghiem.php?id_sua='.$maLoai.'"><input type="button" class="btn btn-primary btn-sm" value="Sửa""></a>
                                    <input type="hidden" name="idxoa_maPhieu" value="'.$maLoai.'">
                                    <input id="nut_xoa" type="submit" name="nut" class="btn " value="Xóa">
                                </form>
                            </td>
                        </tr>';
                    $count++;
                }
                echo '</tbody>
                    </table>';
            }
            else {
                echo "Không có hồ sơ nào.";
            }
        }

    
    }
?>