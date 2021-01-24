<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/21/18
 * Time: 4:19 PM
 */

require_once '../../model/db/UserDao.php';
$id=filter_input(0, 'id');
$obj=new UserDao();



echo $obj->Delete('technicalorder',$id);
