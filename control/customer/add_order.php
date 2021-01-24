<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/14/18
 * Time: 9:44 PM
 */
require_once '../../model/orders.php';

$obj=new orders();
$cust= filter_input(0, 'cust');
$eng= filter_input(0, 'eng');
$device= filter_input(0, 'dev');
$date= date("Y-m-d");

session_start();
$addedby=$_SESSION['u_id'];



if($obj->insert($cust,$eng,$device,$date,$addedby)){


echo $obj->get_max();


}