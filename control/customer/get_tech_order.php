<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/21/18
 * Time: 3:46 PM
 */







require_once '../../model/db/UserDao.php';

$obj=new UserDao();
$order = filter_input(0, 'id');

if ($result=$obj->get_alltect($order)){



    for($i=0;$i<count($result);$i++){

        echo $result[$i];


    }





}



?>