<?php
require_once '../../model/db/UserDao.php';


$aircond=filter_input(0, 'dev');
$obj=new UserDao();


$result=$obj->get_tbl_product_byaircond($aircond);


for ($i=0;$i<count($result);$i++){

    echo $result[$i];

}

?>