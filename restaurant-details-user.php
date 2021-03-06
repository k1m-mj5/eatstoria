<?php

include 'class/user.php';

$user = new User($_SESSION["account_id"]);

$account_id = $user->getAccountID();
$username = $user->getUsername();

include 'class/restaurant.php';

$rest_id = isset($_GET["id"]) ? $_GET["id"] : NULL;

$restaurant = new Restaurant($rest_id);
$rest_id = $restaurant->getRestID();
$rest_name = $restaurant->getRestname();
$description = $restaurant->getDescription();
$location = $restaurant->getLocation();
$telephone = $restaurant->getTelephone();
$open_hour = $restaurant->getOpenhour();

include 'class/menu.php';

$menu = new Menu();

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
                    <li class="nav-item"><a class="nav-link" href="review-top-user.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="restaurant-top-user.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypage-user.php"><?php echo "$username"; ?></a></li>
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
                        //Input
                        $class = ($_SESSION["success"] == 1) ? "success" : "danger";
                        $message = $_SESSION["message"];

                        //Delete session variables
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
            <div class="card mx-auto">
                <input type="id" name="rest_id" value="<?php echo $rest_id; ?>" hidden>
                <img class="card-img-bottom img-fluid" src="https://thumbs.dreamstime.com/t/modern-cafe-interior-empty-no-people-cafeteria-furniture-sketch-doodle-horizontal-vector-illustration-147680028.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center display-5"><?php echo $rest_name; ?></h5>
                    <p class="card-text text-center"><?php echo $description; ?></p>
                    <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <a href="review-rest-user.php?id=<?php echo $rest_id ?>" class="btn btn-success w-100">Reviews</a>
                    </div>
                    <div class="col-3">
                        <a href="add-review.php?id=<?php echo $rest_id ?>" class="btn btn-outline-success w-100">Leave a Review</a>
                    </div>
                    </div>
                    <p class="mt-5"><i class="fas fa-info-circle"></i> Restaurant Information</p>
                    <ul>
                        <li>Location: <?php echo $location; ?></li>
                        <li>Opening hours: <?php echo $open_hour; ?></li>
                        <li>Telephone: <?php echo $telephone; ?></li>
                    </ul>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <a href="add-order.php?id=<?php echo $rest_id ?>" class="btn btn-warning w-100"> ORDER</a>
                        </div>
                    </div>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Price(USD)</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $menu->displayMenuOnDetailsUser($rest_id);
                            ?>
                        </tbody>
                    </table>
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