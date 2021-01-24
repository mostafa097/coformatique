<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/21/18
 * Time: 4:34 PM
 */



require_once '../../model/db/UserDao.php';



$id=filter_input(0, 'id');
$obj=new UserDao();


$result=$obj->get_alltect_byid($id);


for($i=0;$i<count($result);$i++){

    echo $result[$i];


}