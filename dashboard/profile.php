<?php

include('./extends/header.php');



?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Admin Profile</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Name Update</h2>
            </div>
            <div class="card-body">
                <form action="profile_update.php" method="POST">

                <?php if(isset($_SESSION['name_update_success'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Success!</span>
                        <span class="alert-text"><?= $_SESSION['name_update_success'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['name_update_success']); ?>
                    
                    <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $_SESSION['admin_name'] ?>">

                    <?php if(isset($_SESSION['name_error'])) : ?>

                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_error'] ?></div>

                    <?php endif; unset($_SESSION['name_error']); ?>

                    <button type="submit" class="btn btn-success mt-3" name="name_update">Update</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Email Update</h2>
            </div>
            <div class="card-body">
                <form action="profile_update.php" method="POST">

                <?php if(isset($_SESSION['email_update_success'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Success!</span>
                        <span class="alert-text"><?= $_SESSION['email_update_success'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['email_update_success']); ?>
                    
                    <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $_SESSION['admin_email'] ?>">

                    <?php if(isset($_SESSION['email_error'])) : ?>

                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['email_error'] ?></div>

                    <?php endif; unset($_SESSION['email_error']); ?>

                    <button type="submit" class="btn btn-success mt-3" name="email_update">Update</button>

                </form>
            </div>
        </div>
    </div>

</div>



<div class="row">
<div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form action="profile_update.php" method="POST">

                <?php if(isset($_SESSION['password_update_success'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Success!</span>
                        <span class="alert-text"><?= $_SESSION['password_update_success'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['password_update_success']); ?>
                    
                <label for="" class="form-label">Old Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="old_password">

                    <label for="" class="form-label">New Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password">

                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="confirm_password">

                    <?php if(isset($_SESSION['password_error'])) : ?>

                        <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <?= $_SESSION['password_error'] ?>
                        <button type="button btn-md" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <?php endif; unset($_SESSION['password_error']); ?>


                    <button type="submit" class="btn btn-success mt-3" name="password_update">Update</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Profile Picture Update</h2>
            </div>
            <div class="card-body">

                <?php if(isset($_SESSION['profile_img_update_success'])) : ?>
                    <div class="alert alert-custom" role="alert">
                        <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                        <div class="alert-content">
                            <span class="alert-title">Success!</span>
                            <span class="alert-text"><?= $_SESSION['profile_img_update_success'] ?></span>
                        </div>
                    </div>
                <?php endif; unset($_SESSION['profile_img_update_success']); ?>

                <img src="../images/profile_images/<?=$_SESSION['admin_profile_img']?>" alt="" style="height: 200px;">
                <form action="profile_update.php" method="POST" enctype="multipart/form-data">

                
                    
                    <input type="file" class="form-control <?= (isset($_SESSION['profile_img_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="profile_img">

                    <?php if(isset($_SESSION['profile_img_error'])) : ?>
                        <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <?= $_SESSION['profile_img_error'] ?>
                        <button type="button btn-md" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; unset($_SESSION['profile_img_error']); ?>


                    <button type="submit" class="btn btn-success mt-3" name="profile_img_update">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>


<?php

include('./extends/footer.php');

?>