<?php
require_once 'models/AdminModels/Product.php';
require_once 'controllers/Controller.php';

class SearchController extends Controller
{
    public function search(){
        $search = $_POST['search'];
        $product = $this->model('product');
        $products = $product->searchProducts($search);

        $category = $this->model('category');
        $categories = $category->all();


        $this->render('public.shop.index', [
            'pageTitle' => 'All Products',
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
?>