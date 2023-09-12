<?php

include('./extends/header.php');

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add User</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
            <form action="user_add_process.php" method="post">

            <?php if(isset($_SESSION['registraion_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome, <?= $_SESSION['s_user'] ?></span>
                    <span class="alert-text">You can Log in now!</span>
                </div>
            </div>
            <?php endif; unset($_SESSION['registraion_success']); ?>

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
    </div>
</div>



<?php

include('./extends/footer.php');

?>