<?php

include('./config/db.php');

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if ($email && $password) {
    $encrypt = md5($password);

    $select_users = "SELECT * FROM users WHERE email='$email'";
    $select_connect = mysqli_query($db_connect, $select_users);

    if (mysqli_num_rows($select_connect) == 1) {
        $user = mysqli_fetch_assoc($select_connect);

        if ($user['password'] == $encrypt) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_profile_img'] = $user['profile_image'];

            $_SESSION['login_success'] = "Welcome to the dashboard!";
            header("location: ./dashboard/admin.php");
        } else {
            $_SESSION['login_failed'] = "Incorrect password. Please try again!";
            header("location: login.php");
        }
    } else {
        $_SESSION['login_failed'] = "This email was not registered!";
        header("location: login.php");
    }
} else {
    $_SESSION['login_failed'] = "Please enter required information!";
    header("location: login.php");
}

?>
