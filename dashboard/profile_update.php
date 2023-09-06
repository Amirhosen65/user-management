<?php

session_start();

include('../config/db.php');

$name = $_POST['name'];
$name_update_btn = $_POST['name_update'];

if(isset($name_update_btn)){
    if($name){

        $user_id = $_SESSION['admin_id'];
        $name_update_query = "UPDATE users SET name='$name' WHERE id='$user_id' ";

        mysqli_query($db_connect, $name_update_query);

        $_SESSION['admin_name'] = $name;
        $_SESSION['name_update_success'] = "Name updated successfully!";
        header("location: profile.php");

    }else{
        $_SESSION['name_error'] = "Name is empty!";
        header('location: profile.php');
    }
}


$email = $_POST['email'];
$email_update_btn = $_POST['email_update'];

if(isset($email_update_btn)){
    if($email){

        $user_id = $_SESSION['admin_id'];
        $email_update_query = "UPDATE users SET email='$email' WHERE id='$user_id' ";

        mysqli_query($db_connect, $email_update_query);

        $_SESSION['admin_email'] = $email;
        $_SESSION['email_update_success'] = "Email updated successfully!";
        header("location: profile.php");

    }else{
        $_SESSION['email_error'] = "Email is empty!";
        header('location: profile.php');
    }
}



// if($email_update_btn) {
//     $email_validity = "SELECT COUNT(*) AS validity FROM users WHERE email='$email'";
//     $email_validity = mysqli_query($db_connect, $emai_validity);

//     if(mysqli_fetch_assoc($email_validity)['validity'] == 0){
    
//         $user_id = $_SESSION['admin_id'];
//         $email_update_query = "UPDATE users SET email='$email' WHERE id='$user_id' ";

//         mysqli_query($db_connect, $email_update_query);
     
//         $_SESSION['s_email'] = $email;
//         $_SESSION['email_update_success'] = "Email updated successfully!";
//         header("location: profile.php");

//     }else{
//         $_SESSION['email_error'] = "Email allready exists!";
//         header('location: profile.php');
//     }
    
// }else{
//     $_SESSION['email_error'] = "Email is empty!";
//     header('location: profile.php');
// }



?>