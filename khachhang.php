<?php 
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
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

          <div class="grid_column-10">
            <form action="khachhang.php" method="POST">
              <h1></h1> 
              <h1 class="content__header"> Khách Hàng </h1>
              <input type="text" name="mskhcu" style="display: none;"> 
 
              <div class="input_wrap">
                  <div class="input_wrap-lable">
                    <label>Mã Số Khách Hàng:</label>
                </div>
                 <input type="text" class="form-control" name="maso" required>          
              </div>      
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Họ Tên Khách Hàng:</label>
                </div>
                <input type="text" class="form-control" name="ten" required>
                
              </div>                           
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Tên Công Ty:</label>
                </div>
                <input type="text" class="form-control" name="tencongty" required>
              </div>
               <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Số Điện Thoại:</label>
                </div>
                <input type="text" class="form-control" name="sdt" required>
              </div>
               <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>SoFax:</label>
                </div>
                <input type="text" class="form-control" name="sofax" required>
              </div>   
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Password:</label>
                </div>
                <input type="text" class="form-control" name="password" required>
              </div>       
              <div class="form-control-click">
              
                <button type="submit" name="edit" class="form-control form-submit "><i class="fas fa-tools"></i> Sửa
                </button>
     

              </div>
            </form>

                       <!-- timkiem -->

            <?php
            if( !empty($_GET['actionkh']) && $_GET['actionkh'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filterkh']= $_POST;

            }            
            if(!empty($_SESSION['product_filterkh'])){
              $wherekh="";

              foreach ($_SESSION['product_filterkh'] as $field => $value) {
                  if(!empty($value)){
                    switch ($field) {
                      case 'HoTenKH':
                          $wherekh .= (!empty($wherekh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $wherekh .= (!empty($wherekh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                    }
                  }
              }
              extract($_SESSION['product_filterkh']);
            }

            // if(!empty($where)){
            //   $sql1 = "SELECT * FROM nhanvien where  (".$where.") ";
            //   $result1= mysqli_query($conn,$sql1);

            // }
            ?>
            <div class="form-control-search">
              <form class="form-control_search" action="khachhang.php?actionkh=search" method="POST">
                <fieldset style="margin: 40px auto;
    width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Mã Số Khách Hàng: <input type="text" name="MSKH" 
                  value="<?php echo empty($MSKH)? '':$MSKH ?>"
                  >
                  Tên Khách Hàng: <input type="text" name="HoTenKH" value="<?php echo empty($HoTenKH)? '':$HoTenKH ?>"
>
                  <input type="submit" value="Tìm Kiếm">

                </fieldset>
              </form>
              
            </div>

            <h1 class="content__header-result">
<?php
  if( isset($_POST['add'])){
        $maso= $_POST['maso'];
        $ten= $_POST['ten'];
        $tencongty=$_POST['tencongty'];
        $sdt= $_POST['sdt'];
        $sofax=$_POST['sofax'];
        $password= md5($_POST['password']);
        $sql1 = "SELECT * FROM nhanvien";
        $result1= mysqli_query($conn,$sql1);
        $sql ="INSERT INTO KhachHang(MSKH, HoTenKH, TenCongTy, SoDienThoai, SoFax, password) VALUES (
        '$maso',
        '$ten',
        '$tencongty',
        '$sdt',
        '$sofax',
        '$password')";
        if(mysqli_query($conn,$sql)){
          echo "Thêm thành công";
        }
        else{?>
          <h1 class="content__header-result-error">
           <?php echo "Đã Tồn Tại Mã Số Khách Hàng"; ?>
          </h1>
        <?php }} ?> 
  <?php
  if( isset($_GET['maso'])){
        $maso= $_GET['maso'];
        $sql ="DELETE FROM khachhang WHERE  MSKH= '$maso'";
        if(mysqli_query($conn,$sql)){
          echo "Xóa thành công";
        }
        else{?>
          <h1 class="content__header-result-error">
           <?php echo "Xóa thất bại"; ?>
          </h1>
        <?php }} ?>

 <?php
  if( isset($_POST['edit'])){
        $mscu = $_POST['mskhcu'];
        if($mscu ===""){
           ?>
          <h1 class="content__header-result-error">
      <?php echo "Xin Hãy chọn Khách Hàng Cần sửa"; ?>
          </h1><?php

        }else{
          $maso= $_POST['maso'];
          $ten= $_POST['ten'];
          $tencongty=$_POST['tencongty'];
          $sdt= $_POST['sdt'];
          $sofax=$_POST['sofax'];
          $password= md5($_POST['password']);
          $sql ="UPDATE khachhang SET
          MSKH = '$maso', 
          HoTenKH='$ten',
          TenCongTy='$tencongty',
          SoDienThoai='$sdt',
          SoFax='$sofax',
          password='$password' 
          WHERE MSKH='$mscu'";
          if(mysqli_query($conn,$sql)){
            echo "Sửa thành công";
          }
          else{
  ?>
          <h1 class="content__header-result-error">
      <?php echo " Mã Số Khách Hàng Đã Tồn Tại"; ?>
          </h1>
        
  <?php }}            
        } 

  ?>

  
     
            </h1>
         
          </div>
           <!-- table -->
           <div class="table-responsive" style="    overflow: scroll;
    height: 50vh;">
            <table class="table table-hover">
              <thead>
                <tr class="thead-dark">
                  <th scope="col" >Mã Số Khách Hàng</th>
                  <th scope="col">Họ Tên Khách Hàng</th>
                  <th scope="col">Tên Công Ty</th>
                  <th scope="col">Số Điện Thoại</th>
                  <th scope="col">Số Fax</th>
                  <th scope="col">Password</th>
                  <th scope="col">Control</th>
                </tr>
              </thead>

 <?php
     if(!empty($wherekh)){
              $sql1 = "SELECT * FROM KhachHang where  (".$wherekh.") ";

              $result1= mysqli_query($conn,$sql1);
            }else{
                $sql1 = "SELECT * FROM KhachHang";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>

  <?php
      while($row = mysqli_fetch_array($result1)){
        $mskh=$row['MSKH'];
  ?>
    <tbody>
              
                <tr id="<?php echo $mskh;?>" onclick="edit('<?php echo $mskh;?>')">
                  <th scope="col" class="MSKHEDIT"><?php echo $row['MSKH'];?></th>
                  <th scope="col" class="HOTENKHEDIT"><?php echo $row['HoTenKH'];?></th>
                  <th scope="col" class="TENCONGTYEDIT"><?php echo $row['TenCongTy'];?></th>
                  <th scope="col" class="SODIENTHOAIEDIT"><?php echo $row['SoDienThoai'];?></th>
                  <th scope="col" class="SOFAXEDIT"><?php echo $row['SoFax'];?></th>
                  <th scope="col" class="PASSWORDEDIT"><?php echo $row['password'];?></th>
                  <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
"  href="khachhang.php?maso=<?php echo $row['MSKH'];?>">Xóa</a></th>

                </tr>
              </tbody>

  <?php
         }?>
  
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=mskhcu]').val($('#'+id+' .MSKHEDIT').text());
        $('input[name=maso]').val($('#'+id+' .MSKHEDIT').text());
        $('input[name=ten]').val($('#'+id+' .HOTENKHEDIT').text());
        $('input[name=tencongty]').val($('#'+id+' .TENCONGTYEDIT').text());
        $('input[name=sdt]').val($('#'+id+' .SODIENTHOAIEDIT').text());
        $('input[name=sofax]').val($('#'+id+' .SOFAXEDIT').text());
        $('input[name=password]').val($('#'+id+' .PASSWORDEDIT').text());

      }
      </script>
</body>
</html>
<?php
        mysqli_close($conn);
?>