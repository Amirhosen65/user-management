<?php

include('../config/db.php');

session_start();

if(isset($_POST['add_btn'])){

    $brand_name = $_POST['brand_name'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_explode = explode('.',$image);
    $extension = end($image_explode);
    $new_name = $brand_name . "-". date('Y-m-d-H-i-s').".".$extension;
    $local_path = "../images/brands_images/".$new_name;

    if(move_uploaded_file($image_tmp_name,$local_path)){

        if($brand_name && $image){
            $insert_brands = "INSERT INTO brands (brand_name,image) VALUES ('$brand_name','$new_name')";
            mysqli_query($db_connect,$insert_brands);

            $_SESSION['brand_success'] = "brands added successfull!";
            header('location: brands.php');
        }
    }else{
        $_SESSION['brand_error'] = "Please insert all information!";
        header('location: brand_add.php');
    }

}


if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM brands WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['brand_success'] = "Brand deleted successfull!";
    header('location: brands.php');    
}
    

?>

