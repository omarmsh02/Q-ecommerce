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
            <h1 class="text-center text-white display-6">Checkout</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Checkout</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Checkout</h1>
                <form action="#">
                    <div class="row g-5">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                 <form action="/checkout/process" method="post">
                            <div class="table-responsive">
                            <h3>Order Summary</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                        <?php $super_total=0;?>
                                        <?php foreach ($cartItems as $item): ?>
                                            <td class="py-5"><img src="<?= htmlspecialchars($item['product_img_url']) ?>" width="100"></td>
                                            <td class="py-5"><?=htmlspecialchars($item["product_name"])?></td>
                                            <td class="py-5"><?= number_format($item['product_price'], 2) ?>JD</td>
                                            <td class="py-5"><?=htmlspecialchars($item["quantity"])?></td>
                                            <td class="py-5"><?=htmlspecialchars($item["product_price"]*$item["quantity"])?></td>
                                            </tr>
                                            <?php $super_total+=($item["product_price"]*$item["quantity"]);?>
                                            <?php endforeach; ?>
                                       
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                            </th>
                                            <td class="py-5">
                                                <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                            </td>
                                            <td class="py-5"></td>
                                            <td class="py-5"></td>
                                            <td class="py-5">
                                                <div class="py-3 border-bottom border-top">
                                                    <p class="mb-0 text-dark"><?=$super_total?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-5">
                        <h3>Shipping Address</h3>
                            <input type="text" name="address" placeholder="Enter your address" required>
                            <h3>Payment Method</h3>
                            <select name="payment_method" required>
                                <option value="credit_card">💳Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="cash_on_delivery">💵Cash on Delivery</option>
                            </select>
                            <div class="row g-5 text-center align-items-center justify-content-center border-bottom py-3">
                                <div class="col-12">
                                    <div class="form-check text-start my-3">
                                        <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                                        <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-3">
                                         <i class="fas fa-sync-alt"></i> Submit
                                    </button>
                                </div>
                             </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


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