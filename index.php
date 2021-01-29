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
<?php
    require_once "inc/footer.php";
?>

