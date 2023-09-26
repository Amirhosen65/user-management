<?php

include('./extends/header.php');
include('../config/db.php');

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM personal_info WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$personal_info = mysqli_fetch_assoc($connect);

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
                <h2>Information Update</h2>
            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['info_update_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['info_update_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['info_update_error']); ?>

            <div class="card-body">
                
            <form class="row g-3" action="personal_info_post.php" method="POST">

                <div class="col-md-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $personal_info['name'] ?>">
                    <input type="text" value="<?= $personal_info['id'] ?>" name="info_id" hidden>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Intro</label>
                    <input type="text" class="form-control" name="intro" value="<?= $personal_info['intro'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Details About</label>
                    <textarea class="form-control" name="details_about" id="" cols="30" rows="10"><?= $personal_info['details_about'] ?></textarea>
                </div>

                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="info_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
    
                    
</div>




<?php

include('./extends/footer.php');

?>