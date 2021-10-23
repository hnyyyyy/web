<?php 
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        session_start();
        if(!isset($_SESSION['loginAdmin'])){
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
            <form action="nhanvien.php" method="POST">
              <h1></h1> 
              <h1 class="content__header"> Nhân Viên </h1> 
              <input type="text" name="msnvcu" style="display: none;"> 
              <div class="input_wrap">
                  <div class="input_wrap-lable">
                    <label>Mã Số Nhân Viên:</label>
                </div>
                 <input type="text" class="form-control" name="maso" required>          
              </div>      
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Tên Nhân Viên:</label>
                </div>
                <input type="text" class="form-control" name="ten" required>
                
              </div>                          
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Chức vụ:</label>
                </div>
                <select name="chucvu" class="form-control">
                  <option value="" disabled="disabled" selected="selected"><div class="form-control-p">Chức Vụ.</option>
                  <option value="1" >Quản Lý</option>
                  <option value="2" >Nhân Viên Bán Hàng</option>
                </select>
              </div>      
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Địa Chỉ:</label>
                </div>
                <input type="text" class="form-control" name="diachi" required>
              </div> 
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Password:</label>
                </div>
                <input type="text" class="form-control" name="password" required>
              </div>       
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Số Điện Thoại:</label>
                </div>
                <input type="text" class="form-control" name="sdt" required>
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
            if( !empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filternv']= $_POST;

            }            
            if(!empty($_SESSION['product_filternv'])){
              $where="";

              foreach ($_SESSION['product_filternv'] as $field => $value) {
               
                  if(!empty($value)){
                    switch ($field) {
                      case 'HoTenNV':
                          $where .= (!empty($where))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $where .= (!empty($where))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;

                        break;
                    }
                  }
              }
              extract($_SESSION['product_filternv']);
            }

            // if(!empty($where)){
            //   $sql1 = "SELECT * FROM nhanvien where  (".$where.") ";
            //   $result1= mysqli_query($conn,$sql1);

            // }
            ?>
            <div class="form-control-search">
              <form class="form-control_search" action="nhanvien.php?action=search" method="POST">
                <fieldset style="margin: 40px auto;
    width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Mã Số Nhân Viến: <input type="text" name="MSNV" 
                  value="<?php echo empty($MSNV)? '':$MSNV ?>"
                  >
                  Tên Nhân Viên: <input type="text" name="HoTenNV" value="<?php echo empty($HoTenNV)? '':$HoTenNV ?>"
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
        $diachi=$_POST['diachi'];
        $chucvu= $_POST['chucvu'];
        $password= md5( $_POST['password']);
        $sdt=$_POST['sdt'];
        $sql1 = "SELECT * FROM nhanvien";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
        if($maso === $row['MSNV']){?>
             <h1 class="content__header-result-error">
           <?php  echo "Mã số nhân viên đã tồn tại vui lòng kiểm tra lại. "; ?>
          </h1>
            <?php
            break;
        }
        }
        $sql ="INSERT INTO NhanVien(MSNV, HoTenNV, ChucVu, DiaChi, SoDienThoai, password) 
                VALUES (
                '$maso',
                '$ten',
                '$chucvu',
                '$diachi',
                '$sdt',
                '$password');";
        if(mysqli_query($conn,$sql)){
          echo "Thêm thành công";
        }
        else{?>
          <h1 class="content__header-result-error">
          </h1>
        <?php }} ?> 
  <?php
  if( isset($_GET['maso'])){
        $maso= $_GET['maso'];
        $sql ="DELETE FROM NhanVien WHERE  MSNV= '$maso'";
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
        $maso= $_POST['maso'];
        $msnvcu=$_POST['msnvcu'];
        $ten= $_POST['ten'];
        $diachi=$_POST['diachi'];
        $chucvu= $_POST['chucvu'];
        $password= md5($_POST['password']);
        $sdt=$_POST['sdt'];
        if($msnvcu ===""){
            ?>
          <h1 class="content__header-result-error">
      <?php echo "Xin Hãy chọn Nhân Viên Cần sửa"; ?>
          </h1><?php
        }else{
        $sql ="UPDATE NhanVien SET
        MSNV= '$maso',
        HoTenNV='$ten',
        ChucVu='$chucvu',
        DiaChi='$diachi',
        SoDienThoai='$sdt',
        password='$password' 
        WHERE MSNV= '$msnvcu'";
        if(mysqli_query($conn,$sql)){
          echo "Sửa thành công";
        }
        else{
  ?>
          <h1 class="content__header-result-error">
      <?php echo "Đã Tồn Tại Mã Số Nhân Viên"; ?>
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
                  <th scope="col" >Mã Số Nhân Viên</th>
                  <th scope="col">Tên Nhân Viên</th>
                  <th scope="col">Chức Vụ</th>
                  <th scope="col">Địa Chỉ</th>
                  <th scope="col">Số Điện Thoại</th>
                  <th scope="col">Password</th>
                  <th scope="col">Control</th>
                </tr>
              </thead>
<?php



     if(!empty($where)){
              $sql1 = "SELECT * FROM NhanVien where  (".$where.") ";
              $result1= mysqli_query($conn,$sql1);

            }else{
                $sql1 = "SELECT * FROM NhanVien";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>
  <?php
      while($row = mysqli_fetch_array($result1)){
        $msnv=$row['MSNV'];
  ?>
    <tbody>
              
                <tr id="<?php echo $msnv;?>" onclick="edit('<?php echo $msnv;?>')">
                  <th scope="col" class="MSNVEDIT"><?php echo $row['MSNV'];?></th>
                  <th scope="col" class="HOTENNHANVIENEDIT"><?php echo $row['HoTenNV'];?></th>
                  <th scope="col" Class="CHUCVUEDIT" data-value="<?php echo $row['ChucVu'] ?>"><?php echo $row['ChucVu']==1? "Quản lý":"Nhân Viên bán hàng";?></th>
                  <th scope="col" class="DIACHIEDIT"><?php echo $row['DiaChi'];?></th>
                  <th scope="col" class="SODIENTHOAIEDIT"><?php echo $row['SoDienThoai'];?></th>
                  <th scope="col" class="PASSWORDEDIT"><?php echo $row['password'];?></th>
                  <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
"   href="nhanvien.php?maso=<?php echo $row['MSNV'];?>">Xóa</a></th>

                </tr>
              </tbody>

  <?php
         }?>
  
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=msnvcu]').val($('#'+id+' .MSNVEDIT').text());
        $('input[name=maso]').val($('#'+id+' .MSNVEDIT').text());
        $('input[name=ten]').val($('#'+id+' .HOTENNHANVIENEDIT').text());
        // $('select[name=chucvu] option').removeAttr('selected');
        $('select[name=chucvu] option[value='+$('#'+id+' .CHUCVUEDIT').attr('data-value')+']').attr('selected','selected');
        $('input[name=diachi]').val($('#'+id+' .DIACHIEDIT').text());
        $('input[name=password]').val($('#'+id+' .PASSWORDEDIT').text());
        $('input[name=sdt]').val($('#'+id+' .SODIENTHOAIEDIT').text());
      }

      </script>


</body>
</html>
<?php
        mysqli_close($conn);
?>