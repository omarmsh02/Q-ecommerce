<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs5 profile billing page - Bootdey.com</title>
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

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
.fa-2x {
    font-size: 2em;
}

.table-billing-history th, .table-billing-history td {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.375rem;
    padding-right: 1.375rem;
}
.table > :not(caption) > * > *, .dataTable-table > :not(caption) > * > * {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.border-start-primary {
    border-left-color: #0061f2 !important;
}
.border-start-secondary {
    border-left-color: #6900c7 !important;
}
.border-start-success {
    border-left-color: #00ac69 !important;
}
.border-start-lg {
    border-left-width: 0.25rem !important;
}
.h-100 {
    height: 100% !important;
}
    </style>
</head>
<?php require_once "views/layout/public/head.php" ?>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<?php require_once "views/layout/public/header.php" ?>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->

    <!-- Billing history card-->
    <div class="container py-5">
    <h2 class="text-center mb-4">Order History</h2>

    <?php if (!empty($orders)): ?>
        <table class="table table-bordered table-striped" style="background-color: #81c408;">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['date'] ?></td>
                        <td><?= $order['total'] ?></td>
                        <td><?= $order['order_status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">You have no order history.</p>
    <?php endif; ?>
</div>

</div>
<?php require_once "views/layout/public/footer.php" ?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>