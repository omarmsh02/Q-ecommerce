<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<div class="content">
    <!-- Manage Users Section -->
    <div  >
<h1 class="admin-page-title">All Orders</h1>

<!-- Example: Display users in a table -->
<?php if (!empty($orders)): ?>
    <table class="table table-success table-bordered">
        <thead>
        <tr>
        <th>id</th>
            <th>user_id</th>
            <th>total</th>
            <th>order_status</th>
            <th>purchase_date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['id']) ?></td>
                <td><?= htmlspecialchars($order['user_id']) ?></td>
                <td><?= htmlspecialchars($order['total']) ?></td>
                <td><?= htmlspecialchars($order['order_status']) ?></td>
                <td><?= htmlspecialchars($order['purchase_date']) ?></td>
                
                
                <td>
                    <!-- Edit link (GET) -->
                    <a class="btn btn-primary" href="/orders/<?= $order['id'] ?>/edit">Edit</a>
                    &nbsp;|&nbsp;

                    <!-- Delete form (simulating DELETE via _method) -->
                    <form action="/orders/<?= $order['id'] ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">
                            Cancel Order
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
        </div>
<?php else: ?>
    <p>No Orders found.</p>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>