<?php
    session_start();
    require_once "inc/header.php";
    require_once "inc/nav.php";
?>
    <!-- Carousel Start -->
    <div class="container-fluid overflow-hidden sliderLanding">
        <div class="row">
            <div class="col-12">
                <div id="sliderIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#sliderIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#sliderIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#sliderIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="_resources/images/a.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block p-4">
                                <h5 class="display-5">First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="_resources/images/e.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block p-4">
                                <h5 class="display-5">First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="_resources/images/b.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block p-4">
                                <h5 class="display-5">First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#sliderIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sliderIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Ends -->

    <!-- Features Start -->
    <div class="container">
        <div class="row my-3 g-0">

            <div class="col-12">
                <div class="p-3 text-center">
                    <h2 class="display-4">Welcome to FitnessBD</h2>
                    <hr class="feat-separator">
                    <p class="fs-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio asperiores incidunt quia nemo 
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 feature-box">
                
                    <figure>
                        <img src="_resources/images/g.jpg" class="feature-img" alt="">
                    </figure>
                    <div class="feature-caption">
                        <i class="fs-2 text-white fas fa-dumbbell"></i>
                        <p class="fs-3 text-white">
                            Build Muscle
                        </p>
                    </div>
              
            </div>

            <div class="col-md-4 col-sm-12 feature-box">
              
                    <figure>
                        <img src="_resources/images/h.jpg" class="feature-img" alt="">
                    </figure>
                    <div class="feature-caption">
                        <i class="fs-2 text-white fas fa-utensils"></i>
                        <p class="fs-3 text-white">
                            Follow Diet
                        </p>
                    </div>
             
            </div>

            <div class="col-md-4 col-sm-12 feature-box">
        
                    <figure>
                        <img src="_resources/images/i.jpg" class="feature-img" alt="">
                    </figure>
                    <div class="feature-caption">
                        <i class="fs-2 text-white fas fa-running"></i>
                        <p class="fs-3 text-white">
                            Stay Fit
                        </p>
                    </div>
         
            </div>

        </div>
    </div>
    <!-- Features End -->

    <!-- Package Start -->
    <div class="container overflow-hidden">
        <div class="row g-4">

            <div class="col-12">
                <div class="p-3 text-center">
                    <h2 class="display-4">Our Packages</h2>
                    <hr class="feat-separator">
                    <p class="fs-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio asperiores incidunt quia nemo 
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="https://www.pngitem.com/pimgs/m/60-604793_gold-medal-png-olympic-gold-medal-clipart-transparent.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Gold Package</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">$ 1500.00</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="https://i.dlpng.com/static/png/6650051_preview.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Silver Package</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">$ 1000.00</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="https://www.pngitem.com/pimgs/m/7-78704_gold-medal-png-transparent-png.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Bronze Package</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">$ 500.00</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Package End -->

    <!-- Register Start -->
    <div class="container mb-3">
        <div class="row register-block p-5">
            <div class="col-6 mt-3 me-auto">
                <div class="reg-text text-white p-4">
                    <h3 class="display-5">Be a Member today</h3>
                    <p class="lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus numquam explicabo fuga.
                    </p>
                    <button class="btn btn-primary rounded-0">Register</button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Register End -->
<?php
    require_once "inc/footer.php";
?>

