<?php
require_once root . "/DB/db.php";

class product
{
    private static $table = "product";

    public $id;
    public $name;
    public $category;
    public $price;
    public $picture;
    public $quantity;
    public $rating;
    public $description;

    public function __construct($id = null, $pName, $category, $price, $picture, $quantity, $cName, $rating, $description)
    {
        $this->product_id = $id;
        $this->pName = $pName;
        $this->category_id = $category;
        $this->price = $price;
        $this->picture = $picture;
        $this->quantity = $quantity;
        $this->cName = $cName;
        $this->rating_id = $rating;
        $this->description = $description;

    }

    public static function allProduct()
    {
        $db = db::get();
        $per_page = 12;

        $count = $db->numnrows("SELECT * FROM product");
        $pages = ceil($count / $per_page);

        if (isset($_GET['load_page'])) {
            $page = $_GET['load_page'];
        } else {
            $page = 1;
        }

        $start = ((int)$page - 1) * $per_page;

        $selectString = "SELECT *,category.name AS cName,product.name AS pName FROM " . self::$table . " LEFT JOIN category ON product.category_id = category.category_id ORDER BY product.product_id LIMIT $start,$per_page";
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
                $element["cName"],
                $element["rating_id"],
                $element["description"]
            );
        }
        return $finalElements;
    }

    public static function viewProduct()
    {
        $db = db::get();
        $pId = $_GET["product_id"];
        $selectString = "SELECT *,category.name AS cName,product.name AS pName FROM " . self::$table . " LEFT JOIN category ON product.category_id = category.category_id WHERE product.product_id=$pId";
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
                $element["cName"],
                $element["rating_id"],
                $element["description"]
            );
        }
        return $finalElements;
    }

    public static function addToCart()
    {
        echo "asdfasdf";
            $id = $_GET["product_id"];
            if (isset($_SESSION["cart"])) {
                $item_array_id = array_column($_SESSION["cart"], "product_id");
                if (!in_array($_GET["id"], $item_array_id)) {
                    $count = count($_SESSION["cart"]);
                    $item_array = array(
                        'product_id' => $id,
                        'name' => $_POST["pName"],
                        'price' => $_POST["price"],
                        'quantity' => $_POST["quantity"],
                    );
                    $_SESSION["cart"][$count] = $item_array; //[$count]
                    header("location: /view?product_id=$id");
                } else {
                    foreach ($_SESSION["cart"] as $keys => $values) {
                        if ($values["product_id"] == $_GET["id"]) {
                            $_SESSION["cart"][$keys]["quantity"] = $values["quantity"] + $_POST["quantity"];
                            header("location: /view?product_id=$id");
                        }
                    }

                    header("location: /view?product_id=$id");
                }
            } else {
                $item_array = array(
                    'product_id' => $id,
                    'name' => $_POST["pName"],
                    'price' => $_POST["price"],
                    'quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][0] = $item_array;
                header("location: /view?product_id=$id");
            }

        if (isset($_GET["action"])) {
            if ($_GET["action"] == "delete") {
                foreach ($_SESSION["cart"] as $keys => $values) {
                    if ($values["product_id"] == $_GET["id"]) {
                        unset($_SESSION["cart"][$keys]);
                        echo '<script>alert("Products already added to cart")</script>';
                        header("location: /view?product_id=$id");
                    }
                }
            }
        }

        if (isset($_POST["gomb"])) {
            unset($_SESSION["cart"]);
            header("location: /view?product_id=$id");
        }

    }
}