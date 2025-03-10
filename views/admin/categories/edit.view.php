<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<div class="content">
<div class="card">

    <!-- Edit Category Form -->
    <form action="/categories/<?= $category['id'] ?>/edit" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        
        <h4 class="mb-3">Edit Category</h4>

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" id="category_name" class="form-control" name="name" value="<?= htmlspecialchars($category['category_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="text" id="image_url" class="form-control" name="image_url" value="<?= htmlspecialchars($category['category_img_url']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="/categories" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
