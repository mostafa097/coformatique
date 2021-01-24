<?php

require_once '../model/Login.php';
$_Uname= filter_input(0, 'uname');
$_password= filter_input(0,'password');
$_password=password_hash($_password, PASSWORD_DEFAULT);

$_Login=new Login($_Uname,$_password);

$_EmpData=$_Login->GetUser();


if($_Login)
{
    echo'<script>window.location.href="../view/home.php"</script>';


}
else{
    echo '<script>alert("invalid username or password!!")</script>';
    echo'<script>window.location.href="../view/index.php"</script>';

}



// on all screens requiring login, redirect if NOT logged in

?>
