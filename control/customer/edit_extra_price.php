<?php

$id= filter_input(0, 'id');

$price= filter_input(0, 'price');


require_once '../../model/db/UserDao.php';

$obj =new UserDao();



if($obj->edit_pending_finicial_extra($id,$price)){

    echo true;

}

?>