<?php 
    session_start();
           
    if(!isset($_SESSION['taiKhoan'])) 
    {  
        echo "<script> 
                alert('Vui lòng đăng nhập để mua hàng!');location.href = 'http://localhost/Foody/login.php';
            </script>";
        exit;
    }
    
    if (!isset($_SESSION['number'])) {
        $_SESSION['number'] = 0;
      }
  
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    if (isset($_GET['idMonAn'])) {
      
      $idMonAn = $_GET['idMonAn'];
      $sql = "SELECT * FROM monan where idMonAn =".$idMonAn;
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,1);
      if (mysqli_num_rows($result)>0) {
        if (isset($_SESSION['cart'])) {
          if (isset($_SESSION['cart'][$idMonAn])) {
            $_SESSION['cart'][$idMonAn]['count'] +=1;
            $_SESSION['number'] +=1 ;
          }else{
            $_SESSION['cart'][$idMonAn]['count'] =1;
            $_SESSION['number'] +=1 ;
          }
            $_SESSION['cart'][$idMonAn]['img'] = $row['hinhAnh'];
            $_SESSION['cart'][$idMonAn]['name'] = $row['tenMonAn'];
            $_SESSION['cart'][$idMonAn]['cost'] = $row['giaBan'];
              echo    "<script> 
                            alert('Chúc mừng Quý khách đã thêm thành công một món ăn vào giỏ hàng');
                            location.href = 'http://localhost/Foody/UIClient/cart.php';
                        </script>";
        }else{
          $_SESSION['cart'][$idMonAn]['count'] =1;
          $_SESSION['number'] +=1 ;
          $_SESSION['cart'][$idMonAn]['img'] = $row['hinhAnh'];
          $_SESSION['cart'][$idMonAn]['name'] = $row['tenMonAn'];
          $_SESSION['cart'][$idMonAn]['cost'] = $row['giaBan'];
          echo    "<script> 
                      alert('Chúc mừng Quý khách đã thêm thành công một món ăn vào giỏ hàng');
                      location.href = 'http://localhost/Foody/UIClient/cart.php';
                  </script>";
        }
      }
    }

 ?>