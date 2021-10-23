<?php
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        ob_start();
        session_start();

        if(isset($_GET['xoaSoDonDH'])){
            $SoDonDH=$_GET['xoaSoDonDH'];
            $found=1;
            $xoadonmuahang=0;
             $sql1 = "SELECT * FROM `HangHoa` NATURAL JOIN ChiTietDatHang where SoDonDH=$SoDonDH";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
            }else{
                while($row = mysqli_fetch_array($result1)){
                    $MSHH=$row['MSHH'];
                    $SoLuongHang=$row['SoLuongHang']+$row['SoLuong'];
                    $updatehanghoa ="UPDATE HangHoa SET
                      SoLuongHang=$SoLuongHang
                      WHERE MSHH=$MSHH;";
                    $result = mysqli_query($conn,$updatehanghoa);
                    if(!$result){
                        $found=0;
                        die('câu truy vấn bị sai');
                     }
                   
                }

                if($found == 1){

                    $sql ="DELETE FROM DatHang WHERE SoDonDH = $SoDonDH ";
                    if(mysqli_query($conn,$sql)){
                        $xoadonmuahang=1;
                        }
                }

            }

        }

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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/all.css">
    <script src="css/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="app"  >
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
                                    <?php isset($xoadonmuahang)?$xoadonmuahang=1:$xoadonmuahang=""; ?>
                                    <?php if($xoadonmuahang==1 ){ ?>

                                <div style="color: red;font-size: 20px">
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
                                                <span class="header_notify-name " >Xóa Đơn Hàng Thành Công</span>
                                            </div>
                                    </li>
                                </ul>
                                <footer class="header_notify-footer">
                                    <a href="thanhtoan.php" class="header_notify-footer-btn">
                                        Xem Đơn HànG
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
                            <span class="header_navbar-user-name"><?php echo $_SESSION["tenkh"] ?></span>
                            <ul class="header_navbar-user-menu">
                              <li class="header_navbar-user-item">
                                    <a href="doimatkhau.php">Đổi mật khẩu</a>
                                </li>
                               <li class="header_navbar-user-item">
                                    <a href="chitietkhachhang.php?CTMSKH=<?php echo $_SESSION["loginkh"];?>">Thông tin Tài Khoản</a>
                                </li>
                                <li class="header_navbar-user-item">
                                    <a href="">Đơn mua</a>
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
                     </div>
                    </div>
                </div>
            </div>
            <!-- chitiethanghoa -->
        <h2 style="text-align: center;margin:20px 0; font-weight: 700; font-size: 20px">Chi Tiết Đơn Hàng <?php echo  isset($_GET['SoDonDH'])?$_GET['SoDonDH']:"";?></h2>
        <div  style="overflow: scroll; height: 60vh;">
        <div class="table-form-cart" >
        <div class="table-form-cart-product">Sản Phẩm</div>
        <div class="table-form-cart-price">Giá</div>
        <div class="table-form-cart-quantity">Số Lượng</div>
        <div class="table-form-cart-total">Thành tiền</div>
        </div >

<?php 
    if(isset($_GET['SoDonDH'])){


     $SoDonDH=isset($_GET['SoDonDH'])?$_GET['SoDonDH']:"";
     $MSKH=isset($_SESSION["loginkh"])? $_SESSION["loginkh"]:"";
        $sql= "SELECT * FROM `DatHang` NATURAL JOIN HangHoa NATURAL JOIN ChiTietDatHang where MSKH='$MSKH' and SoDonDH= $SoDonDH " ;
        $tongtien=0;
        $result1= mysqli_query($conn,$sql);
          $result1= mysqli_query($conn,$sql);
                if(!$result1){
            }


?>
 <div id="listCart">
<?php
      while($row = mysqli_fetch_array($result1)){
        $trangthai=$row['TrangThai'];
        ?>

        <div class="table-form-cart" >

 
        <div class="table-form-cart-product"><img src="<?php echo $row['Location']; ?>" alt="">

             <div class="table-form-cart-product-thongtin">
                <h2><?php echo $row['TenHH']; ?></h2> 
                <p><?php echo $row['QuyCach']; ?></p>
             </div>
            </div>

        <div class="table-form-cart-price"> 
            <div class="table-form-cart-prices">
                <div class="home-product-item-price-current">
                    <?php echo  number_format($row['GiaDatHang'],0,",","."); ?>
                        
                </div> 
              
         </div> 
     </div>
        <div class="table-form-cart-quantity"><h2 style="margin-top: 16px;"><?php echo $row['SoLuong']; ?> </h2></div>
        <div class="table-form-cart-total">
            <h2> 
                <?php echo  number_format($row['GiaDatHang']*$row['SoLuong'],0,",","."); ?>
                <?php $tongtien=$tongtien +$row['GiaDatHang']*$row['SoLuong'];?>
            </h2>
        </div>
        </div>
     <?php }  ?>



<div style="display: flex; justify-content: space-between;margin: 0 20px;">
    <div class="table-form-cart-total">Tổng Tiền:<?php echo  number_format($tongtien,0,",",".") ?></div>
    <?php if($trangthai==1){ ?>
    <a href="thanhtoan.php?xoaSoDonDH=<?php echo $SoDonDH; ?>" title="" style="
    margin-left: 20px;
    text-decoration: none;
    margin: 12px;
    border: 1px solid;
    height: 28px;
    width: 120px;
    text-align: center;
    background: crimson;
    color: #fff;
    border-radius: 3px;
    font-size: 16px;">
        Xóa Đơn Hàng
        </a>
        <?php } ?>
</div>
<?php } ?>

                            </h4>


 </div>

</div> 

            <!-- carrttt -->
        <h2 style="text-align: center;margin:20px 0; font-weight: 700; font-size: 20px"> Đơn Hàng</h2>
        <div  style="overflow: scroll; height: 60vh;">
        <div class="table-form-cart" >
        <div class="table-form-cart-product" style="width: 20%;">Mã Số Đơn Hàng</div>
        <div class="table-form-cart-price" style="width: 25%;">Ngày Đặt Hàng</div>
        <div class="table-form-cart-quantity" style="width: 25%;">Ngày Giao Hàng</div>
        <div class="table-form-cart-total" style="width: 30%;">Trạng Thái</div>
        </div >


        <?php
        $MSKH=isset($_SESSION["loginkh"])? $_SESSION["loginkh"]:"";
        $sql= "SELECT * FROM `DatHang` where MSKH='$MSKH' ORDER BY NgayDH DESC" ;
        $result1= mysqli_query($conn,$sql);
                if(!$result1){
                die('câu truy vấn bị sai');
            }?>



    <?php
      while($row = mysqli_fetch_array($result1)){
        ?>
         <div id="listCart">
        <div class="table-form-cart" >
        <div class="table-form-cart-product" style="width: 20%;"><?php echo $row['SoDonDH'];?></div>
        <div class="table-form-cart-price" style="width: 25%;"><?php echo $row['NgayDH'];?></div>
        <div class="table-form-cart-quantity" style="width: 25%;"><?php echo $row['NgayGH'];?></div>
        <div class="table-form-cart-total" style="font-size: 14px"><?php     
                  if($row['TrangThai']==1){
                    echo "Chưa Duyệt";

                  }else if($row['TrangThai']==2){
                    echo "Đã duyệt";

                  }else{
                    echo " Đã nhận hàng";

                  };


                  ?>
        <a href="thanhtoan.php?SoDonDH=<?php echo $row['SoDonDH']; ?>" title="" style="margin-left: 12px;text-decoration: none; color:crimson;">
        Xem Đơn Hàng
        </a>

        <?php if($row['TrangThai']==1){ ?>
        <a href="thanhtoan.php?xoaSoDonDH=<?php echo $row['SoDonDH']; ?>" title="" style="    margin-left: 20px;
    text-decoration: none;
    border: 1px solid;
    height: 28px;
    width: 40px;
    text-align: center;
    background: crimson;
    color: #fff;
    border-radius: 3px;">
        Xóa 
        </a>
        <?php } ?>
        </div>
       
        


        </div >




        </div> 
    <?php } ?>

    </div>
    <!-- chi tiet hang hoa -->
  
        </header>

      
       
    </div>
</body>
</html>
<?php
        mysqli_close($conn);
?>
