<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 11/17/18
 * Time: 4:33 PM
 */

require_once '../../model/db/UserDao.php';



$obj=new UserDao();

$orderId=filter_input(0, 'id');


$result=$obj->Select('orders',$orderId);

echo $result[3];