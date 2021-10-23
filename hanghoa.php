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
    <div class="app" >
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
            <form action="hanghoa.php" method="POST" xml_error_string>
              <h1></h1> 
              <h1 class="content__header">Hàng Hóa </h1>
          
             
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Tên Hàng Hóa:</label>
                </div>
                <input type="text" class="form-control" name="tenhh" required/>
                
              </div>                              
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Mô tả:</label>
                </div>
                <input type="text" class="form-control" name="quycach" required/>

              </div> 
              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Giá:</label>
                </div>
                <input type="text" class="form-control" name="gia" required/>
              </div>   

              <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Số Lượng Hàng:</label>
                </div>
                <input type="text" class="form-control" name="soluonghanghoa" required/>
              </div>
            
                <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Mã Loại Hàng:</label>
                </div>

                <select name="malh" class="form-control">
                  <option value="" disabled="disabled" selected="selected"><div class="form-control-p">Mã Loại Hàng</option>
                  <?php 
                    $maloaihanghoa = "SELECT * FROM LoaiHangHoa";
                  $result1= mysqli_query($conn,$maloaihanghoa);
                if(!$result1){
                die('câu truy vấn bị sai');
                 }
                   while($row = mysqli_fetch_array($result1)){

                  ?>
                  <option value="<?php echo $row['MaLoaiHang'] ?>" > <?php echo $row['TenLoaiHang'] ?></option>
                  <?php } ?>
                </select>
              </div> 
             <div class="input_wrap">
                <div class="input_wrap-lable">
                  <label>Ảnh sản phẩm:</label>
                </div>
                <input type="file" class="form-control" name="TenHinh[]" require multiple type="file">
              </div>
                     
              <div class="form-control-click">
                <button type="submit" name="add"  class="form-control form-submit "><i class="fas fa-plus"></i> Thêm
                </button>
                <button type="submit" name="edit" class="form-control form-submit "><i class="fas fa-tools"></i> Sửa
                </button>
            

              </div>
            </form>

             <!-- timkiem -->

            <?php
            if( !empty($_GET['actionhh']) && $_GET['actionhh'] == 'search' && !empty($_POST)){
                  $_SESSION['product_filterhh']= $_POST;

            }            
            if(!empty($_SESSION['product_filterhh'])){
              $wherehh="";

              foreach ($_SESSION['product_filterhh'] as $field => $value) {
                  if(!empty($value)){
                    switch ($field) {
                      case 'TenHH':
                          $wherehh .= (!empty($wherehh))?" AND "."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'" ;
                        break;
                      
                      default:
                           $wherehh .= (!empty($wherehh))?" AND "."`".$field."` = ".$value."":"`".$field."` = ".$value."" ;
                        break;
                    }
                  }
              }
              extract($_SESSION['product_filterhh']);
            }

            ?>
               <div class="form-control-search">
              <form class="form-control_search" action="hanghoa.php?actionhh=search" method="POST">
                <fieldset style="margin: 40px auto;
                  width: 100%">
                  <legend>Tìm Kiếm Nhân Viên</legend>
                  Mã Số Hàng Hóa: <input type="text" name="MSHH" 
                  value="<?php echo empty($MSHH)? '':$MSHH?>"
                  
                  Tên Hàng Hóa: <input type="text" name="TenHH" value="<?php echo empty($TenHH)? '':$TenHH ?>"

                  <input type="submit" value="Tìm Kiếm">

                </fieldset>
              </form>
              
            </div>
            <h1 class="content__header-result">
<?php
      if( isset($_POST['add'])){
        $tmp=0;
        $sql1 = "SELECT * FROM HinhHangHoa";
        $result1= mysqli_query($conn,$sql1);
       /* if(isset($_FILES['TenHinh'])){
          $b=$_FILES['TenHinh']['tmp_name'];
          $a=$_FILES['TenHinh']['name'];
          $Tenhinh="./img/".$a;
        }*/
         while($row = mysqli_fetch_array($result1)){
          if($TenHinh == $row['TenHinh']){
            $tmp=1; break;
          }
         }
         if($tmp==1){?>

           <div class="content__header-result-error">
            <?php echo "Ảnh Đã Tồn Tại Vui Lòng Chọn Ảnh Khác"; ?>
          </div><?php

         }
        if(isset($_FILES['TenHinh'])&&$tmp==0){
        $b=$_FILES['TenHinh']['tmp_name'];
        $a=$_FILES['TenHinh']['name'];

        $tenhh= $_POST['tenhh'];
        $quycach=$_POST['quycach'];
        $gia= $_POST['gia'];
        $soluonghanghoa= $_POST['soluonghanghoa'];
        $malh=$_POST['malh'];
        $TenHinh="./img/".$a;
      //  $status =0;

        $sql1 = "SELECT * FROM HinhHangHoa";
        $sql1 = "SELECT * FROM HangHoa";

        $result1= mysqli_query($conn,$sql1);
       
        while($row = mysqli_fetch_array($result1)){
          break;
      }
       
            $sql ="INSERT INTO HangHoa (TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang) VALUES (
                '$tenhh',
                '$quycach',
                '$gia',
                '$soluonghanghoa',
                '$malh');";

            if($result1){
              $sql="SELECT * from HangHoa order by MSHH desc limit 1";
              $filename= $_FILES['TenHinh']['name'];
              $filttmp= $_FILES['TenHinh']['tmp_name'];

              foreach($filename as $key => $tenhinh){
                $sql="INSERT into HinhHangHoa(MSHH,TenHinh) value ('$MSHH','$tenhinh')";
                $sql = $this->db->insert($sql);
              }

            }
        
       // $conn->close();
        
          if(mysqli_query($conn,$sql)){
            echo "Thêm thành công";
          }
          else{?>
            <h1 class="content__header-result-error">
             <?php echo "Thêm thất bại"; ?>
            </h1>
            
            <?php } } }?> 


