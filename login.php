<?php 
    ob_start(); 
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    //
    if( isset($_POST['btnDangNhap']) ) 
    {
            $userName = $_POST['txtTenTaiKhoan'];
            $passWord = $_POST['txtMatKhau'];
            if( isset($_POST['remember'])){
                //Tạo cookie login
                setcookie('txtTenTaiKhoan', $userName,time() + 999999);
                setcookie('txtMatKhau', $passWord,time() + 999999);
            }
            
            $sql = "SELECT * FROM taikhoan WHERE tenTaiKhoan = '".$userName."' AND matKhau = '".$passWord."' ";
            $result = mysqli_query($conn, $sql);
            if ($num = mysqli_fetch_array($result)) 
            {
                $_SESSION['taiKhoan'] = $num['tenTaiKhoan'];
                $_SESSION['quyen'] = $num['quyen'];
                $_SESSION['idTaiKhoan'] = $num['idTaiKhoan'];
            }
            else{
              echo "<script> 
                        alert('Tài khoản or mật khẩu không đúng, vui lòng kiểm tra lại!');
                        location.href = 'http://localhost/Foody/login.php';
                    </script>";
            }
            if (isset($_SESSION['quyen']))
            {
                if ($_SESSION['quyen'] == '1'){
                    echo    "<script> 
                                alert('Chúc mừng Admin đã đăng nhập thành công!');
                                location.href = 'http://localhost/Foody/UIAdmin/index.php';
                            </script>";
                        }
                else{
                    echo    "<script> 
                                alert('Chúc mừng Quý khách đã đăng nhập thành công!');
                                location.href = 'http://localhost/Foody/index.php';
                            </script>";
                        }
            }
    }
    
    $userName = "";
    $passWord = "";
    $check = false;
    if(isset($_COOKIE['txtTenTaiKhoan']) && (isset($_COOKIE['txtMatKhau'])) )
    {
        $userName = $_COOKIE['txtTenTaiKhoan'];
        $passWord = $_COOKIE['txtMatKhau'];
        $check = true;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="http://localhost/Foody/ASSET/CSS/style.css">
    <!-- icon -->
    <link rel="shortcut icon" href="https://v1study.com/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="px-5" style="background-color:#F5F5F5; font-family: 'Times New Roman', Times, serif;">
    <div>
        <div>
            <img style="margin-top:0px;" height="200px" width="100%" src="Asset/Image/baner.jpg" alt="">
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <ul class="nav">
                    <li class="nav-item align-self-center">
                        <a href="http://localhost/Foody/index.php">
                            <img height="50px" width="150px" src="Asset/Image/now.jpg">
                        </a>
                    </li>
                    <nav class="navbar navbar ">
                        <div class="nav nav-tabs " id="nav-tab">
                            <a class="nav-item nav-link " href="http://localhost/Foody/index.php">Trang
                                chủ</a>&nbsp;
                            <a class="nav-item nav-link" href="http://localhost/Foody/UIClient/familyRice.php">Cơm gia
                                đình</a>&nbsp;
                            <a class="nav-item nav-link" href="http://localhost/Foody/UIClient/snack.php">Đồ ăn
                                vặt</a>&nbsp;
                            <a class="nav-item nav-link" href="http://localhost/Foody/UIClient/seaFood.php">Đồ
                                hải sản</a>&nbsp;
                        </div>
                    </nav>
                    <li class="nav-item align-self-center ml-1">
                        <input type="text" name="keySearch" required class="form-control" style="width: 400px;"
                            placeholder="Nhập món ăn muốn tìm kiếm">
                    </li>&nbsp;
                    <li class="nav-item align-self-center ml-1">
                        <button type="submit" value="SEARCH" class="btn btn-primary" name="btnSearch"><i
                                class="fas fa-search-plus"></i> Tìm kiếm</button>
                    </li>&nbsp;
                    <?php
                        if (isset($_GET['btnSearch'])) {
                            $keySearch = $_GET['keySearch'];
                            header("Location: http://localhost/Foody/UIClient/searchDish.php?key=$keySearch");
                        }
                    ?>

                    <li class="nav-item align-self-center ml-1">
                        <a style="width:110px;" href="http://localhost/Foody/UIClient/cart.php" class="btn btn-warning">
                            <i class="fas fa-cart-plus"></i>&nbsp;Giỏ hàng
                        </a>
                    </li>&nbsp;
                    <li class="nav-item align-self-center ml-1">
                        <?php
                     if(isset($_SESSION['taiKhoan'])) 
                        echo "<div class='dropdown'>
                        <button class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fas fa-user-alt'></i>&nbsp;".$_SESSION['taiKhoan']."
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='http://localhost/Foody/UIClient/profile.php'> <i class='fas fa-user-cog'></i> Hồ sơ</a>
                          <a class='dropdown-item' href='#'><i class='fas fa-key'></i> Đổi mật khẩu</a>
                          <a class='dropdown-item' href='http://localhost/Foody/index.php?btnDangXuat=1'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a>
                        </div>
                      </div>";
                    else 
                        echo "<a style='width:110px;' href='http://localhost/Foody/login.php' class='btn btn-success'>
                                <i class='fas fa-user-alt'></i>&nbsp;Đăng nhập
                              </a>";
                    ?>
                    </li>&nbsp;
                </ul>
            </div>
        </form>

        <hr>

        <div>
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class=" text-center" style="font-size: 22px;">Chào mừng bạn đến với NOW</h2>
                    <h2 class="text-center" style="font-size: 20px;"> <i class="fas fa-user-alt"></i> &nbsp;ĐĂNG NHẬP
                        NGAY</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="login-form">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase"><b>Tên tài khoản</b></label>
                            <input type="text" class="form-control" name="txtTenTaiKhoan"
                                placeholder="Nhập tên tài khoản" value="<?php echo $userName ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase"><b>Mật khẩu</b></label>
                            <input type="password" class="form-control" name="txtMatKhau" placeholder="Nhập mật khẩu"
                                value="<?php echo $passWord ?>"> <span class="show-btn">
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input <?php echo ($check)?"checked":"" ?> name="remember" type="checkbox"
                                    class="form-check-input"><b>Remember me?</b></input>
                            </label>
                            <button type="submit" class="btn btn-login float-right" name="btnDangNhap"><i
                                    class="fas fa-user-alt"></i> &nbsp; ĐĂNG NHẬP</button>
                        </div>
                    </form>
                    <div class="copy-text" style="font-size: 15px;">Bạn chưa có tài khoản ? <i class="fa fa-heart"></i>
                        by <a href="http://localhost/Foody/register.php">ĐĂNG KÝ</a></div>
                </div>
                <div class="col-md-8 banner-sec text-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="rounded" src="http://localhost/Foody/ASSET/IMAGE/MonAn1.jpg"
                                    style="width: 930px; height: 520px;">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <center>
                                            <h5>Đây là sự lựa chọn tuyệt vời nhất dành cho bạn</h5>
                                            <h2>Hãy lựa chọn Now</h2>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-2">
                <footer class="page-footer font-small unique-color-dark">
                    <div style="#">
                        <div class="container">
                            <div class="row py-4 d-flex align-items-center">
                                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                                    <h6 class="mb-0">Get connected with us on social networks!</h6>
                                </div>
                                <div class="col-md-6 col-lg-7 text-center text-md-right">
                                    <a class="fb-ic"> <i class="fab fa-facebook-f white-text mr-4"> </i> </a>
                                    <a class="tw-ic"> <i class="fab fa-twitter white-text mr-4"> </i></a>
                                    <a class="gplus-ic"><i class="fab fa-google-plus-g white-text mr-4"> </i></a>
                                    <a class="li-ic"><i class="fab fa-linkedin-in white-text mr-4"> </i></a>
                                    <a class="ins-ic"><i class="fab fa-instagram white-text"> </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container text-center text-md-left mt-5">
                        <div class="row mt-3">
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <h6 class="text-uppercase font-weight-bold">Company name</h6>
                                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p>Here you can use rows and columns to organize your footer content.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <h6 class="text-uppercase font-weight-bold">Products</h6>
                                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p> <a href="#!">MDBootstrap</a></p>
                                <p><a href="#!">MDWordPress</a></p>
                                <p> <a href="#!">BrandFlow</a> </p>
                                <p><a href="#!">Bootstrap Angular</a></p>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p><a href="#!">Your Account</a> </p>
                                <p><a href="#!">Become an Affiliate</a></p>
                                <p><a href="#!">Shipping Rates</a></p>
                                <p><a href="#!">Help</a> </p>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                                <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                                <p> <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/4ff1ce10f2.js" crossorigin="anonymous"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
<script>
const passField = document.querySelector("input");
const showBtn = document.querySelector("span i");
showBtn.onclick = (() => {
    if (passField.type === "password") {
        passField.type = "text";
        showBtn.classList.add("hide-btn");
    } else {
        passField.type = "password";
        showBtn.classList.remove("hide-btn");
    }
});
</script>

</html>
<?php ob_end_flush(); ?>