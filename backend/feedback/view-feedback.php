<?php
require_once "../../core/autoload.php";
require_once "../../core/dashboard.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../signin.php");
}

$_SESSION['pageTitle'] = "View All Feedback";
require_once "../inc/be-header.php";

if (isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin') {
    require_once "../inc/be-nav-admin.php";
} else {
    require_once "../inc/be-nav-user.php";
}

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['page']) && $_GET['page'] < 1) {
    $page = 1;
}


?>
<div class="container-fluid overflow-hidden mb-5">
    <div class="row gx-2 mt-3">
        <?php
        if (isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin') {
            require_once "../inc/be-sidenav-admin.php";
        } else {
            require_once "../inc/be-sidenav-user.php";
        }
        ?>

        <div class="col-md-9">
            <div class="border p-4">

                <h2 class="display-5 mb-4">All Feedback</h2>
                <?php
                if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                ?>
                    <div class="alert alert-success py3">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php
                }
                ?>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $feedback = new Dashboard;
                        $result = $feedback->viewFeedback();


                        if ($result != false) {
                            $counter = 1;
                            foreach ($result as $data) 
                            {

                        ?>
                                <tr>
                                    <th scope="row"><?= $counter ?></th>
                                    <td><?= $data->feedback_name ?></td>
                                    <td><?= $data->feedback_subject ?></td>
                                    <td><?= $data->feedback_text ?></td>
                                    <td>
                                        <button class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#feedbackModal"> 
                                            <i data-feather="eye"></i> 
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="feedbackModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="feedbackModalLabel">
                                                    Subject: <?= $data->feedback_subject ?>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col">
                                                        <div class="border p-3">
                                                            <h5 class="h5"> <span class="text-primary">Sender:</span> <?= $data->feedback_name ?></h5>

                                                            <h6 class="h6 text-muted">Email: <?= $data->feedback_mail ?></h6>
                                                            
                                                            <hr>
                                                            
                                                            <strong class="text-primary">Feedback:</strong>

                                                            <p class="lead">
                                                                 <?= $data->feedback_text ?>
                                                            </p>
                                                        </div>                                                        
                                                    </div>

                                                    <div class="col">

                                                        <div class="border p-3">
                                                            <h5 class="display-6 text-success">Send a Reply</h5>
                                                            
                                                            <form action="" method="post">

                                                                <div class="mb-2">
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control rounded-0" placeholder="Write a reply here" name="reply" id="reply" style="height: 100px"></textarea>
                                                                        <label for="reply">Reply</label>
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-success rounded-0">Send</button>

                                                            </form>
                                                        </div>

                                                        
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-danger rounded-0" data-bs-dismiss="modal">Close</button>      

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php
                                $counter++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No Data Found</td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require_once "../inc/be-footer.php";
?>