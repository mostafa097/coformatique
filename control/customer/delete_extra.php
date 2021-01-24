<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 4:00 AM
 */

require_once '../../model/extraOrder.php';


$obj=new extraOrder();

$id=filter_input(0, 'id');
echo $obj->delete_tbl($id);