<?php
session_start();
require_once('utils/utility.php');
require_once('database/dbhelper.php');

$user = getUserToken();
$sql = "select * from Category";
$menuItems = executeResult($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Chủ - LuxG Shop</title>
    <link rel="shortcut icon" href="assets/photos/logo.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <style type="text/css">
        .nav li {
            text-transform: uppercase;
            color: #28a745;
            margin-top: 20px;
        }
        .nav li a {
            color: #28a745;
            font-weight: bold;
        }

        .carousel-inner img {
            height: 420px;
            width: 100%;
        }

        .product-item:hover {
            background-color: #f5f6f7;
            cursor: pointer;
            margin-bottom: 10px;
        }

        footer {
            padding-top: 20px;
        }

        footer ul {
            list-style-type: none;
            padding: 0px;
            margin: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .cart_icon {
            position: fixed;
            z-index: 999999;
            right: 0px;
            top: 45%;
        }

        .cart_icon img {
            width: 45px;
        }

        .cart_icon .cart_count {
            background-color: red;
            color: white;
            font-size: 16px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: bold;
            border-radius: 12px;
            position: fixed;
            right: 40px;
        }
    </style>
</head>
<body>
<!-- Menu START -->
<div class="container">
    <ul class="nav">
        <li class="nav-item" style="margin-top: 0px !important;">
            <a href="index1.php"><img src="assets/photos/logo.png" style="height: 80px;"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index1.php">Trang Chủ</a>
        </li>
        <?php
        foreach($menuItems as $item) {
            echo '<li class="nav-item">
				    <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
				  </li>';
        }
        ?>

        <li class="nav-item">
            <a class="nav-link" href="contact.php">Liên Hệ</a>
        </li>
        <li class="nav-item">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" aria-label="Search">
        </li>

        <li class="nav-item">
            <a style="color: #333333; font-size: 12px" class="nav-link" href="#"><?=$user['fullname']?></a>
        </li>
        <li class="nav-item">
            <a style="color: red; font-size: 12px" class="nav-link" href="admin/authen/logout.php">Đăng Xuất</a>
        </li>
    </ul>
</div>
<!-- Menu Stop -->