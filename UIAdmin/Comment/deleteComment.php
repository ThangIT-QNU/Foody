<?php
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    $idDanhGia = $_GET['idDanhGia'];
    $sql = "DELETE FROM danhgia WHERE idDanhGia = '$idDanhGia'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo    "<script> 
                    alert('Bạn đã xóa đánh giá thành công!');
                    location.href = 'http://localhost/Foody/UIAdmin/Comment/comment.php';
                </script>";
    }else{
        echo    "<script>
                    alert('Xóa đánh giá thất bại');
                    location.href = 'http://localhost/Foody/UIAdmin/Comment/comment.php';
                </script>";
    }
?>