<?php
require_once 'models/PublicModels/Shop.php';
require_once 'controllers/Controller.php';
class ShopController extends Controller
{

    public function index()
    {
            $product = $this->model('product');
            $products = $product->all();
            


            

            $category = $this->model('category');
            $categories = $category->all();

            $this->render('public.shop.index', [
                'pageTitle' => 'All Products',
                'products' => $products,
                'categories' => $categories
            ]);
      
    }


   
    function categorized($id){
        
    $product = $this->model('product');
    $products = $product->where('category_id',$id);

    $category = $this->model('category');
    $categories = $category->all();

    $this->render('public.shop.index', [
        'pageTitle' => 'All Products',
        'products' => $products,
        'categories' => $categories
    ]);


 }
   

    public function show($id)
    {
        $product = $this->model('product');
        $product = $product->find($id);
        $this->render('public.shop.show', ['product' => $product]);
    }

    


}