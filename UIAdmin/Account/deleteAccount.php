<?php
        include ('/xampp/htdocs/Foody/DBConnect/connect.php');
        if(isset($_GET['taiKhoan'])){
        $taiKhoan = $_GET['taiKhoan'];
        $sql = "DELETE FROM taikhoan WHERE idTaiKhoan=$taiKhoan";
        $query = mysqli_query($conn, $sql);
        if($query)
            echo    "<script>alert('Đã xóa tài khoản thành công!');
                        location.href = 'http://localhost/Foody/UIAdmin/Account/account.php';
                    </script>";
        else
            echo "<script>alert('Xoá tài khoản thất bại!');</script>";
    }
?>