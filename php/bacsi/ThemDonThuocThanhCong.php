<?php 
include '../layout/header.php';
?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .circle-bg {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #28a745;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .checkmark {
            font-size: 36px;
        }

        .circle-outline {
            position: absolute;
            top: -5px;
            left: -5px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid #28a745;
        }

        .confetti-piece {
            width: 5px;
            height: 10px;
            background-color: #28a745;
            position: absolute;
            opacity: 0.8;
            animation: fall 1.5s infinite;
        }

        .confetti-piece:nth-child(1) {
            left: 20%;
            animation-delay: 0.1s;
        }

        .confetti-piece:nth-child(2) {
            left: 40%;
            animation-delay: 0.3s;
        }

        .confetti-piece:nth-child(3) {
            left: 60%;
            animation-delay: 0.5s;
        }

        .confetti-piece:nth-child(4) {
            left: 80%;
            animation-delay: 0.7s;
        }

        .confetti-piece:nth-child(5) {
            left: 90%;
            animation-delay: 0.9s;
        }

        @keyframes fall {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(100px) rotate(45deg);
            }

            100% {
                transform: translateY(200px) rotate(90deg);
                opacity: 0;
            }
        }
    </style>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="success-card bg-white rounded-4 shadow-lg p-4 p-md-5 text-center" role="alert" aria-live="polite">
            <div class="success-icon mb-4">
                <div class="circle-bg d-flex align-items-center justify-content-center mx-auto position-relative">
                    <i class="bi bi-check2 checkmark text-white"></i>
                    <div class="circle-outline"></div>
                </div>
            </div>
            <h2 class="mb-3 fw-bold text-success">Thêm đơn thuốc thành công</h2>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <button class="btn btn-outline-success btn-lg px-4"
                    onclick="window.location.href='HoSoBenhAn.php'">
                    <i class="bi bi-list-ul me-2"></i>Đến trang danh sách
                </button>
            </div>
            <div class="confetti position-absolute">
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
                <div class="confetti-piece"></div>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>