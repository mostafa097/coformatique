<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/21/18
 * Time: 6:17 PM
 */
require_once '../../model/technicalOrders.php';
$obj=new UserDao();

$zone_id= filter_input(0, 'zone');
$level= filter_input(0, 'level');
$quantity= filter_input(0, 'quan');
$area= filter_input(0, 'area');
$modelid= filter_input(0, 'model');
$size= filter_input(0, 'size');
$cust_id= filter_input(0, 'cust');
$eng_id= filter_input(0, 'eng');
$id= filter_input(0, 'id');
$factor= filter_input(0, 'factor');


echo $obj->update_tech_order($zone_id,$area,$quantity,$modelid,$size,$level,$factor,$id);

