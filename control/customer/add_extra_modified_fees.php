<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 10/10/18
 * Time: 10:30 PM
 */

$id= filter_input(0, 'id');
$orderid= filter_input(0, 'order');
$price= filter_input(0, 'price');
$type= filter_input(0, 'type');
$qt = filter_input(0, 'qt');
require_once '../../model/db/UserDao.php';
$obj =new UserDao();


if ($obj->select_pending($id,$orderid)==null) {
    $result = $obj->insert('pending_finical_extra', array('productid' => $id, 'orderid' => $orderid, 'price' => $price,'quantity'=>$qt,'type'=>$type));
    if(!$result){
        echo -1;
    }
}
