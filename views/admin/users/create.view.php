<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
    <div class="content">
           
    <div id="create_admin" class="card">
        <h4>Add a user</h4>
        <form action="/users/create" method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="/users" class="btn btn-secondary">Cancel</a>
        </form>
        
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>