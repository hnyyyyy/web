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
            <form action="diachikhachhang.php" method="POST">
               <h1 class="content__header"> Địa Chỉ Khách Hàng </h1>
              <input type="text" name="madccu" style="display: none;"> 
 
              <div class="input_wrap">
                  <div class="input_wrap-lable">
                    <label>Mã Địa chỉ Khách Hàng:</label>
                </div>
                 <input type="text" class="form-control" name="madc" >          
              </div>      
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Địa Chỉ Khách hàng:</label>
                </div>
                <input type="text" class="form-control" name="dc" required>
                
              </div>                             
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Mã Số Khách hàng:</label>
                </div>
                <input type="text" class="form-control" name="masokh" required>
              </div> 
              <div class="form-control-click">
          
                <button type="submit" name="edit" class="form-control form-submit "><i class="fas fa-tools"></i> Sửa
                </button>
   

              </div>
            </form>

              <!-- timkiem -->

            <?php
            if( !empty($_GET['actiondckh']) && $_GET['actiondckh'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filterdckh']= $_POST;

            }            
            if(!empty($_SESSION['product_filterdckh'])){
              $wheredckh="";

              foreach ($_SESSION['product_filterdckh'] as $field => $value) {
                  if(!empty($value)){
                    switch ($field) {
                      case 'MSKH':
                          $wheredckh .= (!empty($wheredckh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $wheredckh .= (!empty($wheredckh))?" AND "."`".$field."` = ".$value."":"`".$field."` = ".$value."" ;
                        break;
                    }
                  }
              }
              extract($_SESSION['product_filterdckh']);
            }

            ?>
               <div class="form-control-search">
              <form class="form-control_search" action="diachikhachhang.php?actiondckh=search" method="POST">
                <fieldset style="margin: 40px auto;
                  width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Mã Địa Chỉ Khách Hàng: <input type="text" name="MaDC" 
                  value="<?php echo empty($MaDC)? '':$MaDC?>"
                  >
                  Mã Số Khách Hàng: <input type="text" name="MSKH" value="<?php echo empty($MSKH)? '':$MSKH ?>"
>
                  <input type="submit" value="Tìm Kiếm">

                </fieldset>
              </form>
              
            </div>




            <h1 class="content__header-result">
<?php
  if( isset($_POST['add'])){
        $madc= $_POST['madc'];
        $diachi=$_POST['dc'];
        $mskh= $_POST['masokh'];
        $status =0;
        $sql1 = "SELECT * FROM KhachHang";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
          if($mskh == $row['MSKH'])
          {
            $status=1;
            break;
          }
        }
        if($status == 0){?>
          <div class="content__header-result-error">
            <?php echo "Mã Khách Hàng Không Tồn Tại Vui Lòng Kiểm tra lại"; ?>

          </div>
          <?php
        }else{
          $sql ="INSERT INTO DiaChiKH(MaDC, DiaChi,MSKH) VALUES (
          '$madc',
          '$diachi',
          '$mskh')";
          if(mysqli_query($conn,$sql)){
            echo "Thêm thành công";
          }
          else{?>
            <h1 class="content__header-result-error">
             <?php echo "Thêm Thất Bại Đã Tồn Tại Mã Địa Chỉ"; ?>
            </h1>
          <?php }          
        }

      } 
        
        ?> 
  <?php
  if( isset($_GET['madc'])){
        $madc= $_GET['madc'];
        $sql ="DELETE FROM DiaChiKH WHERE  MaDC= '$madc'";
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
        $madccu=$_POST['madccu'];
        if($madccu ===""){
           ?>
          <h1 class="content__header-result-error">
      <?php echo "Xin Hãy chọn Địa Chỉ Khách Hàng Cần sửa"; ?>
      <?php
        }else{
                  $madc= $_POST['madc'];
        $diachi=$_POST['dc'];
        $mskh= $_POST['masokh'];
        $status =0;
        $sql1 = "SELECT * FROM KhachHang";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
          if($mskh == $row['MSKH'])
          {
            $status=1;
            break;
          }
        }
        if($status == 0){?>
          <div class="content__header-result-error">
            <?php echo "Mã Khách Hàng Không Tồn Tại Vui Lòng Kiểm tra lại"; ?>

          </div>
          <?php
        }else{
          $sql ="UPDATE DiaChiKH SET
          MaDC='$madc', 
          DiaChi='$diachi',
          MSKH= '$mskh'
          WHERE MaDC='$madccu';";
          if(mysqli_query($conn,$sql)){
            echo "Sửa thành công";
          }
          else{?>
            <h1 class="content__header-result-error">
             <?php echo "Mã Địa Chỉ Khách Hàng Đã Tồn Tại"; ?>
            </h1>
          <?php }          
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
                    <th scope="col" >Mã Địa Chỉ Khách Hàng</th>
                    <th scope="col">Địa Chỉ Khách Hàng</th>
                    <th scope="col">Mã Số Khách Hàng</th>
                    <th scope="col">Control</th>

                </tr>
              </thead>

             <?php
if(!empty($wheredckh)){
              $sql1 = "SELECT * FROM DiaChiKH where  (".$wheredckh.") ";

              $result1= mysqli_query($conn,$sql1);
            }else{
                $sql1 = "SELECT * FROM DiaChiKH";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>

  <?php

      while($row = mysqli_fetch_array($result1)){
        $madc=$row['MaDC'];
  ?>
    <tbody>
              
                <tr id="<?php echo $madc;?>" onclick="edit('<?php echo $madc;?>')">
                    <th scope="col" class="MADIACHIEDIT"><?php echo $row['MaDC'];?></th>
                    <th scope="col" class="DIACHIEDIT"><?php echo $row['DiaChi'];?></th>
                    <th scope="col" class="MASOKHACHHANGEDIT"><?php echo $row['MSKH'];?></th>
                    <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
"  href="diachikhachhang.php?madc=<?php echo $row['MaDC'];?>">Xóa</a></th>

                </tr>
              </tbody>

  <?php
         }?>
  
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=madccu]').val($('#'+id+' .MADIACHIEDIT').text());
        $('input[name=madc]').val($('#'+id+' .MADIACHIEDIT').text());
        $('input[name=dc]').val($('#'+id+' .DIACHIEDIT').text());
        $('input[name=masokh]').val($('#'+id+' .MASOKHACHHANGEDIT').text());
      }
      </script>
</body>
</html>
<?php
        mysqli_close($conn);
?>