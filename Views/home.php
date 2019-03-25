<div class="container">
    <?php if (isset($_SESSION["id"])) {?>
        <button class="btn btn-success" style="height:90wh; width:3wv;"></button>
        <div class="card">
        <img src="<?php echo get["cancer"]; ?>" class="card-img-top" alt="leszarom">
            <div class="card-body">
                <h5 class="card-title">lánynéz</h5>
                <p class="card-text">pornótext.</p>
            </div>
        </div>
        <button class="btn btn-success" style="height:90wh; width:3wv;"></button>
    <?php } ?>
    <br>
    <div class="container">
        <div class="jumbotron bounceIn">
            <h4 class="text-center">At the moment your are not logged in! <br> Please login to view the page content!</h4>
            <br>
            <a type="button" id="login" name="login" href="#" onclick="render('regilogin.php')" class="btn btn-primary btn-lg btn-block">Login!</a>
        </div>
        </div>
</div>