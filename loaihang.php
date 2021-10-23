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
            <form action="loaihang.php" method="POST">
              <h1></h1> 
              <h1 class="content__header">Loại Hàng Hóa </h1> 
               
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Tên Loại Hàng:</label>
                </div>
                <input type="text" class="form-control" name="tenhh" required>
                
              </div>                              
                
              <div class="form-control-click">
                <button type="submit" name="add" class="form-control form-submit "><i class="fas fa-plus"></i> Thêm
                </button>
                <button type="submit" name="edit" class="form-control form-submit "><i class="fas fa-tools"></i> Sửa
                </button>
                

              </div>
            </form>

                       <!-- timkiem -->

            <?php
            if( !empty($_GET['actionlh']) && $_GET['actionlh'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filterlh']= $_POST;

            }            
            if(!empty($_SESSION['product_filterlh'])){
              $wherelh="";

              foreach ($_SESSION['product_filterlh'] as $field => $value) {
                  if(!empty($value)){
                    switch ($field) {
                      case 'TenLoaiHang':
                          $wherelh .= (!empty($wherelh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $wherelh .= (!empty($wherelh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                    }
                  }
              }
              extract($_SESSION['product_filterlh']);
            }

            // if(!empty($where)){
            //   $sql1 = "SELECT * FROM nhanvien where  (".$where.") ";
            //   $result1= mysqli_query($conn,$sql1);

            // }
            ?>
            <div class="form-control-search">
              <form class="form-control_search" action="loaihang.php?actionlh=search" method="POST">
                <fieldset style="margin: 40px auto;
    width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Mã Số Loại Hàng: <input type="text" name="MaLoaiHang" 
                  value="<?php echo empty($MaLoaiHang)? '':$MaLoaiHang ?>"
                  >
                  Tên Loại Hàng: <input type="text" name="TenLoaiHang" value="<?php echo empty($TenLoaiHang)? '':$TenLoaiHang ?>"
>
                  <input type="submit" value="Tìm Kiếm">

                </fieldset>
              </form>
              
            </div>

       
            <h1 class="content__header-result">
<?php
  if( isset($_POST['add'])){
        $malh= $_POST['malh'];
        $tenhh= $_POST['tenhh'];
        $sql1 = "SELECT * FROM LoaiHangHoa";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
        
            break;
        
        }
        $sql ="INSERT INTO LoaiHangHoa (MaLoaiHang, TenLoaiHang) VALUES (
        '$malh',
        '$tenhh');";
        if(mysqli_query($conn,$sql)){
          echo "Thêm thành công";
        }
        else{?>
          <h1 class="content__header-result-error">
           <?php echo "Thêm thất bại"; ?>
          </h1>
        <?php }} ?>

<?php
  if( isset($_GET['malh'])){
        $malh= $_GET['malh'];
        $sql ="DELETE FROM LoaiHangHoa WHERE  MaLoaiHang= '$malh'";
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
        $malh= $_POST['malh'];
        $tenhh= $_POST['tenhh'];
        $sql ="UPDATE LoaiHangHoa SET
        MaLoaiHang= '$malh', 
        TenLoaiHang='$tenhh'
        WHERE MaLoaiHang= '$malhcu'";
        if(mysqli_query($conn,$sql)){
          echo "Sửa thành công";
        }
        else{
            ?>
          <h1 class="content__header-result-error">
      <?php echo "Đã Tồn Tại Mã Loại Hàng"; ?>
          </h1>
        
   <?php }  

        
      } ?> 
  
     
            </h1>
         
          </div>
           <!-- table -->
           <div class="table-responsive" style="    overflow: scroll;
    height: 50vh;">
            <table class="table table-hover">
              <thead>
                <tr class="thead-dark">
                  <th scope="col">Tên Hàng Hóa</th>
                  <th scope="col">Control</th>
                </tr>
              </thead>
               <?php
     if(!empty($wherelh)){
              $sql1 = "SELECT * FROM LoaiHangHoa where  (".$wherelh.") ";

              $result1= mysqli_query($conn,$sql1);
            }else{
                $sql1 = "SELECT * FROM LoaiHangHoa";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>

  <?php
      while($row = mysqli_fetch_array($result1)){
        $malh=$row['MaLoaiHang'];
  ?>
    <tbody>
              
                <tr id="<?php echo $malh;?>" onclick="edit('<?php echo $malh;?>')">
                  <th scope="col" class="TENHHEDIT"><?php echo $row['TenLoaiHang'];?></th>
                  <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
"  href="loaihang.php?malh=<?php echo $row['MaLoaiHang'];?>">Xóa</a></th>
                </tr>
              </tbody>

  <?php
         }?>
  
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=malh]').val($('#'+id+' .MAHHEDIT').text());
        $('input[name=tenhh]').val($('#'+id+' .TENHHEDIT').text());
      }
      </script>
</body>
</html>
