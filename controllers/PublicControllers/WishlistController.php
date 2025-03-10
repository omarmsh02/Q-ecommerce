<?php
require_once 'models/PublicModels/Wishlist.php';
require_once 'controllers/Controller.php';
class WishlistController extends Controller
{
    
    public function addToWishlist() {
        
        
       
    
        $user_id = '1';
        $product_id = $_POST['product_id'] ?? null;
    
        if (!$product_id) {
            die('Invalid request');
        }
    
        // Check if the product is already in the wishlist
        $wishlistModel = $this->model('wishlist');
       
            // Add product to wishlist
            $wishlistModel->create([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
            $_SESSION['message'] = "Added to Wishlist!";
        
    
        $this->redirect('/home');
    }
    
//     public function showWishlist()
// {
    

//     // if (!isset($_SESSION['user_id'])) {
//     //     $this->redirect('/login');
//     //     exit();
//     // }

//     // $user_id = $_SESSION['user_id'];

//     $user_id = '1';
    
//     // Fetch wishlist items with product details
//     $wishlistModel = $this->model('wishlist');
//     $wishlistItems = $wishlistModel->all()
//         ->join('products', 'wishlist.product_id', '=', 'products.id')
//         ->where(['wishlist.user_id' => $user_id]);
        

//     $this->render('public.user.wishlist', [
//         'pageTitle' => 'My Wishlist',
//         'wishlistItems' => $wishlistItems
//     ]);
    
// }

    
// public function showWishlist()
// {
  

//     $user_id = '1';

//     // Fetch wishlist items along with product details
//     $wishlistModel = $this->model('wishlist');
//     $wishlistItems = $wishlistModel
//         ->select('wishlist.*', 'products.product_name', 'products.product_price', 'products.product_img_url', 'products.id')
//         ->join('products', 'wishlist.product_id', '=', 'products.id')
//         ->where(['wishlist.user_id' => $user_id])
//         ->get();

//     $this->render('public.aaa.wishlist', [
//         'pageTitle' => 'My Wishlist',
//         'wishlistItems' => $wishlistItems
//     ]);
// }



    public function showWishlist()
    {
        // Check if user is logged in
       

        $userId = "1";
        $wishlistModel = new Wishlist();
        $wishlistItems = $wishlistModel->getUserWishlist($userId);

        // Render the wishlist view
        $this->render('public.wishlist.wishlist', ['wishlistItems' => $wishlistItems]);
    }






    public function destroy($id)
    {
        $wishlist = $this->model('wishlist');
        $wishlist->deleteFromWishlist($id);
        $this->redirect('/wishlist');
    }
    
    // public function removeByProductId($productId)
    // {
      
    
    //     $userId = '1';
    //     $wishlistModel = new Wishlist();
    
    //     // Check if the wishlist item with the given product_id belongs to the logged-in user
    //     $wishlistItem = $wishlistModel->where('product_id', $productId);
    
    //     if ($wishlistItem && $wishlistItem[0]['user_id'] == $userId) {
    //         // Delete the wishlist item by product_id
    //         $result = $wishlistModel->destroyByProductId($productId);
    
    //         if ($result) {
    //             // Successfully deleted, redirect to wishlist
    //             $this->redirect('/aaa');
    //         } else {
    //             // Log or handle failure
    //             error_log("Failed to remove product with ID: {$productId} from wishlist.");
    //             $this->redirect('/wishlist');
    //         }
    //     } else {
    //         // Optionally, handle the case where the item is not found or doesn't belong to the user
    //         $this->redirect('/wishlist');
    //     }
    // }
    
}