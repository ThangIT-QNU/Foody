<?php
session_start();
if(isset($_SESSION['taiKhoan']))
{
    unset($_SESSION['taiKhoan']);
    header('location:http://localhost/Foody/index.php');
}