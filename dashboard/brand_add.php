<?php

include('./extends/header.php');

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Brand</h1>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
            <form action="brand_post.php" method="post" enctype="multipart/form-data">

                <?php if(isset($_SESSION['brand_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title">Brand add failed!</span>
                        <span class="alert-text"><?= $_SESSION['brand_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['brand_error']); ?>

                <div class="auth-credentials m-b-xxl">
                    <label for="signUpbrandname" class="form-label">Brand Name</label>
                    <input type="text" class="form-control m-b-md <?= (isset($_SESSION['brand_error'])) ? 'is-invalid' : ' ' ?>" id="signUpbrandname" name="brand_name" aria-describedby="signUpbrandname" placeholder="Enter Brand Name">
                    
                    <label for="signUpbrandname" class="form-label">Brand Image</label>

                    <input type="file" class="form-control" name="image">

                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary" name="add_btn">Add Brand</a>
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