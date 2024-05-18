<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class brand
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function insert_brand($brandName){
            $brandName = $this-> fm ->validation($brandName);
            $brandName=mysqli_real_escape_string($this->db->link, $brandName);
            
           
            if(empty($brandName)){
                $alert = "khong duoc de trong";
                return $alert;

            }else{
                $query="insert into tbl_brand (brand_Name) values('$brandName')";
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
        public function show_brand(){
            $query="select * from tbl_brand ";
            $result=$this->db->select($query);
            return $result;
        }
        public function getbyID($id){
            $query="select * from tbl_brand where brand_id='$id' ";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_brand($brandName,$id){
            $brandName = $this-> fm ->validation($brandName);
            $brandName=mysqli_real_escape_string($this->db->link, $brandName);
            $id=mysqli_real_escape_string($this->db->link, $id);
           
            if(empty($brandName)){
                $alert = "khong duoc de trong";
                return $alert;

            }else{
                $query="update tbl_brand set brand_Name='$brandName' where brand_id='$id'";
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
        public function delete_brand($id){
            $query="delete from tbl_brand where brand_id='$id' ";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'> Xóa  thành công </span>";
                return$alert;
                
            }else{
                $alert="<span class='error'> Xóa không thành công </span>";
                return$alert;
            }
            return $result;
        }
    }
    
?>