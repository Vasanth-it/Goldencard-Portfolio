<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Username or Email has Already taken');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
                "<script> alert('Registration Successful');</script>";
        } else {
            echo
                "<script> alert('Password doesnot match');</script>";
        }

    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href=".\index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/premium-vector/sv-letter-logo-design-black-background-initial-monogram-letter-sv-logo-design-vector-template_634196-1210.jpg">
    <style>
        /*linear-gradient(rgba(0,0,0,0.50),rgba(0,0,0,0.50)),*/
        body{
            color:#ffffff;
            background-image:  url("https://media.istockphoto.com/id/1063685792/photo/gradient-with-black-pearl-blue-color-modern-texture-background-degrading-fragments-smooth.jpg?b=1&s=170667a&w=0&k=20&c=xj6kzSRSmUnr6_4_AdjN5h6q327CZlL5AqPo7ImAVhk=");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="container-fluid col-10">
        <section id="register">
            <div class="col-lg-4 col-md-6 col-12">
                <div class=" mb-3 alert alert-info text-center" role="alert">
                    <h2 class="py-lg-1 py-3">Registration</h2>
                </div>

                <form class="" action="" method="post" autocomplete="off">

                    <div class="mb-3">
                        <label class="form-label" for="name">Name: </label>
                        <input class="form-control" type="text" name="name" id="name" required value=""> <br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username: </label>
                        <input class="form-control" type="text" name="username" id="username" required value=""> <br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email: </label>
                        <input class="form-control" type="email" name="email" id="email" required value=""> <br>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password: </label>
                            <input class="form-control" type="password" name="password" id="password" required value="">
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="confirmpassword">Confirm password: </label>
                                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword"
                                    required value=""> <br>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary position-relative" type="submit"
                                    name="submit">Register</button>
                            </div>


                </form>
                <a href=".\login.php">Login</a>
            </div>
        </section>
    </div>

</body>

</html>