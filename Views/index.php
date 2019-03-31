<?php
require_once root . "/DB/db.php";
$db = db::get();

/*$per_page = 12;
//Calculating no of pages

$count = $db->numnrows("SELECT * FROM product");
$pages = ceil($count/$per_page);*/

require_once root . "/Models/product.php";
$allProduct = product::allProduct();

require_once root . "/Views/header.php"; ?>

    <div class="container">

        <div class="row">
            <?php foreach ($allProduct as $item): ?>
                <div class="col-3 mb-2">

                    <div class="card">
                        <img src="<?php echo $item->picture; ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item->pName; ?></h5>
                            <p class="card-text">Ár: <?php echo $item->price; ?>.-Ft</p>
                            <p class="card-text">Mennyiség: <?php echo $item->quantity; ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
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