<?php require_once root . "/Views/header.php"; ?>
<?php
if (isset($_GET['product_id'])):

    require_once root . "/Models/product.php";
    $allProduct = product::viewProduct();

    if (isset($_POST["addToCartButton"])){
        echo "xxxxxxxx";
        product::addToCart();
    }


    ?>
    <div class="container">
        <?php

        ?>
        <?php if (count($allProduct) > 0): ?>
            <div class="col-12 mt-5">
                <h3><?php ?>Termék jellemzői:</h3>
            </div>
            <div class="row mt-5">
                <?php foreach ($allProduct as $item): ?>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <img src="<?php echo $item->picture; ?>" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <form method="post" action="">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item->pName; ?></h5>
                                    <p class="card-text"><?php echo $item->cName; ?></p>
                                </div>
                                <input type="hidden" name="pName" class="form-control" value="<?php echo $item->pName; ?>">
                                <input type="hidden" name="price" class="form-control" value="<?php echo $item->price; ?>">
                                <input type="hidden" name="quantity" class="form-control" value="1">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <?php if (isset($item->rating_id)): ?>
                                            Értékelések: <?php echo str_repeat('<span class="rating">&#9734;</span>', $item->rating_id); ?>
                                        <?php endif; ?>
                                    </li>
                                    <li class="list-group-item <?php if ($item->quantity > 1): echo "green"; elseif ($item->quantity == 1): echo "yellow"; else: echo "red"; endif; ?>"><?php if ($item->quantity > 1): ?>
                                            Raktáron (Elérhető: <?php echo $item->quantity; ?>db)
                                        <?php elseif ($item->quantity == 1): ?>
                                            Utolsó darab
                                        <?php elseif ($item->quantity == 0): ?>
                                            Nincs raktáron
                                        <?php endif; ?></li>
                                    <li class="list-group-item"><?php echo $item->description; ?></li>
                                    <li class="list-group-item">Ár: <?php echo $item->price; ?>.-Ft</li>
                                </ul>
                                <div class="card-body">
                                    <button type="submit" name="addToCartButton" class="btn btn-info"><i class="fa fa-cart-plus"></i> Kosárba
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                <?php endforeach; ?>


            </div>
        <?php endif; ?>
    </div>

<?php endif; ?>
<?php require_once root . "/Views/footer.php"; ?>
