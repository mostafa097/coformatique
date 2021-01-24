<?php
require_once 'db/UserDao.php';

class Login
{
    //put your code here
    private $_Uname;
    private $_Password;
    private $_DBConnector;

    public function __construct($uname, $_password)
    {
        $this->_Password = $_password;
        $this->_Uname = $uname;
        $this->_DBConnector = new UserDao();
        $this->_Password = md5($this->_Password);
    }

    public function GetUser()
    {

        $_Data = $this->_DBConnector->SelectUserData($this->_Uname, $this->_Password);
        return $_Data;

    }
}

?>