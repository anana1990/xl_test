<?php
require __DIR__.'/Users.php';



//Create new account
if (isset($_POST['register_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = new Users();

    $fullname = $_POST['firstname'];
    $username = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [
        'email' => $email,
        'password' => $password,
        'firstname' => $fullname,
        'lastname' => $username
    ];


    $resp = $user->createAccount($data);
    echo json_encode($resp);
    exit();
}

//Login User
if (isset($_POST['login_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $user = new Users();

    $username = $_POST['email'];
    $password = $_POST['password'];

    $resp = $user->loginUser($username, $password);
    echo json_encode($resp);
    exit();

}

if (isset($_POST['logoutUser'])) {

    $user = new Users();
    $resp = $user->logout();
    echo json_encode($resp);
    exit();

}