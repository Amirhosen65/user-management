<?php

session_start();
include('../config/db.php');

// if (isset($_POST['info_edit_btn'])) {
//     $id = $_POST['info_id'];
//     $name = $_POST['name'];
//     $intro = $_POST['intro'];
//     $details_about = $_POST['details_about'];

//     if ($name && $intro && $details_about ) {
        
//         $update_query = "UPDATE personal_info SET name='$name', intro='$intro', details_about='$details_about' WHERE id='$id'";
//         mysqli_query($db_connect, $update_query);

//         $_SESSION['info_update'] = "Personal information updated successfully!";
//         header('location: personal_info.php');
//     } else {
//         $_SESSION['info_update_error'] = "Please insert all information!";
//         header('location: personal_info_edit.php');
//     }
// }


if (isset($_POST['info_edit_btn'])) {
    $id = $_POST['info_id'];
    $name = $_POST['name'];
    $intro = $_POST['intro'];
    $details_about = $_POST['details_about'];

    if ($name && $intro && $details_about) {
        // Prepare the SQL statement
        $update_query = "UPDATE personal_info SET name=?, intro=?, details_about=? WHERE id=?";
        $stmt = mysqli_prepare($db_connect, $update_query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sssi', $name, $intro, $details_about, $id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        $_SESSION['info_update'] = "Personal information updated successfully!";
        header('location: personal_info.php');
    } else {
        $_SESSION['info_update_error'] = "Please insert all information!";
        header('location: personal_info_edit.php');
    }
}



if(isset($_POST['banner_img_update'])){
    $id = $_POST['banner_id'];

    if (empty($_FILES['banner_img1']['name']) && empty($_FILES['banner_img2']['name'])) {
        $_SESSION['banner_update_error'] = "Please select at least one image to update.";
        header('location: personal_info.php');
        exit();  
    }

    $image_1 = $_FILES['banner_img1']['name'];
    $image_1_tmp_name = $_FILES['banner_img1']['tmp_name'];
    $image_1_explode = explode('.',$image_1);
    $extension_1 = end($image_1_explode);
    $new_name_1 = "banner_1" . "-".date('YmdHis').".".$extension_1;
    $local_path_1 = "../frontend_assets/img/banners/".$new_name_1;

    $select_img_1 = "SELECT * FROM banner_image WHERE id='$id'";
    $connect_1 = mysqli_query($db_connect,$select_img_1);
    $old_img_1 = mysqli_fetch_assoc($connect_1);
    $old_img_1_path = "../frontend_assets/img/banners/".$old_img_1['image_1'];

    if($image_1){
        if(move_uploaded_file($image_1_tmp_name,$local_path_1)){
            unlink($old_img_1_path);
            $update_image = "UPDATE banner_image SET image_1='$new_name_1' WHERE id='$id'";

            mysqli_query($db_connect,$update_image);

            $_SESSION['banner_update'] = "Banner Image updated successfull!";
            header('location: personal_info.php');
        }
        
    }

    $image_2 = $_FILES['banner_img2']['name'];
    $image_2_tmp_name = $_FILES['banner_img2']['tmp_name'];
    $image_2_explode = explode('.',$image_2);
    $extension_2 = end($image_2_explode);
    $new_name_2 = "banner_2" . "-".date('YmdHis').".".$extension_2;
    $local_path_2 = "../frontend_assets/img/banners/".$new_name_2;

    $select_img_2 = "SELECT * FROM banner_image WHERE id='$id'";
    $connect_2 = mysqli_query($db_connect,$select_img_2);
    $old_img_2 = mysqli_fetch_assoc($connect_2);
    $old_img_2_path = "../frontend_assets/img/banners/".$old_img_2['image_2'];

    if($image_2){
        if(move_uploaded_file($image_2_tmp_name,$local_path_2)){
            unlink($old_img_2_path);
            $update_image = "UPDATE banner_image SET image_2='$new_name_2' WHERE id='$id'";

            mysqli_query($db_connect,$update_image);

            $_SESSION['banner_update'] = "Banner Image updated successfull!";
            header('location: personal_info.php');
        }
        
    }

}
?>



