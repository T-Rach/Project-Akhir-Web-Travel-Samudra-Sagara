<?php 

include 'connect.php';

if(isset($_POST['register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $number_phone=$_POST['number_phone'];
    $addres=$_POST['addres'];

    $checkEmail="SELECT * From user where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Alamat Email Tidak Tersedia!";
    }
    else{
        $insertQuery="INSERT INTO user (username,email,password,number_phone, addres)
                       VALUES ('$username','$email','$password','$number_phone', '$addres')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['login'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=($password) ;
   
   $sql="SELECT * FROM user WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("location: web.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>