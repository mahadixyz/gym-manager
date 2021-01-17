<div class="col-3">
            <div class="dashLeftMenuUser">
                <div class="accordion" id="dashNavUser">
                    
                    <!-- Profile -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="profile">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                                <i class="me-2" data-feather="user"></i> Profile
                            </button>
                        </h2>
                        <div id="collapseProfile" class="accordion-collapse collapse" aria-labelledby="profile" data-bs-parent="#dashNavUser">
                            <div class="accordion-body">
                                <a class="dashNavItemSub" href="../user/user-profile.php">
                                    <i class="me-2" data-feather="info"></i> View Profile
                                </a>
                                <a class="dashNavItemSub no-border" href="../user/user-update-profile.php">
                                    <i class="me-2" data-feather="rotate-ccw"></i> update profile
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
                        <div id="collapseNotice" class="accordion-collapse collapse" aria-labelledby="notice" data-bs-parent="#dashNavUser">
                            <div class="accordion-body">                                
                                <a class="dashNavItemSub no-border" href="view-usr-notice.php">
                                    <i class="me-2" data-feather="bell"></i> view my notice
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