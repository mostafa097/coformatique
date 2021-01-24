<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 4:41 AM
 */


require_once '../../model/extraOrder.php';

$obj=new extraOrder();

$id=filter_input(0, 'id');
$extra=filter_input(0, 'extra');
$quan=filter_input(0, 'quan');
echo $obj->update_extra($id,$extra,$quan);