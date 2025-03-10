<?php
require_once 'models/AdminModels/Admin.php';
require_once 'controllers/Controller.php';
class AdminsController extends Controller
{

    public function index()
    {
        $role = $_SESSION['admin_role'];
        if ($role == 'super_admin'){
            $admin = $this->model('admin');
            $admins = $admin->all();
            $this->render('admin.admins.index', [
                'pageTitle' => 'All Admins',
                'admins' => $admins
            ]);
        }
        else{
            echo 'you are not authorized';
        }
    }

    public function create()
    {
        $this->render('admin.admins.create', ['title' => 'Create Admin']);
    }

    public function store(){
        $first_name = $_POST['first_name'] ?? null;
        $last_name = $_POST['last_name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        
        
        $errors = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ]);
        if (!empty($errors)) {
            dd($errors);
        }
        $admin = $this->model('admin');
        $admin->create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
            
        ]);
        $this->redirect('/admins');
    }
    public function edit($id)
    {
        $admin = $this->model('admin');
        $admin = $admin->find($id);
       
        $this->render('admin.admins.edit', ['title' => 'Edit Admin', 'admin' => $admin]);
    }

    public function update($id)
    {
        $first_name = $_POST['first_name'] ?? null;
        $last_name = $_POST['last_name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
       

        $errors = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ]);

        if (!empty($errors)) {
            dd($errors);
        }
        $admin = $this->model('admin');
        $admin->update($id,[
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
            
        ]);
        $this->redirect('/admins');
    }

    public function show($id)
    {
        $admin = $this->model('admin');
        $admin = $admin->find($id);
        $this->render('admin.admins.show', ['admin' => $admin]);
    }

    public function destroy($id)
    {
        $admin = $this->model('admin');
        $admin->delete($id);
        $this->redirect('/admins');
    }


}