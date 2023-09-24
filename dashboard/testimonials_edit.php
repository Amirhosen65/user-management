<?php

include('./extends/header.php');
include("../config/db.php");

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM testimonials WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$testimonials = mysqli_fetch_assoc($connect);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonials</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Testimonial</h3>
            </div>

            <?php if(isset($_SESSION['testimonials_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['testimonials_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['testimonials_error']); ?>

            <div class="card-body">
                
            <form class="row g-3" action="testimonials_post.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $testimonials['name'] ?>">
                    <input type="number" hidden name="edit_id" value="<?= $testimonials['id'] ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" value="<?= $testimonials['designation'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Testimonial</label>
                    
                    <textarea class="form-control" name="testimonial" id="" cols="30" rows="10"><?= $testimonials['testimonial'] ?></textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Image</label><br>
                    <img src="../images/testimonial_images/<?= $testimonials['image'] ?>" alt="" style="hieght: 300px; width: 300px;">
                    <input type="file" class="form-control mt-4" name="image">
                </div>

               
                
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="testis_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




<?php

include('./extends/footer.php');


?>
