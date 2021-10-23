<?php
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die ('Không thể kết nối tới database');
        ob_start();
        session_start();
        //cap nhat va xoa hang
        if(isset($_POST['id']) && isset($_POST['num'])){
        	$id=$_POST['id'];
        	$num=$_POST['num'];

        	if(isset($_SESSION["cart"])){
        		$cart=$_SESSION["cart"];


        	   if($num   > (int)$cart[$id]["SoLuongHang"]  ){
                $num=(int)$cart[$id]["SoLuongHang"];
               } 
        	 	if(array_key_exists($id, $cart)){

        	 		if($num>0){
        	 			$cart[$id] = array(
                        'MSHH' =>$cart[$id]["MSHH"],
                     	'TenHH' =>$cart[$id]["TenHH"],
                     	'Location' =>$cart[$id]["Location"],
                     	'Gia' => $cart[$id]["Gia"],
                        'QuyCach'=>$cart[$id]["QuyCach"],
                        'SoLuongHang'=>$cart[$id]["SoLuongHang"],

                     	'number'=>$num 
                 );
        	 		}else{
        	 			unset($cart[$id]);
        	 		}
        	 		$_SESSION["cart"]=$cart;
                
        	 }


        }}


        //them hang ben chi tiet don hang
         if(isset($_POST['id']) &&isset($_POST['num1'])){ 
            $id=$_POST['id'];
            $num=$_POST['num1'];
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
                if((int)$cart[$id]['number']  + $num < (int)$cart[$id]['SoLuongHang']){
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
                        

        }

?>