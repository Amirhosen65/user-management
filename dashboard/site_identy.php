<?php

include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM site_identity";
$connect = mysqli_query($db_connect,$select_query); 
$site_identity = mysqli_fetch_assoc($connect);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Site Identity</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Favicon & Logo</h3>
            </div>

            <?php if(isset($_SESSION['logo_update'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-success">Great!</span>
                        <span class="alert-text text-success"><?= $_SESSION['logo_update'] ?></span>
                    </div>
                </div>
            <?php endif; unset($_SESSION['logo_update']); ?>

            <?php if(isset($_SESSION['update_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['update_error'] ?></span>
                    </div>
                </div>
            <?php endif; unset($_SESSION['update_error']); ?>

            <div class="card-body">
            
            <form action="site_identy_post.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                
                <img src="../frontend_assets/img/<?=$site_identity['favicon']?>" alt="" style="height: 30px; width: auto;">
                <input type="file" class="form-control mt-2" aria-describedby="emailHelp" name="favicon">
                <div id="emailHelp" class="form-text m-b-md">Recommended image size 32x32 px</div>

                <input type="number" hidden value="<?=$site_identity['id']?>" name="logo_id">


                <img src="../frontend_assets/img/logo/<?=$site_identity['logo']?>" alt="" style="height: 40px; width: auto;;">
                <input type="file" class="form-control mt-2"  aria-describedby="emailHelp" name="logo">
                <div id="emailHelp" class="form-text m-b-md">Recommended image size 100x30 px</div>

                <img src="../frontend_assets/img/logo/<?=$site_identity['white_logo']?>" alt="" style="height: 40px; width: auto;" class="bg-dark">
                <input type="file" class="form-control mt-2" aria-describedby="emailHelp" name="white_logo">
                <div id="emailHelp" class="form-text m-b-md">Recommended image size 100x30 px</div>

            </div>
            <button type="submit" class="btn btn-primary " name="logo_update">Update</button>
            </div>
            </form>
        </div>

        
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Footer Update</h2>
            </div>
            <div class="card-body">
                <form action="site_identy_post.php" method="POST">

                <?php if(isset($_SESSION['footer_update_success'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Success!</span>
                        <span class="alert-text"><?= $_SESSION['footer_update_success'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['footer_update_success']); ?>
                <p>© Copyright <?= date("Y");?> <span><?= $site_identity['footer'] ?></span> | All Rights Reserved</p>
                    
                <input type="number" hidden value="<?=$site_identity['id']?>" name="footer_id">
                    
                    <input type="footer" class="form-control <?= (isset($_SESSION['footer_error'])) ? 'is-invalid' : ' ' ?>" name="footer" value="<?= $site_identity['footer'] ?>">

                    <?php if(isset($_SESSION['footer_error'])) : ?>

                    <div class="form-text text-danger"><?= $_SESSION['footer_error'] ?></div>

                    <?php endif; unset($_SESSION['footer_error']); ?>

                    <button type="submit" class="btn btn-success mt-3" name="footer_update">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>





<?php

include('./extends/footer.php');

?>
