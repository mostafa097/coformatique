<?php

require_once 'BaseDao.php';

/**
 * User DAO Class - Objects are meant to act as Data Access Objects.
 * Performs select, insert, update & delete operations upon 'users' table.
 * Inherits form BaseDao class.
 */
class UserDao
{

    private $db;
    private $_Conn;

    public function __construct()
    {

    }

    public function get_extras($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT  extra.id,order_extras.quantity,extra.name,extra.Cprice FROM `order_extras`,`extra` WHERE order_extras.orderid =:_ID AND order_extras.extraid = extra.id';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('id' => $result['id'], 'quantity' => $result['quantity'], 'name' => $result['name'], 'Cprice' => $result['Cprice']);

        }

        return $arr;
    }

    public function Select_Fin($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'SELECT products.id,products.cprice,SUM(technicalorder.quantity) as qt FROM `products`,`technicalorder`,`capacity`,`model` WHERE technicalorder.orderid = :_ID AND products.model = technicalorder.modelid AND products.model = model.id AND model.cond_heater_id = products.devid AND technicalorder.size = capacity.size AND capacity.id = products.size GROUP BY products.id';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('id' => $result['id'], 'qt' => $result['qt'], 'cprice' => $result['cprice']);

        }

        return $arr;
    }

    public function get_extra_tbl_fill($id)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT `id`,(SELECT extra.name FROM extra WHERE extra.id=`productid`),(SELECT order_extras.quantity FROM order_extras WHERE order_extras.orderid =:_ID AND order_extras.extraid= productid) ,`price` FROM `pending_finical_extra` WHERE orderid=:_ID AND type=2';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~";
            array_push($arr, $row);

        }


        return $arr;

    }


    public function get_modal($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id`, `name` FROM `model` WHERE cond_heater_id=:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();
        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);

        }


        return $arr;


    }

    /*
        public function get_modified_product_price($orderid, $productid)
        {

            $db = BaseDao::getInstance();
            $_Conn = $db->getConnection();
            $_SQL = ' SELECT `id`, `price` FROM `pending_finical_extra` WHERE `orderid`=:_ID AND`productid`=:_PID AND `type`=1';


            $_Statment = $_Conn->prepare($_SQL);
            $_Statment->bindParam(':_ID', $orderid);
            $_Statment->bindParam(':_PID', $productid);
            $_Statment->execute();
            $_Statment->setFetchMode(PDO::FETCH_NUM);

            $arr = array();
            while ($result = $_Statment->fetch()) {

                $row = $result[0] . "~" . $result[1] . "~";
                array_push($arr, $row);

            }


            return $arr;


        }
    */

    public function get_Forders()
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT orders.date,customer.name,orders.id FROM `orders`,`customer` WHERE orders.custid = customer.id AND orders.status = 1 ORDER BY orders.id DESC';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('date' => $result['date'], 'name' => $result['name'], 'id' => $result['id']);

        }

        return $arr;
    }

    public function get_orders()
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT orders.date,customer.name,orders.id FROM `orders`,`customer` WHERE orders.custid = customer.id AND orders.status = 0 ORDER BY orders.id DESC';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('date' => $result['date'], 'name' => $result['name'], 'id' => $result['id']);

        }

        return $arr;
    }


    public function view_done_orders($date)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = "SELECT orders.date,customer.name,orders.id FROM `orders`,`customer` WHERE orders.custid = customer.id AND orders.status >=2 and orders.date LIKE :_ID ORDER BY orders.id DESC";


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $date);
        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }

    public function get_cust_info_order_info($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT customer.code,customer.name,customer.phone,customer.address,orders.date FROM `orders`,`customer` WHERE orders.custid = customer.id AND orders.status >=2 and orders.id=:_ID ORDER BY orders.id DESC';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~" . $result[4] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }

    public function get_cust_includes_tbl($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT `id`,`description`, includes_id,parentId FROM `cust_order_includes` WHERE `orderid_id`=:_ID ORDER BY`parentId`  ';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }


    public function get_includesbyparent($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT `id`, `description` FROM `order_includes` WHERE `parentId` =:_ID order by id';

        $_Statment = $_Conn->prepare($_SQL);

        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        // $row = $results[0]."~".$results[1]."~";
        //array_push($arr, $row);


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);

        }
        /* while ($row = $_Statment->fetch()) {

             //  $arr[] = array('id' => $row['id'], 'description' => $row['description']);

         print_r($row);
         }
 */
        return $arr;

    }

    public function check_include_exists($orderid, $include)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT `id` FROM `cust_order_includes` WHERE `orderid_id` =:_OID AND `includes_id` =:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_OID', $orderid);
        $_Statment->bindParam(':_ID', $include);
        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0];
            array_push($arr, $row);

        }


        return $arr;
    }

    public function update_include_cust($id, $text)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `cust_order_includes` SET `description`=:_txt WHERE id=:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_txt', $text);
        $_Statment->bindParam(':_ID', $id);
        echo $_Statment->execute();


    }

    public function update_include($id, $text)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `order_includes` SET `description`=:_txt WHERE id=:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_txt', $text);
        $_Statment->bindParam(':_ID', $id);
        return $_Statment->execute();


    }

    public function get_all_include($_TableName)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT * FROM ' . $_TableName . ' where parentId = 0';


        $_Statment = $_Conn->prepare($_SQL);

        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }


    public function get_device($orderid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT pending_finical_extra .id , products . name,pending_finical_extra . price , pending_finical_extra . quantity FROM `products`,`pending_finical_extra` WHERE  pending_finical_extra . orderid = :_ID AND products . id = pending_finical_extra . productid AND pending_finical_extra . type = "1"';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $orderid);
        $_Statment->execute();


        $arr = array();

        while ($row = $_Statment->fetch()) {

            $arr[] = array('id' => $row['id'], 'name' => $row['name'], 'price' => (float)$row['price'], 'qt' => (float)$row['quantity']);

        }

        return $arr;
    }

    public function get_level($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT DISTINCT level.level, level.id FROM `technicalorder`,`zone`,`model`,`level` WHERE technicalorder.orderid = :_ID AND technicalorder . lvl_id = level.id ORDER BY level.level ';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $arr = array();

        while ($row = $_Statment->fetch()) {

            $arr[] = array('level' => $row['level'], 'id' => $row['id']);

        }

        return $arr;
    }

    public function get_tech($id, $lvl_id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT technicalorder . factor,zone . level AS zone,technicalorder . area,technicalorder . quantity,model . name,technicalorder . size,technicalorder . cond_heater_id FROM `technicalorder`,`zone`,`model` WHERE technicalorder . orderid = :_ID AND technicalorder . zoneid = zone . id AND technicalorder . modelid = model . id  AND technicalorder . lvl_id = :_LID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->bindParam(':_LID', $lvl_id);
        $_Statment->execute();


        $arr = array();

        while ($row = $_Statment->fetch()) {

            $arr[] = array('factor' => $row['factor'], 'zone' => $row['zone'], 'area' => $row['area'], 'quantity' => $row['quantity'], 'name' => $row['name'], 'size' => $row['size'], 'cond_heater_id' => $row['cond_heater_id']);

        }

        return $arr;

    }

    /*
        public function get_quan($id)
        {

            $db = BaseDao::getInstance();
            $_Conn = $db->getConnection();

            $_SQL = 'SELECT  level . level,zone . level AS zone,technicalorder . area,SUM(quantity),model . name,technicalorder . size FROM `technicalorder`,`zone`,`model`,`level` WHERE technicalorder . orderid =:_ID AND technicalorder . zoneid = zone . id AND technicalorder . modelid = model . id AND technicalorder . lvl_id = level . id GROUP by size ORDER BY technicalorder . size AND technicalorder . `cond_heater_id` DESC ';


            $_Statment = $_Conn->prepare($_SQL);
            $_Statment->bindParam(':_ID', $id);
            $_Statment->execute();


            $arr = array();

            while ($row = $_Statment->fetch()) {

                $arr[] = array('level' => $row['level'], 'zone' => $row['zone'], 'area' => $row['area'], 'SUM(quantity)' => $row['SUM(quantity)'], 'name' => $row['name'], 'size' => $row['size']);

            }

            return $arr;

        }
    */
    public function get_sizee($code)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT id, size  FROM `capacity` WHERE cod_heaterId =:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $code);
        $_Statment->execute();

        $arr = array();

        while ($result = $_Statment->fetch()) {
            $arr[] = array('id' => $result['id'], 'size' => $result['size']);
        }

        return $arr;


    }

    public function get_Financial($id, $type)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        if ($type == '1') {
            $_SQL = 'SELECT products . name,products . rprice,pending_finical_extra . price,pending_finical_extra . quantity FROM `pending_finical_extra`,`products` WHERE pending_finical_extra . orderid = :_ID AND products . id = pending_finical_extra . productid AND pending_finical_extra . type = :_Type';


            $_Statment = $_Conn->prepare($_SQL);
            $_Statment->bindParam(':_ID', $id);
            $_Statment->bindParam(':_Type', $type);
            $_Statment->execute();


            $arr = array();
            while ($result = $_Statment->fetch()) {

                $arr[] = array('name' => $result['name'], 'qt' => $result['quantity'], 'rprice' => $result['rprice'], 'price' => $result['price']);

            }

            return $arr;
        } elseif ($type == '2') {
            $_SQL = 'SELECT extra . name,extra . Rprice,pending_finical_extra . price,pending_finical_extra . quantity FROM `pending_finical_extra`,`extra` WHERE pending_finical_extra . orderid = :_ID AND extra . id = pending_finical_extra . productid AND pending_finical_extra . type = :_Type';


            $_Statment = $_Conn->prepare($_SQL);
            $_Statment->bindParam(':_ID', $id);
            $_Statment->bindParam(':_Type', $type);
            $_Statment->execute();


            $arr = array();
            while ($result = $_Statment->fetch()) {

                $arr[] = array('name' => $result['name'], 'qt' => $result['quantity'], 'rprice' => $result['Rprice'], 'price' => $result['price']);

            }

            return $arr;
        }
    }


    public function get_Includes($id, $parentid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT description,includes_id FROM `cust_order_includes` WHERE orderid_id = :_ID AND parentid = :_PID and includes_id != :_PID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->bindParam(':_PID', $parentid);
        $_Statment->execute();

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('desc' => $result['description'], 'inc' => $result['includes_id']);

        }

        return $arr;

    }

    public function get_IncludesParent($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT DISTINCT description,includes_id FROM `cust_order_includes` WHERE orderid_id = :_ID AND parentid = includes_id';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();

        $arr = array();
        while ($result = $_Statment->fetch()) {

            $arr[] = array('desc' => $result['description'], 'inc' => $result['includes_id']);

        }

        return $arr;

    }


    public function get_size($cap, $code)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT id, size  FROM `capacity` WHERE  :_cap > `from_cap` AND :_cap < `to_cap` AND cod_heaterId =:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_cap', $cap);
        $_Statment->bindParam(':_ID', $code);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0];
            array_push($arr, $row);


            $row = $result[1];
            array_push($arr, $row);


        }

        return $arr;


    }


    public function Delete($_Tablename, $_ColNameID)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'DELETE FROM ' . $_Tablename . ' WHERE id = :_id';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_id', $_ColNameID);
        $_Statment->execute();
    }


    public function insert($TableName, array $values)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $sql = 'INSERT INTO ' . $TableName;
        $fields = array_keys($values);
        $vals = array_values($values);

        $sql .= '(' . implode(',', $fields) . ') ';

        $arr = array();
        foreach ($fields as $f) {
            $arr[] = ' ? ';
        }
        $sql .= 'VALUES(' . implode(', ', $arr) . ') ';

        $statement = $_Conn->prepare($sql);
        foreach ($vals as $i => $v) {
            $statement->bindValue($i + 1, $v);
        }

        return $statement->execute();
    }


    public function SelectAll($_TableName, $_ColName)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT * FROM ' . $_TableName . ' ORDER BY ' . $_ColName . ' ASC';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;
    }

    public function select_pending($productid, $orderid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id` FROM `pending_finical_extra` WHERE `orderid` =:_OID AND `productid` =:_PID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_OID', $orderid);
        $_Statment->bindParam(':_PID', $productid);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0];
            array_push($arr, $row);


        }

        return $arr;

    }

    public function select_pending_products($productid, $orderid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id` FROM `pending_finical_products` WHERE `orderid` =:_OID AND `productid` =:_PID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_OID', $orderid);
        $_Statment->bindParam(':_PID', $productid);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0];
            array_push($arr, $row);


        }

        return $arr;

    }

    public function get_discount($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id`, `discount` FROM `orders` WHERE id =:_ID';


        $_Statment = $_Conn->prepare($_SQL);

        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();


        $arr = array();
        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);


        }

        return $arr;

    }

    public function edit_pending_finicial_extra($id, $price)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `pending_finical_extra` SET `price` =:_PRICE WHERE id =:_ID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_PRICE', $price);
        $_Statment->bindParam(':_ID', $id);

        return $_Statment->execute();


    }

    public function edit_discount($orderid, $val)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `orders` SET `discount` =:_OID WHERE id =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_OID', $val);
        $_Statment->bindParam(':_ID', $orderid);

        return $_Statment->execute();

    }


    public function edit_pending_finicial_product($product, $order, $price)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `pending_finical_extra` SET `price` =:_price WHERE `orderid` =:_OID AND `productid` =:_PID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_OID', $order);
        $_Statment->bindParam(':_PID', $product);
        $_Statment->bindParam(':_price', $price);
        return $_Statment->execute();


    }


    public function get_extra_tbl($orderid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'SELECT order_extras . id, extra . name, `quantity` FROM `order_extras`  INNER JOIN extra on extra . id = order_extras . extraid WHERE orderid =:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $orderid);

        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }


    public function get_product_for_extra_tbl($size)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'SELECT products . `id` , products . cprice  FROM `products` INNER JOIN capacity ON capacity . id = products . size WHERE capacity . size =:_SID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_SID', $size);

        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }

    public function get_extra_by_id($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'SELECT   `extraid`, `quantity` FROM `order_extras` WHERE `id` =:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);

        $_Statment->execute();


        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~";
            array_push($arr, $row);

        }


        return $arr;
    }


    public function update($_TableName, $id, array $values)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $sql = 'UPDATE' . $_TableName . 'SET ';
        $fields = array_keys($values);
        $vals = array_values($values);

        foreach ($fields as $i => $f) {
            $fields[$i] .= ' = ? ';
        }

        $sql .= implode(',', $fields);

        $statement = $_Conn->prepare($sql);
        foreach ($vals as $i => $v) {
            $statement->bindValue($i + 1, $v);
        }
        $sql .= ' WHERE id =:_id';

        $statement->bindParam(':_id', $id);

        $statement->execute();
    }


    public function update_order_statues($orderid)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'UPDATE `orders` SET `status`=0 WHERE `id`=:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $orderid);

        $_Statment->execute();


    }

    public function update_product_details($id, $name, $cprice, $rprice)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'UPDATE `products` SET `name`=:_NM,`rprice`=:_R,`cprice`=:_CP WHERE `id`=:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->bindParam(':_NM', $name);
        $_Statment->bindParam(':_R', $rprice);
        $_Statment->bindParam(':_CP', $cprice);

        $_Statment->execute();


    }

    public function update_extra_details($id, $name, $cprice, $rprice)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'UPDATE `extra` SET `name`=:_NM,`Rprice`=:_R,`Cprice`=:_CP WHERE `id`=:_ID';


        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->bindParam(':_NM', $name);
        $_Statment->bindParam(':_R', $rprice);
        $_Statment->bindParam(':_CP', $cprice);

        $_Statment->execute();


    }


    public function get_tbl_extra_byaircond($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id`, `name`, `Rprice`, `Cprice` FROM `extra` WHERE `is_hidden` = 0 AND `airCond` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();

        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~";
            array_push($arr, $row);

        }

        return $arr;

    }

    public function get_tbl_product_byaircond($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id`, `name`, `rprice`, `cprice` FROM `products` WHERE  `devid` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();

        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {

            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~";
            array_push($arr, $row);

        }

        return $arr;

    }

    public function get_all_products($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT `id`, `name`, `rprice`, `cprice` FROM `products` WHERE `devid` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();

        $arr = array();

        while ($result = $_Statment->fetch()) {

            $arr[] = array('name' => $result['name'], 'id' => $result['id'], 'rprice' => $result['rprice'], 'cprice' => $result['cprice']);

        }

        return $arr;

    }

    public function update_extra($id, $extra, $quan)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'UPDATE `order_extras` SET `extraid` =:_EID,`quantity` =:_Quan WHERE id =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->bindParam(':_EID', $extra);
        $_Statment->bindParam(':_Quan', $quan);


        return $_Statment->execute();


    }


    public function delete_extra($id)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $_SQL = 'UPDATE `extra` SET `is_hidden` = 1 WHERE `id` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        return $_Statment->execute();


    }

    public function get_alltect($orderid)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT technicalorder . id,level . level, zone . level, `area`, `quantity`, model . name, `size` , `factor` FROM `technicalorder`INNER JOIN level ON technicalorder . lvl_id = level . id  INNER JOIN zone ON zone . id = technicalorder . zoneid INNER JOIN model on model . id = technicalorder . modelid  WHERE `orderid` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $orderid);
        $_Statment->execute();

        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~" . $result[4] . "~" . $result[5] . "~" . $result[6] . "~" . $result[7] . "~";
            array_push($arr, $row);

        }


        return $arr;

    }


    public function get_alltect_byid($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT  lvl_id,zoneid,area,quantity,modelid,factor FROM `technicalorder` WHERE `id` =:_ID';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();

        $_Statment->setFetchMode(PDO::FETCH_NUM);

        $arr = array();

        while ($result = $_Statment->fetch()) {


            $row = $result[0] . "~" . $result[1] . "~" . $result[2] . "~" . $result[3] . "~" . $result[4] . "~" . $result[5] . "~";
            array_push($arr, $row);

        }


        return $arr;

    }

    public function update_tech_order($zone, $area, $quan, $model, $size, $levl, $factor, $id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'UPDATE `technicalorder` SET `zoneid` =:_ZID,`area` =:_area,`quantity` =:_quan,`modelid` =:_model,`size` =:_Siz,`lvl_id` =:_lvl,`factor` =:_fact WHERE id =:_ID';

        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ZID', $zone);
        $_Statment->bindParam(':_area', $area);
        $_Statment->bindParam(':_quan', $quan);
        $_Statment->bindParam(':_model', $model);
        $_Statment->bindParam(':_Siz', $size);
        $_Statment->bindParam(':_lvl', $levl);
        $_Statment->bindParam(':_fact', $factor);
        $_Statment->bindParam(':_ID', $id);
        return $_Statment->execute();


    }

    public function SelectUserData($_Uname, $_Password)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT * FROM login  WHERE username =:_Uname AND password =:_Password';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_Uname', $_Uname);
        $_Statment->bindParam(':_Password', $_Password);
        $_Statment->execute();
        $Data = $_Statment->fetch();
        return $Data;
    }

    public function SelectUsername($_ID)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT name FROM user WHERE id =:_ID ';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $_ID);
        $_Statment->execute();
        $Data = $_Statment->fetch();
        return $Data;
    }

    public function SelectPosition($_ID)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT usertype . type,usertype . id FROM usertype,user WHERE user . id =:_ID AND user . usertype = usertype . id';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $_ID);
        $_Statment->execute();
        $Data = $_Statment->fetch();
        return $Data;
    }

    public function SelectPage()
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT pages . name, pages . id , icons . name as icon  FROM pages,icons WHERE pages . posid = 3 AND pages . iconid = icons . id AND pages . parentid = 0';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;

    }

    public function SelectPages($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT * FROM pages WHERE parentid = :_ID  ';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;

    }

    public function SelectParent($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT pages . id, pages . name, icons . name as icon  FROM pages,icons WHERE pages . id = :_ID AND pages . iconid = icons . id ';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;

    }

    public function SelectPageTeacher($pid)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT pages . path,pages . name FROM pages WHERE pages . parentid = :_PID ORDER BY pages . id';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_PID', $pid);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;

    }

    public function SelectPageT($id)
    {


        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT DISTINCT pages . parentid FROM pages WHERE pages . posid = :_ID ORDER BY pages . parentid';
        $_Statment = $_Conn->prepare($_SQL);
        $_Statment->bindParam(':_ID', $id);
        $_Statment->execute();
        $_Result = array();
        $i = 0;
        while ($_Row = $_Statment->fetch()) {
            $_Result[$i] = $_Row;
            $i++;
        }
        return $_Result;

    }


    public function Select($_TableName, $_Values)
    {

        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();


        $sql = 'SELECT * FROM ' . $_TableName . ' WHERE id =:_Values';
        $_Values = (int)$_Values;
        $_Statement = $_Conn->prepare($sql);
        $_Statement->bindParam(':_Values', $_Values);
        $_Statement->execute();
        $_Answe = $_Statement->fetch();

        return $_Answe;
    }

    public function SelectMaxID($_TableName)
    {
        $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();

        $_SQL = 'SELECT MAX(ID) FROM ' . $_TableName;
        $_Statement = $_Conn->prepare($_SQL);
        $_Statement->execute();
        $_MaxID = $_Statement->fetch();
        return $_MaxID[0];
    }


}

?>
