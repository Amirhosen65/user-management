<?php

session_start();
include('../config/db.php');

if(isset($_POST['service_add_btn'])){
    $title = $_POST['service_title'];
    $description = $_POST['service_description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
        $insert_service = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($db_connect,$insert_service);

        $_SESSION['service_insert'] = "Service added successfull!";
        header('location: services.php');

    }else{
        $_SESSION['service_error'] = "Please insert all information!";
        header('location: services_add.php');
    }

}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM services WHERE id='$id' ";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['service_delete'] = "Service deleted successfull!";
    header('location: services.php');
}

if(isset($_POST['service_edit_btn'])){

    $id = $_POST['service_id'];
    $title = $_POST['service_title'];
    $description = $_POST['service_description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
        $update_service = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect,$update_service);

        $_SESSION['service_update'] = "Service updated successfull!";
        header('location: services.php');

    }else{
        $_SESSION['service_update_error'] = "Please insert all information!";
        header('location: services_edit.php');
    }

}


?>