<?php

include 'class/user.php';

$user = new User($_SESSION["account_id"]);

$account_id = $user->getAccountID();
$rest_username = $user->getRestUsername();

include 'class/restaurant.php';
$rest_id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$restaurant = new Restaurant($rest_id);
$rest_name = $restaurant->getRestname();

include 'class/review.php';
$review = new Review();

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
    .cards-box {
        display: flex;
        justify-content: space-between;
        margin: 0 70px;
        margin-top: 65px;
        flex-wrap: wrap;
    }
</style>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index-user.php">EATSTORIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index-owner.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="review-top-owner.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurant-top-owner.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypage-restaurant.php"><?php echo "$rest_username"; ?> </a></li>
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
        <div class="container px-5 my-5">
            <div class="row mt-5">
                <div class="col-6 mx-auto">
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
            <div class="text-center mb-5">
                <h2 class="fw-bolder"><i class="fas fa-hamburger"></i> Reviews</h2>
            </div>
            <div class="card-colums" id="all_posting">
            <div id="card-box" class="cards-box">
                <?php
                $review->displayReviewOnTopOwner();
                ?>
                </div>
            </div>
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