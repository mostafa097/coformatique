<?php

require_once '../../model/db/UserDao.php';

$UserDao = new UserDao();

$id= filter_input(0, 'id');

$result = $UserDao->Select_Fin($id);
	$count = count($result);
	for ($i=0; $i < $count; $i++) {

        if ($UserDao->select_pending( $result[$i]['id'], $id) == null) {
            $UserDao->insert('pending_finical_extra',array('orderid' => $id, 'productid' => $result[$i]['id'], 'price' => $result[$i]['cprice'], 'quantity' => $result[$i]['qt'], 'type' => '1'));

        }


	}
?>