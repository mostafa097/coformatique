<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 11/17/18
 * Time: 5:18 PM
 */


require_once '../../model/db/UserDao.php';
$orderId=filter_input(0, 'id');

$obj=new UserDao();
echo $orderId;
echo $obj->update_order_statues($orderId);