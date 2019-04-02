<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Emag</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/Assets/Css/bootstrap.min.css">
    <link rel="stylesheet" href="/Assets/Css/style.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/index">Emag</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!--  <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>-->
          </ul>
        <ul class="navbar-nav">
            <li class="nav-item my-2 my-lg-0 dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Saját fiók
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>

            </li>
            <li class="nav-item my-2 my-lg-0">
                <button type="button" class="btn btn-info" data-toggle="popover" data-placement="top" data-html="true"
                        data-content="<?php
                        foreach ($_SESSION["cart"] as $keys => $values) :
                            ?>
                            <?php echo $values["name"]; ?>
                <br>
                <?php
                        endforeach;
                        ?>
                        <button class='btn btn-success'>Véglegesítés</button><br><button class='btn btn-danger'>Kosár ürítése</button>"><i class="fa fa-shopping-cart"></i> Kosár (<?php echo count($_SESSION["cart"]); ?>)</button>
            </li>
        </ul>
    </div>
</nav>
