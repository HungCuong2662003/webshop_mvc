<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class category 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function insert_category($catName){
            $catName = $this-> fm ->validation($catName);
            $catName=mysqli_real_escape_string($this->db->link, $catName);
           
            if(empty($catName)){
                $alert = "khong duoc de trong";
                return $alert;

            }else{
                $query="insert into tbl_category (cat_Name) values('$catName')";
                $result = $this-> db->insert($query);
               if($result==true){
                    $alert="<span class='success'> Thêm thành công </span>";
                    return$alert;
               }else{
                    $alert="<span class='error'> Thêm không thành công </span>";
                    return$alert;
               }
            }
        }
        public function show_category(){
            $query="select * from tbl_category";
            $result=$this->db->select($query);
            return $result;
        }
        public function getbyID($id){
            $query="select * from tbl_category where cat_id='$id' ";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id){
            $catName = $this-> fm ->validation($catName);
            $catName=mysqli_real_escape_string($this->db->link, $catName);
            $id=mysqli_real_escape_string($this->db->link, $id);
           
            if(empty($catName)){
                $alert = "khong duoc de trong";
                return $alert;

            }else{
                $query="update tbl_category set cat_Name='$catName' where cat_id='$id'";
                $result = $this-> db->update($query);
               if($result==true){
                    $alert="<span class='success'> Sửa thành công </span>";
                    return$alert;
               }else{
                    $alert="<span class='error'> Sửa không thành công </span>";
                    return$alert;
               }
            }
        }
        public function delete_category($id){
            $query="delete from tbl_category where cat_id='$id' ";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'> Xóa không thành công </span>";
                return$alert;
                
            }else{
                $alert="<span class='error'> Xóa không thành công </span>";
                return$alert;
            }
            return $result;
        }
        public function show_category_font(){
            $query="select * from tbl_category";
            $result=$this->db->select($query);
            return $result;
        }
        public function product_by_cat($id){
            $query="select * from tbl_product where cat_id ='$id' order by cat_id desc limit 8";
            $result=$this->db->select($query);
            return $result;
        }
    }
    
?>