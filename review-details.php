<?php

include 'class/user.php';

$user = new User($_SESSION["account_id"]);

// $account_id = $user->getAccountID();
$username = $user->getUsername();


include 'class/review.php';

$review_id = isset($_GET["id"]) ? $_GET["id"] : NULL;

$review = new Review($review_id);

$rest_id = $review->getRestID();
$rest_name = $review->getRestName();
$menu_id = $review->getMenuID();
$menu_title = $review->getMenuTitle();
$way = $review->getWay();
$rating = $review->getRating();
$message = $review->getMessage();
$date_posted = $review->getDatePosted();

$reviewer = new User($review->getAccountID());

$account_id = $reviewer->getAccountID();
$reviewer_username = $reviewer->getUsername();

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
            <a class="navbar-brand" href="index-user.php">EATSTORIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index-user.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="review-top-user.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurant-top-user.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypage-user.php"><?php echo "$username"; ?> </a></li>
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
        <form action="" method="POST">
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
                <input type="id" name="review_id" value="<?php echo $review_id; ?>" hidden>
                <input type="id" name="rest_id" value="<?php echo $rest_id; ?>" hidden>
                <div class="card w-50 mx-auto">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                        <h5 class="card-title display-6"><?php echo "$rest_name"; ?></h5></div>
                        <div class="col-6">
                        <a class="text-decoration-none text-primary" href="restaurant-details-user.php?id=<?php echo $rest_id ?>">Visit Restaurant Page <i class='bi bi-arrow-right'></i></a></div>
                        </div>
                        <p class="card-text">Menu: <?php echo "$menu_title"; ?></p>
                        <p class="card-text">Way: <?php echo "$way"; ?></p>
                        <p class="card-text"><i class='fas fa-star'></i> Rating: <?php echo "$rating"; ?></p>
                        <p class="card-text"><?php echo "$message"; ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo "$date_posted"; ?> by <?php echo "$reviewer_username"; ?></small></p>
                    </div>
                    <img class="card-img-bottom img-fluid" src="https://images.all-free-download.com/images/graphicthumb/food_drink_icons_colored_calssical_sketch_6844405.jpg" alt="Card image cap">
                </div>
                <div class="row mt-5 mb-3">
                    <div class="col-3"></div>
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                    <a href="edit-review.php?id=<?php echo $review_id; ?>" class="btn btn-block btn-outline-info w-100">Edit Review</a>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </form>
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