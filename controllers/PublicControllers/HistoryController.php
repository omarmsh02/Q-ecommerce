<?php

require_once 'models/PublicModels/History.php';
require_once 'controllers/Controller.php';

class HistoryController extends Controller
{
    // Constructor


    public function showHistory()
    {
        // Check if user is logged in


        $userId = $_SESSION['userId'];
        $orders = new History();
        $orders = $orders->getUserOrders($userId);

        // Render the wishlist view
        $this->render('public.user.purchaseHistory', ['orders' => $orders]);
    }
    // Method to fetch user orders and render them in the view

}
?>