<?php

require('./extends/header.php');
include('../config/db.php');

$protfolio_select = "SELECT * FROM protfolio";
$protfolios = mysqli_query($db_connect,$protfolio_select);

$single_data = mysqli_fetch_assoc($protfolios);

$serial = 1;


?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Protfolios</h1>
        </div>
    </div>
</div>


<div class="row justify-content-between">
    <div class="col-4">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Protfolio</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Protfolio</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="protfolio_add.php" class="btn btn-primary float-end">Add Protfolio</a>
    </div>
</div>

<?php if(isset($_SESSION['protfolio_insert'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['protfolio_insert'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['protfolio_insert']); ?>


<?php if(isset($_SESSION['protfolio_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['protfolio_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['protfolio_delete']); ?>

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
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($single_data): ?>
                        <?php foreach ($protfolios as $protfolio) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td>
                                    <img src="../images/protfolio_images/<?= $protfolio['image'] ?>" alt="" style="width: 110px; height: 70px;">
                                </td>
                                <td><?= $protfolio['title'] ?></td>
                                <td><?= implode(' ', array_slice(str_word_count($protfolio['description'], 1), 0, 15)); ?> ...</td>

                                <td>
                                    <?php if($protfolio['status'] == 'active') :?>
                                        <label class="switch">
                                            <a href="protfolio_post.php?status_id=<?= $protfolio['id'] ?>"><input type="checkbox" checked>
                                            <span class="slider"></span></a>
                                        <?php else : ?>
                                            <label class="switch">
                                            <a href="protfolio_post.php?status_id=<?= $protfolio['id'] ?>"><input type="checkbox">
                                            <span class="slider"></span></a>
                                            </label>
                                            <?php endif; ?>
                                </td>

                                <td>
                                    <a href="protfolio_edit.php?edit_id=<?= $protfolio['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="protfolio_post.php?delete_id=<?= $protfolio['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-danger">
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