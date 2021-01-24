<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 10/10/18
 * Time: 10:49 PM
 */

$id= filter_input(0, 'product');
$orderid= filter_input(0, 'order');
$price= filter_input(0, 'price');
require_once '../../model/db/UserDao.php';
$obj =new UserDao();
echo $obj->edit_pending_finicial_extra($id,$orderid,$price);