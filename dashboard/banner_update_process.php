<?php

session_start();

include('../config/db.php');

$banner1_img_update = $_POST['banner1_img_update'];


if(isset($banner1_img_update)){

    $user_id = $_SESSION['admin_id'];
    
    $image_name = $_FILES['profile_img']['name'];
    $image_temp_name = $_FILES['profile_img']['tmp_name'];
    $explode = explode('.',$image_name);
    $extension = end($explode);

    // print_r($extension);

    // $new_img_name = $user_id."-"."banner_1".date("Y-m-d").".".$extension;

    // $path = "../images/profile_images/".$new_img_name;

    // if(move_uploaded_file($image_temp_name,$path)){
    //     $profile_img_update = "UPDATE users SET profile_image='$new_img_name' WHERE id='$user_id'";
    //     mysqli_query($db_connect, $profile_img_update);
    //     $_SESSION['admin_profile_img'] = $new_img_name;

    //     $_SESSION['profile_img_update_success'] = "Profile image updated successfully!";
    //     header("location: profile.php");
    // }else{
    //     $_SESSION['profile_img_error'] = "Profile image is empty!";
    //     header("location: profile.php");
    // }

}

?>