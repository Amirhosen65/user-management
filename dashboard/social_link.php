<?php

include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM social_link";
$social_links = mysqli_query($db_connect,$select_query);

$serial = 1;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Social Link</h1>
        </div>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-4">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Social Links</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Links</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="social_link_add.php" class="btn btn-primary float-end">Add links</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>View Link</h3>
            </div>

            <?php if(isset($_SESSION['link_success'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-success">Great!</span>
                        <span class="alert-text text-success"><?= $_SESSION['link_success'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['link_success']); ?>

            <div class="card-body">


            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 5%">
                    <col style="width: 10%">
                    <col style="width: 17%">
                    <col style="width: 50%">
                    <col style="width: 18%">
                    
                </colgroup>
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($social_links as $social_link) :?>
                    <tr>
                        <td scope="row"><?= $serial++ ?></td>
                        <td><i class="<?= $social_link['icon'] ?>"></i></td>
                        <td><?= $social_link['social_name'] ?></td>
                        <td><?= $social_link['link'] ?></td>
                        <td>
                            <a href="social_link_edit.php?edit_id=<?= $social_link['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="social_link_post.php?delete_id=<?= $social_link['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>

        <
    </div>
</div>


<?php

include('./extends/footer.php');

?>
