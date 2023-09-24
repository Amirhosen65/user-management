<?php

include('./extends/header.php');
include('../config/db.php');

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM contact_info WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$contact_info = mysqli_fetch_assoc($connect);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Contact Information</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Contact Update</h2>
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
                
            <form class="row g-3" action="contact_info_post.php" method="POST">

                <div class="col-md-12">
                    <label class="form-label">Contact Intro</label>
                    <input type="text" class="form-control" name="contact_intro" value="<?= $contact_info['contact_intro'] ?>">
                    <input type="text" value="<?= $contact_info['id'] ?>" name="contact_id" hidden>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $contact_info['address'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= $contact_info['phone'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $contact_info['email'] ?>">
                </div>
                
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="contact_edit_btn">Update</button>
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