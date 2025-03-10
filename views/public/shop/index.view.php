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


    <!-- Navbar start -->


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
        <h1 class="text-center text-white display-6">Shop</h1>
        <!-- <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol> -->
    </div>
    <!-- Single Page Header End -->


    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex mb-5">
                                <form action="/shop-search" class = "d-flex bg-none" method="POST">
                                    <input type="search" class="form-control p-3" name="search" placeholder="keywords" aria-describedby="search-icon-1">
                                    <button style = "border:none; background:none" type="submit"><span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span></button>
                                </form>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <form id="filterForm" method="POST" action="">
                                            <?php foreach ($categories as $category): ?>
                                                <div class="mb-2">
                                                    <input type="radio" class="me-2" id="category-<?= $category['id'] ?>" name="category" value="<?= $category['id'] ?>">
                                                    <label for="category-<?= $category['id'] ?>"> <?= $category['category_name'] ?> </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <?php if (!empty($products)) { ?>
                                    <?php foreach ($products as $product): ?>

                                        <div class="col-md-6 col-lg-6 col-xl-4">
                                            <a href="/shop/<?= $product['id'] ?>" class="card-link">
                                                <div class="card h-100 rounded">
                                                    <!-- Image Section -->
                                                    <div class="position-relative">
                                                        <div class="aspect-ratio-box">
                                                            <img src="<?= $product['product_img_url'] ?>"
                                                                class="card-img-top rounded-top"
                                                                style="object-fit: cover; width: 100%; height: 100%">
                                                        </div>

                                                        <!-- Wishlist Button -->
                                                        <form action="/add-wishlist-item" method="POST"
                                                            class="position-absolute top-0 end-0 m-3">
                                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fa fa-heart text-white bg-primary px-3 py-1 rounded"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <!-- Content Section -->
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="flex-grow-1">
                                                            <h5 class="card-title mb-2"><?= $product['product_price'] ?></h5>
                                                            <p class="card-text text-truncate mb-0"><?= $product['product_name'] ?></p>
                                                        </div>

                                                        <!-- Bottom-aligned button -->
                                                        <div class="mt-auto">
                                                            <form action="/addToCart" method="POST">
                                                                <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary" name="product" value="<?= $product['id'] ?>">
                                                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <h1>No Products Found Nigaaaaaaaaaaaaaa</h1>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fruits Shop End-->


    <!-- Footer Start -->

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/public/footer.php'; ?>
    <!-- Footer End -->

    <!-- Copyright Start -->

    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
    <script>
        document.querySelectorAll('input[name="category"]').forEach(radio => {
            radio.addEventListener('change', function() {
                let form = document.getElementById('filterForm');
                form.action = '/shop/' + this.value; // Set action dynamically
                form.submit(); // Submit form automatically
            });
        });
    </script>

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