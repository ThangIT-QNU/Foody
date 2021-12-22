<?php
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    $idOder = $_GET['idOder'];
    $sql = "DELETE FROM oder WHERE idOder = '$idOder'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo    "<script> 
                    alert('Bạn đã xóa đánh giá thành công!');
                    location.href = 'http://localhost/Foody/UIAdmin/Bill/bill.php';
                </script>";
    }else{
        echo    "<script>
                    alert('Xóa đánh giá thất bại');
                    location.href = 'http://localhost/Foody/UIAdmin/Bill/bills.php';
                </script>";
    }
?>