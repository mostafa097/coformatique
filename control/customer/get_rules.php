<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 11/11/18
 * Time: 7:26 PM
 */

$includeid = filter_input(0, 'include');

require_once '../../model/db/UserDao.php';
$obj = new UserDao();

$result = $obj->get_includesbyparent($includeid);


for ($i = 0; $i < count($result); $i++) {


    echo $result[$i];


}
