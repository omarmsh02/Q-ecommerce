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
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword <?php echo $_SESSION['firstName']; ?></h5>
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


    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h1 class="mb-5 display-3 text-white text-center rounded-circle">Dietry Supplements & Health Nutrition</h1>
                    <div class="position-relative mx-auto">
                        <a href="#best-seller"><button  type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4  rounded-pill text-white h-100">Shop Now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <div class="container-fluid py-5">
        <div class="container py-5" id="best-seller">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-4">Bestseller Products</h1>
                <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
            </div>
            <div class="row g-4">
                <?php
                $count = 0;
                foreach ($products as $product):
                    if ($count >= 6) break;
                ?>
                <div class="col-lg-6 col-xl-4">
                    <div class="card h-100 rounded">
                        <div class="row g-0 h-100">
                            <!-- Image Column -->
                            <div class="col-5 position-relative">
                                <div class="aspect-ratio-box">
                                    <img src="<?= $product['product_img_url'] ?>" 
                                        class="img-fluid rounded-circle w-100 h-100"
                                        style="object-fit: cover">
                                </div>
                                
                                <!-- Wishlist Button -->
                                <form action="/add-wishlist-item" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit" class="border-0 bg-transparent">
                                    <i class="fa fa-heart text-white bg-primary px-3 py-1 rounded"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- Text Content Column -->
                            <div class="col-7 d-flex flex-column">
                                <div class="p-3 flex-grow-1">
                                    <a href="/shop/<?= $product['id'] ?>" class="product-name mb-2"><?= $product['product_name'] ?></a>
                                    <h3 class="price mb-0"><?= $product['product_price'] ?></h3>
                                </div>
                                
                                <!-- Bottom-aligned button -->
                                <div class="p-3 border-top">
                                <form action="/addToCart" method="POST">
                                    <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary" name="product" value="<?= $product['id'] ?>">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $count++;
                endforeach;
                ?>
            </div>
        </div>
    </div>


    <!-- About Us Start -->
    
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h1 class="display-5 mb-5 text-dark">Who we are</h1>
            </div>
            
                
                    <div class="position-relative">
                        <div class="mb-4 pb-4 border-bottom border-secondary">
                            <p class="mb-0 text-center fs-5">
                                At Qtrat, we are dedicated to delivering high-quality, thoroughly tested dietary supplements that support a healthier lifestyle. Our top priority is the well-being and satisfaction of our customers, ensuring that every product we offer meets the highest standards of safety and effectiveness.
                                With a commitment to transparency, innovation, and trust, we source only the finest ingredients and subject our supplements to rigorous testing to guarantee purity and potency. Whether you're looking to enhance your nutrition, boost performance, or improve overall wellness, Qtrat is here to help you achieve your health goals with confidence.
                                Your health is our mission. Your trust is our promise.
                            </p>
                        </div>
                    </div>
                
            
        </div>
    
    <!-- About Us End -->


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