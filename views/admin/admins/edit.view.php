<!DOCTYPE html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<body>


<div class="content">
           <!-- Create User Section -->
    <div class="card">
    <h4>Edit Product</h4>
        <form action="/admins/<?= $admin['id'] ?>/edit" method="POST">
            <!-- Use a hidden input to tell your system to treat it as PUT -->
            <input type="hidden" name="_method" value="PUT" />
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                
                    <input name="first_name" type="text" class="form-control"  aria-describedby="username" value="<?= $admin['first_name'] ?>">
               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                
                    <input name="last_name" type="text" class="form-control"  aria-describedby="username" value="<?= $admin['last_name'] ?>">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
               
                    <input name="email" type="email" class="form-control"  aria-describedby="username" value="<?= $admin['email'] ?>">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
               
                    <input name="password" type="password" class="form-control"  aria-describedby="username" value="<?= $admin['password'] ?>">
                
            </div>
            <!-- <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-select" multiple aria-label="Multiple select example" name="role" id="">
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
            </div> -->

            <button type="submit" class="btn btn-primary ">Update Admin</button>
            <a href="/admins" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

