<?php
require_once 'models/PublicModels/Home.php';
require_once 'controllers/Controller.php';
class HomeController extends Controller
{
    public function index()
    {
        //require_once 'views/pages/home.view.php';
        $product = $this->model('product');
            $products = $product->all();
            $this->render('public.home.index', [
                'pageTitle' => 'All Products',
                'products' => $products
            ]);
    }
    public function show($id)
    {
        $product = $this->model('product');
        $product = $product->find($id);
        $this->render('public.home.show', ['product' => $product]);
    }

}