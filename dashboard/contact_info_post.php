<?php

session_start();
include('../config/db.php');

if (isset($_POST['contact_edit_btn'])) {
    $id = $_POST['contact_id'];
    $contact_intro = $_POST['contact_intro'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if ($contact_intro && $address && $phone && $email) {
        
        $update_query = "UPDATE contact_info SET contact_intro='$contact_intro', address='$address', phone='$phone', email='$email' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['info_update'] = "Personal information updated successfully!";
        header('location: contact_info.php');
    } else {
        $_SESSION['info_update_error'] = "Please insert all information!";
        header('location: contact_info_edit.php');
    }
}


// if(isset($_POST['skill_edit_btn'])){

//     $id = $_POST['contact_id'];
//     $contact_intro = $_POST['contact_intro'];
//     $address = $_POST['address'];
//     $phone = $_POST['phone'];
//     $email = $_POST['email'];

//     if($contact_intro && $address && $phone && $email){
//         $update_info = "UPDATE skills SET contact_intro='$contact_intro',address='$address',phone='$phone',email='$email' WHERE id='$id'";
//         mysqli_query($db_connect,$update_info);

//         $_SESSION['skill_update'] = "Skill updated successfull!";
//         header('location: skills.php');

//     }else{
//         $_SESSION['info_update_error'] = "Please insert all information!";
//         header('location: personal_info_edit.php');
//     }
// }



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
    $old_img_1_path = "../frontend_assets/img/banners/".$old_img_1['image'];

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
    $old_img_2_path = "../frontend_assets/img/banners/".$old_img_2['image'];

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