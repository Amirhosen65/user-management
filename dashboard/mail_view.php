<?php

require('./extends/header.php');
include('../config/db.php');

$id = $_GET['view_id'];
$message_select = "SELECT * FROM messages WHERE id='$id'";
$messages = mysqli_query($db_connect,$message_select);
$message = mysqli_fetch_assoc($messages);



?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Messages</h1>
        </div>
    </div>
</div>


<div class="row justify-content-between">
    <div class="col-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="mailbox.php">Messages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Messages View</li>
    </ol>
    </nav>
    </div>
    
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="mailbox-open-content col-xl-12">
                <span class="mailbox-open-date"><?= $message['created_at'] ?></span>
                <h5 class="mailbox-open-title">
                    <?= $message['subject'] ?>
                </h5>
                <div class="mailbox-open-author">
                    <img src="../images/profile_images/default.jpg" alt="">
                    <div class="mailbox-open-author-info">
                        <span class="mailbox-open-author-info-email d-block"><?= $message['name'] ?></span>
                        <span class="mailbox-open-author-info-to">From: <?= $message['email'] ?></span>
                    </div>
                    <div class="mailbox-open-actions">
                        
                        <a href="../mail_post.php?delete_id=<?= $message['id'] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <div class="mailbox-open-content-email">
                    <p><?= $message['message'] ?></p>
                    
                </div>
                
            </div>
            </div>
        </div>
    </div>
</div>

<?php

include('./extends/footer.php');
?>