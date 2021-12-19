<?php ob_start(); 
    session_start();
    //
    if(!isset($_SESSION['taiKhoan'])) 
    {  
        echo "<script> 
                alert('Vui lòng đăng nhập để vào giỏ hàng!');location.href = 'http://localhost/Foody/login.php';
            </script>";
        exit;
    }
    
    // session cart
    if (isset($_SESSION['cart'])) {
      $price = 0;
      $total = 0;
    }

    // xóa món ăn
    if (isset($_GET['idMonAn'])) {
      $idMonAn = $_GET['idMonAn'];
      unset($_SESSION['cart'][$idMonAn]);
      header('Location:http://localhost/Foody/UIClient/cart.php');
    }
    //xoa gio hang
    if(isset($_GET['delete'])){
      unset($_SESSION['cart']);
      header('location:http://localhost/Foody/UIClient/cart.php');
    }
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
                        <input type="text" name="keySearch" class="form-control" style="width: 400px;"
                            placeholder="Nhập món ăn muốn tìm kiếm">
                    </li>&nbsp;
                    <li class="nav-item align-self-center ml-1">
                        <button type="submit" value="SEARCH" class="btn btn-primary" name="btnSearch"><i
                                class="fas fa-search-plus"></i> Tìm kiếm</button>
                    </li>&nbsp;

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

        <?php
            if (isset($_GET['btnSearch'])) {
                $keySearch = $_GET['keySearch'];
                header("Location: http://localhost/Foody/UIClient/searchDish.php?key=$keySearch");
            }
        ?>

        <hr>
        <div class="container">
            <div class="mt-1">
                <h3 class="text-center"><b>GIỎ HÀNG</b></h3>
                <?php 
                    if(isset($_SESSION['cart'])){
                ?>
                <div class="col-md-12">
                    <table class="table table-bordered text-center">
                        <center>
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center">Hình Ảnh</th>
                                    <th class="text-center">Tên Món Ăn</th>
                                    <th class="text-center">Giá Tiền</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Thành Tiền</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $sum = 0;
                                        if (isset($_SESSION['cart'])) 
                                        {
                                        foreach ($_SESSION['cart'] as $key => $value) 
                                        {
                                            $total += $value['count'];
                                            $price = $value['count'] * $value['cost'];
                                            $sum = $sum += $price;
                                        ?>
                                <tr>
                                    <td><img style="height:50px" width="50" ;
                                            src="../Asset/IMAGE/<?php echo $value['img'] ?>"></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo number_format($value['cost']) ?> VNĐ</td>
                                    <td><?php echo $value['count'] ?></td>
                                    <td><?php echo number_format($price) ?> VNĐ</td>
                                    <td><a style="color:red" href="cart.php?idMonAn=<?php echo $key ?>"><i
                                                class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php }
                                        $_SESSION['number'] = $total;
                                    } ?>
                            </tbody>
                            <div class="cart-top">
                                <h4><b>Tổng tiền:</b><span style="color:red"> <b>
                                            <?php echo number_format($sum)  ?> VNĐ
                                        </b></span>
                                    <a class="btn btn-danger" style="float:right" href="cart.php?delete=1">Xóa Giỏ
                                        Hàng</a>
                                </h4><br>
                            </div>
                        </center>
                    </table>
                    <?php
                        if (isset($_SESSION['cart'])) {
                            if ($total == 0) {
                            unset($_SESSION['cart']);
                            } else {
                        ?>
                    <h4><b>Tổng số lượng món ăn:</b> <span
                            class="badge badge-secondary badge-pill"><?php echo $total ?></span></h4>
                    <?php }
                        } ?>
                </div>
            </div>
            <!-- ------------------------------------------------------------------------------------ -->
            <?php 
            include ('/xampp/htdocs/Foody/DBConnect/connect.php');
            if(isset($_SESSION['idTaiKhoan']))
            $user = $_SESSION['idTaiKhoan'];           
            $sql = "SELECT * FROM taikhoan WHERE idTaiKhoan='$user' ";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <b> Lưu ý: những trường có dấu <span class="text-danger">(*) </span> đều bắt buộc phải
                            nhập!!!</b>
                        <br><br>
                    </div>
                </div>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="row">
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
                        <h5> <b>Email</b></h5>
                        <input value="<?php echo $row['email'] ?>" class="form-control" name="txtEmail" type="email">
                    </div>
                    <div class="col-md-6">
                        <h5> <b> Địa chỉ: </b> <span class="text-danger"> *</span></h5>
                        <input type="text" value="<?php echo $row['diaChi'] ?>" class="form-control" required
                            name="txtAddress" placeholder="Vui lòng nhập chính xác địa chỉ để giao hàng ...">
                        </input>
                    </div>
                    <div class="col-md-12">
                        <h5><b>Ghi chú:</b></h5>
                        <input type="text" class="form-control" name="txtNotes" placeholder="Nhập ghi chú ...">
                        <br>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-info float-left" href="http://localhost/Foody/index.php">Tiếp Tục Mua
                            Hàng</a>
                    </div>
                    <div class="col-md-6">
                        <button name="btnOrder" type="submit" class="btn btn-success float-right">Xác Nhận Thanh
                            Toán</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        }   //end if
        if(!isset($_SESSION['cart'])){
        ?>
        <div class="pt-5" style="color:red; height: 300px;">
            <center>
                <h2><b>Giỏ hàng của bạn trống!</b></h2>
                <b>Vui lòng thêm sản phẩm vào giỏ hàng.</b>
            </center>
        </div>
        <?php
        }
        ?>
        <div class="pt-5"></div>
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous">
    </script>
