<?php

require('./extends/header.php');
include('../config/db.php');

$testimonial_select = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db_connect,$testimonial_select);

$single_data = mysqli_fetch_assoc($testimonials);

$serial = 1;


?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonials</h1>
        </div>
    </div>
</div>


<div class="row justify-content-between">
    <div class="col-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Testimonials</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Testimonials</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="testimonials_add.php" class="btn btn-primary float-end">Add Testimonials</a>
    </div>
</div>

<?php if(isset($_SESSION['testimonials_insert'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['testimonials_insert'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['testimonials_insert']); ?>


<?php if(isset($_SESSION['testimonial_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['testimonial_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['testimonial_delete']); ?>

<?php if(isset($_SESSION['protfolio_update'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['protfolio_update'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['protfolio_update']); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Testimonial</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($single_data): ?>
                        <?php foreach ($testimonials as $testimonial) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td>
                                    <img src="../images/testimonial_images/<?= $testimonial['image'] ?>" alt="" style="width: 80px; height: 80px;">
                                </td>
                                <td><?= $testimonial['name'] ?></td>
                                <td><?= $testimonial['designation'] ?></td>
                                <td><?= $testimonial['testimonial'] ?></td>
                            
                                <td>
                                    <?php if($testimonial['status'] == 'active') :?>
                                        <label class="switch">
                                            <a href="testimonials_post.php?status_id=<?= $testimonial['id'] ?>"><input type="checkbox" checked>
                                            <span class="slider"></span></a>
                                        <?php else : ?>
                                            <label class="switch">
                                            <a href="testimonials_post.php?status_id=<?= $testimonial['id'] ?>"><input type="checkbox">
                                            <span class="slider"></span></a>
                                            </label>
                                            <?php endif; ?>
                                </td>

                                <td>
                                    <a href="testimonials_edit.php?edit_id=<?= $testimonial['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="testimonials_post.php?delete_id=<?= $testimonial['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-danger">
                                    <h2>No Data Found!</h2>
                                </td>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<?php

include('./extends/footer.php');
?>