
<?php
require_once __DIR__ . '/myclass/clquanlykhunggiokham.php';
require_once __DIR__ . '/myclass/clbacsi.php';
require_once __DIR__ . '/myclass/clnhanvien.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// $quanlykhunggiokham = new clquanlykhunggiokham();
$quanlybacsi = new clsbacsi();
// $quanlynhanvien = new clnhanvien();


if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];
}
$request = strtok($_SERVER['REQUEST_URI'], '?');
$request = strtok($request, '?');
$script_name = $_SERVER['SCRIPT_NAME'];
$base_path = dirname($script_name);
$request = str_replace($base_path, '', $request);

if ($request === '' || $request === '/') {
    $request = '/';
}
switch ($request) {

    case '/add-schedule':
        $quanlykhunggiokham->add();
        break;

    case '/delete-schedule':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $quanlykhunggiokham->delete($id);
        } else {
            echo "ID không hợp lệ!";
        }
        break;

    case '/edit-schedule':
        $quanlykhunggiokham->edit();
        break;

    case '/update-tkbs':
        $id = $_GET['id'] ?? null;
        require_once 'lock_bac_si.php';

    // case '/edit-tkbs':
    //     $id = $_GET['id'] ?? null;
    //     $quanlybacsi->edit();
    //     break;

    case '/delete-nhanvien':
        $id = $_GET['id'] ?? null;
        $quanlynhanvien->delete($id);
        break;

    case '/edit-khunggiokham':
        $quanlykhunggiokham->edit();
        break;
    default:
        break;
}
