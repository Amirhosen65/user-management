<?php

session_start();
include('../config/db.php');

if(isset($_POST['logo_update'])){
    $id = $_POST['logo_id'];

    if (empty($_FILES['favicon']['name']) && empty($_FILES['logo']['name']) && empty($_FILES['white_logo']['name'])) {
        $_SESSION['update_error'] = "Please select at least one image to update.";
        header('location: site_identy.php');
        exit();  
    }

    $favicon = $_FILES['favicon']['name'];
    $favicon_tmp_name = $_FILES['favicon']['tmp_name'];
    $favicon_explode = explode('.',$favicon);
    $extension_fav = end($favicon_explode);
    $new_name_fav = "favicon" . "-".date('YmdHis'). "." . $extension_fav;
    $local_path_fav = "../frontend_assets/img/".$new_name_fav;

    $select_img_fav = "SELECT * FROM site_identity WHERE id='$id'";
    $connect_1 = mysqli_query($db_connect,$select_img_fav);
    $old_img_fav = mysqli_fetch_assoc($connect_1);
    $old_img_fav_path = "../frontend_assets/img/".$old_img_fav['favicon'];

    if($favicon){
        if(move_uploaded_file($favicon_tmp_name,$local_path_fav)){
            unlink($old_img_fav_path);
            $update_image = "UPDATE site_identity SET favicon='$new_name_fav' WHERE id='$id'";

            mysqli_query($db_connect,$update_image);

            $_SESSION['logo_update'] = "Logo updated successfull!";
            header('location: site_identy.php');
        }
        
    }

    $logo = $_FILES['logo']['name'];
    $logo_tmp_name = $_FILES['logo']['tmp_name'];
    $logo_explode = explode('.',$logo);
    $extension_logo = end($logo_explode);
    $new_name_logo = "s_logo" . "-".date('YmdHis'). "." . $extension_logo;
    $local_path_logo = "../frontend_assets/img/logo/".$new_name_logo;

    $select_img_logo = "SELECT * FROM site_identity WHERE id='$id'";
    $connect_logo = mysqli_query($db_connect,$select_img_logo);
    $old_img_logo = mysqli_fetch_assoc($connect_logo);
    $old_img_logo_path = "../frontend_assets/img/logo/".$old_img_logo['logo'];

    if($logo){
        if(move_uploaded_file($logo_tmp_name,$local_path_logo)){
            unlink($old_img_logo_path);
            $update_image = "UPDATE site_identity SET logo='$new_name_logo' WHERE id='$id'";

            mysqli_query($db_connect,$update_image);

            $_SESSION['logo_update'] = "Logo updated successfull!";
            header('location: site_identy.php');
        }
        
    }

    $white_logo = $_FILES['white_logo']['name'];
    $white_logo_tmp_name = $_FILES['white_logo']['tmp_name'];
    $white_logo_explode = explode('.',$white_logo);
    $extension_w_logo = end($white_logo_explode);
    $new_name_w_logo = "logo" . "-".date('YmdHis'). ".".$extension_w_logo;
    $local_path_w_logo = "../frontend_assets/img/logo/".$new_name_w_logo;

    $select_white_logo = "SELECT * FROM site_identity WHERE id='$id'";
    $connect_w_logo = mysqli_query($db_connect,$select_white_logo);
    $old_white_logo = mysqli_fetch_assoc($connect_w_logo);
    $old_white_logo_path = "../frontend_assets/img/logo/".$old_white_logo['white_logo'];

    if($white_logo){
        if(move_uploaded_file($white_logo_tmp_name,$local_path_w_logo)){
            unlink($old_white_logo_path);
            $update_image = "UPDATE site_identity SET white_logo='$new_name_w_logo' WHERE id='$id'";

            mysqli_query($db_connect,$update_image);

            $_SESSION['logo_update'] = "Logo updated successfull!";
            header('location: site_identy.php');
        }   
    }
}

if(isset($_POST['footer_update'])){
    $id = $_POST['footer_id'];
    $footer = $_POST['footer'];

    if (empty($footer) ) {
        $_SESSION['footer_error'] = "Please insert footer text first!";
        header('location: site_identy.php');
        exit();  
    }else{

    $update_query = "UPDATE site_identity SET footer='$footer' WHERE id='$id' ";
    mysqli_query($db_connect,$update_query);

    $_SESSION['footer_update_success'] = "Footer updated successfull!";
    header('location: site_identy.php');
    }
}

?>