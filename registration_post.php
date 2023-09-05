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
    header("location: registration.php");
    }else{
        // echo "Name: " . $name;
    }
}else{
    $_SESSION['name_error'] = "Please Enter Name";
    header("location: registration.php");
}

echo "<br>";

if($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // echo "Email: " . $email;
    }else{
        $_SESSION['email_error'] = "Invalid Email Address!";
    header("location: registration.php");
    }
}else{
    $_SESSION['email_error'] = "Please Enter Email";
    header("location: registration.php");
}

echo "<br>";

if($password){
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)){
        $_SESSION['password_error'] = "Weak Password";
    header("location: registration.php");
    }else{
        // echo "Password: " . $password;
    }
}else{
    $_SESSION['password_error'] = "Please Enter Password";
    header("location: registration.php");
}


echo "<br>";

if($con_password){
    if($password == $con_password){
        // echo "Password Matched!";
    }else{
        $_SESSION['con_password_error'] = "Confirm Password Not Match!";
    header("location: registration.php");
    }
}else{
    $_SESSION['con_password_error'] = "Please Enter Confirm Password!";
    header("location: registration.php");
}

echo "<br>";

if($name && $email && $password && $con_password) {

    $emai_validity = "SELECT COUNT(*) AS validity FROM users WHERE email='$email'";
    $emai_validity_connect = mysqli_query($db_connect, $emai_validity);

    // print_r(mysqli_fetch_assoc($emai_validity_connect)['validity']);

    if(mysqli_fetch_assoc($emai_validity_connect)['validity'] == 0){

    $encrypt_password = md5($password);

    $insert_query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$encrypt_password')";

    mysqli_query($db_connect,$insert_query);

    include('./success_message/success.php');

        $_SESSION['s_user'] = $name;
        $_SESSION['s_email'] = $email;
        $_SESSION['s_password'] = $password;

        // header("location: login.php");



    

    }else{
        $_SESSION['registraion_failed'] = "This email allready exist!";
        header("location: registration.php");
    }


}

    

?>

