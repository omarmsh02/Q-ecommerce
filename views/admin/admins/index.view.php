<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>

<body>
    <div class="content">
        <!-- Manage Users Section -->
        <div id="users-section" class="table-responsive">
        <div class="d-flex justify-content-between align-items-center">
    <h1 class="admin-page-title">All Admins</h1>
    <!-- Link to Create a new admin -->
    <a class="btn admin-page-btn px-4 py-2" href="/admins/create">Create New Admin</a>
</div>



            <!-- Example: Display users in a table -->
            <?php if (!empty($admins)): ?>
                <table class="table table-success table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?= htmlspecialchars($admin['id']) ?></td>
                                <td><?= htmlspecialchars($admin['first_name']) ?></td>
                                <td><?= htmlspecialchars($admin['last_name']) ?></td>
                                <td><?= htmlspecialchars($admin['email']) ?></td>
                                <td><?= htmlspecialchars($admin['role']) ?></td>
                                <td>
                                    <!-- Edit link (GET) -->
                                    <a class="btn btn-primary" href="/admins/<?= $admin['id'] ?>/edit">Edit</a>
                                    &nbsp;|&nbsp;

                                    <!-- Delete form (simulating DELETE via _method) -->
                                    <form action="/admins/<?= $admin['id'] ?>" method="POST" style="display:inline;">
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
    <p>No Admins found.</p>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>