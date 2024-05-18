<?php
$filepath = realpath(dirname(__FILE__));
    include $filepath.'/../lib/session.php';
    Session::checkLogin();
    include $filepath.'/../lib/database.php';
    include $filepath.'/../helper/format.php';    
?>
<?php

    class adminLogin 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function login_admin($adminUser, $adminPass){
            $adminUser = $this-> fm ->validation($adminUser);
            $adminPass = $this-> fm ->validation($adminPass);
            $adminUser=mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass=mysqli_real_escape_string($this->db->link, $adminPass);
            if(empty($adminUser)||empty($adminPass)){
                $alert = "khong duoc de trong";
                return $alert;

            }else{
                $query="SELECT * FROM  `tbl_admin` WHERE `ad_User` = '$adminUser' and `ad_Pass`='$adminPass'";
                $result = $this-> db->select($query);
                if($result != false ){
                    $value = $result ->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('ad_id',$value['ad_id']);
                    Session::set('ad_User',$value['ad_User']);
                    Session::set('ad_Name',$value['ad_Name']);
                    
                    header('Location:index.php');
                }else{
                    $alert = "tk mk khong dung";
                    return $alert;
                   
                }
            }
        }
    }
    
?>