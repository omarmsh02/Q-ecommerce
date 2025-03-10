<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
    <div class="content">
        <div class="card">
            <form action="/users/<?= $user['id'] ?>/edit" method="POST">
               
                <input type="hidden" name="_method" value="PUT" />
                <div class="mb-3">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($user['first_name']) ?>" />
                </div>
                <div class="mb-3">
                <label for="firstname" class="form-label">Last Name:</label>
                <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($user['last_name']) ?>" />
                </div>
                <div class="mb-3">
                <label for="firstname" class="form-label">Email:</label>
                <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" />
                </div>
                

                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="/users" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>
</body>

</html>