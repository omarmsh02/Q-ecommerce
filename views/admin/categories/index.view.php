<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<div class="content">
    <div>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="admin-page-title">All Categories</h1>
    
            <a class="btn admin-page-btn px-4 py-2" href="/categories/create">Create New Category</a>
        </div>
        <?php if (!empty($categories)): ?>
            <table class="table table-success table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>IMG</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= htmlspecialchars($category['id']) ?></td>
                            <td><?= htmlspecialchars($category['category_name']) ?></td>
                            <td>
                                <img class="custom-class" src="<?= htmlspecialchars($category['category_img_url']) ?>"
                                    alt="<?= htmlspecialchars($category['category_name']) ?>"
                                    title="<?= htmlspecialchars($category['category_name']) ?>"
                                    height="40">
                            </td>
                            <td>
                                <a href="/categories/<?= $category['id'] ?>/edit" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="/categories/<?= $category['id'] ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-warning">No categories found.</p>
        <?php endif; ?>

        <!-- Link to Create a new category -->



    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>