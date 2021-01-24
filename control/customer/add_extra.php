<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/17/18
 * Time: 11:22 PM
 */



require_once '../../model/db/UserDao.php';


$name=filter_input(0, 'name');
$rprice=filter_input(0, 'rprice');
$cprice=filter_input(0, 'cprice');
$aircond=filter_input(0, 'dev');
$obj=new UserDao();


if($obj->insert('extra',array('name'=>$name,'Rprice'=>$rprice,'Cprice'=>$cprice,'airCond'=>$aircond))){



    echo 1;

}

else{


    echo 0;

}
