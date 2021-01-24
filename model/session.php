<?php
require_once 'db/UserDao.php';
date_default_timezone_set('Africa/Cairo');
session_start();

if(!isset($_SESSION['u_id']))
{
            echo'<script>window.location.href="../view/index.php"</script>';
}
else if($_SESSION['u_id'] != 0){
	 echo'<script>window.location.href="../view/home.php</script>';
}
/**
 * 
 */
class Session 
{
	
	private $_DBConnector;
    public function __construct() {
        $this->_DBConnector=new UserDao();
        }

	 public function GetUser($id){
       
       $_Data = $this->_DBConnector->SelectUsername($id);  
       return $_Data;
       
   }
   public function GetPos($id){
       
       $_Data = $this->_DBConnector->SelectPosition($id);  
       return $_Data;
       
   }
   

   public function GetPages($id){
            $_Data = $this->_DBConnector->SelectPosition($id);
          $_Teach = $this->_DBConnector->SelectPageT($_Data['id']); 
         $k = 0;
               echo '<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo2.png" style="width: 150px; padding-left: 80px;"  alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <li class="has-sub">
                            <a class="js-arrow" href="home.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>';
                for ($i=0; $i < count($_Teach) ; $i++) { 
                  if($_Teach[$i]['parentid'] != 0){
                $_Page = $this->_DBConnector->SelectParent($_Teach[$i]['parentid']);
                echo '<li>
                            <a class="js-arrow" href="#"><i class="'.$_Page[$k]['icon'].'"></i> '.$_Page[$k]['name'].' </a>';
                $_data = $this->_DBConnector->SelectPageTeacher($_Teach[$i]['parentid']); 
                echo '<ul class="list-unstyled navbar__sub-list js-sub-list"><li>';
                for ($j=0; $j < count($_data) ; $j++) { 
 
                  echo '<a href="'.$_data[$j]['path'].'">'.$_data[$j]['name'].'</a></li>';
               
                  
                }

                echo' </ul></li>';
              }
            }

$k++;

             
        
        echo  '           </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>';
    
   }
}

?>
