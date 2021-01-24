<?php

require_once "../model/db/UserDao.php";

$_UserDao = new UserDao();

$Cust = $_UserDao->SelectAll('model','id','name');

echo count($Cust);

for ($i=0; $i < count($Cust); $i++) { 
	echo '<option value="'.$Cust[$i]['id'].'" name="'.$Cust[$i]['name'].'">'.$Cust[$i]['name'].'</option>';
}


?>