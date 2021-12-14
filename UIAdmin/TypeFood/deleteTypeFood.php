<?php
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    if(isset($_GET['loaiMon'])){
        $idLoaiMon = $_GET['loaiMon'];
        $sql = "DELETE FROM loaimonan WHERE idLoaiMonAn=$idLoaiMon";
        $query = mysqli_query($conn, $sql);
        if($query)
            echo    "<script>alert('Xoá loại món ăn thành công!');
                        location.href = 'http://localhost/Foody/UIAdmin/TypeFood/typeFood.php';
                    </script>";
        else
            echo    "<script>alert('Xoá loại món ăn thất bại! Nếu muốn xoá hãy xoá các món ăn liên quan đến món ăn này.');
                        location.href = 'http://localhost/Foody/UIAdmin/TypeFood/typeFood.php';
                    </script>";
    }
?>