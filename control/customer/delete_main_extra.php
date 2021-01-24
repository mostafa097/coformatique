<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/18/18
 * Time: 12:32 AM
 */

$id=filter_input(0, 'id');
require_once '../../model/db/UserDao.php';


$obj=new UserDao();


if($obj->delete_extra($id)){


    echo 1;


}

else{




    echo 0;


}