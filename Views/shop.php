<?php
session_start();
require_once root."/DB/db.php";
$db = db::get();

if(isset($_POST["addToCartButton"]))
{
    echo "asdfasdf";
    $id = $_GET["id"];
    if(isset($_SESSION["cart"]))
    {
        $item_array_id= array_column($_SESSION["cart"], "product_id");
        if(!in_array($_GET["id"],$item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $id,
                'name' => $_POST["pName"],
                'price' => $_POST["price"],
                'quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array; //[$count]
            header("location: /view?product_id=$id");
        }
        else
        {
            foreach($_SESSION["cart"] as $keys => $values)
            {
                if($values["product_id"]== $_GET["id"])
                {
                    $_SESSION["cart"][$keys]["quantity"] = $values["quantity"] + $_POST["quantity"];
                    header("location: /view?product_id=$id");
                }
            }

            header("location: /view?product_id=$id");
        }
    }
    else
    {
        $item_array =array(
            'product_id' => $_GET["id"],
            'name' => $_POST["hidden_name"],
            'price' => $_POST["hidden_price"],
            'quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
        header("location: /view?product_id=$id");
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["cart"] as $keys => $values)
        {
            if($values["product_id"]== $_GET["id"])
            {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Products already added to cart")</script>';
                header("location: /view?product_id=$id");
            }
        }
    }
}

if (isset($_POST["gomb"])){
    unset($_SESSION["cart"]);
    header("location: /view?product_id=$id");
}
?>

