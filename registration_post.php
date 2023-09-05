<?php

include('./config/db.php');

session_start();

$name = $_POST["name"]; 
$email = $_POST["email"];
$password = $_POST["password"];
$con_password = $_POST["con_password"];

if($name){
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $_SESSION['name_error'] = "Only letters and white space allowed";
    header("location: sign_up.php");
    }else{
        // echo "Name: " . $name;
    }
}else{
    $_SESSION['name_error'] = "Please Enter Name";
    header("location: sign_up.php");
}

echo "<br>";

if($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo "Email: " . $email;
    }else{
        $_SESSION['email_error'] = "Invalid Email Address!";
    header("location: sign_up.php");
    }
}else{
    $_SESSION['email_error'] = "Please Enter Email";
    header("location: sign_up.php");
}

echo "<br>";

if($password){
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
        $_SESSION['password_error'] = "Weak Password";
    header("location: sign_up.php");
    }else{
        // echo "Password: " . $password;
    }
}else{
    $_SESSION['password_error'] = "Please Enter Password";
    header("location: sign_up.php");
}


echo "<br>";

if($con_password){
    if($password == $con_password){
        // echo "Password Matched!";
    }else{
        $_SESSION['con_password_error'] = "Confirm Password Not Match!";
    header("location: sign_up.php");
    }
}else{
    $_SESSION['con_password_error'] = "Please Enter Confirm Password!";
    header("location: sign_up.php");
}

echo "<br>";

if($name && $email && $password && $con_password) {

    $encrypt_password = md5($password);

    $insert_query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$encrypt_password')";

    mysqli_query($db_connect,$insert_query);
    include('./success_message/success.php');
}

    

?>

