<?php
require_once "models/cart.php";

class CartController {
    
        
    public function addToCart(){

        if(isset($_GET["product"])){

            $client = $_SESSION["client"];
            $product = $_GET["product"];
            $number = $_GET["number"];

            $cart = new Cart($client, $product, $number);

            $cart->saveToCart();
            // echo $product;




        } else {
            header('Location: index.php');
        }
        
    }

    public function getCart(){
        $client = $_SESSION["client"];
        $cart = new Cart($client);
        return $cart->getFullCart();
    }
    
        
    }
?>
