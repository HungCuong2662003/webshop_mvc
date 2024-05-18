<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class report 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function select_report(){
            $query="SELECT c.cat_Name, SUM(o.price) AS total_price 
            FROM tbl_order o
            INNER JOIN tbl_category c ON o.cat_id = c.cat_id
            GROUP BY o.cat_id";
            $result=$this->db->select($query);
            return $result;
            
        }
        public function select_category($cat_id){
            $query="SELECT cat_Name FROM `tbl_category` where cat_id='$cat_id'";
            $result=$this->db->select($query);
            return $result;
            
        }
        

    }
    
?>