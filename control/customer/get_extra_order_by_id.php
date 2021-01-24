<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 4:16 AM
 */

;

require_once '../../model/extraOrder.php';


$obj=new extraOrder();
$id=filter_input(0, 'id');
$result=$obj->get_all_by_id($id);


for($i=0;$i<count($result);$i++){

    echo $result[$i];


}