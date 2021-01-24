<?php


require_once '../../model/db/UserDao.php';
$_UserDao = new UserDao();
$id=filter_input(0, 'id');
$result = $_UserDao->get_modal($id);



for ($i=0; $i < count($result); $i++) {

    echo $result[$i];



}


?>