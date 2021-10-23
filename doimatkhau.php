
<?php 
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng Ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>
<body>
  <div class="main-DK">

        <form action="doimatkhau.php" method="POST" class="form_DK" id="form-1">
          <div style="display: flex; justify-content: space-evenly;">
            <h3 class="heading"> <a style="text-decoration: none; color:black;" href="dangky.php" >Đăng Ký</a></h3>   <h3 class="heading"> <a style="text-decoration: none; color:orange;" href="loginkh.php" > Đăng Nhập</a></h3>
            <h3 class="heading"> <a style="text-decoration: none; color:#ccc;" href="index.php" > Trang Chủ</a></h3>


          </div>

          <br>
           <div class="form-DK">
            <label  class="form-labels">Tài Khoản</label>
            <input id="MSKH" name="maso"  class="form-controls" placeholder="VD: B180" >
            <span class="form-messages"></span>
          </div>
          <div class="form-DK">
            <label for="password" class="form-labels">Mật khẩu Củ</label>
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu Củ" class="form-controls" >
            <span class="form-messages"></span>
          </div>
          <div class="form-DK">
            <label for="password" class="form-labels">Mật khẩu Mới</label>
            <input id="password" name="passwordmoi" type="password" placeholder="Nhập mật khẩu mới" class="form-controls" >
            <span class="form-messages"></span>
          </div>
          <div class="form-DK">
            <label for="password_confirmation" class="form-labels">Nhập lại mật khẩu mới</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu mới" type="password" class="form-controls" >
            <span class="form-messages"></span>
          </div>
          <div class="content__header-result"  >
            <h2>
            <?php
            if(isset($_POST["add"])){

              $maso=$_POST['maso'];
              $password= md5($_POST['password']);
              $passwordmoi= md5($_POST['passwordmoi']);
              $password_confirmation=md5($_POST["password_confirmation"]);


              if($passwordmoi != $password_confirmation){?>
                 <h1 class="content__header-result-error">
                        <?php echo "MẬT KHẨU MỚI VÀ XÁC NHẬN MẬT KHẨU MỚI KHÔNG GIỐNG NHAU"; ?>
                     </h1>


            <?php }else{

                      $sql="SELECT * FROM KhachHang WHERE MSKH='$maso' AND password='$password'"; 
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      if($row['MSKH']!=null){
                        $sql1 ="UPDATE KhachHang SET
                    password='$passwordmoi' 
                    WHERE MSKH='$maso'";
                    $result1 = mysqli_query($conn,$sql1);
                    if(isset($result1)){
                      echo "Sửa Thành Công";
                    }


                      }else{?>
                         <h1 class="content__header-result-error">
                        <?php echo "Tài Khoản Mật Khẩu Không Đúng"; ?>
                        </h1>
                    <?php  }

            }
            }

            ?>
           
            </h2>
                      <button class="form-submits" name="add">Xác Nhận</button>
          </div>
        </form>

        <h1 class="content__header-result">

</body>
</html>

<?php
        mysqli_close($conn);
?>
