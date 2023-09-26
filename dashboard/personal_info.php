<?php

include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM personal_info";
$connect = mysqli_query($db_connect,$select_query);
$personal_info = mysqli_fetch_assoc($connect);

$select_img_query = "SELECT * FROM banner_image";
$img_connect = mysqli_query($db_connect,$select_img_query);
$banner_image = mysqli_fetch_assoc($img_connect);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Personal Information</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>View Information</h3>
            </div>

            <?php if(isset($_SESSION['info_update'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-success">Great!</span>
                        <span class="alert-text text-success"><?= $_SESSION['info_update'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['info_update']); ?>

            <div class="card-body">


            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 18%">
                    <col style="width: 82%">
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $personal_info['name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Intro</th>
                        <td><?= $personal_info['intro'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Details About</th>
                        <td><?= $personal_info['details_about'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
                <a href="personal_info_edit.php?edit_id=<?= $personal_info['id'] ?>" class="btn btn-primary">Edit Info</a>
            </div>
        </div>

        <
    </div>
</div>

<div class="row">
    <div class="col-12">
    <div class="card">
            <div class="col">
            <div class="card-header">
                <h3>Banner Image 1st</h3>
            </div>
            <div class="card-body">

            <?php if(isset($_SESSION['banner_update'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-success">Great!</span>
                        <span class="alert-text text-success"><?= $_SESSION['banner_update'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['banner_update']); ?>

                <?php if(isset($_SESSION['banner_update_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Update Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['banner_update_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['banner_update_error']); ?>


            <img src="../frontend_assets/img/banners/<?=$banner_image['image_1']?>" alt="" style="height: 200px;">
            
            <form action="personal_info_post.php" method="POST" enctype="multipart/form-data">
                    
            <input type="file" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="banner_img1">
            <div id="emailHelp" class="form-text m-b-md">Recommended image size 600x850</div>

            <div class="card-header">
                <h3>Banner Image 2nd</h3>
            </div>
            <div class="card-body">
            <img src="../frontend_assets/img/banners/<?=$banner_image['image_2']?>" alt="" style="height: 200px;">
            </div>

            <input type="file" class="form-control mt-2" aria-describedby="emailHelp" name="banner_img2">
            <input type="number" hidden value="<?=$banner_image['id']?>" name="banner_id">
            <div id="emailHelp" class="form-text m-b-md">Recommended image size 435x635</div>

            <button type="submit" class="btn btn-primary mt-3" name="banner_img_update">Update</button>

            </form>
            </div>
            </div>

        </div>
    </div>
</div>



<?php

include('./extends/footer.php');

?>
