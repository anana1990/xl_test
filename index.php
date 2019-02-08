<?php
session_start();

if (isset($_SESSION['email'])) {
    header("location:chat.php");
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<div class="container">
    <div class="row">
        <div ="row">
            <h1>LOGIN / SIGN IN PAGE</h1>
        </div>
        <div class="col-md-12 mx-auto row">
            <div id="first" class="col-md-6">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>LOGIN</h1>
                        </div>
                    </div>
                    <form id="login_form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input required type="email" name="email"  class="form-control" id="email_u" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input required type="password" name="password" id="password_u"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                        <input type="hidden" name="login_user" value="1">
                        <div class="col-md-12 text-center ">
                            <button id="login_btn" type="button" onclick="signIn()" class=" btn btn-block mybtn btn-primary tx-tfm">LOGIN</button>
                        </div>
                    </form>

                </div>
            </div>
            <div id="second" class="col-md-6">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 >REGISTER</h1>
                        </div>
                    </div>
                    <form id="registration_form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                        </div>
                        <input type="hidden" name="register_user" value="1">
                        <div class="col-md-12 text-center mb-3">
                            <button id="register_btn" onclick="register()" type="button" class=" btn btn-block mybtn btn-primary tx-tfm">REGISTER</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>

</body>

</html>

<!--require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/php-tutorial-2830e-a5f046b0f63f.json');

$fire_base = (new Factory)
->withServiceAccount($serviceAccount)
->withDatabaseUri('https://php-tutorial-2830e.firebaseio.com/')
->create();

$database = $fire_base->getDatabase();

die(print_r($database));-->
