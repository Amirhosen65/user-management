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
            <h1>Protfolios</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Protfolio</h3>
            </div>

            <?php if(isset($_SESSION['protfolio_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['protfolio_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['protfolio_error']); ?>

            <div class="card-body">
                
            <form class="row g-3" action="protfolio_post.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $personal_info['name'] ?>">
                    <input type="text" value="<?= $personal_info['id'] ?>" name="protfolio_id" hidden>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Intro</label>
                    <input type="text" class="form-control" name="intro" value="<?= $personal_info['intro'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Details About</label>
                    <textarea class="form-control" name="details_about" id="" cols="30" rows="10"><?= $personal_info['details_about'] ?></textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Facebook Link</label>
                    <input type="text" class="form-control" name="facebook" value="<?= $personal_info['facebook'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Intro</label>
                    <input type="text" class="form-control" name="intro" value="<?= $personal_info['intro'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Intro</label>
                    <input type="text" class="form-control" name="intro" value="<?= $personal_info['intro'] ?>">
                </div>

                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="protfolio_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



<?php

include('./extends/footer.php');

?>
