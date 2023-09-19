<?php
session_start();
include('../config/db.php');

if(isset($_POST['protfolio_add_btn'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_explode = explode('.',$image);
    $extension = end($image_explode);
    $new_name = $title . "-". date('YmdHis').".".$extension;
    $local_path = "../images/protfolio_images/".$new_name;

    if(move_uploaded_file($image_tmp_name,$local_path)){

        if($title && $description && $image){
            $insert_protfolio = "INSERT INTO protfolio (title,description,image) VALUES ('$title','$description','$new_name')";
            mysqli_query($db_connect,$insert_protfolio);

            $_SESSION['protfolio_insert'] = "Protfolio added successfull!";
            header('location: protfolios.php');
        }else{
            $_SESSION['protfolio_error'] = "Please insert all information!";
            header('location: protfolio_add.php');
        }
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM protfolio WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['protfolio_delete'] = "Protfolio deleted successfull!";
    header('location: protfolios.php');    
}

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    $select_protfolio = "SELECT * FROM protfolio WHERE id='$id'";
    $connect = mysqli_query($db_connect,$select_protfolio);
    $select = mysqli_fetch_assoc($connect);
    
    if($select['status'] == 'active'){
        $update_query = "UPDATE protfolio SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['protfolio_delete'] = "Protfolio deactive successfull!";
        header('location: protfolios.php');
    }else{
        $update_query = "UPDATE protfolio SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['protfolio_delete'] = "Protfolio active successfull!";
        header('location: protfolios.php');
    } 
}

if(isset($_POST['protfolio_edit_btn'])){
    $id = $_POST['protfolio_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_explode = explode('.',$image);
    $extension = end($image_explode);
    $new_name = $title . "-". date('YmdHis').".".$extension;
    $local_path = "../images/protfolio_images/".$new_name;

    if(move_uploaded_file($image_tmp_name,$local_path)){

        if($title && $description && $image){
            $update_protfolio = "UPDATE protfolio SET title='$title',description='$description',image='$image' WHERE id='$id'";

            mysqli_query($db_connect,$update_protfolio);

            $_SESSION['protfolio_insert'] = "Protfolio updated successfull!";
            header('location: protfolios.php');
        }else{
            $_SESSION['protfolio_error'] = "Please insert all information!";
            header('location: protfolio_add.php');
        }
    }

}

?>