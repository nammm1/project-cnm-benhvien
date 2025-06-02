<?php include '../layout/header.php'; ?>
<style>
        .section1 {
            width: 70%;
            height: auto;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 20px;
            margin-left: 225px ;
            padding: 30px;
            background-color: #f9f9f9;
        }

        .gioithieu {
            display: flex;
            justify-content: center;
            justify-items: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .gioithieu .image img {
            width: 300px;
            border-radius: 10px;
        }

        .gioithieu .content {
            flex: 1;
        }

        .gioithieu h2 {
            color: #008000;
            margin-bottom: 10px;
        }

        .dichvunoitbat {
            text-align: center;
        }

        .dichvunoitbat h2 {
            color: #008000;
            margin-bottom: 20px;
        }

        .dichvunoitbat .services {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .dichvunoitbat .service {
            width: calc(25% - 20px);
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dichvunoitbat .service img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .dichvunoitbat .service p {
            font-weight: bold;
            color: #333;
        }

        .section2 {
            width: 70%;
            height: auto;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 30px;
            margin-left: 225px ;
            padding: 30px;
            background-color: #f9f9f9;
        }

        .section2 .section-title {
            color: #008000;
            text-align: center;
            margin-bottom: 20px;
        }

        .chia-se-kinh-nghiem {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article {
            width: calc(25% - 20px);
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .article img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .article h3 {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        .article .date {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }

        .article .excerpt {
            font-size: 14px;
            color: #666;
        }



        /* CSS sửa đổi cho dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%; /* Đặt menu xuống dưới mục "Tin tức" */
            left: 0;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            width: 200px;
        }

        .dropdown:hover .dropdown-menu {
            display: block; /* Hiển thị menu khi hover vào "Tin tức" */
        }

        .dropdown-menu li {
            list-style-type: none;
            padding: 8px 12px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            color: black;
        }

        .dropdown-menu li a:hover {
            background-color: #ddd;
        }



        </style>
        
        <div class="Picture">
            <img src="../../img/anhbia.jpg" alt="Cover Image" class="cover-image" alt="">
        </div>
        

        <div class="section1" align="center">
            <!-- Giới thiệu -->
            <div class="gioithieu">
                <div class="image">
                    <img src="../../img/trangchu1.jpg" alt="Libra Health" />
                </div>
                <div class="content">
                    <h2>Giới thiệu</h2>
                    <p>
                        Chính thức đi vào hoạt động từ năm 2011, Hospital khẳng định vị thế thương hiệu là Bệnh viện đa khoa hàng đầu tại Hồ Chí Minh. Sự tin tưởng và đồng hành của hàng triệu người đã đổi với dịch vụ của chúng tôi trong gần một thập kỷ qua là sự phản ánh chân thực cho thái độ làm việc nghiêm túc, chuẩn mực cao trong chất lượng khám chữa bệnh.
                    </p>
                    <p>
                        Để tạo ra từng dấu ấn quan trọng trong sự phát triển, Libra Health kiên trì theo đuổi chiến lược mang lại sự bảo đảm cao nhất từ đội ngũ GS.BS chuyên khoa đầu ngành, chuyên môn sâu, tay nghề vững.
                    </p>
                </div>
            </div>

            <!-- Dịch vụ nổi bật -->
            <div class="dichvunoitbat">
                <h2>Dịch vụ nổi bật</h2>
                <div class="services">
                    <div class="service">
                        <img src="../../img/kskdk.jpg" alt="Khám sức khỏe định kỳ" />
                        <p>Khám sức khỏe định kỳ</p>
                    </div>
                    <div class="service">
                        <img src="../../img/kskthn.jpg" alt="Khám sức khỏe tiền hôn nhân" />
                        <p>Khám sức khỏe tiền hôn nhân</p>
                    </div>
                    <div class="service">
                        <img src="../../img/ktstm.jpg" alt="Khám tầm soát tim mạch" />
                        <p>Khám tầm soát tim mạch</p>
                    </div>
                    <div class="service">
                        <img src="../../img/xntyc.jpg" alt="Xét nghiệm theo yêu cầu" />
                        <p>Xét nghiệm theo yêu cầu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section2">
            <h2 class="section-title">Chia sẻ kinh nghiệm</h2>
            <div class="chia-se-kinh-nghiem">
                <div class="article">
                    <img src="../../img/kn1.jpg" alt="Kiết lỵ: nguyên nhân, triệu chứng">
                    <h3>Kiết lỵ: nguyên nhân, triệu chứng</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Bệnh kiết lỵ, là do vi khuẩn shigella gây viêm toàn bộ...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn2.jpg" alt="Chữa ung thư vòm họng ở đâu?">
                    <h3>Chữa ung thư vòm họng ở đâu?</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Nên chữa ung thư vòm họng ở đâu? Ung thư vòm họng là...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn3.jpg" alt="Ung thư tuyến giáp nên ăn gì">
                    <h3>Ung thư tuyến giáp nên ăn gì</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Rau lá xanh đóng vai trò quan trọng trong quá trình trao...</p>
                </div>
                <div class="article">
                    <img src="../../img/kn4.jpg" alt="Nguyên nhân và triệu chứng bệnh loãng xương">
                    <h3>Nguyên nhân và triệu chứng bệnh loãng xương</h3>
                    <p class="date">22/09/2018</p>
                    <p class="excerpt">Nguyên nhân của hiện tượng loãng xương Các nguyên nhân chính dẫn đến...</p>
                </div>
            </div>
        </div>


<?php include '../layout/footer.php'; ?>
<?php include '../layout/chatbot.php'; ?>
