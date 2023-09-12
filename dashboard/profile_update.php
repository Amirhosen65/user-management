<?php

session_start();

include('../config/db.php');

$name = $_POST['name'];
$name_update_btn = $_POST['name_update'];
$password_update_btn = $_POST['password_update'];
$profile_img_update = $_POST['profile_img_update'];

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
        
        // Check if the email is already registered
        $check_email_query = "SELECT id FROM users WHERE email='$email' AND id<>'$user_id'";
        $check_email_result = mysqli_query($db_connect, $check_email_query);

        if(mysqli_num_rows($check_email_result) > 0){
            $_SESSION['email_error'] = "Email is already exist!";
            header('location: profile.php');
        } else {
            // Update the email if it's not already registered
            $email_update_query = "UPDATE users SET email='$email' WHERE id='$user_id'";
            mysqli_query($db_connect, $email_update_query);
            $_SESSION['admin_email'] = $email;
            $_SESSION['email_update_success'] = "Email updated successfully!";
            header("location: profile.php");
        }
    } else {
        $_SESSION['email_error'] = "Email is empty!";
        header('location: profile.php');
    }
}


if(isset($password_update_btn)){

    $user_id = $_SESSION['admin_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($old_password){
        $encrypt = md5($old_password);
        $select_password_query = "SELECT COUNT(*) AS check_password FROM users WHERE id='$user_id' AND password='$encrypt'";

        $select_password_query_connect = mysqli_query($db_connect, $select_password_query);

        // print_r(mysqli_fetch_assoc($select_password_query_connect));

        if(mysqli_fetch_assoc($select_password_query_connect)['check_password'] == 1){

            if($new_password){

                if($new_password == $confirm_password){
                    $new_password_encrypt = md5($new_password);

                    $password_update_query = "UPDATE users SET password='$new_password_encrypt' WHERE id='$user_id'";
                    mysqli_query($db_connect, $password_update_query);

                    $_SESSION['password_update_success'] = "Password Change Successfull!";
                    header('location: profile.php');

                }else{
                    $_SESSION['password_error'] = "Confirm Password doesn't matched!";
                    header('location: profile.php');
                }

            }else{
        $_SESSION['password_error'] = "New password is empty!";
        header('location: profile.php');
            }

        }else{
        $_SESSION['password_error'] = "Old password is incorrect!";
        header('location: profile.php');
    }

    }else{
        $_SESSION['password_error'] = "Old password is empty!";
        header('location: profile.php');
    }


}


if(isset($profile_img_update)){

    $user_id = $_SESSION['admin_id'];
    $user_name = $_SESSION['admin_name'];
    
    $image_name = $_FILES['profile_img']['name'];
    $image_temp_name = $_FILES['profile_img']['tmp_name'];
    $explode = explode('.',$image_name);
    $extension = end($explode);

    // print_r($extension);

    $new_img_name = $user_id."-".$user_name.date("Y-m-d").".".$extension;

    $path = "../images/profile_images/".$new_img_name;

    if(move_uploaded_file($image_temp_name,$path)){
        $profile_img_update = "UPDATE users SET profile_image='$new_img_name' WHERE id='$user_id'";
        mysqli_query($db_connect, $profile_img_update);
        $_SESSION['admin_profile_img'] = $new_img_name;

        $_SESSION['profile_img_update_success'] = "Profile image updated successfully!";
        header("location: profile.php");
    }else{
        $_SESSION['profile_img_error'] = "Profile image is empty!";
        header("location: profile.php");
    }

}





?>