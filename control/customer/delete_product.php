<?php

require_once '../../model/db/UserDao.php';


$obj=new UserDao();

$id=filter_input(0, 'id');

if($obj->delete('products',$id)){

    echo 1;

}

else{

    echo 0;


}