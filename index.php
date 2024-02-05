<?php
// product insert karne ka setup
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ajaxcrud';
$con = new mysqli($serverAddress, $username, $password, $dbname);

// wo wala data extact kara ka liya jo js ki file ma upload kiya ha
extract($_POST);



if (isset($_POST['studentname']) && isset($_POST['studentclass']) && isset($_POST['studentemail']) && isset($_POST['studentimage'])) {

    $insert = "INSERT INTO `student`(`image`, `name`, `class`, `email`)
     VALUES ('$studentimage','$studentname','$studentclass','$studentemail')";

    if ($con->query($insert) == TRUE) {
        echo 'ok';
    } else {
        echo 'no';
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Performing CRUD opearation using ajax and php</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row page1">
            <h1>Performing CRUD using Ajax</h1>
            <div class="box">
                <div class="line">

                    <h1>All Records</h1>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enter New
                    </button>
                    <!--New Student ki entry ka liya Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="name" class="form-control" placeholder="name">
                                        </div>
                                        <div class="col">
                                            <input type="text" id="class" class="form-control" placeholder="Class">
                                        </div>
                                    </div>
                                    <div class="row" style="height: 2vh;"></div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="col">
                                            <input type="file" id="image" class="form-control"
                                                placeholder="choose image">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="addrecord()" class="btn btn-primary"
                                        data-bs-dismiss="modal">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- purane student ka data update karne ka liya -->
                    <div class="modal fade" id="update_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Account</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <input type="text" id="update_name" class="form-control" placeholder="update_name">
                                        </div>
                                        <div class="col">
                                            <input type="text" id="update_class" class="form-control" placeholder="update_Class">
                                        </div>
                                    </div>
                                    <div class="row" style="height: 2vh;"></div>

                                    <div class="row">
                                        <div class="col">
                                            <input type="email" id="update_email" class="form-control" placeholder="update_Email">
                                        </div>
                                        <div class="col">
                                            <input type="file" id="image" class="form-control"
                                                placeholder="choose image">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" onclick="updateuserdetail()" class="btn btn-primary"
                                        data-bs-dismiss="modal">
                                        Save changes
                                    </button>
                                    <input type="hidden" id="hidden_User_id">
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <div id="records_contant"></div>

            </div>
        </div>
    </div>
    </div>






    </div>
    </div>
    <!-- Use jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>