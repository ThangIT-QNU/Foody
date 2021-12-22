<?php
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    $idOder = $_GET['idOder'];
    $sqlUpdate = "UPDATE oder SET trangThai ='1' WHERE idOder = '$idOder'";
    $query = mysqli_query($conn, $sqlUpdate);
    if ($query) {
        echo    "<script> 
                    alert('Xác nhận đơn hàng thành công!');
                    location.href = 'http://localhost/Foody/UIAdmin/Bill/Bills.php';
                </script>";
    }else{
        echo    "<script>
                    alert('Xác nhận thất bại');
                    location.href = 'http://localhost/Foody/UIAdmin/Bill/Bills.php';
                </script>";
    }
?>