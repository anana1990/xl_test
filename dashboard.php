<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
}
?>

<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>


<body>

<div class="jumbotron">
    <h1 class="display-4">WELCOME TO XL AFRICA GROUP DASHBOARD</h1>
    <h3 class="lead"><?php echo ($_SESSION["name"]) ?></h3>
    <hr class="my-4">
    <p><?php echo ($_SESSION["email"]) ?></p>
    <a onclick="logout()" class="btn btn-primary btn-lg" href="#" role="button">LOGOUT</a>
</div>

<script src="script.js"></script>

</body>

</html>

