<?php
require_once root . "/DB/db.php";
$db = db::get();

require_once root . "/Models/product.php";
$allProduct = product::allProduct();

require_once root . "/Views/header.php"; ?>

    <div class="container">

        <div class="row mt-5">
            <?php foreach ($allProduct as $item): ?>
                <a href="/view?product_id=<?php echo $item->product_id; ?>" class="card-link">
                    <div class="col-lg-3 col-md-4 col-6  mb-2">
                        <div class="card">
                            <img src="<?php echo $item->picture; ?>" class="card-img-top" alt="">
                            <div class="card-body  text-center">
                                <p class="card-text">
                                    <?php if (isset($item->rating_id)): ?>
                                        <?php echo str_repeat('<span class="rating">&#9734;</span>', $item->rating_id); ?>
                                    <?php endif; ?>
                                </p>
                                <h5 class="card-title"><?php echo $item->pName; ?></h5>
                                <p class="card-text <?php if ($item->quantity > 1): echo "green"; elseif ($item->quantity == 1): echo "yellow"; else: echo "red"; endif; ?>">
                                    <?php if ($item->quantity > 1): ?>
                                        Raktáron
                                    <?php elseif ($item->quantity == 1): ?>
                                        Utolsó darab
                                    <?php elseif ($item->quantity == 0): ?>
                                        Nincs raktáron
                                    <?php endif; ?>
                                </p>
                                <p class="card-text">Ár: <?php echo $item->price; ?>.-Ft</p>
                                <a href="#" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Kosárba</a>
                            </div>
                        </div>

                    </div>
                </a>

            <?php endforeach; ?>

        </div>

        <div class="col-12">
            <div class="text-center">

                <?php
                //Pagination Numbers
                $db = db::get();
                $per_page = 12;
                $count = $db->numnrows("SELECT * FROM product");
                $pages = ceil($count / $per_page);

                for ($i = 1; $i <= $pages; $i++): ; ?>

                    <a href="/index?load_page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>

            </div>
        </div>
    </div>


<?php require_once root . "/Views/footer.php"; ?>