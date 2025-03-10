<div class="container-fluid fixed-top mb-5">
    <div class="container topbar bg-primary d-none d-lg-block p-2">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2 d-flex">
                <i class="fas fa-car-side fa-2x text-white"></i>
                <small class="ms-3 text-white">Free shipping on order over 100 JOD</small>
            </div>
            <div class="top-info px-2 d-flex">
                <i class="fas fa-exchange-alt fa-2x text-white"></i>
                <small class="ms-3 text-white">3 days money guarantee</small>
            </div>
            <div class="top-info pe-2 d-flex">
                <i class="fa fa-phone-alt fa-2x text-white"></i>
                <small class="ms-3 text-white">24/7 Support</small>
            </div>

        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="/home" class="navbar-brand">
                <h1 class="text-primary display-6">QTRAT</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a class="nav-item nav-link active" href="/home">Home</a>
                    <a class="nav-item nav-link active" href="/shop">Shop</a>
                    

                </div>
                <div class="d-flex m-3 me-0">
                    
                    <?php if (isset($_SESSION['userId'])) {?>
                    <a href="/wishlist" class="position-relative me-4 my-auto">
                        <i class="fa-solid fa-heart fa-2xl" style="color: #81c408;"></i>
                    </a>
                    <a href="/cart" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        
                    </a>
                    <?php } else {?>
                        <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa-solid fa-heart fa-2xl" style="color: #81c408;"></i>
                    </a>
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        
                    </a>
                        <?php }?>
                    <div class="dropdown my-auto">
                        <a href="#" class="my-auto" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                        <?php if (isset($_SESSION['userId'])) {?>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <form action="/user/profile" method="GET">
                                    <button type="submit" class="dropdown-item">View Profile</button>
                                </form>
                            </li>
                            <li>
                                <form action="/user/purchaseHistory" method="GET">
                                    <button type="submit" class="dropdown-item">Purchase History</button>
                                </form>
                            </li>
                            <li>
                                <form action="/user-logout" method="POST">
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                        <?php } else {?>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <form action="/user" method="GET">
                                    <button type="submit" class="dropdown-item">Register</button>
                                </form>
                            </li>
                            <li>
                                <form action="/user" method="GET">
                                    <button type="submit" class="dropdown-item">Login</button>
                                </form>
                            </li>
                        </ul>
                        <?php }?>
                    </div>
                </div>
        </nav>
    </div>
</div>
</nav>
</div>
</div>