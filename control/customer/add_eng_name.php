<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/6/18
 * Time: 4:53 PM
 */


require_once '../../model/db/UserDao.php';
$obj=new UserDao();
$name=filter_input(0, 'name');
if ($obj->insert('engineer',array('name'=>$name))){





    echo $obj->SelectMaxID('engineer');



}