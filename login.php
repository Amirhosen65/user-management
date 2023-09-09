<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="./assets/css/main.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <style>
            .fa-eye{
                position: absolute;
            }
            .password-input{
                position: relative;
            }
        </style>

</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please Log-in to your account and continue to the dashboard.<br>Don't have an account? <a href="registration.php">Register</a></p>

            <form action="log_in_post.php" method="POST">


            <?php if(isset($_SESSION['registraion_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome, <?= $_SESSION['s_user'] ?></span>
                    <span class="alert-text">Log in now!</span>
                </div>
            </div>
            <?php endif; unset($_SESSION['registraion_success']); ?>

            <?php if(isset($_SESSION['login_failed'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <span class="alert-title">Log In Failed!</span>
                    <span class="alert-text"><?= $_SESSION['login_failed'] ?></span>
                </div>
            </div>
            <?php endif; unset($_SESSION['login_failed']); ?>

            <?php if(isset($_SESSION['login_failed'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <span class="alert-title">Log In Failed!</span>
                    <span class="alert-text"><?= $_SESSION['login_failed'] ?></span>
                </div>
            </div>
            <?php endif; unset($_SESSION['login_failed']); ?>


            <div class="auth-credentials m-b-xxl position-relative">
                <label for="signInEmail" class="form-label">Email address</label>
                <input type="email" class="form-control m-b-md <?= (isset($_SESSION['login_failed'])) ? 'is-invalid' : ' ' ?>" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com" value="<?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : ''; unset($_SESSION['s_email']); ?>" name="email">

                <div class="password-input">
                    
                    <label for="signInPassword" class="form-label">Password</label>
                    
                    <input type="password" class="form-control <?= (isset($_SESSION['login_failed'])) ? 'is-invalid' : ' ' ?>" id="id_password" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" value="<?= (isset($_SESSION['s_password'])) ? $_SESSION['s_password'] : ''; unset($_SESSION['s_password']); ?>" name="password">
                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer; position: absolute; top: 62%; right: 3%"></i>
                </div>

            </div>
            

            <script>
                const togglePassword = document.querySelector('#togglePassword');
                const password = document.querySelector('#id_password');

                togglePassword.addEventListener('click', function (e) {
                    
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    this.classList.toggle('fa-eye-slash');
                });
            </script>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign In</a>
            </div>
            <div class="divider"></div>   
            </form>         
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="./assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="./assets/plugins/pace/pace.min.js"></script>
    <script src="./assets/js/main.min.js"></script>
    <script src="./assets/js/custom.js"></script>
</body>
</html>

