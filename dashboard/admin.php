<?php

include('./extends/header.php');


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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                    <h2>Per</h2>
                </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>


<?php

include('./extends/footer.php');


?>