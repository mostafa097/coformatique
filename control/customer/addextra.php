<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 2:57 AM
 */

require_once '../../model/extraOrder.php';



$order=filter_input(0, 'order');
$extra=filter_input(0, 'extra');
$quantity=filter_input(0, 'quan');

$obj=new extraOrder();


if($obj->insert($order,$extra,$quantity)){
	
    echo 1;


}else{


    echo 0;

}