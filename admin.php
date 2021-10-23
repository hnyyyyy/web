<?php 
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        ob_start();
        session_start();
        if(isset($_SESSION['loginAdmin'])|| isset($_SESSION["loginNhanVien"])){
        }else{
                header("location:login.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/all.css">
    <script src="css/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="app">
        <header class="headerad">
            <div class="admin">
                <a href="admin.php" class="admin_btn"><?php if(isset($_SESSION['loginAdmin'])){
                    echo "Admin";}else
                    {echo "Nhân Viên";}  ?></a>
            </div>

            <div class="logout">
                <form method="POST" action="login.php" >
                     <button type="submit" name="logout" style="    background-color: red;
                        color: white;
                        font-size: 24px;
                        border-radius: 7px;"> Logout <i class="fas fa-user"></i></button>

                </form>
              
            </div>

        </header>
        <div class="app_container">
            <div class="grid">
                <div class="grid_row  app_content">
                    <div class="grid_column-2 ">
                        <nav class="category">
                            <h3 class="category-heading">
                                <i class="fas fa-list category-heading-icon"></i>
                                Danh mục
                            </h3>
                        <ul class="category-list category-item--active" style="padding: 12px;">

                            <?php

                            if(isset($_SESSION['loginAdmin'])){
                                ?>
                                <li class="category-item">
                                    <a href="hanghoa.php" class="category-item-link">Hàng Hóa</a>
                                </li>
                                <li class="category-item">
                                    <a href="loaihang.php" class="category-item-link">Loại Hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="chitietdonhang.php" class="category-item-link">Chi Tiết Đơn Hàng</a>
                                </li>
                                   <li class="category-item">
                                    <a href="dathang.php" class="category-item-link">Đặt Hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="diachikhachhang.php" class="category-item-link">Địa Chỉ Khách hàng</a>
                                </li>
                                 <li class="category-item">
                                    <a href="khachhang.php" class="category-item-link">Khách Hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="nhanvien.php" class="category-item-link">Nhân Viên</a>
                                </li>
                           <?php } ?>

                             <?php
                               if(isset($_SESSION['loginNhanVien'])){
                                ?>
                                <li class="category-item">
                                    <a href="hanghoa.php" class="category-item-link">Hàng Hóa</a>
                                </li>
                                <li class="category-item">
                                    <a href="loaihang.php" class="category-item-link">Loại Hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="chitietdonhang.php" class="category-item-link">Chi Tiết Đơn Hàng</a>
                                </li>
                                   <li class="category-item">
                                    <a href="dathang.php" class="category-item-link">Đặt Hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="diachikhachhang.php" class="category-item-link">Địa Chỉ Khách hàng</a>
                                </li>
                                 <li class="category-item">
                                    <a href="khachhang.php" class="category-item-link">Khách Hàng</a>
                                </li>
                           <?php } ?>
                             
                                
                          </ul>
            
                        </nav>
        </div>
    </div>
        
</body>
</html>

<?php
        mysqli_close($conn);
?>