<?php
require_once 'models/AdminModels/Users.php';
require_once 'controllers/Controller.php';
class UsersController extends Controller
{

    public function index()
    {
        $user = $this->model('user');
        $users = $user->all();
        
        $title = 'Users';
        $this->render('admin.users.index', [
            'pageTitle' => 'All users',
            'users' => $users
        ]);

    }


    public function show($id)
    {
        echo "<h1>Showing user with ID: {$id}</h1>";
    }
    public function create()
    {
        $this->render('admin.users.create', ['title' => 'Add A User']);
    }

    public function store()
    {
        // 1. Retrieve data from POST
        $firstName = $_POST['firstname'] ?? null;
        $lastName = $_POST['lastname'] ?? null;
        $email    = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // 2. (Optionally) Validate the data
        $errors = $this->validate([
            'firstname' => 'required|alpha|min:3',
            'lastname'    => 'required|alpha|min:3',
            'email'    => 'required|email',
            'password'    => 'required|min:8|max:16'
        ]);

        // If validation fails, re-render form with errors
        if (!empty($errors)) {
            // In a real app, you might:
            //   - Store errors in session or re-render the form
            //   - For simplicity, we'll just dump them:
            dd($errors);
        }
       $user = $this->model('user');
       $user->create([
            'first_name' => $firstName,
            'last_name'    => $lastName,
            'email'    => $email,
            'password'    => password_hash($password, PASSWORD_DEFAULT)
        ]);
        $this->redirect('/users');
    }


    public function edit($id)
    {
        $user = $this->model('user');
        $user = $user->find($id);
        $this->render('admin.users.edit', ['user' => $user]);
    }

    public function update($id){
        $data = [
            'first_name' => $_POST['firstname'] ?? '',
            'last_name'    => $_POST['lastname'] ?? '',
            'email'    => $_POST['email'] ?? '',
            'address'    => $_POST['address'] ?? '',
            'phone_number'    => $_POST['phonenumber'] ?? ''
        ];

        // Update the user record
        $userModel = $this->model('user'); // "user" maps to User.php, extends Model
        $userModel->update($id, $data);


            $this->redirect('/users');
        
    }

public function destroy($id)
{
    $user = $this->model('user');
    $user->delete($id);
    $this->redirect('/users');

{


}
}
}