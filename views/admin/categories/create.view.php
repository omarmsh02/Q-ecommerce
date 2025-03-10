<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<div class="content">
    <!-- Add Category Section -->
    <div id="add-category" class="card p-4">
        <h4 class="mb-3">Add Category</h4>
        <form action="/categories/create" method="POST">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input id="category_name" name="name" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input id="image_url" type="text" class="form-control" name="image_url" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
            <a href="/categories" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>















