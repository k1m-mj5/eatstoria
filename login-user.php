<?php

session_start();
if (isset($_SESSION["role"]) && $_SESSION["role"] == "A") {
    header("Location: index.php");
} elseif (isset($_SESSION["role"]) && $_SESSION["role"] == "U") {
    header("Location: mypage-user.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h1 {
            color: #fbbd07;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
            text-shadow: 2px 8px 6px rgba(0, 0, 0, 0.2), 0px -3px 20px rgba(255, 255, 255, 0.4)
        }

        .signup-form h1:before {
            left: 0;
        }

        .signup-form h1:after {
            right: 0;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before,
        .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #532a2a;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
    </header>

<body>
<div class="signup-form">
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
        <h1>EATSTORIA</h1>
        <h2 class=mb-5>Login</h2>
        <form action="action/login-user.php" method="POST">
            <div class="form-group">
                <input type="username" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <input type="submit" value="LOGIN" name="submit" class="btn btn-warning btn-block text-light font-weight-bold">
            </div>
            <div class="text-center text-secondary font-weight-bold">Forget your password?
                <a href="#" class="text-decoration-none"> Click here</a>
            </div>
            <div class="text-center text-danger font-weight-bold mt-3">Owner Login
                <a href="login-owner.php" class="text-decoration-none"> Click here</a>
            </div>
        </form>
    </div>
</body>

</html>