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




?>