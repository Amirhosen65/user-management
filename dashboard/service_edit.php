<?php

include('./extends/header.php');
include('../config/db.php');

$id = $_GET['edit_id'];

$select_query = "SELECT * FROM services WHERE id='$id'";
$connect = mysqli_query($db_connect,$select_query);
$service = mysqli_fetch_assoc($connect);

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.6.0/flatly/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="./icon_picker/fontawesome-browser.css" />
</head>

<body>


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

                <div class="col-md-6 my-3">
                    <label class="form-label">Icon</label>
                    <input type="text" class="form-control" data-fa-browser name="icon" value="<?= $service['icon'] ?>"/>
                </div>
                


                <div class="col-8">
                    <button type="submit" class="btn btn-success" name="service_edit_btn">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




  <div class="my-5">
    
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="./icon_picker/fontawesome-browser.js"></script>
<script>
  $(function($) {
    $.fabrowser();
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
</body>
</html>




<?php

include('./extends/footer.php');

?>


