<?php

session_start();
include('../config/db.php');

if(isset($_POST['s_link_add_btn'])){
    $social_name = $_POST['social_name'];
    $link = $_POST['link'];
    $icon = $_POST['icon'];

    if($social_name && $link && $icon){
        $insert_link = "INSERT INTO social_link (social_name,link,icon) VALUES ('$social_name','$link','$icon')";
        mysqli_query($db_connect,$insert_link);

        $_SESSION['link_success'] = "Service added successfull!";
        header('location: social_link.php');

    }else{
        $_SESSION['link_error'] = "Please insert all information!";
        header('location: social_link_add.php');
    }

}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM social_link WHERE id='$id' ";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['link_success'] = "Social Media Link deleted successfull!";
    header('location: social_link.php');
}

if(isset($_POST['update_btn'])){

    $id = $_POST['link_id'];
    $social_name = $_POST['social_name'];
    $link = $_POST['link'];
    $icon = $_POST['icon'];

    if($social_name && $link && $icon){
        $update_link = "UPDATE social_link SET social_name='$social_name',link='$link',icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect,$update_link);

        $_SESSION['link_success'] = "Social Link updated successfull!";
        header('location: social_link.php');

    }else{
        $_SESSION['link_error'] = "Please insert all information!";
        header('location: social_link_edit.php');
    }
}

?>