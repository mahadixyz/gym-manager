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
    <div class="container overflow-hidden my-3 pt-5" id="package">
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
                    <img src="_resources/images/pkg-gold.png" class="card-img-top" alt="...">                    
                    <div class="card-body">
                        <h5 class="card-title">Gold Package</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">$ 1500.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card mb-3">
                    <img src="_resources/images/pkg-silver.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Silver Package</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">$ 1000.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="card mb-3">
                    <img src="_resources/images/pkg-bronze.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bronze Package</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">$ 500.00</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Package End -->

    <!-- Register Start -->
    <div class="container my-3 pt-5" id="join">
        <div class="row register-block p-5">
            <div class="col-6 mt-3 me-auto">
                <div class="reg-text text-white p-4">
                    <h3 class="display-5">Be a Member today</h3>
                    <p class="lead">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus numquam explicabo fuga.
                    </p>
                    <a href="signup.php" class="btn btn-primary rounded-0">Register</a>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Register End -->

    <!-- Contact Start -->
    <div class="container my-3 pt-5" id="contact">

            <div class="col-12">
                <div class="p-3 text-center">
                    <h2 class="display-4">Contact Us</h2>
                    <hr class="feat-separator">
                    <p class="fs-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio asperiores incidunt quia nemo 
                    </p>
                </div>
            </div>

        <div class="row p-5">

            <div class="col-md-6 col-sm-12">   
                <p class="fs-3 text-center">Send a message</p>

                <?php
                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
                ?>
                <div class="alert alert-success py3">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
                <?php
                    }
                    else if(isset($_SESSION['error']) && $_SESSION['error'] != '')
                    {
                ?>
                <div class="alert alert-warning py3">
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
                <?php
                    }
                ?>


                <form action="process/feedback.php" method="POST">
                    <div class="row mb-3">
                        
                        <div class="col">

                            <div class="form-floating">
                                <input type="text" class="form-control rounded-0" id="fullName" name="fname" placeholder="John Doe">
                                <label for="fullName">Your Name</label>
                            </div>
                            
                        </div>

                        <div class="col">

                            <div class="form-floating">
                                <input type="email" class="form-control rounded-0" id="emailAddress" name="mail" placeholder="name@example.com">
                                <label for="emailAddress">Email address</label>
                            </div>

                        </div>

                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select rounded-0" id="subject" name="subject" aria-label="Floating label select">
                            <option selected disabled>Select Subject</option>
                            <option value="Inquiry">Inquiry</option>
                            <option value="Complain">Complain</option>
                            <option value="General">General</option>
                        </select>
                        <label for="subject">Subject</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control rounded-0" placeholder="Leave a comment here" id="feedback" name="feedback" style="height: 100px"></textarea>
                        <label for="feedback">Message</label>
                    </div>

                    <button class="btn btn-primary rounded-0" name="feedbackBtn">Send</button>

                </form>
            </div>

            <div class="col-md-6 col-sm-12">  
                <p class="fs-3 text-center">Come visit us</p>
                
                <div id="map"></div>

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>    
                
                <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script> 
                <script>
                    var mymap = L.map('map').setView([23.793392, 90.407781], 14);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2FkcmVnIiwiYSI6ImNra210aTNwdTJ1YjUybm1ubG91Ym9vd2kifQ.ce1BHreWT8jrOyIR2Y1uow', 
                    {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(mymap);

                    var marker = L.marker([23.793392, 90.407781]).addTo(mymap);
                </script>  

            
            </div>

        </div>
    </div>
    <!-- Contact End -->

<?php
    require_once "inc/footer.php";
?>

