<?php

require_once '../../model/user.php';
$_name = filter_input(0, 'name');
$_pw = filter_input(0, 'pw');

$_uname = filter_input(0, 'username');
$_add = filter_input(0, 'add');
$_mob = filter_input(0, 'mob');
$email = filter_input(0, 'email1');


$_User = new User();

$_User->newUser($_name, $_mob, $email);

$_MaxID = $_User->MaxID();

$_pw=password_hash($_pw, PASSWORD_DEFAULT);


$_User->Login($_MaxID, $_uname, $_pw);


echo '<script>window.location.href="../../view/index.php"</script>';
//echo'<script>window.location.href="../../view/new_user.php"</script>';


// on all screens requiring login, redirect if NOT logged in

?>
