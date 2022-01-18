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
      $sql = "SELECT * FROM monan where idMonAn =".$idMonAn." ";
      $result = mysqli_query($conn,$sql);

      // Lấy tất cả các mảng của biến $result
      $row = mysqli_fetch_array($result);
      //Lấy tổng dòng (kết quả) xem thử có bao nhiêu kết quả
      if (mysqli_num_rows($result) > 0) {
        //Kiểm xem session[cart](giỏ hàng) có tồn tại hay không
        if (isset($_SESSION['cart'])) {
          // Có 2 session  $_SESSION['cart'](), $_SESSION['number']
          //Kiểm tra xem idMonAn đã có trong giỏ hàng hay chưa
          if (isset($_SESSION['cart'][$idMonAn])) {
            //Nếu có rồi thì nó +=1
            $_SESSION['cart'][$idMonAn]['count'] +=1;
            $_SESSION['number'] +=1 ;
          }else{
            //Nếu idMonAn chưa có thì mặt định =1
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
          //Nếu chưa có $_SESSION['cart'] thì tạo session cart và các giá trị trong session 
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