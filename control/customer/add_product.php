<?php

require_once '../../model/db/UserDao.php';


$name=filter_input(0, 'name');
$rprice=filter_input(0, 'rprice');
$cprice=filter_input(0, 'cprice');
$size = filter_input(0,'size');
$model = filter_input(0,'model');
$aircond=filter_input(0, 'dev');
$obj=new UserDao();


if($obj->insert('products',array('name'=>$name,'model' => $model,'size' => $size,'rprice'=>$rprice,'cprice'=>$cprice,'devid'=>$aircond))){



    echo 1;

}

else{


    echo 0;

}
