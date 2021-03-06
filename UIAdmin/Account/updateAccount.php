<?php ob_start(); ?>
<?php
    session_start();
    //Đăng xuất
    if(isset($_GET['btnDangXuat']))
    {
        session_destroy();
        echo "<script> location.href = 'http://localhost/Foody/index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="https://v1study.com/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tài Khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Foody/Asset/CSS/styleAdmin.css">
</head>

<body class="px-5" style=" background-color:#F5F5F5; font-family: 'Times New Roman', Times, serif;">
    <div class="container">
        <div>
            <img style="margin-top:0px;" height="200px" width="100%" src="../../Asset/Image/baner.jpg" alt="">
        </div>
        <div>
            <ul class="nav">
                <li class="nav-item align-self-center">
                    <a href="http://localhost/Foody/index.php">
                        <img height="50px" width="160px" src="../../Asset/Image/now.jpg">
                    </a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link active" href="http://localhost/Foody/UIAdmin/Home.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link active" href="http://localhost/Foody/UIAdmin/Account/Account.php">TÀI
                        KHOẢN</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/TypeFood/typeFood.php">LOẠI MÓN</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Dish/dish.php">MÓN ĂN</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Cart/carts.php">GIỎ HÀNG</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Bill/bills.php">ĐƠN ĐẶT HÀNG</a>
                </li>
                <li class="nav-item align-self-center">
                    <?php
                     if(isset($_SESSION['taiKhoan'])) 
                        echo "<a style='width:110px;' href='#' class='btn btn-success'>
                                <i class='fas fa-user-alt'></i>&nbsp;".$_SESSION['taiKhoan']."
                              </a>&nbsp;";
                    else 
                        echo "<a style='width:110px;' href='http://localhost/Foody/login.php' class='btn btn-success'>
                                <i class='fas fa-user-alt'></i>&nbsp;Đăng nhập
                              </a>"; 
                    ?>
                </li>
                <?php
                     if(isset($_SESSION['taiKhoan']))
                    echo "<li class='nav-item align-self-center ml-1'>                
                              <a style='width:110px;' href='http://localhost/Foody/index.php?btnDangXuat=1' class='btn btn-danger'>
                                <i class='fas fa-sign-out-alt'></i>&nbsp;Đăng Xuất
                              </a>   
                        </li>";
                    ?>
            </ul>
        </div>
        <hr>

        <div class="container">
            <h4 class="text-center">ADMINSTRATOR - ACCOUNT</h4>
            <div>
            </div>
            <div class="mt-2">
                <div class="text-center my-3 bg-dark text-light" style="height: 46px; line-height: 46px;">
                    <b>CẬP NHẬT TÀI KHOẢN</b>
                </div>
                <div>
                    <?php
                    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                    if(isset($_GET['taiKhoan']))
                    $user = $_GET['taiKhoan'];                 
                    $sql = "SELECT * FROM taikhoan WHERE idTaiKhoan='$user' ";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                    $per = $row['quyen'];
                    ?>
                    <form method="POST">
                        <label for="txtId"><b>ID</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['idTaiKhoan']; ?>" disabled>

                        <label for="txtUserName"><b> USERNAME </b></label>
                        <input type="text" name="txtUserName" class="form-control"
                            value="<?php echo $row['tenTaiKhoan'] ?>" disabled>

                        <label for="txtPassword" class="mt-2"><b> FULLNAME </b></label>
                        <input type="text" name="txtFullName" class="form-control"
                            value="<?php echo $row['hoVaTen']; ?>" placeholder="Enter FullName">

                        <label for="txtPassword" class="mt-2"><b>PASSWORD</b></label>
                        <input type="text" name="txtPassWord" class="form-control" value="<?php echo $row['matKhau'] ?>"
                            placeholder="Enter Password">

                        <label for="txtEmail" class="mt-2"><b>EMAIL</b></label>
                        <input type="email" name="txtEmail" class="form-control" value="<?php echo $row['email'] ?>"
                            placeholder="Enter Email">

                        <label for="txtPhone" class="mt-2"><b>PHONE</b></label>
                        <input type="text" name="txtPhone" class="form-control" value="<?php echo $row['sdt'] ?>"
                            placeholder="Enter Phone">

                        <label for="txtAddress" class="mt-2"><b>ADDRESS</b></label>
                        <input type="text" name="txtAddress" class="form-control" value="<?php echo $row['diaChi'] ?>"
                            placeholder="Enter Phone">

                        <label for="txtPassword" class="mt-2"><b>PERMISSION</b></label>
                        <select class="custom-select" id="sltQuyen" name="sltQuyen">
                            <?php
                            if ($per == 1) { ?>
                            <option value="0">KHÁCH HÀNG</option>
                            <option value="1" selected>ADMIN</option>
                            <?php    } else { ?>
                            <option value="0" selected>KHÁCH HÀNG</option>
                            <option value="1">ADMIN</option>
                            <?php } ?>
                        </select>
                        <div class="mt-3">
                            <a href="http://localhost/Foody/UIAdmin/Account/account.php" class="btn btn-secondary"
                                style="width: 110px;"><i class="fas fa-arrow-circle-left"></i>&nbsp;BACK</a>
                            <button type="submit"
                                onclick="return confirm('Bạn có muốn cập nhật thông tin tài khoản này không?');"
                                class="btn btn-warning" style="width: 110px;" name="btnUpdate"> <i
                                    class="fas fa-edit"></i>&nbsp;UPDATE
                            </button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['btnUpdate'])) {
                        $fullName = $_POST['txtFullName'];
                        $passWord = $_POST['txtPassWord'];
                        $email = $_POST['txtEmail'];
                        $phone = $_POST['txtPhone'];
                        $address = $_POST['txtAddress'];
                        $choosePer = $_POST['sltQuyen'];
                        $sqlUpdate = "UPDATE taikhoan SET hoVaTen = '$fullName', matKhau = '$passWord', email = '$email', sdt = '$phone', diaChi = '$address', quyen = '$choosePer'
                                WHERE idTaiKhoan = '$user' ";
                               
                        $query = mysqli_query($conn, $sqlUpdate);
                        
                        if ($query) {
                                echo    "<script> 
                                            alert('Bạn đã cập nhật thông tin tài khoản thành công!');
                                            location.href = 'http://localhost/Foody/UIAdmin/Account/account.php';
                                        </script>";
                        }else{
                            echo    "<script>
                                        alert('Cập nhật thất bại');
                                        location.href = 'http://localhost/Foody/UIAdmin/Account/account.php';
                                    </script>";
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class=" my-2">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Chăm sóc khách hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ưu đãi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mã giảm giá</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Chính sách bảo mật</a>
            </li>
        </ul>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
</body>

</html>
<?php ob_end_flush(); ?>