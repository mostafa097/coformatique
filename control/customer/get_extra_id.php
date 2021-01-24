<?php
require_once '../../model/db/UserDao.php';


$id = filter_input(0, 'id');
$obj = new UserDao();


$result = $obj->Select('extra', $id);


echo json_encode($result);




