<!-- Sidebar -->


<div class="sidebar">
    <h3>Admin Dashboard</h3>
    <a class="nav-link" href="/users">Manage Users</a>

    <a class="nav-link" href="/orders">Manage Orders</a>

    <a class="nav-link" href="/products">Manage Products</a>

    <a class="nav-link" href="/categories">Manage Categories</a>

    <?php if ($_SESSION['admin_role'] == 'super_admin') { ?>
        <a class="nav-link" href="/admins">Manage Admins</a>
    <?php } ?>

    <form action="/admin-logout" method="POST">
        <button class="logout" type="submit">Log out</button>
    </form>

</div>


<nav class="navbar navbar-expand-lg " id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/users">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders">Manage Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Manage Products</a>
                </li class="nav-link">
                <li>
                <a class="nav-link" href="/categories">Manage Categories</a>
                </li>
                
                <?php if ($_SESSION['admin_role'] == 'super_admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link " href="/admins">Manage Admins</a>
                    </li>
        
                <?php } ?>

                <li class="nav-link">
                <form action="/admin-logout" method="POST">
                     <button class="nav-link redd" type="submit">Log out</button>
                 </form>
                </li>
            </ul>
        </div>
    </div>
</nav>