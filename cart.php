 <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        ob_start();
        session_start();
        //them hang ben index
        if(isset($_POST['id'])&&isset($_POST['num'])){ 
            $id=$_POST['id'];
            $num=$_POST['num'];
            $sql1 = "SELECT * FROM HangHoa where MSHH='$id'";
            $result1= mysqli_query($conn,$sql1);
            $row = mysqli_fetch_array($result1);
             if($num >$row['SoLuongHang']){

                $num=$row['SoLuongHang'];
             }

            if(!isset($_SESSION["cart"])){
                $cart[$id] = array(
                    'MSHH' =>$row[0],
                    'TenHH' =>$row[1],
                    'Location' =>$row[7],
                    'Gia' => $row[3],
                    'QuyCach'=>$row[2],
                    'SoLuongHang'=>$row[4],
                    'number'=>$num
                );
            }else{
                 $cart = $_SESSION["cart"];
                if((int)$cart[$id]['number'] < (int)$cart[$id]['SoLuongHang']){
                      if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'MSHH' =>$row[0],
                    'TenHH' =>$row[1],
                    'Location' =>$row[7],
                    'Gia' => $row[3],
                    'QuyCach'=>$row[2],
                    'SoLuongHang'=>$row[4],
                    'number'=>(int)$cart[$id]['number']+$num

                   
                );
                }else{
                    $cart[$id] = array(
                    'MSHH' =>$row[0],
                    'TenHH' =>$row[1],
                    'Location' =>$row[7],
                    'Gia' => $row[3],
                    'QuyCach'=>$row[2],
                    'SoLuongHang'=>$row[4],
                    'number'=>$num
                );
                }

                }else{
                    if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                    'MSHH' =>$row[0],
                    'TenHH' =>$row[1],
                    'Location' =>$row[7],
                    'Gia' => $row[3],
                    'QuyCach'=>$row[2],
                    'SoLuongHang'=>$row[4],
                    'number'=>$row[4]

                   
                );
                }else{
                    $cart[$id] = array(
                    'MSHH' =>$row[0], 
                    'TenHH' =>$row[1],
                    'Location' =>$row[7],
                    'Gia' => $row[3],
                    'QuyCach'=>$row[2],
                    'SoLuongHang'=>$row[4],
                    'number'=>$num
                );
                }

                }
              

            }   

            $_SESSION["cart"] = $cart;
            $number = 0;
            $total = 0;
            // echo "<prE>";
            // print_r($_SESSION["cart"]);

            foreach ($cart as $value) {
                $number += (int)$value['number'];
                $total += (int)$value['Gia']*(int)$value['number'];

            }
                            echo $number."-".number_format($total,0,",",".");
                            die();

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
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
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
                            <a href="" class="header_navbar-item-link">
                                <i class="header_navbar-icon fas fa-bell"></i>
                                Thông báo
                            </a>
                       
                        </li>
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
                             <form style="margin: 8px;display: flex;" method="GET" action="index.php">
                                    <input type="text" class="header_search-input" placeholder="Nhập để tìm kiếm sản phẩm" name="timkiem">
                                    <button tyle="submit"   class="header_search-btn" style="margin: -5px;">
                                    <i class="fas fa-search header_search-btn-icon"></i>
                                    </button>
                            </form>
                            <!-- </search-history> -->
                           
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
                        <div class="header_cart-wrap" id="listCart1" >
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
                                                        <span class="header_cart-item-head-price" ><?php echo number_format($value["Gia"],0,",","."); ?></span>
                                                        <span class="header_cart-item-head-multiply">x</span>
                                                        <span class="header_cart-item-head-qnt"><?php echo $value["number"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="header_cart-item-body">
                                                <span class="header_cart-item-discription">Khối Lượng: <?php echo $value["QuyCach"]?></span>
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
                                font-weight: 500;color:#fff" 
                                href="cart.php" >Xem giỏ hàng</a></button>
                           <form method="POST" action="index.php">
                                <button type="submit" name="muahang" style="background-color: orange;
                                    float: left;
                                    width: 120px;
                                    height: 35px;
                                    border-radius: 5px;
                                    color: #fff;
                                    font-weight: 700;">Mua Hàng</button>
                            </form>
                            </h4>
                            </h4>
                        </div>

                     </div>
                        

                        
                    </div>
                </div>
            </div>


            <!-- carrttt -->
        <h2 style="text-align: center;margin:20px 0; font-weight: 700; font-size: 20px">Giỏ Hàng</h2>
        <div  style="overflow: scroll; height: 60vh;">
                 <div class="table-form-cart" >
        <div class="table-form-cart-product">Sản Phẩm</div>
        <div class="table-form-cart-price">Giá</div>
        <div class="table-form-cart-quantity">Số Lượng</div>
        <div class="table-form-cart-total">Thành tiền</div>
        </div >

            <?php 
                        $number =0;
                        $total =0;
                        $total1=0;
                        if(isset($_SESSION["cart"])){
                            $cart=$_SESSION["cart"];
                             foreach ($cart as $key => $value) {
                                  
                                 ?>

 <div id="listCart">
     
 <div class="table-form-cart" >
        <div class="table-form-cart-product"><img src="<?php echo $value["Location"] ?>" alt="">

             <div class="table-form-cart-product-thongtin">
                <h2><?php echo $value["TenHH"]; ?></h2> 
                <p>Khối Lượng:<?php echo $value["QuyCach"]; ?></p>
                <p>Khối Lượng:<?php echo $value["SoLuongHang"]; ?></p>

             </div>
            </div>

        <div class="table-form-cart-price"> 
            <div class="table-form-cart-prices">
                <div class="home-product-item-price-current">
                    <?php echo number_format($value["Gia"],0,",","."); ?>
                        
                </div> 
         </div> 
     </div>
        <div class="table-form-cart-quantity"><input type="number" value="<?php echo $value["number"]; ?>" id="num_<?php echo $key;?>" onblur="updatecart(<?php echo $key ?>)"></div>
        <div class="table-form-cart-total">
            <h2> 
                <?php
                        $total1 += (int)$value['Gia']*(int)$value['number'];
                        $total = (int)$value['Gia']*(int)$value['number'];
                        echo number_format($total,0,",",".") 
                ?>
                
            </h2> <input type="submit"  value="xóa"  onclick="deletecart(<?php echo $key ?>)" >
        </div>
    </div>

<?php }} ?>

<div style="display: flex; justify-content: space-between;margin: 0 20px;">
    <div class="table-form-cart-total">Tổng Tiền: <?php echo number_format($total1,0,",",".") ?></div>
       <form method="POST" action="index.php">
            <button type="submit" name="muahang" style="background-color: orange;
                float: left;
                width: 120px;
                height: 35px;
                border-radius: 5px;
                color: #fff;
            font-weight: 700;">Mua Hàng</button>
        </form>

</div>


                            </h4>


 </div>

</div>



     
   




        </header>

      
       
    </div>

  <script >
      
     function addCart(id){
            $.post("cart.php",{'id':id}, function(data, status){
                item = data.split("-");
                $("#qty").text(item[0]); 
                $("#total").text(item[1]);
              });
     }


     function updatecart(id){
        num = $("#num_"+id).val();
        $.post("updatecart.php",{'id':id,'num':num} ,function(data, status){
            
            $("#listCart").load("http://localhost/web/w3/shop/cart.php #listCart");
            $("#listCart1").load("http://localhost/web/w3/shop/cart.php #listCart1");



        });


     }

     function deletecart(id){
          $.post("updatecart.php",{'id':id,'num':0} ,function(data, status){

            $("#listCart").load("http://localhost/web/w3/shop/cart.php #listCart");
            $("#listCart1").load("http://localhost/web/w3/shop/cart.php #listCart1");




        });
     }

     

  </script>
    

</body>
</html>
<?php
        mysqli_close($conn);
?>
