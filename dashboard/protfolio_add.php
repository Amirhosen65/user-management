<?php

include('./extends/header.php');


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
                <h3>Add Protfolio</h3>
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
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

               
                
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="protfolio_add_btn">Add Protfolio</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




<?php

include('./extends/footer.php');


?>
