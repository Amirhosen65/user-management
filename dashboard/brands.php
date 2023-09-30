<?php

include('./extends/header.php');

include('../config/db.php');

$brand_select = "SELECT * FROM brands";
$brands = mysqli_query($db_connect,$brand_select);
$serial = 1;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brands</h1>
        </div>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col-5">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-container">
        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Brands</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Brands</li>
    </ol>
    </nav>
    </div>
    <div class="col-4 text-right">
    <a href="brand_add.php" class="btn btn-primary float-end">Add Brands</a>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body bg-secondary">

            <?php if(isset($_SESSION['brand_success'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Great!</span>
                    <span class="alert-text">Brand added susccessfull!</span>
                </div>
            </div>
            <?php endif; unset($_SESSION['brand_success']); ?>
            
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php foreach ($brands as $brand) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $brand['brand_name'] ?></td>
                                <td>
                                    <img src="../images/brands_images/<?= $brand['image'] ?>" alt="" style="width: auto; height: 70px;">
                                </td>
                                
                        
                                <td>
                                    <a href="brand_post.php?delete_id=<?= $brand['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
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