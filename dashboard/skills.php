<?php

include('./extends/header.php');
include('../config/db.php');

$select_skill = "SELECT * FROM skills";
$skills = mysqli_query($db_connect,$select_skill);

$serial = 1;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services</h1>
        </div>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-4">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Skills</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Skills</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="skills_add.php" class="btn btn-primary float-end">Add Skills</a>
    </div>
</div>

<?php if(isset($_SESSION['skill_insert'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['skill_insert'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['skill_insert']); ?>


<?php if(isset($_SESSION['skill_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['skill_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['skill_delete']); ?>

<?php if(isset($_SESSION['skill_update'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['skill_update'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['skill_update']); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Year</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($skills as $skill) :?>
                    <tr>
                        <th scope="row"><?= $serial++ ?></th>
                        <td><?= $skill['title'] ?></td>
                        <td><?= $skill['year'] ?></td>
                        <td><?= $skill['percentage'] ?>%</td>
                        <td>
                            <?php if($skill['status'] == 'active') :?>
                                <label class="switch">
                                    <a href="skill_post.php?status_id=<?= $skill['id'] ?>"><input type="checkbox" checked>
                                    <span class="slider"></span></a>
                                    <?php else : ?>
                                    <label class="switch">
                                    <a href="skill_post.php?status_id=<?= $skill['id'] ?>"><input type="checkbox">
                                    <span class="slider"></span></a>
                                </label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="skill_edit.php?edit_id=<?= $skill['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="skill_post.php?delete_id=<?= $skill['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<?php

include('./extends/footer.php');

?>