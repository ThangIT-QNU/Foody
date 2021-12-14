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

        <div class="container">
            <h4 class="text-center">ADMINSTRATOR - ACCOUNT</h4>
            <div>
            </div>
            <div class="mt-2">
                <div class="text-center my-3 bg-dark text-light" style="height: 46px; line-height: 46px;">
                    <b>DANH SÁCH MÓN ĂN</b>
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
                            header("Location:http://localhost/Foody/UIAdmin/Dish/searchDish.php?key=$keySearch");
                        }
                        ?>
                    </div>
                </div>
                <div class="scrollTable " id="fixScroll">
                    <table class="table table-striped text-center">
                        <tbody>
                            <tr>
                                <th class="align-middle" style="width: 120px;">ID</th>
                                <th class="align-middle" style="width: 120px;">LOẠI MÓN</th>
                                <th class="align-middle" style="width: 120px;">TÊN MÓN</th>
                                <th class="align-middle">IMAGE</th>
                                <th class="align-middle">THÔNG TIN MÓN</th>
                                <th class="align-middle">SỐ LƯỢNG</th>
                                <th class="align-middle">GIÁ</th>
                                <th colspan="2" class="align-middle">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-success" style="width: 100px;" data-bs-toggle="modal"
                                        data-bs-target="#addMonAn"><i class="fas fa-plus-circle"></i>&nbsp;ADD</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addMonAn" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">ADD DISH</h5>
                                                </div>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body text-left  ">
                                                        <label for="sltLoaiMon" class="mt-2">KIND OF FOOD</label>
                                                        <select class="custom-select" id="sltLoaiMon" name="sltLoaiMon">
                                                            <?php
                                                                include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                                                                $sql = "SELECT * FROM loaimonan";
                                                                $query = mysqli_query($conn, $sql);
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                ?>
                                                            <option value="<?= $row['idLoaiMoAn'] ?>">
                                                                <?= $row['tenLoaiMonAn'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="txtTenMon" class="mt-2">ENTER YOUR NAME FOOD <span
                                                                class="text-danger"></label>
                                                        <input type="text" class="form-control" id="txtTenMon"
                                                            name="txtTenMon" placeholder="Nhập tên món">
                                                        <label for="imgMonAn" class="mt-2">IMAGE</label>
                                                        <input type="file" class="form-control-file" name="imgMonAn"
                                                            id="imgMonAn">
                                                        <label for="txtThongTin" class="mt-2">INFORMATION</label>
                                                        <textarea name="txtThongTin" id="txtThongTin"
                                                            class="form-control" cols="30" rows="4" maxlength="500"
                                                            placeholder="Nhập thông tin (Không quá 500 kí tự)"></textarea>

                                                        <label for="txtGia" class="mt-2">QUANTITY</label>
                                                        <input type="text" class="form-control" name="txtSoLuong"
                                                            id="txtSoLuong" placeholder="Nhập số lượng">

                                                        <label for="txtGia" class="mt-2">PRICE</label>
                                                        <input type="text" class="form-control" name="txtGia"
                                                            id="txtGia" placeholder="Nhập  giá">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            style="width: 100px;" data-bs-dismiss="modal">CLOSE</button>
                                                        <input type="submit" class="btn btn-success"
                                                            style="width: 100px;" value="ADD" name="btnADD">
                                                    </div>
                                                </form>
                                                <?php
                                                include ('/xampp/htdocs/Foody/DBConnect/connect.php');
                                                if (isset($_POST['btnADD'])) {
                                                $perMis = $_POST['sltLoaiMon'];
                                                $tenMon = $_POST['txtTenMon'];
                                                $nameImg = $_FILES['imgMonAn']['name'];
                                                $thongTin = $_POST['txtThongTin'];
                                                $soLuong = $_POST['txtSoLuong'];
                                                $giaBan = $_POST['txtGia'];
                                                    //
                                                    if ($nameImg != "") {
                                                        $sqlInsert1 = "INSERT INTO monan(idLoaiMonAn, tenMonAn, hinhAnh, thongTinMonAn, soLuong, giaBan) 
                                                        VALUES( $perMis, '$tenMon', '$nameImg', '$thongTin', '$soLuong', '$giaBan)";
                                                        $query = mysqli_query($conn, $sqlInsert1);
                                                        if ($query){
                                                            $path = '../../ASSET/IMAGE/' . $_FILES['imgMonAn']['name'];
                                                            $diaChiIMG = $_FILES['imgMonAn']['tmp_name'];
                                                            move_uploaded_file($diaChiIMG, $path);
                                                            echo "<script>alert('Thêm món ăn thành công!');</script>";
                                                        }
                                                        else
                                                            echo "<script>alert('ERROR!');</script>";
                                                    } else {
                                                        $sqlInsert2 = "INSERT INTO monan(idLoaiMonAn, tenMonAn, thongTinMonAn, soLuong, giaBan) 
                                                        VALUES($perMis, '.$tenMon.', '.$thongTin.', '.$soLuong.', $giaBan)";
                                                        $query = mysqli_query($conn, $sqlInsert2);
                                                        if ($query)
                                                            echo "<script>alert('Thêm món ăn thành công!');</script>";
                                                        else
                                                            echo "<script>alert('ERROR!');</script>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <?php
                            $soDongHT = 2;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $pageTT = ($page - 1) * $soDongHT;
                            $allDong = mysqli_query($conn, "SELECT * FROM loaimonan, monan WHERE loaimonan.idLoaiMonAn = monan.idLoaiMonAn")->num_rows;
                            $allPage = ceil($allDong / $soDongHT);
                            $sql = "SELECT * FROM loaimonan, monan WHERE loaimonan.idLoaiMonAn = monan.idLoaiMonAn LIMIT $soDongHT OFFSET $pageTT";
                            $query = mysqli_query($conn, $sql);
                            while ($row = $query->fetch_assoc()) {
                            ?>
                            <tr>
                                <td class="align-middle"><?= $row['idMonAn'] ?></td>
                                <td class="align-middle"><?= $row['tenLoaiMonAn'] ?></td>
                                <td class="align-middle"><?= $row['tenMonAn'] ?></td>
                                <td class="align-middle">
                                    <img class="rounded" style="width: 120px; height: 120px;"
                                        src="http://localhost/Foody/Asset/IMAGE/<?= $row['hinhAnh'] ?>" alt="">
                                </td>
                                <td class="align-middle"><?php echo substr($row['thongTinMonAn'], 0, 100)?></td>
                                <td class="align-middle"><?= $row['soLuong'] ?></td>
                                <td class="align-middle" style="width: 150px;"><?= number_format($row['giaBan']) ?> VNĐ
                                </td>
                                <td class="align-middle"><a
                                        href="http://localhost/Foody/UIAdmin/Dish/updateDish.php?idMonAn=<?= $row['idMonAn'] ?>"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>&nbsp;UPDATE</a></td>

                                <td class="align-middle"><a
                                        href="http://localhost/Foody/UIAdmin/Dish/deleteDish.php?idMonAn=<?= $row['idMonAn'] ?>"
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
                                    href="http://localhost/Foody/UIAdmin/Dish/dish.php?page=1">Trang đầu</a>
                            </li>
                            <?php
                        for ($num = 1; $num <= $allPage; $num++) {
                            if ($num != $page) {
                                if ($num > $page - 2 && $num < $page + 2) {
                        ?>
                            <li class="page-item"><a class="page-link"
                                    href="http://localhost/Foody/UIAdmin/Dish/dish.php?page=<?= $num ?>"><?= $num ?></a>
                            </li>
                            <?php
                                }
                            } else {
                                ?>
                            <li class="page-item active"><a class="page-link"
                                    href="hhttp://localhost/Foody/UIAdmin/Dish/dish.php?page=<?= $num ?>"><?= $num ?></a>
                            </li>
                            <?php }
                        } ?>
                            <li class="page-item"><a class="page-link"
                                    href="http://localhost/Foody/UIAdmin/Dish/dish.php?page=<?= $allPage ?>">Trang
                                    cuối</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <hr>
        <div class="my-2">
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