<?php

include('./extends/header.php');
include('../config/db.php');
include('./icons.php');

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM services WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$service = mysqli_fetch_assoc($connect);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Edit</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">

            <?php if(isset($_SESSION['service_update_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['service_update_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['service_update_error']); ?>

            <div class="card-body">
            <form class="row g-3" action="service_post.php" method="POST">
                <div class="col-md-12">
                    <label class="form-label">Service Tittle</label>
                    <input type="text" class="form-control" name="service_title" value="<?= $service['title'] ?>">
                    <input type="text" value="<?= $service['id'] ?>" name="service_id" hidden>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="service_description" id="" cols="30" rows="5"><?= $service['description'] ?></textarea>
                </div>

                <input type="text" class="form-control" name="icon" id="showThat" value="<?= $service['icon'] ?>">
                        <div class="card">
                            <div class="card-body" style="overflow-x: scroll; height:350px;">
                                <?php foreach($icons as $icon) :?>

                                    <span class="fa-2x ms-2 me-2"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>

                                    <?php endforeach; ?>
                            </div>
                        </div>
                


                <div class="col-8">
                    <button type="submit" class="btn btn-success" name="service_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<script>
    let input = document.getElementById('showThat');

    function myFun(){
        input.value = event.target.getAttribute('class');
    }


</script>



<?php

include('./extends/footer.php');

?>


