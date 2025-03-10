<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/head.php'; ?>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/header.php'; ?>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5 row">
            <div class="table-responsive col-8">
                <?php if (!empty($cartItems)): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;?>
                            <?php foreach ($cartItems as $cartItem): ?>

                                <tr>
                                    <td><?= htmlspecialchars($cartItem['product_name']) ?></td>
                                    <td><img src="<?= htmlspecialchars($cartItem['product_img_url']) ?>" width="100"></td>
                                    <td><?= number_format($cartItem['product_price'], 2) * $cartItem['quantity'] ?>JD</td>
                                    <?php $total += $cartItem['product_price'] * $cartItem['quantity']; ?>
                                    <td>
                                        <form action="/cart-item-increase" method="POST">
                                            <input type="hidden" name="product" value="<?= $cartItem['product_id'] ?>">
                                            <button type="submit" name="quantity-i" value="<?= number_format($cartItem['quantity'], 0) ?>">
                                                +
                                            </button>
                                        </form>
                                        <?= number_format($cartItem['quantity'], 0) ?>
                                        <form action="/cart-item-decrease" method="POST">
                                            <input type="hidden" name="product" value="<?= $cartItem['product_id'] ?>">
                                            <button type="submit" name="quantity-d" value="<?= number_format($cartItem['quantity'], 0) ?>">
                                                -
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Proceed to checkout
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Total : <?= $total;?>
                                </div>
                                <div class="modal-body">
                                    Confirm Order ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <form action="/checkout" method="POST"><button type="submit" name="total" value="<?=$total?>" class="btn btn-success">Confirm</button></form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <p>Your cart is currently empty.</p>
                <?php endif; ?>
                <!-- Cart Page End -->
            </div>

        </div>


    </div>



    <!-- Footer Start -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/footer.php'; ?>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/lib/easing/easing.min.js"></script>
    <script src="../../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/views/assets/js/main.js"></script>

</body>

</html>