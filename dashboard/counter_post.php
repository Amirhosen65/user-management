<?php
session_start();
include('../config/db.php');


if(isset($_POST['counter_add_btn'])){

    $title = $_POST['counter_title'];
    $counter = $_POST['counter'];
    $icon = $_POST['icon'];

    if($title && $counter && $icon){
        $insert_counter = "INSERT INTO portfolio_count (title,counter,icon) VALUES ('$title','$counter','$icon')";
        mysqli_query($db_connect,$insert_counter);

        $_SESSION['counter_insert'] = "Counter added successfull!";
        header('location: counter.php');
    }else{
        $_SESSION['counter_error'] = "Please insert all information!";
        header('location: counter_add.php');
    }

}


if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM portfolio_count WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['counter_delete'] = "Counter deleted successfull!";
    header('location: counter.php');    
}

if(isset($_POST['counter_edit_btn'])){
    $id = $_POST['counter_id'];
    $title = $_POST['counter_title'];
    $counter = $_POST['counter'];
    $icon = $_POST['icon'];

    if($title && $counter && $icon){
        $update_counter = "UPDATE portfolio_count SET title='$title', counter='$counter', icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect,$update_counter);

        $_SESSION['counter_update'] = "Counter updated successfull!";
        header('location: counter.php'); 
    }else{
        $_SESSION['counter_update_error'] = "Please insert all information!";
        header('location: counter_edit.php');
    }
}



?>