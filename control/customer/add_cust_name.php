<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/5/18
 * Time: 5:41 PM
 */



require_once '../../model/db/UserDao.php';
$obj=new UserDao();
$name=filter_input(0, 'name');
if ($obj->insert('customer',array('name'=>$name))){





echo $obj->SelectMaxID('customer');



}