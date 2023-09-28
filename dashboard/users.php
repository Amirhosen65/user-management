<?php

include('./extends/header.php');

include('../config/db.php');

$user_select = "SELECT * FROM users";
$users = mysqli_query($db_connect,$user_select);
$serial = 1;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Users</h1>
        </div>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Users</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="user_add.php" class="btn btn-primary float-end">Add Users</a>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php if(isset($_SESSION['user_delete'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Great!</span>
                    <span class="alert-text"><?= $_SESSION['user_delete'] ?></span>
                </div>
            </div>
            <?php endif; unset($_SESSION['user_delete']); ?>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td>
                                    <img src="../images/profile_images/<?= $user['profile_image'] ?>" alt="" style="width: auto; height: 80px; border-radius: 50%">
                                </td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                        
                                <td>
                                    <a href="user_add_process.php?delete_id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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