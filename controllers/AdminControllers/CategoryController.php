<?php
require_once 'models/AdminModels/Category.php';
require_once 'controllers/Controller.php';
class CategoryController extends Controller
{

    public function index()
    {
        $role = 'admin';
        if ($role == 'admin'){
            $category = $this->model('category');
            $categories = $category->all();
            $this->render('admin.categories.index', [
                'pageTitle' => 'All categories',
                'categories' => $categories
            ]);
        }
        else{
            echo 'you are not authorized';
        }
    }

    public function create()
    {
        $this->render('admin.categories.create', ['title' => 'Create category']);
    }

    public function store(){
        $name = $_POST['name'] ?? null;
        $image = $_POST['image_url'] ?? null;


        $errors = $this->validate([
            'name' => 'required',
            'image_url' => 'required',

        ]);
        if (!empty($errors)) {
            dd($errors);
        }
        $category = $this->model('category');
        $category->create([
            'category_name' => $name,
            'category_img_url' => $image
        ]);
        $this->redirect('/categories');
    }
    
    public function edit($id)
    {
        $category = $this->model('category');
        $category = $category->find($id);
       // dd($product);
        $this->render('admin.categories.edit', ['title' => 'Edit Category', 'category' => $category]);
    }

    public function update($id)
    {
        $name = $_POST['name'] ?? null;
        $image = $_POST['image_url'] ?? null;

        $errors = $this->validate([
            'name' => 'required|min:3',
            'image_url' => 'required'
        ]);

        if (!empty($errors)) {
            dd($errors);
        }
        $category = $this->model('category');
        $category->update($id,[
            'category_name' => $name,
            'category_img_url' => $image
        ]);
        $this->redirect('/categories');
    }

    public function show($id)
    {
        $product = $this->model('product');
        $product = $product->find($id);
        $this->render('admin.products.show', ['product' => $product]);
    }

    public function destroy($id)
    {
        $category = $this->model('category');
        $category->delete($id);
        $this->redirect('/categories');
    }


}