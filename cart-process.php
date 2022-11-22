<?php 
session_start();
include 'connect.php';
include 'SCart.php';
$cart = new Cart;
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : 'add'; // add, delete, update, clear
$quantity = !empty($_GET['quantity']) ? $_GET['quantity'] : 1; // add, delete, update, clear
$quantity = $quantity > 0 ? ceil($quantity) : 1;

$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if ($action == 'add') {
    $sql = "SELECT * FROM product WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        $pro = mysqli_fetch_assoc($query);
        $cart->add($pro);
       
    }
}


if ($action == 'delete') {
    $cart->remove($id);
}

if ($action == 'update') {
    if (isset($carts[$id])) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    }
 }

 if ($action == 'clear') {
    unset($_SESSION['cart']);
 }

 function setPrice($price, $sale)
 {
    $newPrice = $price;
    if ($sale > 0) {
        $newPrice = round($price - ($price * $sale/100), 2);
    }

    return $newPrice;
 }

 header('location: cart.php');
 echo '<pre>';
 print_r($carts);