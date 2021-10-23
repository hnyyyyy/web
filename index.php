<?php
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        ob_start();
        session_start();
         if(isset($_GET['logout'])){
                unset($_SESSION['loginkh']);
                unset($_SESSION["tenkh"]);
        }
        if(isset($_POST['muahang'])){
            
            if(isset($_SESSION['loginkh'])){
                  $MSKH= $_SESSION["loginkh"];
            $found=0;
            while($found==0){
                $code_oder = rand(1,999999);
                $insert_dathang="INSERT INTO DatHang(SoDonDH,MSKH,MSNV,NgayDH,TrangThai) 
                VALUES ($code_oder,'$MSKH','$MSNV',CURRENT_DATE,1)";
                if($dathang_querry= mysqli_query($conn,$insert_dathang)){
                    $found=1;
                }

            }
           
            if($dathang_querry){
                foreach ($_SESSION['cart'] as $key => $value) {
                    $MSHH = $value['MSHH'];
                    $soluong=$value['number'];
                    $gia=$value['Gia'];
                    $soluongtrongkho=$value['SoLuongHang'] - $value['number'];
                    $insert_chitietdonhang ="INSERT INTO ChiTietDatHang (SoDonDH, MSHH, SoLuong, GiaDatHang) VALUES (
                        $code_oder,
                        $MSHH,
                        $soluong,
                        $gia
                        );";
                    $update_HangHoa="UPDATE HangHoa SET 
                        SoLuongHang=$soluongtrongkho
                  WHERE MSHH=$MSHH;";
                    $dathang_querry= mysqli_query($conn,$insert_chitietdonhang);
                    $update_HangHoa_querry=mysqli_query($conn,$update_HangHoa);
                }

            }
            unset($_SESSION['cart']);
            header("location:index.php?thanhtoanthanhcong=1");

            }else{
                    header("location:loginkh.php");
        }}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/all.css">
   <script src="css/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header_navbar">
                    <ul class="header_navbar-list">
                        <li class="header_navbar-item header_navbar-item-separate header_navbar_item_has_qr ">
                             <a href="index.php" title="" style="text-decoration: none; color:#fff">Cửa Hàng</a>
                         
                        </li>
                        <li class="header_navbar-item">
                            
                            <span class="no-pointer">Kết nối</span>
                            <a href="https://www.facebook.com/" class="header_navbar-icon-link">
                                <i class="header_navbar-icon fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/" class="header_navbar-icon-link">
                                <i class="header_navbar-icon fab fa-instagram-square"></i>
                            </a>


                        </li>
                    </ul>
    
                    <ul class="header_navbar-list">
                        <li class="header_navbar-item header_navbar-item-separate">

                            <?php if(isset($_GET["thanhtoanthanhcong"])){ ?>

                                <div style="color: deepskyblue;font-size: 20px">
                                <i class="header_navbar-icon fas fa-bell"></i>
                                Thông báo
                                </div>
                            
                            
                            <div class="header_notify">
                                <header class="header_notify-header">
                                    <h3>Thông Báo Mới Nhận</h3>
                                </header>
                                <ul class="header_notify-list">
                                    <li class="header_notify-item header_notify-item-viewed" style="cursor: text;">
                                            <div class="header_notify-info">
                                                <span class="header_notify-name " >Đã Đặt Hàng Thành Công</span>
                                            </div>
                                    </li>
                                </ul>
                                <footer class="header_notify-footer">
                                    <a href="thanhtoan.php" class="header_notify-footer-btn">
                                        Xem Đơn Hàng
                                    </a>
                                </footer>

                            </div> 

                        </li> <?php }else { ?>
                             <a href="" class="header_navbar-item-link">
                                <i class="header_navbar-icon fas fa-bell"></i>
                                Thông báo
                            </a>
                            <div class="header_notify">
                                <header class="header_notify-header">
                                    <h3>Chưa Có Thông Báo</h3>
                                </header>
                                <ul class="header_notify-list">
                                    <li class="header_notify-item header_notify-item-viewed">
                                       
                                    </li>
                                </ul>
                             

                            </div> 

                        </li>

                        <?php } ?>
                        <li class="header_navbar-item">

                            <a href="" class="header_navbar-item-link">
                                <i class="header_navbar-icon far fa-question-circle"></i>
                                Trợ giúp</a>
                        </li>
                        <?php
                        if(!isset($_SESSION['loginkh'])){?>
                             <li class="header_navbar-item header_navbar-item-strong">
                              <a style="text-decoration: none; color:orange;" href="dangky.php" title="">Đăng Ký </a>
                        </li>
                        <li class="header_navbar-item header_navbar-item-strong">
                                <a style="text-decoration: none; color:#ccc;" href="loginkh.php" >Đăng Nhập</a>
                        </li>

                    <?php }else{?>
                        <li class="header_navbar-item header_navbar-user">
                            
                            <img src="./assets/img/acount.png" alt="" 
                            class="header_navbar-user-img">
                            <span class="header_navbar-user-name"> <?php echo $_SESSION["tenkh"] ?></span>
                            <ul class="header_navbar-user-menu">
                                <li class="header_navbar-user-item">
                                    <a href="doimatkhau.php">Đổi mật khẩu</a>
                                </li>
                                <li class="header_navbar-user-item">
                                    <a href="chitietkhachhang.php?CTMSKH=<?php echo $_SESSION["loginkh"];?>">Thông tin Tài Khoản</a>
                                </li>
                                <li class="header_navbar-user-item">
                                    <a href="thanhtoan.php">Đơn mua</a>
                                </li>

                                <li class="header_navbar-user-item header_navbar-user-item-separate">
                                    <a href="index.php?logout=1">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>



                       <?php }?>
                       
                        
                    </ul>

                </nav>
                <!-- header-with-search -->
                <div class="header-with-search">
                    <div class="header_logo">
                        <a href="index.php" title="">
                            <img src="img/logo.jpg" alt="" class="logo">
                        </a>

                      
                    </div>

                       <div class="header_search">
                        <div class="header_search-input-wrap">
                            <form style="margin: 8px;display: flex;" method="GET">
                                    <input type="text" class="header_search-input" placeholder="Nhập để tìm kiếm sản phẩm" name="timkiem">
                                    <button tyle="submit"   class="header_search-btn" style="margin: -5px;">
                                    <i class="fas fa-search header_search-btn-icon"></i>
                                    </button>
                            </form>
                           
                        </div>
                        
                    </div>
                    <!-- cart playout -->
                    <div class="header_cart">

                        <?php 
                        $number =0;
                        $total =0;
                        if(isset($_SESSION["cart"])){
                            $cart=$_SESSION["cart"];
                             foreach ($cart as $value) {
                                  
                                $number += (int)$value['number'];
                                $total += (int)$value['Gia']*(int)$value['number'];

                           }
                        }

                        ?>
                        <div class="header_cart-wrap" id="listCart">
                            <i class="fas fa-cart-plus header_cart-icon"></i>
                            <span class="header_cart-notice" id="qty"><?php echo $number?></span>
                            <div> <span class="header_cart-notice-price" id="total"><?php echo number_format($total,0,",",".") ?></span></div>
                            <!-- no cart :header_cart-list--no-cart -->
                            <div class="header_cart-list ">
                            <img src="http://demo.shop.tickid.vn/assets/images/no-cart.png
                            " alt="" class="header_cart-no-cart-img">
                            <span class="header_cart-no-cart-msg">
                                Chưa có sản phẩm
                            </span>

                            <h4 class="header_cart-heading">
                                Sản phẩm đã thêm
                                <ul class="header_cart-list-item">
                                    <!-- cart item -->
                                <?php
                                    if(isset($_SESSION["cart"])){
                                        $cart=$_SESSION["cart"];
                                        foreach ($cart as $key => $value){?>

                                        <li class="header_cart-item">
                                        <img src="<?php echo $value["Location"] ?>"
                                            alt="" class="header_cart-img">
                                            <div class="header_cart-item-info">
                                                <div class="header_cart-item-head">
                                                    <h5 class="header_cart-item-head-name">
                                                        <a style="text-decoration: none; color: #333;" href="./chitiethanghoa.php?MSHH=<?php echo $key?>" > <?php echo $value["TenHH"]; ?> </a>
                                                    </h5>
                                                    <div class="header_cart-item-price-wrap">
                                                        <span class="header_cart-item-head-price" ><?php echo number_format($value["Gia"],0,",","."); ?>đ</span>
                                                        <span class="header_cart-item-head-multiply">x</span>
                                                        <span class="header_cart-item-head-qnt"><?php echo $value["number"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="header_cart-item-body">
                                               
                                                <span class="header_cart-item-remove"><input type="submit"  value="xóa"  onclick="deletecart(<?php echo $key ?>)" > </span>

                                            </div>
                                         </div>

                                    </li>

                                       <?php }
                                }

                                ?>
                                                                    
                                </ul>
                                <button class="btn btn-primary header_cart-view-cart"> <a style="text-decoration: none;
                            font-size: 15px;
                            font-weight: 500;color:#fff" href="cart.php" >Xem giỏ hàng</a></button>
                            
                            <form method="POST" action="">
                                <button type="submit" name="muahang" style="background-color: orange;
                                    float: left;
                                    width: 120px;
                                    height: 35px;
                                    border-radius: 5px;
                                    color: #fff;
                                    font-weight: 700;">Mua Hàng</button>
                            </form>
                            </h4>
                        </div>

                     </div>                   
                        
                    </div>
                </div>
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
                          
                            <ul class="category-list category-item--active">
                                <li class="category-item">
                                    <a href="index.php" class="category-item-link">Tất cả sản phẩm</a>
                                </li> 

                                <?php
                                $sql1 = "SELECT * FROM LoaiHangHoa";
                                $result1= mysqli_query($conn,$sql1);
                                if(!$result1){
                                die('câu truy vấn bị sai');}
                                 while($row = mysqli_fetch_array($result1)){?>

                                    <li class="category-item">
                                    <a href="index.php?MLHH=<?php echo $row['MaLoaiHang']?>" class="category-item-link"><?php echo $row['TenLoaiHang'] ?></a>
                                    </li> 

                                  <?php  }
                                ?>
                                
                            </ul>
            
                        </nav>
                    </div>
    
                    <div class="grid_column-10">
                        <div class="home_filter">
                            <span class="home_filter-btn home_filter_label">
                                sắp sếp theo
                            </span>
                         
                            <button class="home_filter-btn btn btn-primary">
                                <a href="index.php?moinhat=1" style="text-decoration: none;color: #fff">Mới Nhất</a>

                            </button>
                           

                            <div class="select_input" style="float:left;">
                                <span class="select_input-label">Giá</span>
                                <i class="fas fa-chevron-down"></i>

                                
                                <ul class="select_input-list">  
                                    <li class="select_input-item">
                                        <a href="index.php?xapxep=1" class="select_input-link">Giá: thấp đến cao</a>
                                    </li>
                                    <li class="select_input-item">
                                        <a href="index.php?xapxep=2" class="select_input-link">Giá: cao đến thấp</a>
                                    </li>
                                </ul>
                            </div>
                        
                        </div>

                        <div class="home-product">
                            <div class="grid_row ">
                                <!-- product-item -->
                                <?php
                                $item_per_page=10;
                                $current_page =1;
                                if(isset($_GET['per_page']) && isset($_GET['page'])){
                                    $item_per_page=$_GET['per_page'];
                                    $current_page =$_GET['page'];
                                }
                                $count=0;
                                $offset=($current_page-1)*$item_per_page;
                               if(isset($_GET['timkiem'])){
                                $search= $_GET['timkiem'];
                                $sql1 = "SELECT * FROM `HangHoa` WHERE lower(`TenHH`) LIKE lower(CONCAT('%', CONVERT('$search', BINARY), '%'))  ";
                               }elseif(isset($_GET['MLHH'])){
                                    $MLHH = $_GET['MLHH'];
                                    $sql1 = "SELECT * FROM LoaiHangHoa NATURAL JOIN HangHoa WHERE MaLoaiHang=$MLHH";
                                }else{
                                    $sql1 = "SELECT * FROM HangHoa ";
                                }

                                $result1= mysqli_query($conn,$sql1);
                                while($row = mysqli_fetch_array($result1)){
                                    $count++;
                                }
                                if(isset($_GET['moinhat'])){
                                    $sql1 = "SELECT * FROM HangHoa ORDER BY MSHH DESC LIMIT ".$item_per_page." OFFSET ".$offset."  ";
                                }elseif(isset($_GET['xapxep'])){
                                    $xapxep=$_GET['xapxep'];
                                    if($xapxep==1){
                                        $sql1 = "SELECT * FROM HangHoa ORDER BY Gia ASC LIMIT ".$item_per_page." OFFSET ".$offset."  ";
                                    }else{
                                        $sql1 = "SELECT * FROM HangHoa ORDER BY Gia DESC LIMIT ".$item_per_page." OFFSET ".$offset."  ";

                                    }

                                }elseif(isset($_GET['timkiem'])){
                                        $search= $_GET['timkiem'];
                                         $sql1 = "SELECT * FROM `HangHoa` WHERE lower(`TenHH`) LIKE lower(CONCAT('%', CONVERT('$search', BINARY), '%')) LIMIT ".$item_per_page." OFFSET ".$offset."  ";
                                }elseif(isset($_GET['MLHH'])){
                                         $MLHH = $_GET['MLHH'];
                                        $sql1 = "SELECT * FROM LoaiHangHoa NATURAL JOIN HangHoa WHERE MaLoaiHang=$MLHH
                                         LIMIT ".$item_per_page." OFFSET ".$offset."  ";
                                }else{
                                        $sql1 = "SELECT * FROM HangHoa LIMIT ".$item_per_page." OFFSET ".$offset."  ";


                                }
                                $result1= mysqli_query($conn,$sql1);
                                if(!$result1){
                                  die('câu truy vấn bị sai');
                                }
                                 $totalPages=ceil($count / $item_per_page);
                          
                                
                                while($row = mysqli_fetch_array($result1))
                                {?>
                                <div class="grid_column-2-4">
                                    <div class="home-product-item">
                                        <a href="./chitiethanghoa.php?MSHH=<?php echo $row['MSHH']?>" > <div class="home-product-item-img"style="background-image: url(<?php echo $row['Location'];?>);background-size: 100% auto"></div> </a>
                                       
                                        <h4 class="home-product-item-name"><a style="text-decoration: none; color:#333;" href="./chitiethanghoa.php?MSHH=<?php echo $row['MSHH']?>" > <?php echo $row['TenHH'];?>  </a></h4>
                                         <h4 class="home-product-item-name"><a style="text-decoration: none; color:#333;" href="./chitiethanghoa.php?MSHH=<?php echo $row['MSHH']?>" >Mô tả:<?php echo $row['QuyCach'];?>  </a></h4>
                                         <h4 class="home-product-item-name"><a style="text-decoration: none; color:#333;" href="./chitiethanghoa.php?MSHH=<?php echo $row['MSHH']?>" >Số lượng trong kho:<?php echo $row['SoLuongHang'];?>  </a></h4>
                                        <div class="home-product-item-price">
                                            <span class="home-product-item-price-current"><?php echo number_format($row['Gia'],0,",",".")?>đ</span>

                                        </div>
                                        <button class="home-product-item-add-tocart" onclick="addCart('<?php echo $row['MSHH']; ?>')" >
                                            <i class="fas fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
                                        </button>
                                        <div class="home-product-item-favourite">
                                            <i class="fas fa-check"></i>
                                            yêu thích
                                        </div>
                                      

                                    </div>
                                  
                                </div>
                              <?php } ?>

                            </div>
                        </div>
                        <ul class="pagination home-product_pagination">
                            <!-- moinhat -->
                              <?php
                            if(isset($_GET['moinhat']))

                            { $moinhat=$_GET['moinhat'];


                             ?>
                                <?php if($current_page >3){
                                $first=1;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $first; ?>&moinhat=<?php echo $moinhat; ?>" class="pagination-item-link">
                                                                       First
                                </a>
                                </li>

                                <?php } ?>
                                  <?php for($i=1;$i<=$totalPages;$i++){                                ?>
                                <?php if($i<=($current_page+3) && $i>=($current_page-3)){?>

                                       <?php if($i == $current_page){$moinhat=$_GET['moinhat'];

                                    ?>
                                    <li class="pagination-item pagination-item--active">
                                         <a href="index.php?<?php?>per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&moinhat=<?php echo $moinhat; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                     </li>


                               <?php }else{$moinhat=$_GET['moinhat'];
                               

                                ?>
                                <li class="pagination-item">
                                         <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&moinhat=<?php echo $moinhat; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                </li>
                           <?php  }

                               }?>
<!-- 
                                 <?php if($current_page < $totalPages -3){
                                $moinhat=$_GET['moinhat'];
                                $end=$totalPages;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $end; ?>&moinhat=<?php echo $moinhat; ?>" class="pagination-item-link">
                                                                       End
                                </a>
                                </li>

                           <?php } ?>  -->
                                                         
                                                        
                         <?php }}
                        ?>
                            <!-- xapxep -->

                            <?php
                            if(isset($_GET['xapxep']))

                            { $xapxep=$_GET['xapxep'];


                             ?>
                                <?php if($current_page >3){
                                $first=1;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $first; ?>&xapxep=<?php echo $xapxep; ?>" class="pagination-item-link">
                                                                       First
                                </a>
                                </li>

                                <?php } ?>
                                  <?php for($i=1;$i<=$totalPages;$i++){                                ?>
                                <?php if($i<=($current_page+3) && $i>=($current_page-3)){?>

                                       <?php if($i == $current_page){$xapxep=$_GET['xapxep'];

                                    ?>
                                    <li class="pagination-item pagination-item--active">
                                         <a href="index.php?<?php?>per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&xapxep=<?php echo $xapxep; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                     </li>


                               <?php }else{$xapxep=$_GET['xapxep'];
                               

                                ?>
                                <li class="pagination-item">
                                         <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&xapxep=<?php echo $xapxep; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                </li>
                           <?php  }

                               }?>

                            <!--     <?php if($current_page < $totalPages -3){
                                $xapxep=$_GET['xapxep'];
                                $end=$totalPages;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $end; ?>&xapxep=<?php echo $xapxep; ?>" class="pagination-item-link">
                                                                       End
                                </a>
                                </li>

                           <?php } ?> -->
                                                         
                                                        
                         <?php }
                        ?>

                           <?php }?>
                            <!-- timkiem -->

                            <?php
                            if(isset($_GET['timkiem']))

                            { $timkiem=$_GET['timkiem'];


                             ?>
                                <?php if($current_page >3){
                                $first=1;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $first; ?>&timkiem=<?php echo $timkiem; ?>" class="pagination-item-link">
                                                                       First
                                </a>
                                </li>

                                <?php } ?>
                                  <?php for($i=1;$i<=$totalPages;$i++){                                ?>
                                <?php if($i<=($current_page+3) && $i>=($current_page-3)){?>

                                       <?php if($i == $current_page){$timkiem=$_GET['timkiem'];

                                    ?>
                                    <li class="pagination-item pagination-item--active">
                                         <a href="index.php?<?php?>per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&timkiem=<?php echo $timkiem; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                     </li>


                               <?php }else{$timkiem=$_GET['timkiem'];
                               

                                ?>
                                <li class="pagination-item">
                                         <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&timkiem=<?php echo $timkiem; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                </li>
                           <?php  }

                               }?>

                                <?php if($current_page < $totalPages -3){
                                $timkiem=$_GET['timkiem'];
                                $end=$totalPages;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $end; ?>&timkiem=<?php echo $timkiem; ?>" class="pagination-item-link">
                                                                       End
                                </a>
                                </li>

                           <?php } ?>
                                                         
                                                        
                         <?php }
                        ?>

                           <?php }elseif(!isset($_GET['MLHH'])&&!isset($_GET['xapxep'])&&!isset($_GET['moinhat'])){

                            ?>

                            <?php if($current_page >3){
                                $first=1;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $first; ?>" class="pagination-item-link">
                                                                       First
                                </a>
                                </li>

                           <?php } ?>

                            <?php for($i=1;$i<=$totalPages;$i++){
                                ?>
                                <?php if($i<=($current_page+3) && $i>=($current_page-3)){?>

                                       <?php if($i == $current_page){
                                    ?>
                                    <li class="pagination-item pagination-item--active">
                                         <a href="index.php?<?php?>per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                     </li>


                               <?php }else{
                                ?>
                                <li class="pagination-item">
                                         <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                </li>
                           <?php  }

                               }
                                                         
                                                        
                          }
                        ?>
                         <?php if($current_page < $totalPages -3){
                                $end=$totalPages;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $end; ?>" class="pagination-item-link">
                                                                       End
                                </a>
                                </li>

                           <?php } }?>

                            <!-- LoaiHang -->
                                  <?php 
                            if(isset($_GET['MLHH'])){
                            ?>

                            <?php if($current_page >3){
                                $first=1;
                                $MLHH=$_GET['MLHH'];
                                ?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $first; ?>&MLHH=<?php echo $MLHH?>" class="pagination-item-link">
                                                                       First
                                </a>
                                </li>

                           <?php } ?>

                            <?php for($i=1;$i<=$totalPages;$i++){
                                    $MLHH=$_GET['MLHH'];
                                ?>
                                <?php if($i<=($current_page+3) && $i>=($current_page-3)){?>

                                       <?php if($i == $current_page){
                                    ?>
                                    <li class="pagination-item pagination-item--active">
                                         <a href="index.php?<?php?>per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&MLHH=<?php echo $MLHH?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                     </li>


                               <?php }else{                                    
                                $MLHH=$_GET['MLHH'];

                                ?>
                                <li class="pagination-item">
                                         <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $i; ?>&MLHH=<?php echo $MLHH?>" class="pagination-item-link">
                                            <?php echo $i; ?>
                                        </a>
                                </li>
                           <?php  }

                               }
                                                         
                                                        
                          }
                        ?>
                         <?php if($current_page < $totalPages -3){
                                $MLHH=$_GET['MLHH'];
                                $end=$totalPages;?>
                                <li class="pagination-item ">
                                <a href="index.php?per_page=<?php echo  $item_per_page?>&page=<?php echo $end; ?>&MLHH=<?php echo $MLHH?>" class="pagination-item-link">
                                                                       End
                                </a>
                                </li>

                           <?php } }?>  

                        </ul>    
                    </div>
    
                </div>
            </div>

        </div>
       
    </div>

  <script >
      
     function addCart(id){
            num = $("#num_"+id).val();
            if(num =="" || num== undefined ){
                num=1;
            }
            $.post("cart.php",{'id':id,'num':num}, function(data, status){
                item = data.split("-");
                $("#qty").text(item[0]); 
                $("#total").text(item[1]);

                $("#listCart").load("http://localhost:81/B1805736_HoThiNhuY/chitiethanghoa.php #listCart");

              });
     }

      function deletecart(id){
          $.post("updatecart.php",{'id':id,'num':0} ,function(data, status){
            $("#listCart").load("http://localhost:81/B1805736_HoThiNhuY/chitiethanghoa.php #listCart");
        });
     }
  </script>
</body>
</html>
<?php
        mysqli_close($conn);
?>

