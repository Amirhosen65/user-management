<?php

include('./extends/header.php');
include('../config/db.php');
include('./icons.php');

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM skills WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$skills = mysqli_fetch_assoc($connect);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skill Edit</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">

            <?php if(isset($_SESSION['skill_update_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['skill_update_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['skill_update_error']); ?>

            <div class="card-body">
            <form class="row g-3" action="skill_post.php" method="POST">
                
            <div class="col-md-12">
                    <label class="form-label">Skill Tittle</label>
                    <input type="text" class="form-control" name="title" value="<?= $skills['title'] ?>">
                    <input type="number" hidden name="skill_id" value="<?= $skills['id'] ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Year</label>
                    <input type="number" class="form-control" name="year" value="<?= $skills['year'] ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Skill Percentage (1-100%)</label>
                    <input type="number" class="form-control" name="percentage" value="<?= $skills['percentage'] ?>">
                </div>
                


                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="skill_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




<?php

include('./extends/footer.php');

?>