<?php
  if( isset($_GET['mahh'])){
        $mahh= $_GET['mahh'];
      
        $sql ="DELETE FROM HangHoa WHERE  MSHH= '$mahh'";
        if(mysqli_query($conn,$sql)){
          echo "Xóa thành công";

        }
        else{?>
          <h1 class="content__header-result-error">
           <?php echo "Xóa thất bại"; ?>
          </h1>
<?php }} ?>
 
          <h1 class="content__header-result-error">
      <?php echo "Xin Hãy chọn Khách Hàng Cần sửa"; ?>
          </h1><?php
        if(isset($_POST['edit'])){   
        $tenhh= $_POST['tenhh'];
        $quycach=$_POST['quycach'];
        $gia= $_POST['gia'];
        $soluonghanghoa= $_POST['soluonghanghoa'];
        $malh=$_POST['malh'];
       
        $sql1 = "SELECT * FROM LoaiHangHoa";
        $result1= mysqli_query($conn,$sql1);
        while($row = mysqli_fetch_array($result1)){
        ?>
          <div class="content__header-result-error">
            <?php echo "Mã Loại Hàng Không Tồn Tại Vui Lòng Kiểm tra lại"; ?>

          </div>
          <?php
            if($mahh==""){
              $sql ="UPDATE HangHoa SET 
              TenHH='$tenhh',
              QuyCach='$quycach',
              Gia='$gia',
              SoLuongHang='$soluonghanghoa',
              MaLoaiHang='$malh';
             ";

            }else{
              $sql ="UPDATE HangHoa SET
              TenHH='$tenhh',
              QuyCach='$quycach',
              Gia='$gia',
              SoLuongHang='$soluonghanghoa',
              MaLoaiHang='$malh';
            ";
            }
           
          if(mysqli_query($conn,$sql)){
            // unlink($locationcu);
            echo "Sửa  thành công";
            move_uploaded_file($b,$TenHinh);

          }
             
          ?>
           <?php }   }   ?> 

            </h1>
         
          </div>
           <!-- table -->
           <div class="table-responsive" style="    overflow: scroll;
    height: 50vh;">
            <table class="table table-hover">
              <thead>
                <tr class="thead-dark">
                    <th scope="col">Tên Hàng Hóa</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng Hàng</th>
                    <th scope="col">Mã Loại Hàng</th>
                    <th scope="col">Tên Hình</th>


                  <th scope="col">Control</th>
                </tr>
              </thead>

        <?php
            if(!empty($wherehh)){
              $sql1 = "SELECT * FROM HangHoa where  (".$wherehh.") ";

              $result1= mysqli_query($conn,$sql1);
            }else{
                $sql1 = "SELECT * FROM HangHoa";
                $result1= mysqli_query($conn,$sql1);
                if(!$result1){
                die('câu truy vấn bị sai');
    }

            }
  
  ?>

  <?php
      while($row = mysqli_fetch_array($result1)){
        $mahh=$row['MSHH'];
        
  ?>
    <tbody>
              
                <tr id="<?php echo $mahh;?>" onclick="edit('<?php echo $mahh;?>')">
                    <th scope="col" class="MSHHEDIT"><?php echo $row['MSHH'];?></th>
                    <th scope="col" class="TENHHEDIT"><?php echo $row['TenHH'];?></th>
                    <th scope="col" class="QUYCACHEDIT"><?php echo $row['QuyCach'];?></th>
                    <th scope="col" class="GIAEDIT"><?php echo $row['Gia'];?></th>
                    <th scope="col" class="SLHEDIT"><?php echo $row['SoLuongHang'];?></th>
                    <th scope="col" class="MLHEDIT"><?php echo $row['MaLoaiHang'];?></th>
                    <th scope="col" class="TENHINHEDIT"><img src="<?php echo $row['TenHinh'];?>" width="100" height="50" ></th>
                    <th scope="col"><a style="    text-decoration: none;
    font-size: 18px;
    color: red;
" href="hanghoa.php?mahh=<?php echo $row['MSHH'];?>&TenHinh=<?php echo $row['TenHinh']?>">Xóa</a></th>
                </tr>
              </tbody>
              <?php
         }?>
              
            </table> 
          </div> 
      </div>
      <script>
      edit = function(id){
        $('input[name=tenhinh]').val($('#'+id+' .TENHINHEDIT img').attr('src'));
        $('input[name=tenhh]').val($('#'+id+' .TENHHEDIT').text());
        $('input[name=quycach]').val($('#'+id+' .QUYCACHEDIT').text());
        $('input[name=gia]').val($('#'+id+' .GIAEDIT').text());
        $('input[name=soluonghanghoa]').val($('#'+id+' .SLHEDIT').text());
        $('select[name=malh] option[value='+$('#'+id+' .MLHEDIT').text()+']').attr('selected','selected');

      }
      </script>
</body>
</html>
 <?php
        mysqli_close($conn);
        
?>