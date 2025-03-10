<!DOCTYPE html>
<html lang="en">

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/head.php'; ?>



<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/header.php'; ?>
    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->





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
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->



    <div class="container py-5">
        <h2 class="text-center mb-4">My Wishlist</h2>

        <div class="row g-4">
            <?php if (!empty($wishlistItems)): ?>
                <?php foreach ($wishlistItems as $item): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 rounded border-0 shadow-sm">
                            <!-- Image Section -->
                            <div class="position-relative">
                                <div class="aspect-ratio-box">
                                    <img src="<?= $item['product_img_url'] ?>"
                                        class="img-fluid rounded-top w-100 h-100"
                                        style="object-fit: cover">
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="card-body d-flex flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="product-name mb-2"><?= $item['product_name'] ?></h4>
                                    <p class="price mb-0  fw-bold">$<?= $item['product_price'] ?></p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex gap-2 mt-auto">
                                    <form action="/remove-item/<?= $item['id'] ?>" method="POST"
                                        class="flex-grow-1">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger w-100"
                                            onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                    <form action="/addToCart" method="POST">
                                    <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary" name="product" value="<?= $item['id'] ?>">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Your wishlist is empty.</p>
            <?php endif; ?>
        </div>
    </div>



    <!-- Cart Page Start -->

    <!-- Cart Page End -->


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