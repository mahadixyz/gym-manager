<?php
    require_once "../core/autoload.php";
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: ../signin.php");
    }
    require_once "inc/header.php";
    require_once "inc/nav.php";
?>
<div class="container-fluid overflow-hidden">
    <div class="row gx-2 mt-3">
        <div class="col-3">
            <div class="dashLeftMenu">
                <div class="accordion" id="dashNav">
                    <!-- Dashboard Home -->
                    <div class="accordion-item">
                        <a class="dashNavSingle dashNavTitle" href="#">
                            Dashboard
                        </a>
                    </div>

                    <!-- Member -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="member">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMember" aria-expanded="false" aria-controls="collapseMember">
                                <i class="me-2" data-feather="user"></i> Member
                            </button>
                        </h2>
                        <div id="collapseMember" class="accordion-collapse collapse" aria-labelledby="member" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="user-plus"></i> add member
                                </a>
                                <a class="dashNavItemSub no-border" href="#">
                                    <i class="me-2" data-feather="users"></i> view members
                                </a>
                               
                            </div>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="payment">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
                                <i class="me-2" data-feather="dollar-sign"></i> Payment
                            </button> 
                        </h2>
                        <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="payment" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="plus-circle"></i> add payment
                                </a>
                                <a class="dashNavItemSub no-border" href="#">
                                    <i class="me-2" data-feather="dollar-sign"></i> view payment records
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Report -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="report">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReport" aria-expanded="false" aria-controls="collapseReport">
                                <i class="me-2" data-feather="file-text"></i> Report
                            </button>
                        </h2>
                        <div id="collapseReport" class="accordion-collapse collapse" aria-labelledby="report" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="file-plus"></i> add
                                </a>
                                <a class="dashNavItemSub no-border" href="#">
                                    <i class="me-2" data-feather="file-text"></i> view 
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Notice -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="notice">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNotice" aria-expanded="false" aria-controls="collapseNotice">
                                <i class="me-2" data-feather="bell"></i> Notice
                            </button>
                        </h2>
                        <div id="collapseNotice" class="accordion-collapse collapse" aria-labelledby="notice" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="plus-circle"></i> add notice
                                </a>
                                <a class="dashNavItemSub no-border" href="#">
                                    <i class="me-2" data-feather="bell"></i> view all notice
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Site Settings -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="site">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSite" aria-expanded="false" aria-controls="collapseSite">
                                <i class="me-2" data-feather="sliders"></i> Site Settings
                            </button>
                        </h2>
                        <div id="collapseSite" class="accordion-collapse collapse" aria-labelledby="site" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="image"></i> Slider
                                </a>
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="navigation"></i> Menu  
                                </a>
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="alert-circle"></i> Offer
                                </a>
                                <a class="dashNavItemSub" href="#">
                                    <i class="me-2" data-feather="info"></i> Mission 
                                </a>
                                <a class="dashNavItemSub no-border" href="#">
                                    <i class="me-2" data-feather="phone"></i> Contact
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Signout -->
                    <div class="accordion-item">
                        <a class="dashNavSingle dashNavSignOut" href="../signout.php">
                            <i class="me-2" data-feather="log-out"></i> Signout
                        </a>
                    </div>
                    
                </div>
            </div>

            

        </div>

        <div class="col-md-9">
            <div class="border p-4">
                <h2 class="display-5">Dashboard</h2>
                <p class="lead">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati culpa deleniti velit repellendus qui placeat officia explicabo! Obcaecati sunt molestiae sequi, quae magnam at eum dolore. Harum quos ducimus error odio officiis, maxime laudantium eius accusantium at inventore odit enim libero tenetur tempora veritatis illum rerum! Voluptatem omnis laboriosam quidem ad adipisci accusamus nisi corrupti maxime quis. Repudiandae officia assumenda facilis quibusdam. Nemo iure repellat quo nostrum, quos consequuntur laudantium ab ut! Nisi, nam quae dignissimos illum natus quos dolorum ipsa tenetur vel voluptas repellendus fugiat quod. Unde alias optio molestiae! Voluptatibus nostrum, quos quibusdam debitis nemo veniam porro accusantium?
                </p>
                <p class="lead">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati culpa deleniti velit repellendus qui placeat officia explicabo! Obcaecati sunt molestiae sequi, quae magnam at eum dolore. Harum quos ducimus error odio officiis, maxime laudantium eius accusantium at inventore odit enim libero tenetur tempora veritatis illum rerum! Voluptatem omnis laboriosam quidem ad adipisci accusamus nisi corrupti maxime quis. Repudiandae officia assumenda facilis quibusdam. Nemo iure repellat quo nostrum, quos consequuntur laudantium ab ut! Nisi, nam quae dignissimos illum natus quos dolorum ipsa tenetur vel voluptas repellendus fugiat quod. Unde alias optio molestiae! Voluptatibus nostrum, quos quibusdam debitis nemo veniam porro accusantium?
                </p>
                <p class="lead">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati culpa deleniti velit repellendus qui placeat officia explicabo! Obcaecati sunt molestiae sequi, quae magnam at eum dolore. Harum quos ducimus error odio officiis, maxime laudantium eius accusantium at inventore odit enim libero tenetur tempora veritatis illum rerum! Voluptatem omnis laboriosam quidem ad adipisci accusamus nisi corrupti maxime quis. Repudiandae officia assumenda facilis quibusdam. Nemo iure repellat quo nostrum, quos consequuntur laudantium ab ut! Nisi, nam quae dignissimos illum natus quos dolorum ipsa tenetur vel voluptas repellendus fugiat quod. Unde alias optio molestiae! Voluptatibus nostrum, quos quibusdam debitis nemo veniam porro accusantium?
                </p>
            </div>            
        </div>
    </div>
</div>
</body>

</html>
<?php
    require_once "inc/footer.php";
?>