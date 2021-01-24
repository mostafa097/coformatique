<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 10/10/18
 * Time: 10:30 PM
 */

$size = filter_input(0, 'size');
$orderid = filter_input(0, 'order');

$con = filter_input(0, 'cond');
$type = filter_input(0, 'type');
$qt = filter_input(0, 'qt');
require_once '../../model/db/UserDao.php';
$obj = new UserDao();

$result = -1;
$product_result = $obj->get_product_for_extra_tbl($size);
//print_r($product_result);

if ($product_result) {

    for ($i = 0; $i < count($product_result); $i++) {

        $arr = explode("~", $product_result[$i]);


        if ($obj->select_pending($arr[0], $orderid) == null) {
            $result = $obj->insert('pending_finical_extra', array('productid' => $arr[0], 'orderid' => $orderid, 'price' => $arr[1], 'quantity' => $qt, 'type' => $type));

        }
        if ($result < 0) {
            echo "-1";
        }


    }


}

