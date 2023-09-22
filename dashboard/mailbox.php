<?php

require('./extends/header.php');
include('../config/db.php');

$message_select = "SELECT * FROM messages";
$messages = mysqli_query($db_connect,$message_select);

$single_data = mysqli_fetch_assoc($messages);

$serial = 1;


?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Messages</h1>
        </div>
    </div>
</div>


<div class="row justify-content-between">
    <div class="col-4">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Messages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Messages List</li>
    </ol>
    </nav>
    </div>
    
</div>

<?php if(isset($_SESSION['message_delete'])) : ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
    <div class="alert-content">
        <span class="alert-title">Great!</span>
        <span class="alert-text"><?= $_SESSION['message_delete'] ?></span>
    </div>
</div>
<?php endif; unset($_SESSION['message_delete']); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($single_data): ?>
                        <?php foreach ($messages as $message) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                
                                <td><?= $message['name'] ?></td>
                                <td><?= $message['email'] ?></td>
                                <td><?= $message['subject'] ?></td>

                                <td>
                                    <a href="mail_view.php?view_id=<?= $message['id'] ?>" class="btn btn-sm btn-primary">View</a>
                                    <a href="../mail_post.php?delete_id=<?= $message['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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