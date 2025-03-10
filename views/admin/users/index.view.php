

<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<div class="content">
    <!-- Manage Users Section -->
    
    <div id="users-section">

<div class="d-flex justify-content-between align-items-center">
    <h1 class="admin-page-title">All Users</h1>
    
    <a class="btn admin-page-btn px-4 py-2" href="/users/create">Create New User</a>
</div>

<?php if (!empty($users)): ?>
    <table class="table table-success table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['first_name']) ?></td>
                <td><?= htmlspecialchars($user['last_name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['address'] ?? '') ?></td>
                <td><?= htmlspecialchars($user['phone_number'] ?? '') ?></td>
                <td>
                    <!-- Edit link (GET) -->
                    <a class="btn btn-primary"  href="/users/<?= $user['id'] ?>/edit">Edit</a>
                    &nbsp;|&nbsp;

                    <!-- Delete form (simulating DELETE via _method) -->
                    <form action="/users/<?= $user['id'] ?>" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">
                            Delete
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
    <p>No Users found.</p>
<?php endif; ?>

<!-- Link to Create a new user -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>