<?php

require_once '../../model/db/UserDao.php';

$id= $_GET['id'];

$assobj = new UserDao();

$assobj->Delete('user',$id);
echo'<script>window.location.href="../../view/delete_user.php"</script>';
?>