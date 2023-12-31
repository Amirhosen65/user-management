<?php

session_start();

include('./config/db.php');

$users_select_query = "SELECT * FROM users";
$users_connect = mysqli_query($db_connect, $users_select_query);
$users = mysqli_fetch_assoc($users_connect);

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
    <title><?= $users['name'] ?> - Admin Dashboard Log in</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
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
            .app-auth-container{
                height: auto !important;
            }
        </style>

</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.php"><?= $users['name'] ?></a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="login.php">Log In</a></p>

            <form action="registration_post.php" method="post">

            <?php if(isset($_SESSION['registraion_failed'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                <div class="alert-content">
                    <span class="alert-title">Registration failed!</span>
                    <span class="alert-text"><?= $_SESSION['registraion_failed'] ?></span>
                </div>
            </div>
            <?php endif; unset($_SESSION['registraion_failed']); ?>

            <div class="auth-credentials m-b-xxl">
                <label for="signUpUsername" class="form-label">Name</label>
                <input type="text" class="form-control m-b-md <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ' ' ?>" id="signUpUsername" name="name" aria-describedby="signUpUsername" placeholder="Enter Name" value="">

                <?php if(isset($_SESSION['name_error'])) : ?>
                <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <?= $_SESSION['name_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
                <?php endif; unset($_SESSION['name_error']) ?>

                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="text" class="form-control m-b-md <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ' ' ?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="email">

                <?php if(isset($_SESSION['email_error'])) : ?>
                <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <?= $_SESSION['email_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; unset($_SESSION['email_error']) ?>

                <label for="signUpPassword" class="form-label">Password</label>
                <div class="form-text m-b-md position-relative">
                <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : ' ' ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password">
                <i class="far fa-eye" id="regiPassword" style="cursor: pointer; position: absolute; top: 40%; right: 3%"></i>
                </div>

                <?php if(isset($_SESSION['password_error'])) : ?>
                <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <?= $_SESSION['password_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    </div>
                    <?php endif; unset($_SESSION['password_error']) ?>

                <div id="emailHelp" class="form-text m-b-md">Password must be minimum 8 characters length*</div>

                <div class="form-text m-b-md position-relative">
                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?= (isset($_SESSION['con_password_error'])) ? 'is-invalid' : ' ' ?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="con_password">
                
                <i class="far fa-eye" id="regiPassword" style="cursor: pointer; position: absolute; top: 62%; right: 3%"></i>
                </div>

                
                <?php if(isset($_SESSION['con_password_error'])) : ?>
                <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <?= $_SESSION['con_password_error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    </div>
                    <?php endif; unset($_SESSION['con_password_error']) ?>

            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Register</a>
            </div>
            <div class="divider"></div>   
        </form>         
        </div>
    </div>
    
            <script>
                const regiPassword = document.querySelector('#regiPassword');
                const password = document.querySelector('#id_password');

                regiPassword.addEventListener('click', function (e) {
                    
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    this.classList.toggle('fa-eye-slash');
                });
            </script>


    <!-- Javascripts -->
    <script src="./assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="./assets/plugins/pace/pace.min.js"></script>
    <script src="./assets/js/main.min.js"></script>
    <script src="./assets/js/custom.js"></script>
</body>
</html>