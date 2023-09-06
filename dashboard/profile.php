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
</div>


<?php

include('./extends/footer.php');

?>