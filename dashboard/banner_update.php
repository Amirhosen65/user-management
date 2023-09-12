<?php

include('./extends/header.php');

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Banner image Update</h1>
        </div>
    </div>
</div>

<div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Banner Imgae 1st</h2>
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

                <img src="../frontend_assets/img/banners/<?=$_SESSION['image_1']?>" alt="" style="height: 200px;">
                <form action="banner_update.php" method="POST" enctype="multipart/form-data">

                    
                    <input type="file" class="form-control <?= (isset($_SESSION['profile_img_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="profile_img">
                    <div id="emailHelp" class="form-text m-b-md">Recommended image size 600x850</div>

                    <?php if(isset($_SESSION['profile_img_error'])) : ?>
                        <div id="emailHelp" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <?= $_SESSION['profile_img_error'] ?>
                        <button type="button btn-md" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; unset($_SESSION['profile_img_error']); ?>


                    <button type="submit" class="btn btn-success mt-3" name="banner1_img_update">Update</button>

                </form>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Banner Imgae 2nd</h2>
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
                <form action="banner_update.php" method="POST" enctype="multipart/form-data">

                
                    
                    <input type="file" class="form-control <?= (isset($_SESSION['profile_img_error'])) ? 'is-invalid' : ' ' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="profile_img">
                    <div id="emailHelp" class="form-text m-b-md">Recommended image size 435x635</div>

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


<?php

include('./extends/footer.php');

?>