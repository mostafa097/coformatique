<?php

require_once "../model/db/UserDao.php";

$_UserDao = new UserDao();

$Cust = $_UserDao->SelectAll('zone','id','level');

echo count($Cust);

for ($i=0; $i < count($Cust); $i++) { 
	echo '<option value="'.$Cust[$i]['id'].'"name="'.$Cust[$i]['level'].'">'.$Cust[$i]['level'].'</option>';
}


?>