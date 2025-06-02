<?php
    class hospital
    {
        public function connectdb()
        {
            $con=mysqli_connect("localhost","root","","benhvien");
            if(!$con)
            {
                echo 'Không thể kết nối đến database !';
                exit();
            }
            else
            {
                mysqli_set_charset($con,'utf8');
                return $con;
            }
        }

        public function laycot($sql)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            $giatri='';
            {
                if(mysqli_num_rows($ketqua)>0)
                {
                    while($row=mysqli_fetch_array($ketqua))
                    {
                        $gt=$row[0];
                        $giatri=$gt;
                    }
                }
            }
            return $giatri;
        }

        public function themxoasua($sql)
        {
            $link=$this->connectdb();
            if(mysqli_query($link,$sql)>0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

    }
?>