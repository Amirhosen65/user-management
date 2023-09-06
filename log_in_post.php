<?php

include('./config/db.php');

session_start();

$email = $_POST['email'];
$password = $_POST['password'];


if($email && $password){

    $encrypt = md5($password);

    $selec_users = "SELECT COUNT(*) as result FROM users WHERE email='$email' AND password='$encrypt'";

    $select_connect = mysqli_query($db_connect, $selec_users);

    if(mysqli_fetch_assoc($select_connect)['result'] == 1 ){

        $select_info = "SELECT * FROM users WHERE email='$email'";
        $connect = mysqli_query($db_connect, $select_info);

        $user = mysqli_fetch_assoc($connect);

        
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_name'] = $user['name'];
        $_SESSION['admin_email'] = $user['email'];

        $_SESSION['login_success'] = "Welcome to dashboard!";

        header("location: ./dashboard/admin.php");

    }else{
        $_SESSION['login_failed'] = "This email was not registered!";
        header("location: login.php");
    }
}else{
    $_SESSION['login_failed'] = "Please enter required information!";
    header("location: login.php");
}


?>