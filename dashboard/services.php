<?php

include('./extends/header.php');
include('../config/db.php');

$select_service = "SELECT * FROM services";
$services = mysqli_query($db_connect,$select_service);

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
        <li class="breadcrumb-item"><a href="#">Services</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Services</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="services_add.php" class="btn btn-primary float-end">Add Service</a>
    </div>
</div>

<?php if(isset($_SESSION['service_insert'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['service_insert'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['service_insert']); ?>


<?php if(isset($_SESSION['service_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['service_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['service_delete']); ?>

<?php if(isset($_SESSION['service_update'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['service_update'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['service_update']); ?>


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
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($services as $service) :?>
                    <tr>
                        <th scope="row"><?= $serial++ ?></th>
                        <td><i class="<?= $service['icon'] ?>"></i></td>
                        <td><?= $service['title'] ?></td>
                        <td><?= $service['description'] ?></td>
                        <td>
                            <?php if($service['status'] == 'active') :?>
                                <label class="switch">
                                    <a href="service_post.php?status_id=<?= $service['id'] ?>"><input type="checkbox" checked>
                                    <span class="slider"></span></a>
                                    <?php else : ?>
                                    <label class="switch">
                                    <a href="service_post.php?status_id=<?= $service['id'] ?>"><input type="checkbox">
                                    <span class="slider"></span></a>
                                </label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="service_edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="service_post.php?delete_id=<?= $service['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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