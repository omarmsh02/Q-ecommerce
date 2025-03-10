<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/admin-styles.css">
    <title>Manage Users</title>
</head>
<body>
<?php require_once '../../layout/admin/sidebar.php' ?>
    <div class="content">
           <!-- Manage Users Section -->
    <div id="users-section" class="card">
        <h4>Users Management</h4>
        <table class="table table-success table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>
                        <button class="btn btn-sm btn-red" onclick="window.location.href='edit_user_product.php?id=1'">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>
                        <button class="btn btn-sm btn-red"  data-bs-toggle="modal" data-bs-target="#searchModal"
                        >Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>