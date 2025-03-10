<!DOCTYPE html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>

    <div class="content">
        <!-- Create User Section -->
        <div class="card">
            <h4>Edit Product</h4>
            <form action="/products/<?= $product['id'] ?>/edit" method="POST">
                <!-- Use a hidden input to tell your system to treat it as PUT -->
                <input type="hidden" name="_method" value="PUT" />
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Name</label>

                    <input name="name" type="text" class="form-control" aria-describedby="username" value="<?= $product['product_name'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>

                    <input name="price" type="number" class="form-control" aria-describedby="username" value="<?= $product['product_price'] ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>

                    <input name="img_url" type="text" class="form-control" aria-describedby="username" value="<?= $product['product_img_url'] ?>">

                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description" class="form-control"><?= $product['product_description'] ?></textarea>

                </div>
                <div class="mb-3">
                    <label class="form-label">Category Id</label>
                    <input type="text" class="form-control" name="category_id" value="<?= $product['category_id'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="/products" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>