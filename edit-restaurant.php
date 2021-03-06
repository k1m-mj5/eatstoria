<?php

include 'class/user.php';

$user = new User($_SESSION["account_id"]);

$rest_username = $user->getRestUsername();


include 'class/restaurant.php';

$rest_id = isset($_GET["id"]) ? $_GET["id"] : NULL;

$restaurant = new Restaurant($rest_id);

$rest_id = $restaurant->getRestID();
$rest_name = $restaurant->getRestname();
$description = $restaurant->getDescription();
$location = $restaurant->getLocation();
$telephone = $restaurant->getTelephone();
$open_hour = $restaurant->getOpenhour();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>EATSTORIA</title>
    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
        body {
            font-family: 'Roboto', sans-serif;
        }
</style>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index-owner.php">EATSTORIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index-owner.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="review-top-owner.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurant-top-owner.php">Restaurants</a></li>
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
        <div class="row">
            <div class="col-4 mx-auto">
                <?php
                if (isset($_SESSION["success"]) && isset($_SESSION["message"])) {
                    
                    $class = ($_SESSION["success"] == 1) ? "success" : "danger";
                    $message = $_SESSION["message"];

                    unset($_SESSION["success"]);
                    unset($_SESSION["message"]);
                ?>

                    <div class="alert alert-<?php echo $class; ?>" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="container px-5 my-5">
            <form action="action/edit-restaurant.php" method="POST">
                <input type="id" name="rest_id" value="<?php echo $rest_id; ?>" hidden>
                <div class="mt-3">
                    <label for="restname" class="form-label">Restaurant Name</label>
                    <input type="text" name="restname" value="<?php echo $rest_name; ?>" class="form-control" required="required">
                </div>
                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" value="<?php echo $description; ?>" class="form-control" required="required">
                </div>
                <div class="mt-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" value="<?php echo $location; ?>" class="form-control" required="required">
                </div>
                <div class="mt-3">
                    <label for="openinghours" class="form-label">Opening hours</label>
                    <input type="text" name="openinghours" value="<?php echo $open_hour; ?>" class="form-control" required="required">
                </div>
                <div class="mt-3">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" name="telephone" value="<?php echo $telephone; ?>" class="form-control" required="required">
                </div>

                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Image Upload</span>
                    </div>
                    <div class="rest-file">
                        <input type="file" class="custom-file-input" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-4">
                        <input type="submit" value="EDIT" name="edit" id="edit" class="btn btn-block btn-info text-light mt-3 w-100">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="DELETE" name="delete" id="delete" class="btn btn-block btn-outline-danger mt-3 w-50">
                    </div>
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