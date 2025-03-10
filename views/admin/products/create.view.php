<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>

<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
    <div class="content">
           <!-- Create User Section -->
    <div id="create_admin" class="card">
        <h4>Create Product</h4>
        <form action="/products/create" method="POST">
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"  aria-describedby="username"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Img</label>
                <!-- <input type="password" class="form-control" name="img_url"> -->
                <textarea class="form-control" name="img_url" id=""></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Category Id</label>
                <input type="text" class="form-control" name="category_id">
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="/products" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>