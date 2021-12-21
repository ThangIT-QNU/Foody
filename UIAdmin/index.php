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
<style>
img {
    border-radius: 2%;
    width: 100%;
}
</style>

<body class="px-5" style=" background-color:#F5F5F5; font-family: 'Times New Roman', Times, serif;">
    <div class="container">
        <div>
            <img style="margin-top:0px;" height="200px" width="100%" src="../Asset/Image/baner.jpg" alt="">
        </div>
        <div>
            <ul class="nav">
                <li class="nav-item align-self-center">
                    <a href="http://localhost/Foody/index.php">
                        <img height="50px" width="160px" src="../Asset/Image/now.jpg">
                    </a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link active" href="http://localhost/Foody/UIAdmin/index.php">TRANG CHỦ</a>
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
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Comment/comment.php">ĐÁNH GIÁ</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Cart/carts.php">GIỎ HÀNG</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Bill/bills.php">ĐƠN ĐẶT HÀNG</a>
                </li>
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
                          <a class='dropdown-item' href='http://localhost/Foody/index.php?btnDangXuat=1'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a>
                        </div>
                      </div>";
                    else 
                        echo "<a style='width:110px;' href='http://localhost/Foody/login.php' class='btn btn-success'>
                                <i class='fas fa-user-alt'></i>&nbsp;Đăng nhập
                              </a>";
                    ?>
                </li>
            </ul>
        </div>
        <hr>

        <div>
            <h4 class="text-center"><b>ADMINSTRATOR MANAGER</b></h4>
            <div>
                <ul class="nav justify-content-center">

                </ul>
            </div>
            <div class="mt-2">
                <div class="text-center ">
                    <img style="" src="https://fabi.vn/wp-content/uploads/2021/01/khach-hang-fastfood.jpg">
                </div>
            </div>
        </div>
        <div>
            <hr>
            <footer class="text-center text-lg-start bg-light text-muted">
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="#">Đinh Thành Thắng</a>
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