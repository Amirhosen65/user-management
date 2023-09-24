<?php
session_start();
include('../config/db.php');

if(isset($_POST['testimonials_add_btn'])){

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $testimonial = $_POST['testimonial'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_explode = explode('.',$image);
    $extension = end($image_explode);
    $new_name = $name . "-". date('YmdHis').".".$extension;
    $local_path = "../images/testimonial_images/".$new_name;

    if(move_uploaded_file($image_tmp_name,$local_path)){

        if($name && $designation && $testimonial && $image){
            $insert_testimonials = "INSERT INTO testimonials (name,designation,testimonial,image) VALUES ('$name','$designation','$testimonial','$new_name')";
            mysqli_query($db_connect,$insert_testimonials);

            $_SESSION['testimonials_insert'] = "testimonials added successfull!";
            header('location: testimonials.php');
        }else{
            $_SESSION['testimonials_error'] = "Please insert all information!";
            header('location: testimonials_add.php');
        }
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM testimonials WHERE id='$id'";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['testimonial_delete'] = "Protfolio deleted successfull!";
    header('location: testimonials.php');    
}

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    $select_testimonial = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($db_connect,$select_testimonial);
    $select = mysqli_fetch_assoc($connect);
    
    if($select['status'] == 'active'){
        $update_query = "UPDATE testimonial SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['testimonial_delete'] = "Testimonial deactive successfull!";
        header('location: testimonials.php');
    }else{
        $update_query = "UPDATE testimonials SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['testimonial_delete'] = "Testimonial active successfull!";
        header('location: testimonials.php');
    } 
}

if(isset($_POST['testis_edit_btn'])){
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $testimonial = $_POST['testimonial'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_explode = explode('.',$image);
    $extension = end($image_explode);
    $new_name = $name . "-". date('YmdHis').".".$extension;
    $local_path = "../images/testimonial_images/".$new_name;

    if($name && $designation && $testimonial){
        $update_testimonials = "UPDATE testimonials SET name='$name',designation='$designation',testimonial='$testimonial' WHERE id='$id'";

        mysqli_query($db_connect,$update_testimonials);

        $_SESSION['testimonials_insert'] = "Testimonials updated successfull!";
        header('location: testimonials.php');
    }else{
        $_SESSION['testimonials_error'] = "Please insert all information!";
        header('location: testimonials.php');
    }

    $select_img = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($db_connect,$select_img);
    $old_img = mysqli_fetch_assoc($connect);
    $old_img_path = "../images/testimonial_images/".$old_img['image'];

    if($image){
        if(move_uploaded_file($image_tmp_name,$local_path)){
            unlink($old_img_path);
            $update_testimonials = "UPDATE testimonials SET image='$new_name' WHERE id='$id'";

            mysqli_query($db_connect,$update_testimonials);

            $_SESSION['testimonials_insert'] = "Testimonial updated successfull!";
            header('location: testimonials.php');
        }
        
    }

}

?>