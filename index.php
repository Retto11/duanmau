<?php
    session_start();
    include 'model/pdo.php';
    include 'model/danhmuc.php';
    include 'model/sanpham.php';
    include 'model/taikhoan.php';
    include 'view/header.php';
    include 'global.php';

    if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();

    if(isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                if(isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                    $kyw = $_POST['kyw'];
                }else {
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm = $_GET['iddm'];
                }else {
                    $iddm = 0;
                }
                $dssp = loadall_sanpham($kyw, $iddm);
                $tendm = load_ten_dm($iddm);
                include 'view/sanpham.php';
                break;

            case 'sanphamct':
                if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                    $id = $_GET['idsp'];
                    $onesp = loadone_sanpham($id);
                    extract($onesp);
                    $sp_cungloai = load_sanpham_cungloai($id, $iddm);
                    include 'view/sanphamct.php';
                }else {
                    include 'view/home.php';
                }
                break;

            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đã đăng ký thành công . Vui lòng đăng nhập để thực hiện chức năng!";
                }
                include 'view/taikhoan/dangky.php';
                break;

            case 'dangnhap':
                if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $checkuser = checkuser($user, $pass);
                    if(is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        // $thongbao = "Bạn đã đăng nhập thành công!";
                        header('location: index.php');
                    }else {
                        $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng kí!";
                    }      
                }
                include 'view/taikhoan/dangky.php';
                break;

            case 'edit_taikhoan':
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $address = $_POST['address'];
                    $tell = $_POST['tell'];
                    $id = $_POST['id'];
                    update_taikhoan($id, $email, $user, $pass, $address, $tell);
                    $_SESSION['user'] = checkuser($user, $pass);
                    header('location: index.php?act=edit_taikhoan');
                }
                include 'view/taikhoan/edit_taikhoan.php';
                break;

            case 'quenmk':
                if(isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $checkemail = checkemail($email);
                    if(is_array($checkemail)) {
                        $thongbao = "Mật khẩu của bạn là: ".$checkemail['pass'];
                    }else {
                        $thongbao = "Email này không tồn tại!";
                    }
                }
                include 'view/taikhoan/quenmk.php';
                break;

            case 'thoat':
                session_unset();
                header('location: index.php');
                // include 'view/gioithieu.php';
                break;

            


            case 'gioithieu':
                include 'view/gioithieu.php';
                break;


            case 'lienhe':
                include 'view/lienhe.php';
                break;
                
            case 'gopy':
                include 'view/gopy.php';
                break;

            case 'hoidap':
                include 'view/hoidap.php';
                break;
            
            default:
                include 'view/home.php';
                break;
        }
    }else {
        include 'view/home.php';
    }
    
    include 'view/footer.php';
?>