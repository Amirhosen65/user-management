<?php

include('./extends/header.php');

?>





<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skills</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Skill</h3>
            </div>

            <?php if(isset($_SESSION['skill_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['skill_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['skill_error']); ?>

            <div class="card-body">
                <form class="row g-3" action="skill_post.php" method="POST">
                    <div class="col-md-12">
                        <label class="form-label">Skill Tittle</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Skill Title">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Year</label>
                        <input type="number" class="form-control" name="year" placeholder="Enter year">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Skill Percentage (1-100%)</label>
                        <input type="number" class="form-control" name="percentage" placeholder="Enter percentage">
                    </div>
                    
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary" name="skill_add_btn">Add Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

include('./extends/footer.php');

?>


