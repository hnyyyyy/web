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
            <form action="chitietdonhang.php" method="POST">
              <h1></h1> 
              <h1 class="content__header"> Chi Tiết Đơn Hàng </h1>
              <input type="text" name="sddhcu" style="display: none;"> 
              <div class="input_wrap">
                  <div class="input_wrap-lable">
                    <label>Số Đơn Đặt Hàng:</label>
                </div>
                 <input type="text" class="form-control" name="sddh" required>          
              </div>      
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Mã Số Hàng Hóa:</label>
                </div>
                <input type="text" class="form-control" name="mshh" required>
                
              </div>                             
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Số Lượng:</label>
                </div>
                <input type="text" class="form-control" name="sl" required>
              </div>
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Giá Đặt Hàng:</label>
                </div>
                <input type="text" class="form-control" name="gdh" required>
              </div> 
              <div class="input_wrap" style="display: none;">
                <div class="input_wrap-lable">
                  <label>Giảm Giá:</label>
                </div>
                <input type="text" class="form-control" name="gg" required>
              </div>  
              <div class="form-control-click">
        
                <button type="submit" name="edit" class="form-control form-submit " ><i class="fas fa-tools"></i> Sửa
                </button>
       

              </div>
            </form>
                 <!-- timkiem -->

            <?php
            if( !empty($_GET['actionctdh']) && $_GET['actionctdh'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filtercthh']= $_POST;

            }            
            if(!empty($_SESSION['product_filtercthh'])){
              $wherectdh="";

              foreach ($_SESSION['product_filtercthh'] as $field => $value) {
                  if(!empty($value)){
                    switch ($field) {
                      case 'MSHH':
                          $wherectdh .= (!empty($wherectdh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $wherectdh .= (!empty($wherectdh))?" AND "."`".$field."` = ".$value."":"`".$field."` = ".$value."" ;
                        break;
                    }
                  }
              }
              extract($_SESSION['product_filtercthh']);
            }

            // if(!empty($where)){
            //   $sql1 = "SELECT * FROM nhanvien where  (".$where.") ";
            //   $result1= mysqli_query($conn,$sql1);

            // }
            ?>
               <div class="form-control-search">
              <form class="form-control_search" action="chitietdonhang.php?actionctdh=search" method="POST">
                <fieldset style="margin: 40px auto;
                  width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Số Đơn Đặt Hàng: <input type="text" name="SoDonDH" value="<?php echo empty($SoDonDH)? '':$SoDonDH ?>">
                  Mã Số Hàng Hóa: <input type="text" name="MSHH" 
                  value="<?php echo empty($MSHH)? '':$MSHH?>"
                  >
                  <input type="submit" value="Tìm Kiếm">

          

                </fieldset>
              </form>
              
            </div>
            <h1 class="content__header-result">
<?php
  if( isset($_POST['add'])){
        $sddh= $_POST['sddh'];
        $mshh=$_POST['mshh'];
        $sl= $_POST['sl'];
        $gdh= $_POST['gdh'];
        $gg= $_POST['gg'];
        $status =0;
        if($gg>=100 || $gg<=0)
        {?>

          <h1 class="content__header-result-error">
             <?php echo "Giảm Giá <=  100 Và >=  0"; ?>
            </h1>

            <?php
        } else
        {
           $sql1 = "SELECT * FROM HangHoa";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
          if($mshh == $row['MSHH'])
          {
            $status=1;
            break;
          }
        }
        if($status == 0){?>
          <div class="content__header-result-error">
            <?php echo "Mã  Hàng  Hóa Không Tồn Tại Vui Lòng Kiểm tra lại"; ?>
          </div>
          <?php
        }else{
          $sql ="INSERT INTO ChiTietDatHang (SoDonDH, MSHH, SoLuong, GiaDatHang, GiamGia) VALUES (
          '$sddh',
          '$mshh',
           $sl,
           $gdh,
           $gg);";
          if(mysqli_query($conn,$sql)){
            echo "Thêm thành công";
          }
          else{?>
            <h1 class="content__header-result-error">
             <?php echo "Vùi Lòng Kiểm Tra Lại Số Đơn Đặt Hàng"; ?>
            </h1>
          <?php }          
        }

      } 
        }
        ?> 

       
  <?php
  if( isset($_GET['sddh'])){
        $sddh= $_GET['sddh'];
        $sql ="DELETE FROM ChiTietDatHang WHERE  SoDonDH= '$sddh'";
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
        $sddhcu=$_POST['sddhcu'];
        if($sddhcu ===""){
           ?>
          <h1 class="content__header-result-error">
          <?php echo "Vui lòng chọn Số Đơn Đặt Hàng"; ?>
          <?php
        }else{
           $sddh= $_POST['sddh'];
        $mshh=$_POST['mshh'];
        $sl= $_POST['sl'];
        $gdh= $_POST['gdh'];
        $gg= $_POST['gg'];
        $status =0;
        if($gg>=100||$gg<=0)
        {?>

          <h1 class="content__header-result-error">
             <?php echo "Giảm Giá <=  100 Và >=  0"; ?>
            </h1>

            <?php
        }else{
           $sql1 = "SELECT * FROM hanghoa";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
          if($mshh == $row['MSHH'])
          {
            $status=1;
            break;
          }
        }
        if($status == 0){?>
          <div class="content__header-result-error">
            <?php echo "Mã  Hàng  Hóa Không Tồn Tại Vui Lòng Kiểm tra lại"; ?>
          </div>
          <?php
        }else{
          $sql ="UPDATE ChiTietDatHang SET
            SoDonDH='$sddh',
            MSHH='$mshh',
            SoLuong='$sl',
            GiaDatHang='$gdh',
            GiamGia='$gg' 
            WHERE SoDonDH='$sddhcu';";
          if(mysqli_query($conn,$sql)){
            echo "Sửa thành công";
          }
          else{?>
            <h1 class="content__header-result-error">
             <?php echo "Vui Lòng Kiểm Tra Lại Số Đơn Đặt Hàng "; ?>
            </h1>
          <?php }          
        }

      } 

        }
       
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
                    <th scope="col" >Số Đơn Đặt Hàng</th>
                    <th scope="col">Mã Số Hàng Hóa</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Giá Đặt hàng</th>
                    <th scope="col">Giảm Giá</th>
                    <th scope="col">Control</th>

                </tr>
              </thead>

                         <?php
if(!empty($wherectdh)){
              $sql1 = "SELECT * FROM ChiTietDatHang where  (".$wherectdh.") ";

              $result1= mysqli_query($conn,$sql1);
            }else{
                $sql1 = "SELECT * FROM ChiTietDatHang";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>
  <?php
      while($row = mysqli_fetch_array($result1)){
        $sddh=$row['SoDonDH'];
  ?>
    <tbody>
              
                <tr id="<?php echo $sddh;?>" onclick="edit('<?php echo $sddh;?>')">
                    <th scope="col" class="SODONDATHANGEDIT"><?php echo $row['SoDonDH'];?></th>
                    <th scope="col" class="MSHHEDIT"><?php echo $row['MSHH'];?></th>
                    <th scope="col" class="SOLUONGEDIT"><?php echo $row['SoLuong'];?></th>
                    <th scope="col" class="GIADATHANGEDIT"><?php echo $row['GiaDatHang'];?></th>
                    <th scope="col" class="GIAMGIAEDIT"><?php echo $row['GiamGia'];?></th>
                    <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
"  href="chitietdonhang.php?sddh=<?php echo $row['SoDonDH'];?>">Xóa</a></th>
                </tr>
              </tbody>

  <?php
         }?>
  
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=sddhcu  ]').val($('#'+id+' .SODONDATHANGEDIT').text());
        $('input[name=sddh]').val($('#'+id+' .SODONDATHANGEDIT').text());
        $('input[name=mshh]').val($('#'+id+' .MSHHEDIT').text());
        $('input[name=sl]').val($('#'+id+' .SOLUONGEDIT').text());
        $('input[name=gdh]').val($('#'+id+' .GIADATHANGEDIT').text());
        $('input[name=gg]').val($('#'+id+' .GIAMGIAEDIT').text());


      }
      </script>
</body>
</html>
<?php
        mysqli_close($conn);
?>

