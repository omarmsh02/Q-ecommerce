<?php

require_once 'models/PublicModels/Cart.php';
require_once 'models/PublicModels/Order_Item.php';
require_once 'models/AdminModels/Order.php';
require_once 'controllers/Controller.php';
class CartController extends Controller {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    
    

}


    public function index()
    {   
        
    
        
        $user_id = $_SESSION['userId'];
    
        
        $cart = $this->model('cart');
        $cartItems = $cart->getCartItems($user_id);
    
        
        $this->render('public.cart.cart', [
            'pageTitle' => 'All cartItems',
            'cartItems' => $cartItems
        ]);
    }
    

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cart_id'], $_POST['quantity'])) {
            $cart_id = $_POST['cart_id'];
            $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT) ?? 1;
    
            if ($quantity > 0) {  
                $this->cartModel->updateQuantity($cart_id, $quantity);
            }
    
            header("Location: /cart");
            exit; 
        }
    }
    
    
    

public function destroy($id)
{
    $cart = $this->model('cart');

    if ($cart->delete($id)) { 
        $cartItems = $cart->getCartItems($_SESSION['userId']);

        
        $this->render('public.cart.cart', [
            'title' => 'Cart Items',
            'cartItems' => $cartItems
        ]);
    } else {
        echo "Failed to delete item!";
    }
}

public function addToCart(){
    $userId = $_SESSION['userId'];
    $productId = $_POST['product'];
    $cart = $this->model('cart');

    $result = $cart->findRow($userId,$productId);
    if (empty($result)){
        $cart->create([ 
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1,
        ]);
    } else {
        $quantity = $result['quantity'];
        $quantity++;
        $cart->updateCart($userId,$productId,$quantity);
    }

    header("Location: /home");

}
function increase(){
    $userId = $_SESSION['userId'];
    $productId = $_POST['product'];
    $cart = $this->model('cart');
    $quantity = $_POST['quantity-i'];
    $quantity++;
    
    $cart->updateCart($userId,$productId,$quantity);
    header("Location: /cart");
}

function decrease(){
    $userId = $_SESSION['userId'];
    $productId = $_POST['product'];
    $cart = $this->model('cart');
    $quantity = $_POST['quantity-d'];
    $quantity--;
    if ($quantity == 0) {
        $cart->removeFromCart($userId,$productId);
    } else {
        $cart->updateCart($userId,$productId,$quantity);
    }
    
    header("Location: /cart");
}

function checkout(){
    $cart = $this->model('cart');
    $order = $this->model('order');
    $order_item = $this->model('order_item');

    $userId = $_SESSION['userId'];
    $total = $_POST['total'];
    $order->create(
        ['user_id'=>$userId,'total'=>$total]
    );
    $result = $order->getlastorder();
    $orderId = $result['id'];
    
    $rows = $cart->where('user_id',$userId);//error here error done now create a function to store array in order_items
    foreach($rows as $row){
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $order_item->create(
            [
                'order_id'=>$orderId,
                'product_id'=>$product_id,
                'quantity'=>$quantity
                
            ]
            );
    }


        $cart->clearCart($userId);

        header("Location: /cart");
}

}


?>