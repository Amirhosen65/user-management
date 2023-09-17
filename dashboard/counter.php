<?php

include('./extends/header.php');
include('../config/db.php');

$counter_select = "SELECT * FROM portfolio_count";
$counters = mysqli_query($db_connect,$counter_select);
$serial = 1;

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Protfolio Counter</h1>
        </div>
    </div>
</div>



<div class="row justify-content-between">
    <div class="col-4">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Counter</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Counter</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="counter_add.php" class="btn btn-primary float-end">Add Counter</a>
    </div>
</div>

<?php if(isset($_SESSION['counter_insert'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['counter_insert'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['counter_insert']); ?>


<?php if(isset($_SESSION['counter_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['counter_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['counter_delete']); ?>

<?php if(isset($_SESSION['counter_update'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['counter_update'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['counter_update']); ?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Title</th>
                        <th scope="col">Counter</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($counters)) : ?>
                        <tr>
                            <td colspan="5">
                                <h3>Data Not Found</h3>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($counters as $counter) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td>
                                    <?php if ($counter['icon']) : ?>
                                        <i class="<?= $counter['icon'] ?>"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?= $counter['title'] ?></td>
                                <td><?= $counter['counter'] ?></td>

                                <td>
                                    <a href="counter_edit.php?edit_id=<?= $counter['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="counter_post.php?delete_id=<?= $counter['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
