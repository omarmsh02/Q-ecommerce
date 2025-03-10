<?php
require_once 'models/AdminModels/Product.php';
require_once 'controllers/Controller.php';
class ProductController extends Controller
{

    public function index()
    {
        $role = 'admin';
        if ($role == 'admin'){
            $product = $this->model('product');
            $products = $product->all();
            $this->render('admin.products.index', [
                'pageTitle' => 'All Products',
                'products' => $products
            ]);
        }
        else{
            echo 'you are not authorized';
        }
    }

    public function create()
    {
        $this->render('admin.products.create', ['title' => 'Create Product']);
    }

    public function store(){
        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $description = $_POST['description'] ?? null;
        $image = $_POST['img_url'] ?? null;
        $category = $_POST['category_id'] ?? null;
        
        $errors = $this->validate([
            'name' => 'required | string',
            'price' => 'required|numeric',
            'description' => 'required',
            'img_url' => 'required',
            'category_id' => 'required'
        ]);
        if (!empty($errors)) {
            dd($errors);
        }
        $product = $this->model('product');
        $product->create([
            'product_name' => $name,
            'product_price' => $price,
            'product_description' => $description,
            'product_img_url' => $image,
            'category_id' => $category
        ]);
        $this->redirect('/products');
    }
    public function edit($id)
    {
        $product = $this->model('product');
        $product = $product->find($id);
       // dd($product);
        $this->render('admin.products.edit', ['title' => 'Edit Product', 'product' => $product]);
    }

    public function update($id)
    {
        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $description = $_POST['description'] ?? null;
        $image = $_POST['img_url'] ?? null;
        $category = $_POST['category_id'] ?? null;

        $errors = $this->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required',
            'img_url' => 'required',
            'category_id' => 'required'
        ]);

        if (!empty($errors)) {
            dd($errors);
        }
        $product = $this->model('product');
        $product->update($id,[
            'product_name' => $name,
            'product_price' => $price,
            'product_description' => $description,
            'product_img_url' => $image,
            'category_id' => $category
        ]);
        $this->redirect('/products');
    }

    public function show($id)
    {
        $product = $this->model('product');
        $product = $product->find($id);
        $this->render('admin.products.show', ['product' => $product]);
    }

    public function destroy($id)
    {
        $product = $this->model('product');
        $product->delete($id);
        $this->redirect('/products');
    }


}