<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/18/18
 * Time: 12:13 AM
 */


require_once '../../model/db/UserDao.php';



$aircond=filter_input(0, 'dev');
$obj=new UserDao();


$result=$obj->get_tbl_extra_byaircond($aircond);


for($i=0;$i<count($result);$i++){

    echo $result[$i];


}