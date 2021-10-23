<?php 
        ob_start();
        session_start();
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        $err="";
        if(isset($_POST['login'])){
            $user=$_POST['user'];
            $password=$_POST['password'];
            if(isset($_POST['remember'])){
                setcookie("user",$user);
                setcookie("password",$password);
            }
            $password1=md5($_POST['password']);
            $sql="SELECT * FROM NhanVien WHERE MSNV='$user' AND password='$password1'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            if($row['ChucVu'] == 1){
                if(count($row)){
                    $_SESSION["loginAdmin"]= $row['MSNV'];
                    header("location:admin.php");
                 }else{
                    $err="Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng";
                 }

            }else{
                  if(count($row)){
                    $_SESSION["loginNhanVien"]= $row['MSNV'];
                    header("location:admin.php");
                 }else{
                    $err="Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng";
                 }
            }


        }
        $user="";
        $password="";
        if( isset( $_COOKIE['user']) && isset($_COOKIE['password'])){
            $user=$_COOKIE['user'];
            $password=$_COOKIE['password'];
        }
        if(isset($_POST['logout'])){
                unset($_SESSION['loginAdmin']);
                unset($_SESSION['loginNhanVien']);
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
                </head>
                <body>
                <div class="modal">
                     <!-- login form -->
                       <form class="auth-form" action="" method="POST">
                         <div class="auth-form-container">
                            <div class="auth-form_header">
                                <h3 class="auth-form_heading">Đăng nhập</h3>
                            </div>
    
                            <div class="auth-form_form">
                                <div class="auth-form_group">
                                    <input type="text" class="auth-form_input" placeholder="Mã Số Nhân Viên" name="user"
                                    value="<?php echo $user ?>" required>
    
                                </div>
                                <div class="auth-form_group">
                                    <input type="password" class="auth-form_input" placeholder="Mật khẩu của bạn " name="password" value="<?php echo $password ?>"  required>
                                    
                                </div>
                                <div class="auth-form_group-checkbox">
                                    <input type="checkbox" class="auth-form_input-checkbox"  name="remember" value="1" >
                                    <div class="auth-form_input-checkbox-text">
                                                Ghi Nhớ Mật Khẩu
                                    </div>
                                </div>
                                <div class="auth-form_erro">
                                    <?php echo $err; ?>
                                </div>
                            </div>
    
                            <div class="auth-form_controls">
                                <button class="btn btn-primary" name="login" type="submit">
                                    ĐĂNG NHẬP
                            </button>
            
                            </div>
                        </form>

                    </div>
            </body>
            </html>


<?php
        mysqli_close($conn);
?>