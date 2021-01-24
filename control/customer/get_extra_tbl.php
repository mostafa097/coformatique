<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 3:23 AM
 */

require_once '../../model/extraOrder.php';
$obj=new extraOrder();

$order=filter_input(0, 'order');

$result=$obj->get_data($order);



for($i=0;$i<count($result);$i++){

    echo $result[$i];


}