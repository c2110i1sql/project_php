<?php 
session_start();
include 'connect.php';

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : 'add'; // add, delete, update, clear
$quantity = !empty($_GET['quantity']) ? $_GET['quantity'] : 1; // add, delete, update, clear
$quantity = $quantity > 0 ? ceil($quantity) : 1;

$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if ($action == 'add') {
    if (isset($carts[$id])) {
        $carts[$id]['quantity'] += $quantity;
    } else {
        $sql = "SELECT * FROM product WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) == 1) {
            $pro = mysqli_fetch_assoc($query);
    
            $cart_item = [
                'id' => $pro['id'],
                'name' => $pro['name'],
                'image' => $pro['image'],
                'price' => setPrice($pro['price'], $pro['sale']),
                'quantity' => $quantity
            ];

            $carts[$id] = $cart_item;  
        }
    }

    $_SESSION['cart'] = $carts;
}


if ($action == 'delete') {
    if (isset($carts[$id])) {
        unset($_SESSION['cart'][$id]);
    }
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