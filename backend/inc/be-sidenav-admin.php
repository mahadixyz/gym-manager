<div class="col-3">
            <div class="dashLeftMenu">
                <div class="accordion" id="dashNav">                 

                    <!-- Member -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="member">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMember" aria-expanded="false" aria-controls="collapseMember">
                                <i class="me-2" data-feather="user"></i> Member
                            </button>
                        </h2>
                        <div id="collapseMember" class="accordion-collapse collapse" aria-labelledby="member" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                
                                <a class="dashNavItemSub" href="../member/add-member.php">
                                    <i class="me-2" data-feather="user-plus"></i> add member
                                </a>
                                <a class="dashNavItemSub no-border" href="../member/members.php">
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
                                
                                <a class="dashNavItemSub no-border" href="../payment/view-invoices.php">
                                    <i class="me-2" data-feather="file-text"></i> View unpaid Invoice
                                </a>
                                <a class="dashNavItemSub" href="../payment/add-payment.php">
                                    <i class="me-2" data-feather="plus-circle"></i> Add payment
                                </a>
                                <a class="dashNavItemSub no-border" href="../payment/view-payment.php">
                                    <i class="me-2" data-feather="dollar-sign"></i> View payment records
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Packages -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="package">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePackage" aria-expanded="false" aria-controls="collapsePackage">
                                <i class="me-2" data-feather="box"></i> Packages
                            </button>
                        </h2>
                        <div id="collapsePackage" class="accordion-collapse collapse" aria-labelledby="package" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                
                                <a class="dashNavItemSub" href="../package/add-package.php">
                                    <i class="me-2" data-feather="plus"></i> Add package
                                </a>
                                <a class="dashNavItemSub no-border" href="../package/view-packages.php">
                                    <i class="me-2" data-feather="package"></i> View packages
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
                                <a class="dashNavItemSub" href="../report/add-report.php">
                                    <i class="me-2" data-feather="file-plus"></i> Add report
                                </a>
                                <a class="dashNavItemSub no-border" href="../report/view-reports-all.php">
                                    <i class="me-2" data-feather="file-text"></i> View all reports
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
                                <a class="dashNavItemSub" href="../notice/add-notice.php">
                                    <i class="me-2" data-feather="plus-circle"></i> Add notice
                                </a>
                                <a class="dashNavItemSub no-border" href="../notice/view-notice.php">
                                    <i class="me-2" data-feather="bell"></i> View all notice
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Feedback -->
                    <div class="accordion-item">
                        <a class="dashNavSingle dashFeedback"  href="../feedback/view-feedback.php">
                            <i class="me-2" data-feather="message-square"></i> Feedback
                        </a>                        
                    </div>

                    <!-- Site Settings -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="site">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSite" aria-expanded="false" aria-controls="collapseSite">
                                <i class="me-2" data-feather="image"></i> Image Slider
                            </button>
                        </h2>
                        <div id="collapseSite" class="accordion-collapse collapse" aria-labelledby="site" data-bs-parent="#dashNav">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="../site/add-slider.php">
                                    <i class="me-2" data-feather="plus-circle"></i> Add Slider
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Signout -->
                    <div class="accordion-item">
                        <a class="dashNavSingle dashNavSignOut" href="../../signout.php?signout=true">
                            <i class="me-2" data-feather="log-out"></i> Signout
                        </a>
                    </div>
                    
                </div>
            </div>

            

        </div>