<?php

include('./extends/header.php');

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
            <h1>Services</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Add Services</h2>
            </div>
            <div class="card-body">
            <form class="row g-3">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Service Tittle</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Description</label>
                    <textarea class="form-control" name="service_description" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="col-md-6 my-3">
                    <label for="inputEmail4" class="form-label">Icon</label>
                    <input type="text" class="form-control" placeholder="Select icon" data-fa-browser />
                </div>
                


                <div class="col-8">
                    <button type="submit" class="btn btn-success">Add Service</button>
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


