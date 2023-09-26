<?php

include('./extends/header.php');
include('./social_icon.php');
include('../config/db.php');

$id = $_GET['edit_id'];
$select_query = "SELECT * FROM social_link WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$social_links = mysqli_fetch_assoc($connect);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Social Link</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Social Link</h3>
            </div>

            <?php if(isset($_SESSION['link_error'])) : ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">close</i></div>
                    <div class="alert-content">
                        <span class="alert-title text-danger">Failed!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['link_error'] ?></span>
                    </div>
                </div>
                <?php endif; unset($_SESSION['link_error']); ?>

            <div class="card-body">
            <form class="row g-3" action="social_link_post.php" method="POST">
                <div class="col-md-12">
                    <label class="form-label">Social Media Name</label>
                    <input type="text" class="form-control" name="social_name" value="<?= $social_links['social_name'] ?>">
                    <input type="number" name="link_id" value="<?= $social_links['id'] ?>" hidden>

                </div>

                <div class="col-md-12">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" name="link" id="" value="<?= $social_links['link'] ?>">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Icon</label>

                    <input type="text" class="form-control" name="icon" id="showThat" value="<?= $social_links['icon'] ?>">
                        <div class="card">
                            <div class="card-body" style="overflow-x: scroll; height:250px;">
                                <?php foreach($social_icons as $icon) :?>

                                    <span class="fa-2x ms-2 me-2"><i onclick="myFun(event)" class="<?= $icon ?>"></i></span>

                                    <?php endforeach; ?>
                            </div>
                        </div>
                </div>
                
                <div class="col-8">
                    <button type="submit" class="btn btn-primary" name="update_btn">Update</button>
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


