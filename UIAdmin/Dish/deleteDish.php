<?php
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
        if(isset($_GET['idMonAn'])){
        $idMonAn = $_GET['idMonAn'];
        $sql = "DELETE FROM monan WHERE idMonAn=$idMonAn";
        $query = mysqli_query($conn, $sql);
        if($query)
            echo "<script>alert('Xoá món ăn thành công!');location.href = 'http://localhost/Foody/UIAdmin/Dish/dish.php';</script>";
        else
            echo "<script>alert('Xoá món ăn thất bại!');</script>";
    }
?>