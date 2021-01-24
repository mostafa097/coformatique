


<?php
require_once 'db/UserDao.php';
class User {
    //put your code here

    private $_DBConnector;
    public function __construct() {

        $this->_DBConnector=new UserDao();
        }

    public function newUser($name,$mob,$email){
    echo $email;
        $this->_DBConnector->insert('user',array('name' => $name,'mobile_number' => $mob,'email' => $email ));
    }

    public function MaxID(){

    return $this->_DBConnector->SelectMaxID('user');

}

public function Login($userid,$username,$password){

        $this->_DBConnector->insert('login',array('userid' => $userid,'username' => $username,'password' => $password ));
    }



   public function SelectEmp() {
      $db = BaseDao::getInstance();
        $_Conn = $db->getConnection();
        $_SQL = 'SELECT user.name ,user.mobile_number,usertype.type, user.id  FROM user,usertype WHERE user.usertype = usertype.id GROUP BY usertype.type';
        $_Statment=$_Conn->prepare($_SQL);
        $_Statment->execute();
        $users_arr = array();

        while ($row = $_Statment->fetch()) {

            $users_arr[] = array("name" => $row['name'],"mob"=>$row['mobile_number'],"type"=>$row['type'],"id"=>$row['id']);
        }
        return $users_arr;
        
    }
   } 

?>
