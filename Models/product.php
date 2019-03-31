<?php
require_once root."/DB/db.php";
class product
{
    private static $table = "product";

    public $id;
    public $name;
    public $category;
    public $price;
    public $picture;
    public $quantity;

    public function __construct($id = null, $pName, $category, $price, $picture, $quantity, $cName)
    {
        $this->product_id = $id;
        $this->pName = $pName;
        $this->category_id = $category;
        $this->price = $price;
        $this->picture = $picture;
        $this->quantity = $quantity;
        $this->cName = $cName;

    }

    public static function allProduct()
    {
        $db=db::get();
        $per_page = 12;

        $count = $db->numnrows("SELECT * FROM product");
        $pages = ceil($count/$per_page);

        if(isset($_GET['load_page']))
        {
            $page=$_GET['load_page'];
        } else {
            $page = 1;
        }

        $start = ((int)$page-1)*$per_page;

        $selectString = "SELECT *,category.name AS cName,product.name AS pName FROM " . self::$table ." LEFT JOIN category ON product.category_id = category.category_id ORDER BY product.product_id LIMIT $start,$per_page";
        var_dump($selectString);
        $db = db::get();
        $allElements = $db->getArray($selectString);
        $finalElements = array();
        foreach ($allElements as $element) {
            $finalElements[] = new product(
                $element["product_id"],
                $element["pName"],
                $element["category_id"],
                $element["price"],
                $element["picture"],
                $element["quantity"],
                $element["cName"]
            );
        }
        return $finalElements;
    }

    public static function paginatorPages(){


    }

}