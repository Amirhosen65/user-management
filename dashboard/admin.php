<?php

include('./extends/header.php');
include('../config/db.php');

$select_query = "SELECT * FROM personal_info";
$connect = mysqli_query($db_connect,$select_query);
$personal_info = mysqli_fetch_assoc($connect);

$select_admin = "SELECT * FROM personal_info";
$connect_admin = mysqli_query($db_connect,$select_admin);
$admin_info = mysqli_fetch_assoc($connect_admin);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <?php if(isset($_SESSION['login_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Hello, <?= $_SESSION['admin_name'] ?></span>
                    <span class="alert-text">Welcome to Dashboard!</span>
                </div>
            </div>
        <?php endif; unset($_SESSION['login_success']); ?>
    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                    <h2>Personal Information</h2>
                </div>
            <div class="card-body">
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 18%">
                    <col style="width: 82%">
                </colgroup>
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?= $personal_info['name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Intro</th>
                        <td><?= $personal_info['intro'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Details About</th>
                        <td><?= $personal_info['details_about'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
                <a href="personal_info_edit.php?edit_id=<?= $personal_info['id'] ?>" class="btn btn-primary">Edit Info</a>
            </div>
        </div>
    </div>
    <!-- <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h2>Admin Information</h2>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div> -->
</div>


<?php

include('./extends/footer.php');


?>