<?php

require_once '../../model/db/BaseDao.php';
$id= filter_input(0, 'id');

    if($id != ''){

        
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE orders SET status = 1 WHERE id = :_ID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);

        $_Statment->execute();

        echo 1;
    }
    else{
        echo 0 ;
    }


?>