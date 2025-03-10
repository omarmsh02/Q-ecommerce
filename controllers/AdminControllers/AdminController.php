<?php
require_once 'models/AdminModels/Admin.php';
require_once 'controllers/Controller.php';
session_start();
class AdminController extends Controller
{

    public function login(){
        $this->render('admin.auth.login', ['title' => 'Admin Login']);
    }

    // public function authenticate(){
    //     $email = $_POST['email'] ?? null;
    //     $password = $_POST['password'] ?? null;
    //     $admin = $this->model('admin');
    //     $admin = $admin->find($email);
    //     // password_verify($password, $admin->password)
    //     if ($admin && $password === $admin->$password){
    //         $this->redirect('/users');
    //     }
    //     else{
    //         $this->render('admin.auth.login', ['title' => 'Admin Login']);
    //     }
    // }
    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
             $admin = $this->model('admin');

             $admin = $admin->findAdmin(['email' => $email]);
    

    
             if ($admin && password_verify($password,$admin['password'])) { // Password is not hashed
                
                
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_email'] = $admin['email'];
                $_SESSION['admin_role'] = $admin['role'];

                $this->redirect('/users');
            } else {
                echo "Invalid email or password.";
                
            }
        }
    }

    function adminLogout(){
        session_unset();
        session_destroy();
        $this->render('admin.auth.login', ['title' => 'Admin Login']);
    }
    



}