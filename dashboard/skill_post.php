<?php

session_start();
include('../config/db.php');

if(isset($_POST['skill_add_btn'])){
    $title = $_POST['title'];
    $year = $_POST['year'];
    $percentage = $_POST['percentage'];

    if($title && $year && $percentage){
        $insert_skill = "INSERT INTO skills (title,year,percentage) VALUES ('$title','$year','$percentage')";
        mysqli_query($db_connect,$insert_skill);

        $_SESSION['skill_insert'] = "Skill added successfull!";
        header('location: skills.php');

    }else{
        $_SESSION['skill_error'] = "Please insert all information!";
        header('location: skill_add.php');
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "DELETE FROM skills WHERE id='$id' ";
    mysqli_query($db_connect,$delete_query);

    $_SESSION['skill_delete'] = "Skill deleted successfull!";
    header('location: skills.php');
}


if(isset($_POST['skill_edit_btn'])){

    $id = $_POST['skill_id'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $percentage = $_POST['percentage'];

    if($title && $year && $percentage){
        $update_skill = "UPDATE skills SET title='$title',year='$year',percentage='$percentage' WHERE id='$id'";
        mysqli_query($db_connect,$update_skill);

        $_SESSION['skill_update'] = "Skill updated successfull!";
        header('location: skills.php');

    }else{
        $_SESSION['skill_update_error'] = "Please insert all information!";
        header('location: skills_edit.php');
    }
}

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    $select_skill = "SELECT * FROM skills WHERE id='$id'";
    $connect = mysqli_query($db_connect,$select_skill);
    $select = mysqli_fetch_assoc($connect);
    
    if($select['status'] == 'active'){
        $update_query = "UPDATE skills SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['skill_delete'] = "Skill deactivated successfull!";
        header('location: skills.php');
    }else{
        $update_query = "UPDATE skills SET status='active' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);

        $_SESSION['skill_delete'] = "Skill active successfull!";
        header('location: skills.php');
    } 
}


?>