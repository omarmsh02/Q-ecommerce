<?php
require_once 'models/PublicModels/User.php';
require_once 'controllers/Controller.php';
class UserController extends Controller
{

    public function index()
    {
        if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
            $this->redirect('/home');
        } else {
            $user = $this->model('user');
            $users = $user->all();
    
            $title = 'Users';
            $this->render('public.auth.index', [
                'pageTitle' => 'All users',
                'users' => $users
            ]);
        }


    }


    public function show($id)
    {
        echo "<h1>Showing user with ID: {$id}</h1>";
    }
    public function create()
    {
        $this->render('admin.users.create', ['title' => 'Create Product']);
    }

    public function store()
    {
        // 1. Retrieve data from POST
        $firstName = $_POST['firstname'] ?? null;
        $lastName = $_POST['lastname'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirmPassword = $_POST['confirm_password'] ?? null;
    
        // 2. Validate the data
        $errors = [];
    
        // Validate password
        if (strlen($password) < 8) {
            $errors['password'] = "Password must be at least 8 characters long.";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors['password'] = "Password must contain at least one uppercase letter.";
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors['password'] = "Password must contain at least one lowercase letter.";
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "Password must contain at least one number.";
        }
        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = "Passwords do not match.";
        }
    
        // Validate phone number (example: must be 10 digits)
        
    
        // Validate address (example: must not be empty)
    
        // If there are errors, re-render the form with errors
        if (!empty($errors)) {
            // Store errors in session or pass them to the view
            $_SESSION['errors'] = $errors;
            $this->redirect('/user'); // Redirect back to the form
            return;
        }
    
        // 3. If validation passes, create the user
        $user = $this->model('user');
        $user->create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    
        // 4. Redirect to a success page or login page
        $this->redirect('/user');
    }
    // controllers/UserController.php
public function login()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Retrieve data from POST
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // 2. Validate the data
        $errors = [];
        if (empty($email)) {
            $errors['email'] = "Email is required.";
        }
        if (empty($password)) {
            $errors['password'] = "Password is required.";
        }

        // 3. If validation fails, re-render the form with errors
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $this->redirect('/user'); // Redirect back to the login form
            return;
        }

        // 4. Find the user by email
        $user = $this->model('user');
        $userData = $user->findByEmail($email);

        // 5. Verify the password
        if ($userData && password_verify($password, $userData['password'])) {
            // Login successful
            $_SESSION['userId'] = $userData['id'];
            $_SESSION['user_email'] = $userData['email'];
            $_SESSION['firstName'] = $userData['first_name'];
            $_SESSION['lastName'] = $userData['last_name'];
            $_SESSION['address'] = $userData['address'];
            $_SESSION['phoneNumber'] = $userData['phone_number'];
            $this->redirect('/home'); // Redirect to the dashboard or home page
        } else {
            // Login failed
            $errors['login'] = "Invalid email or password.";
            $_SESSION['errors'] = $errors;
            $this->redirect('/user'); // Redirect back to the login form
        }
    } else {
        // Display the login form
        $this->render('public.auth.index', ['title' => 'Login']);
    }
}

function userLogout(){
    session_unset();
    session_destroy();
    $this->render('public.auth.index', ['title' => 'User Login']);
}

public function viewProfile() 
{
    if (!isset($_SESSION['userId'])) {
        $this->redirect('/user/login');
    }

    $userModel = $this->model('user');
    $user = $userModel->findByEmail($_SESSION['user_email']);

    $this->render('public.user.profile', [
        'title' => 'User Profile',
        'user' => $user 
    ]);
}

public function edit($id) {
    $user = $this->model('user')->find($id);
    $this->render('public.user.editprofile', [
        'title' => 'Edit Profile',
        'user' => $user
    ]);
}

public function update($id) {
    $data = [
        'first_name' => $_POST['first_name'] ?? '',
        'last_name' => $_POST['last_name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone_number' => $_POST['phone_number'] ?? '',
        'address' => $_POST['address'] ?? ''
    ];

    $errors = [];
    foreach ($data as $key => $value) {
        if (empty($value)) {
            $errors[$key] = ucfirst(str_replace('_', ' ', $key)) . ' is required';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $this->redirect("/user/{$id}/edit");
    }

    $userModel = $this->model('user');
    $userModel->update($id, $data);

    // Update session data
    $updatedUser = $userModel->find($id);
    $_SESSION['firstName'] = $updatedUser['first_name'];
    $_SESSION['lastName'] = $updatedUser['last_name'];
    $_SESSION['user_email'] = $updatedUser['email'];
    $_SESSION['phoneNumber'] = $updatedUser['phone_number'];
    $_SESSION['address'] = $updatedUser['address'];

    $this->redirect('/user/profile');
}
public function editSecurity($id) {
    $user = $this->model('user')->find($id);
    
    if (!$user) {
        $this->redirect('/user/profile');
    }

    $this->render('public.user.editProfileSecurity', [
        'title' => 'Security Settings',
        'user' => $user
    ]);
}

public function updateSecurity($id) {
    $userModel = $this->model('user');
    $existingUser = $userModel->find($id);

    if (!$existingUser) {
        $this->redirect('/user/profile');
    }

    $currentPass = $_POST['current_password'] ?? '';
    $newPass = $_POST['new_password'] ?? '';
    $confirmPass = $_POST['confirm_password'] ?? '';

    $errors = [];

    // Verify current password
    if (!password_verify($currentPass, $existingUser['password'])) {
        $errors[] = 'Current password is incorrect';
    }

    // Validate new password
    if (strlen($newPass) < 8) {
        $errors[] = 'Password must be at least 8 characters';
    }
    if (!preg_match('/[A-Z]/', $newPass)) {
        $errors[] = 'Password requires at least one uppercase letter';
    }
    if (!preg_match('/[a-z]/', $newPass)) {
        $errors[] = 'Password requires at least one lowercase letter';
    }
    if (!preg_match('/[0-9]/', $newPass)) {
        $errors[] = 'Password requires at least one number';
    }
    if ($newPass !== $confirmPass) {
        $errors[] = 'Passwords do not match';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $this->redirect("/user/{$id}/security");
        return;
    }

    // Update password
    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
    $userModel->update($id, ['password' => $hashedPass]);

    $_SESSION['success'] = 'Password updated successfully';
    $this->redirect('/user/profile');
}


public function destroy($id)
{
    $user = $this->model('user');
    $user->delete($id);
    $this->redirect('/users');

}
}