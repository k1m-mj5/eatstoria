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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">EATSTORIA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="review-top.php">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurant-top.php">Restaurants</a></li>
                    <li class="nav-item"><a class="nav-link" href="mypage-user.php">{username}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">LOGOUT</a></li>
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
                        <h1 class="display-5 fw-bolder text-white mb-2">Delicious story at EATSTORIA</h1>
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
            <form action="" method="POST">
                <div class="mt-3">
                    <label for="restname" class="form-label">Restaurant Name</label>
                    <br>
                    <select name="restname" id="restname" class="form-select">
                        <option disabled selected>Choose Restaurant</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-6 mt-3">
                        <label for="menu" class="form-label">Menu</label>
                        <input type="text" name="menu" id="" class="form-control">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="menu" class="form-label">The way</label>
                        <select name="" id="way" class="form-select">
                            <option disabled selected>Choose the way</option>
                            <option value="1">Eat In</option>
                            <option value="2">Take Out</option>
                            <option value="3">Delivery</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="rate" class="form-label">Rate</label>
                    <br>
                    <select name="rate" id="stars" class="form-select w-100">
                        <option disabled selected>☆☆☆☆☆</option>
                        <option value="1">★☆☆☆☆</option>
                        <option value="2">★★☆☆☆</option>
                        <option value="3">★★★☆☆</option>
                        <option value="4">★★★★☆</option>
                        <option value="5">★★★★★</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Image Upload</span>
                    </div>
                    <div class="rest-file">
                        <input type="file" class="custom-file-input" id="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        Username
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Posted Date</span>
                            </div>
                            <input type="date" class="form-control" id="">
                        </div>
                    </div>

                </div>
                <input type="submit" value="POST" name="post" id="post"
                    class="btn btn-block btn-warning text-light mt-3 w-100">
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