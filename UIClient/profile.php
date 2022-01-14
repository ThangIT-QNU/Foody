<?php ob_start(); 
    session_start();
    //
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
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
            <img style="margin-top:0px;" height="200px" width="100%" src="../Asset/Image/baner.jpg" alt="">
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <ul class="nav">
                    <li class="nav-item align-self-center">
                        <a href="http://localhost/Foody/index.php">
                            <img height="50px" width="150px" src="../Asset/Image/now.jpg">
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
                          <a class='dropdown-item' href='http://localhost/Foody/UIClient/changePassword.php'><i class='fas fa-key'></i> Đổi mật khẩu</a>
                          <a class='dropdown-item' href='http://localhost/Foody/logout.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a>
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
        <div class="container">
            <!-- ------------------------------------------------------------------------------------ -->
            <?php 
                include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                if(isset($_SESSION['idTaiKhoan']))
                $user = $_SESSION['idTaiKhoan'];           
                $sql = "SELECT * FROM taikhoan WHERE idTaiKhoan='$user' ";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
            ?>
            <form action="" method="POST">
                <div class="mt-1">
                    <h3 class="text-center"><b>THÔNG TIN CÁ NHÂN</b></h3>
                </div>
                <div class="row p-t-20">
                    <div class="col-md-12">
                        <div>
                            <b> Lưu ý: những trường có dấu <span class="text-danger">(*) </span> đều bắt buộc phải
                                nhập!!!</b>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5> <b>Họ và tên:</b> <span class="text-danger"> *</span></h5>
                        <input value="<?php echo $row['hoVaTen']?>" required type="text" class="form-control"
                            name="txtFullName">
                    </div>
                    <div class="col-md-6">
                        <h5> <b>Số điện thoại</b> <span class="text-danger"> *</span></h5>
                        <input value="<?php echo $row['sdt'] ?>" required class="form-control" type="text"
                            name="txtPhone">
                    </div>
                    <div class="col-md-6">
                        <h5> <b>Email</b> <span class="text-danger"> *</span></h5>
                        <input value="<?php echo $row['email'] ?>" required class="form-control" name="txtEmail"
                            type="email">
                    </div>
                    <div class="col-md-6">
                        <h5> <b> Địa chỉ: </b> <span class="text-danger"> *</span></h5>
                        <input type="text" value="<?php echo $row['diaChi'] ?>" class="form-control" required
                            name="txtAddress" placeholder="Vui lòng nhập chính xác địa chỉ của bạn!">
                        </input>
                    </div>
                    <div class="col-md-12">
                        <label for=""></label>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <a style="width:120px" class="btn btn-secondary" href="http://localhost/Foody/index.php"> <i
                                class="fas fa-arrow-circle-left"></i> Thoát</a>
                    </div>
                    <div class="col-md-6">
                        <button style="width:120px" type="submit" name="btnUpdate" class="btn btn-info float-right"><i
                                class="far fa-edit"></i> Cập nhật</button>
                    </div>
            </form>
            <?php
                if (isset($_POST['btnUpdate'])) {
                $txtFullName = $_POST['txtFullName'];
                $txtPhone = $_POST['txtPhone'];
                $txtEmail = $_POST['txtEmail'];
                $txtAddress = $_POST['txtAddress'];
                //
                $sqlUpdate ="UPDATE taikhoan SET hoVaTen='$txtFullName', sdt='$txtPhone', email='$txtEmail', diaChi='$txtAddress'";
                $query = mysqli_query($conn,$sqlUpdate);
                if ($query){

                    echo    "<script>
                                alert('Chúc mừng bạn đã cập nhật thông tin thành công!');
                                location.href='http://localhost/Foody/UIClient/profile.php';
                            </script>";
                    }
                else{
                    echo "<script>
                            alert('Cập nhật thông tin thất bại!');
                            location.href='http://localhost/Foody/UIClient/profile.php';
                        </script>";
                    }
                }
            ?>
        </div>
    </div>
    <div class="pt-5"></div>
    <hr>

    <div class="mt-2">
        <footer style="background-color:#F5F5F5;" class="page-footer font-small unique-color-dark">
            <div style="#">
                <div class="container">
                    <div class="row py-4 d-flex align-items-center">
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0">Hãy kết nối với chúng tôi trên các mạng xã hội!</h6>
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
                        <h6 class="text-uppercase font-weight-bold">WEBSITE</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Website chuyên cung cấp thức ăn phù hợp với nhu cầu người dùng,
                            đảm bảo chất lượng vệ sinh an toàn thực phẩm. Website này nhằm mục đích
                            phục vụ cho sinh viên học tập môn Lập Trình Ứng Dụng Web</p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">MEMBERS</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Đinh Thành Thắng</p>
                        <p>Lê Phước Sáng</p>
                        <p>Mai Thị Chi</p>
                        <p>Trần Thị Thanh Tuyền</p>
                        <p>Phan Thị Lam Tuyền</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><i class="fas fa-home mr-3"></i> Ngo May, Quy Nhon, Binh Dinh</p>
                        <p><i class="fas fa-envelope mr-3"></i> thucphamonline@gmail.com</p>
                        <p> <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2021 Copyright:
                <a href="https://www.facebook.com/thangit.com.vn/">Đinh Thành Thắng</a>
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous">
    </script>
</body>

</html>
<?php ob_end_flush(); ?>