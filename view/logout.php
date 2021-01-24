<?php
require_once '../model/session.php';
unset($_SESSION['u_id']);
session_destroy();
 echo'<script>window.location.href="index.php"</script>';
?>
