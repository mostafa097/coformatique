<?php

require_once '../../model/technicalOrders.php';
require_once '../../model/db/UserDao.php';

$obj=new technicalOrders();

$zone_id= filter_input(0, 'zone');
$level= filter_input(0, 'level');
$quantity= filter_input(0, 'quan');
$area= filter_input(0, 'area');
$modelid= filter_input(0, 'model');
$size= filter_input(0, 'size');
$cust_id= filter_input(0, 'cust');
$eng_id= filter_input(0, 'eng');
$order= filter_input(0, 'order');
$factor= filter_input(0, 'factor');
$con= filter_input(0, 'conHeater');




if($result=$obj->insert($zone_id,$area,$quantity,$modelid,$size,$level,$order,$factor,$con)){

	//$MaxID = $UserDao->SelectMaxID('orders');
	


echo $obj->get_max();



}else{



    echo 0;


}