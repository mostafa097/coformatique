<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 9/15/18
 * Time: 2:40 AM
 */




require_once "../model/db/UserDao.php";

$_UserDao = new UserDao();

$extra = $_UserDao->SelectAll('extra','name');

echo count($extra);

for ($i=0; $i < count($extra); $i++) {
	echo '<option value="'.$extra[$i]['id'].'"name="'.$extra[$i]['name'].'">'.$extra[$i]['name'].'</option>';
}


?>



?>