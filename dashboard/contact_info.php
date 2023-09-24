<?php

include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM contact_info WHERE id='1'";
$connect = mysqli_query($db_connect,$select_query);
$contact_info = mysqli_fetch_assoc($connect);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Contact Information</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>View Contact</h3>
            </div>

            <?php if(isset($_SESSION['info_update'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-success">Great!</span>
                        <span class="alert-text text-success"><?= $_SESSION['info_update'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['info_update']); ?>

            <div class="card-body">


            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 18%">
                    <col style="width: 82%">
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">Contact Intro</th>
                        <td><?= $contact_info['contact_intro'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td><?= $contact_info['address'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td><?= $contact_info['phone'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?= $contact_info['email'] ?></td>
                        </tr>
                    
                </tbody>
            </table>
                <a href="contact_info_edit.php?edit_id=1" class="btn btn-primary">Edit Info</a>
            </div>
        </div>

        
    </div>
</div>




<?php

include('./extends/footer.php');

?>
