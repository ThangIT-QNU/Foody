<?php
    session_start();
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    if(isset($_SESSION['btnThanhToan'])){
    $idKhachHang = $_SESSION['idKhachHang'];
    $fullName = $_GET['txtFullName'];
    $phone = $_GET['txtPhone'];
    $address = $_GET['txtAddress'];
        if(isset($_GET['txtEmail'])){
            $email = $_GET['txtEmail'];
        }else{
            $email = '';
        }
        if(isset($_GET['txtNotes'])){
            $notes = $_GET['txtNotes'];
        }else{
            $notes = '';
        }
    $sqlInsert = "INSERT INTO khachhang(idKhachHang, hoVaTen, SDT, email, diaChi) 
                VALUES ($idKhachHang, $fullName, $phone, $email, $address)";
    $query = mysqli_query($conn, $sqlInsert);
    if ($query)
        echo "<script>alert('Thêm  tài khoản thành công!');</script>";
    else
        echo "<script>alert('Thêm tài khoản thất bại, tài khoản đã bị trùng!');</script>";
}
?>


<?php
    session_start();
    include ('/xampp/htdocs/Foody/DBConnect/connect.php');
    if(isset($_GET['btnThanhToan'])){
        $taiKhoan = $_SESSION['taiKhoan'];
        //Lấy thông tin khách hàng từ form
        $fullName = $_GET['txtFullName'];
        $phone = $_GET['txtPhone'];
        $address = $_GET['txtAddress'];
        if(isset($_GET['txtEmail'])){
            $email = $_GET['txtEmail'];
        }else{
            $email = '';
        }
        if(isset($_GET['txtNotes'])){
            $notes = $_GET['txtNotes'];
        }else{
            $notes = '';
        }
        $sqlInsert = "INSERT INTO khachhang(hoVaTen, SDT, email, diaChi) 
                VALUES ($taiKhoan, $phone, $email, $address)";
        $result = mysql_query($conn, $sqlInsert);
        if($result){
			for($i=0;$i<count($_SESSION['cart']);$i++){
			$max=mysqli_query("select max(idKhachHang) from khachhang");
			$row=mysqli_fetch_array($max);
			
			$cart_id=$row[0];
			$product_id=$_SESSION['cart'][$i]['id'];
			$quantity=$_SESSION['cart'][$i]['soluong'];
			
			$price=$_SESSION['cart'][$i]['gia'];
			
			 $insert_cart_detail="insert into cart_detail(cart_id,product_id,quantity,price) values('".$cart_id."','".$product_id."','".$quantity."','".$price."');";
			 $cart_detail=mysqlii_query($insert_cart_detail);

		}
		
	}	
		unset($_SESSION['cart']);
	
		header('location:index.php?quanly=camon');
    }
        echo "$result";

?>

<!-- //lấy thông tin khách hàng để tạo đơn hàng/ -->

<!-- //insert vào bảng giỏ hàng -->

<!-- //Show confirm đơn hàng

//unset giỏ hàng -->