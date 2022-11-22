<?php 

class Cart
{
    public $items=[]; // lưu các sản phẩm trong giỏ hàng
    public $totalPrice; // lưu tổng tiền
    public $totalQuantity; // lưu tổng số lượng

    public function __construct(){
        $this->items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function add($pro, $quantity = 1){
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $cart_item = [
                'id' => $pro['id'],
                'name' => $pro['name'],
                'image' => $pro['image'],
                'price' => setPrice($pro['price'], $pro['sale']),
                'quantity' => $quantity
            ];
            $this->items[$id] = $cart_item;  
        }
    
        $_SESSION['cart'] = $this->items;
    }

    public function update($id, $quantity = 1){
        // cập nhật số lượng cho sản phẩm theo id
    }

    public function remove($id){
        if (isset($this->items[$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    public function clear(){
        // Xóa sạch sản phẩm khỏi giỏ hàng
    }
    //..... các phương thức bổ trợ khác nếu cần
}
?>
