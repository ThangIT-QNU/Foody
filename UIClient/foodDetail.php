<?php ob_start();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foody | Chi Tiết Món Ăn</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../Asset/CSS/hienthichitiet.css">
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

        <form method="GET">
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
            <div class="mt-1">
                <h3 class="text-center"><b>THÔNG TIN CHI TIẾT MÓN ĂN</b></h3>
                <div class="d-flex flex-wrap justify-content-center">
                    <?php
                    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                    if (isset($_GET['idMonAn']))
                        $idMonAn = $_GET['idMonAn'];
                        $sql = "SELECT * FROM monan,loaimonan WHERE monan.idLoaiMonAn = loaimonan.idLoaiMonAn AND idMonAn = '$idMonAn' ";
                        $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="bug"></div>
                    <div class="formHienThiSach">
                        <center>
                            <form method="POST">
                                <table>
                                    <tr>
                                        <td rowspan="18">
                                            <img style="width: 320px; height: 420px; "
                                                src="../Asset/IMAGE/<?= $row['hinhAnh'] ?> " alt="IMAGE"><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title" style="background-color: #efefef;"><b>Tên Món Ăn:</b></td>
                                        <td style="background-color: #fafafa; padding-left: 20px;"><b
                                                style="font-size: 20px;"><?= $row["tenMonAn"] ?></b></td>
                                    </tr>
                                    <tr>
                                        <td class="title"><b>Thông Tin Món Ăn:</b></td>
                                        <td>
                                            <?= $row["thongTinMonAn"] ?>
                                        </td>
                                    </tr>
                                    <td class="title" style="background-color: #efefef;"><b>Loại
                                            Món Ăn:</b></td>
                                    <td style="padding-left: 20px;"><?= $row["tenLoaiMonAn"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="title"><b>Số lượng:</b></td>
                                        <td style="padding-left: 20px;"><?= $row["soLuong"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="title" style="background-color: #efefef;"><b>Giá bán:</b></td>
                                        <td style="background-color: #efefef; padding-left: 20px;">
                                            <?= number_format($row['giaBan']) ?> VNĐ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="margin-left: 5px;">
                                                <a class="btn btn-danger" href="http://localhost/Foody/index.php">Quay
                                                    Lại</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="margin-left: 282px;">
                                                <a class="btn btn-success"
                                                    href="http://localhost/Foody/UIClient/addCart.php?idMonAn=<?= $row['idMonAn']?>">Mua
                                                    Hàng</a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </center>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <hr>

            <!-- Hiển thị comment -->
            <div class="mt-1">
                <div class="row p-t-20">
                    <div class="col-md-12">
                        <?php
                        include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                        $soDongHT = 3;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $pageTT = ($page - 1) * $soDongHT;
                        $allDong = mysqli_query($conn, "SELECT * FROM danhgia WHERE trangThai='1' AND idMonAn = '$idMonAn'")->num_rows;
                        $allPage = ceil($allDong / $soDongHT);
                        $sql = "SELECT * FROM danhgia WHERE trangThai='1' AND  idMonAn = '$idMonAn' LIMIT $soDongHT OFFSET $pageTT";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="d-flex align-items-center">
                            <div class="col-1">
                                <i style="color: #FF5622; " class="fas fa-user fa-4x"></i>
                            </div>
                            <div class="col-10">
                                <b>"<i><?php echo $row['tieuDe']?></i>"</b> - <?php echo $row['noiDung']?><br>

                                <span style="color: #FF5622;"><b><?php echo $row['hoVaTen']?></b></span> - Đánh giá vào:
                                <?php
                                    $date = date('d/m/Y - H:i:s',strtotime($row['ngayDanhGia']));
                                    echo $date;
                                ?>
                            </div>
                        </div>
                        <?php }  ?>
                    </div>
                </div>
                <!-- Phân trang comment -->
                <div class="float-left mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link"
                                    href="http://localhost/Foody/UIClient/foodDetail.php?idMonAn=<?= $idMonAn?>page=1">Trang
                                    đầu</a></li>
                            <?php
                        for ($num = 1; $num <= $allPage; $num++) {
                            if ($num != $page) {
                                if ($num > $page - 2 && $num < $page + 2) {
                        ?>
                            <li class="page-item"><a class="page-link"
                                    href="http://localhost/Foody/UIClient/foodDetail.php?idMonAn=<?= $idMonAn?>&page=<?= $num ?>"><?= $num ?></a>
                            </li>
                            <?php
                                }
                            } else {
                                ?>
                            <li class="page-item active"><a class="page-link"
                                    href="http://localhost/Foody/UIClient/foodDetail.php?idMonAn=<?= $idMonAn?>&page<?= $num ?>"><?= $num ?></a>
                            </li>
                            <?php }
                        } ?>
                            <li class="page-item"><a class="page-link"
                                    href="http://localhost/Foody/UIClient/foodDetail.php?idMonAn=<?= $idMonAn?>&page=<?= $allPage ?>">Trang
                                    cuối</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Form comment -->
            <div class="mt-1">
                <div>
                    <form action="" method="post">
                        <div class="pt-5" style="color:blue; height: 100px;">
                            <h2 class="text-center"><b>FORM ĐÁNH GIÁ:</b></h2>
                        </div>
                        <div class="col-md-12">
                            <?php
                                include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                                if(isset($_SESSION['idTaikhoan']))
                                $user = $_SESSION['idTaikhoan'];           
                                $sql = "SELECT * FROM taikhoan WHERE idTaiKhoan='$user' ";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($query);
                            ?>
                            <div class="row p-t-20">
                                <div class="col-md-3">
                                    <h5> <b>E-mail:</b> <span class="text-danger"> *</span>
                                    </h5>
                                    <input type="email" class="form-control" placeholder="Vui lòng nhập email" required
                                        name="txtEmail">
                                </div>
                                <div class="col-md-3">
                                    <h5> <b>Chủ đề:</b> <span class="text-danger"> *</span></h5>
                                    <input placeholder="Vui lòng nhập chủ đề" required class="form-control" type="text"
                                        name="txtTitle">
                                </div>
                                <div class="col-md-3">
                                    <h5> <b>Nội dung đánh giá:</b> <span class="text-danger">
                                            *</span></h5>
                                    <input placeholder="Vui lòng nội dung đánh giá" required type="text"
                                        class="form-control" name="txtInformation">
                                </div>

                                <div class="col-md-12">
                                    <h5> <b>Hình ảnh: (Nếu có)</b></h5>
                                    <input type="file" class="form-control" name="imgMonAn">
                                </div>
                                <div style="height: 30px;" class="col-md-12">
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-info mx-auto d-block" type="submit" name="btnSend"
                                        value="Đánh giá">
                                </div>
                            </div>
                    </form>
                    <?php
                        include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                        if (isset($_POST['btnSend'])) {
                            if (isset($_SESSION['taiKhoan'])) {
                                $txtFullName =  $_SESSION['taiKhoan'];
                            } else {
                                $txtFullName = "Khách";
                            }
                            $txtEmail = $_POST['txtEmail'];
                            $txtTitle = $_POST['txtTitle'];
                            $txtInformation = $_POST['txtInformation'];
                            //
                            $sql = "INSERT INTO danhgia(hoVaTen, email, tieuDe, noiDung, trangThai, idMonAn) 
                                    VALUES('$txtFullName', '$txtEmail', '$txtTitle', '$txtInformation','0', '$idMonAn')";
                            $query = mysqli_query($conn, $sql);
                            if ($query)
                                echo    "<script>alert('Cảm ơn bạn đã đánh giá!');
                                            header('Location:http://localhost/Foody/UIClient/foodDetail.php');
                                        </script>";
                            else
                                echo    "<script>
                                            alert('Đánh giá thất bại!');
                                        </script>";
                        }
                    ?>
                </div>
            </div>
        </div>

        <hr>

        <div class="mt-2">
            <footer class="text-center text-lg-start bg-light text-muted">
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <div class="me-5 d-none d-lg-block">
                        <span></span>
                    </div>
                    <div>
                        <a href="" class="me-4 text-reset"><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="me-4 text-reset"><i class="fab fa-twitter"></i></a>
                        <a href="" class="me-4 text-reset"><i class="fab fa-google"></i></a>
                        <a href="" class="me-4 text-reset"><i class="fab fa-instagram"></i></a>
                        <a href="" class="me-4 text-reset"><i class="fab fa-linkedin"></i> </a>
                        <a href="" class="me-4 text-reset"> <i class="fab fa-github"></i></a>
                    </div>
                </section>

                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4"><i class="fas fa-gem me-3"></i>Thông Tin Liên Hệ
                            </h6>
                            <p>Website cung cấp thức ăn bao ngon</p>
                            <p><strong>Địa chỉ:</strong> 68 Hàm Nghi, Ngô Mây, QN</p>
                            <p><strong>Email: </strong> dinhthanhthang@gmail.com</p>
                            <p><strong>Điện thoại: </strong> 098 9725 994 </p>
                            <p><strong>Facebook: </strong>https://www.facebook.com/thangit.com.vn/</p>
                        </div>

                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                            <p><a href="#!" class="text-reset">Angular</a></p>
                            <p><a href="#!" class="text-reset">React</a></p>
                            <p><a href="#!" class="text-reset">Vue</a></p>
                            <p><a href="#!" class="text-reset">Laravel</a></p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                            <p><a href="#!" class="text-reset">Pricing</a> </p>
                            <p><a href="#!" class="text-reset">Settings</a></p>
                            <p><a href="#!" class="text-reset">Orders</a></p>
                            <p><a href="#!" class="text-reset">Help</a></p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope me-3"></i>info@example.com</p>
                            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                        </div>
                    </div>
                </div>
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2021 Copyright:
                    <a class="text-reset fw-bold" href="#">ThangIT_QNU</a>
                </div>
            </footer>

        </div>
    </div>

</body>

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

</html>
<?php ob_end_flush(); ?>