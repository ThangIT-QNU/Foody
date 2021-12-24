<?php ob_start();
    session_start();

    //Check phân quyền
    if (isset($_SESSION['quyen']))
    {
        if ($_SESSION['quyen'] == '1'){
            header('http://localhost/Foody/UIAdmin/index.php');
        }
        else{
            echo    "<script> 
                        alert('Bạn không có quyền truy cập trang này!');
                        location.href = 'http://localhost/Foody/index.php';
                    </script>";
                }
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
                        <img height="50px" width="110px" src="../../Asset/Image/now.jpg">
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
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/Bill/bills.php">ĐƠN HÀNG</a>
                </li>
                <li class="nav-item align-self-center">
                    <a class="nav-link" href="http://localhost/Foody/UIAdmin/BillDetail/billDetail.php">CHI TIẾT ĐƠN
                        HÀNG</a>
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

        <div class="container">
            <h4 class="text-center"><b>ADMINS - SEARCH COMMENT</b></h4>
            <div>
            </div>
            <div class="mt-2">
                <div class="text-center my-1 bg-dark text-light" style="height: 46px; line-height: 46px;">
                    <b>DANH SÁCH CÁC BÀI ĐÁNH GIÁ</b>
                </div>
                <div>
                    <div class="container">
                        <form method="GET">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="search" name="keySearch" required class="form-control mb-3"
                                        placeholder="Enter Search" style="width: 980px;">
                                </div>
                                <div class="col-xs-6 ml-2">
                                    <input type="submit" value="SEARCH" class="btn btn-primary" name="btnSearch">
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_GET['btnSearch'])) {
                            $keySearch = $_GET['keySearch'];
                            header("Location: http://localhost/Foody/UIAdmin/Comment/searchComment.php?key=$keySearch");
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="scrollTable " id="fixScroll">
                <table class="table table-striped text-center">
                    <tbody>
                        <tr>
                            <th class="align-middle">ID</th>
                            <th class="align-middle">Họ và tên</th>
                            <th class="align-middle">E-Mail</th>
                            <th class="align-middle">Tiêu đề</th>
                            <th class="align-middle">Nội dung</th>
                            <th class="align-middle">Ngày đánh giá</th>
                            <th class="align-middle">Trạng thái</th>
                            <th class="align-middle">Món ăn</th>
                            <th colspan="2">
                            </th>
                        </tr>
                        <?php
                            include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                            if (isset($_GET['key']))
                                $keySearch = $_GET['key'];
                            //
                            $soDongHT = 3;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $pageTT = ($page - 1) * $soDongHT;
                            $allDong = mysqli_query($conn, "SELECT * FROM danhgia WHERE tieuDe LIKE '%$keySearch%'")->num_rows;
                            $allPage = ceil($allDong / $soDongHT);
                            //
                            $sql = "SELECT * FROM danhgia WHERE tieuDe LIKE '%$keySearch%' LIMIT $soDongHT OFFSET $pageTT";
                            $query = mysqli_query($conn, $sql);
                            while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="align-middle"><?= $row['idDanhGia'] ?></td>
                            <td class="align-middle"><?= $row['hoVaTen'] ?></td>
                            <td class="align-middle"><?= $row['email'] ?></td>
                            <td class="align-middle"><?= $row['tieuDe'] ?></td>
                            <td class="align-middle"><?= $row['noiDung'] ?></td>
                            <td class="align-middle">
                                <?php
                                    $date = date('d/m/Y - H:i:s',strtotime($row['ngayDanhGia']));
                                    echo $date;
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                    if($row['trangThai'] == 0){
                                ?>
                                <a href="http://localhost/Foody/UIAdmin/Comment/updateComment.php?idDanhGia=<?= $row['idDanhGia'] ?>"
                                    class="btn btn-info"><span class="fas fa-edit"></span> Xác Nhận </a>
                                <?php 
                                    }else echo "Đã Xác Nhận"
                                ?>
                            </td>
                            <td class="align-middle"><?= $row['idMonAn'] ?></td>
                            <td class="align-middle" style="width: 150px;">
                                <a href="http://localhost/Foody/UIAdmin/Comment/deleteComment.php?idDanhGia=<?= $row['idDanhGia'] ?>"
                                    onclick="return confirm('Bạn có muốn xoá tài khoản này không?');"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;DELETE</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link"
                                href="http://localhost/Foody/UIAdmin/Comment/searchComment.php?key=<?= $keySearch ?>&page=1">Trang
                                đầu</a></li>
                        <?php
                        for ($num = 1; $num <= $allPage; $num++) {
                            if ($num != $page) {
                                if ($num > $page - 2 && $num < $page + 2) {
                        ?>
                        <li class="page-item"><a class="page-link"
                                href="http://localhost/Foody/UIAdmin/Comment/searchComment.php?key=<?= $keySearch ?>&page=<?= $num ?>"><?= $num ?></a>
                        </li>
                        <?php
                                }
                            } else {
                                ?>
                        <li class="page-item active"><a class="page-link"
                                href="http://localhost/Foody/UIAdmin/Comment/searchComment.php?key=<?= $keySearch ?>&page=<?= $num ?>"><?= $num ?></a>
                        </li>
                        <?php }
                        } ?>
                        <li class="page-item"><a class="page-link"
                                href="http://localhost/Foody/UIAdmin/Comment/searchComment.php?key=<?= $keySearch ?>&page=<?= $allPage ?>">Trang
                                cuối</a></li>
                    </ul>
                </nav>
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