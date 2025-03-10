<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<body>
    <div class="content">
           <!-- Create Admin Section -->
    <div id="create_admin" class="card">
        <h4>Create Admin</h4>
        <form action="/admins/create" method="POST">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
               
                    <input name="email" type="email" class="form-control"  aria-describedby="username">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
               
                    <input name="password" type="password" class="form-control"  aria-describedby="username">
                
            </div>
            <button type="submit" class="btn btn-primary">Create Admin</button>
            <a href="/admins" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>