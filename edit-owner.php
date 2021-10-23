<?php

include 'class/user.php';

$user = new User($_SESSION["account_id"]);
$account_id = $user->getAccountID();
$rest_username = $user->getRestUsername();
$email = $user->getEmail();

include 'class/restaurant.php';

$restaurant = new Restaurant();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>EATSTORIA</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">EATSTORIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index-owner.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="review-top.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurant-top.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypage-restaurant.php"><?php echo "$rest_username"; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-warning py-1">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Delicious story at <span class="display-4 lead" style="text-shadow: 2px 8px 6px rgba(0,0,0,0.2), 0px -3px 20px rgba(255,255,255,0.4);">EATSTORIA</span></h1>
                        <p class="lead text-dark-50 mb-4">Share and Enjoy Together!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 border-bottom" id="features">
        <div class="container px-5 my-5 w-75">
            <div>
                <?php
                    if(isset($_SESSION["success"]) && ($_SESSION["message"])){
                        $class=($_SESSION["success"] == 0) ? "danger" : "success";
                        $message=($_SESSION["message"]);

                        unset($_SESSION["success"]);
                        unset($_SESSION["message"]);
                ?>    
                    <div class='alert alert-<?php echo $class; ?>' role='alert'>
                    <?php echo "$message"; ?>
                    </div>
                <?php
                }    
                ?>
            </div>
            <h4 class="mb-3">Edit Owner Account</h4>
            <form action="action/edit-owner.php" method="POST">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="restusername" value="<?php echo "$rest_username"; ?>" required="required">
                </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" value="<?php echo "$email"; ?>" required="required">
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group mb-3">
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                </div>
                <input type="submit" value="EDIT" name="edit" id="edit" class="btn btn-block btn-success text-light mt-3 mb-3 w-100">
                <div class="form-group mb-3">
                <a href="add-restaurant.php" class="btn btn-block btn-warning mt-3">Add Restaurant</a>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Restaurant ID</th>
                                <th scope="col">Restaurant Name</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            if($_SESSION["role"]=="R"){
                                $restaurant->displayRestListOnEdit($_SESSION["account_id"]);
                            } else {
                                header ("Location:../index.php");
                            }
                          ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; My Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>