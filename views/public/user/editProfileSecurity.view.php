<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs5 edit profile account details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
#profile-section{
    margin-top: 20vh;
}
    </style>
</head>
<?php require_once "views/layout/public/head.php" ?>

<body>
<?php require_once "views/layout/public/header.php" ?>
    <!-- views/public/user/editProfileSecurity.view.php -->
<div class="container-xl px-4 mt-5">
    <div class="row"> 
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Security Settings</h5>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary" 
                                onclick="location.href='/user/<?= $user['id'] ?>/edit'">
                            Account Details
                        </button>
                        <button type="button" class="btn btn-primary active">Security</button>
                    </div>
                </div>
                
                <div class="card-body">
                    <?php if (isset($_SESSION['errors'])): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                <div><?= $error ?></div>
                            <?php endforeach; ?>
                            <?php unset($_SESSION['errors']); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/user/<?= $user['id'] ?>/update-security">
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="mb-3">
                            <label class="small mb-1">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "views/layout/public/footer.php" ?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>