<?php

include('./extends/header.php');
include('./icons.php');

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Service</h3>
            </div>

            <?php if(isset($_SESSION['service_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['service_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['service_error']); ?>

            <div class="card-body">
            <form class="row g-3" action="service_post.php" method="POST">
                <div class="col-md-12">
                    <label class="form-label">Service Tittle</label>
                    <input type="text" class="form-control" name="service_title" placeholder="Enter Service Tittle">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="service_description" id="" cols="30" rows="5" placeholder="Enter Description"></textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Icon</label>

                    <input type="text" class="form-control" name="icon" id="showThat" placeholder="Choose Icon From Below">
                        <div class="card">
                            <div class="card-body" style="overflow-x: scroll; height:350px;">
                                <?php foreach($icons as $icon) :?>

                                    <span class="fa-2x ms-2 me-2"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>

                                    <?php endforeach; ?>
                            </div>
                        </div>
                </div>
                
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="service_add_btn">Add Service</button>
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