</body>

</html>
<?php ob_end_flush(); ?>

<?php 
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    if(isset($_POST['btnOrder'])){
        //Lấy thông tin khách hàng từ form
        $fullName = $_POST['txtFullName'];
        $phone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        if(isset($_POST['txtEmail'])){
            $email = $_POST['txtEmail'];
        }else{
            $email = '';
        }
        if(isset($_POST['txtNotes'])){
            $notes = $_POST['txtNotes'];
        }else{
            $notes = '';
        }
        
        $idKhachHanng = $_SESSION['idTaiKhoan'];
        
        // print_r( $_SESSION);
        // die();
        $sqlInsert = " INSERT INTO oder(idKhachHang, tongTien, tenKhachHang, email, diaChi, sdt, ghiChu, trangThai) 
                        VALUES ('$idKhachHanng','$sum','$fullName','$email','$address','$phone', '$notes','0')";
        $query = mysqli_query($conn, $sqlInsert);
        $idOder = mysqli_insert_id($conn);
        // if($query){
        //     echo    "<script> 
        //                 alert('Chúc mừng Quý khách đã đăng nhập thành công!');location.href = 'http://localhost/Foody/UIClient/cart.php';
        //             </script>";
        //         }
        // else{
        //     echo    "<script> 
        //                 alert('Không thành công!');location.href = 'http://localhost/Foody/UIClient/cart.php';
        //             </script>";
        // }
        foreach($_SESSION['cart'] as $key => $value)
        {
            $sqlOder = "INSERT INTO chitietoder(idOder, idMonAn, giaTien, soLuongMua,tongTien, trangThai) 
                            VALUES ('$idOder', '$key', '".$value['cost']."', '".$value['count']."','".$value['cost']*$value['count']."', '0')";
            $queryOder = mysqli_query($conn,$sqlOder);
            // print_r($sqlOder);
            // die();
            if ($queryOder){
                unset($_SESSION['cart']);
                echo    "<script> 
                        alert('Chúc mừng Quý khách đã thanh toán thành công! Chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất.');
                        location.href = 'http://localhost/Foody/UIClient/cart.php';
                    </script>";
                }
            else{
                echo    "<script> 
                            alert('Thanh toán không thành công!');location.href = 'http://localhost/Foody/UIClient/cart.php';
                        </script>";
                        
                }
    }
}
        // foreach($_SESSION['cart'] as $key => $value)
        // {
                
        //     $sql="SELECT * FROM monan WHERE idMonAn=$key";
        //     $rows=mysqli_query( $conn, $sql);
        //     $row=mysqli_fetch_array($rows);
        //     $ban = $row['daban']+$value['count'];
        //     $sql="UPDATE monan SET daban='$ban' WHERE idMonAn=$key";
        //     $sqlQuery = mysqli_query($conn,$sql);
        //     print_r($sqlQuery);
        //     die();
        // }


    // session_unset();
    // unset($_SESSION['cart']);

?>