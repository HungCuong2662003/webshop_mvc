<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class product 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function insert_product($data ,$file){
            $product_Name = mysqli_real_escape_string($this->db->link, $data['product_Name']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $Price = mysqli_real_escape_string($this->db->link, $data['Price']);
        
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $Decription = mysqli_real_escape_string($this->db->link, $data['Decription']);
            //kiem tra hinh anh va lay anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png','gif');
            $file_name= $_FILES['image']['name'];
            $file_size= $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10). '.' . $file_ext;
            $uploaded_image ="upload/" . $unique_image;
            if($product_Name =="" ||$category =="" ||$brand =="" ||$Price =="" ||$type =="" ||$Decription ==""  || $file_name==""){
                $alert = "<span class='error'>khong duoc de rong </span>";
                return $alert;

            }else{
                move_uploaded_file($file_temp ,$uploaded_image);
                $query="insert into tbl_product (product_Name,cat_id, brand_id,decription,type,	price,image) values('$product_Name','$category','$brand','$Decription','$type','$Price','$unique_image')";
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
        public function show_product(){
            $query="select tbl_product.*, tbl_category.cat_Name, tbl_brand.brand_Name from tbl_product, tbl_brand ,tbl_category 
            where tbl_product.cat_id=tbl_category.cat_id and tbl_product.brand_id = tbl_brand.brand_id ";
            $result=$this->db->select($query);
            return $result;
        }
        public function getbyID($id){
            $query="select * from tbl_product where product_id='$id' ";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_product($data,$file,$id){
            $product_Name = mysqli_real_escape_string($this->db->link, $data['product_Name']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $Price = mysqli_real_escape_string($this->db->link, $data['Price']);
        
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $Decription = mysqli_real_escape_string($this->db->link, $data['Decription']);
            //kiem tra hinh anh va lay anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png','gif');
            $file_name= $_FILES['image']['name'];
            $file_size= $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10). '.' . $file_ext;
            $uploaded_image ="upload/" . $unique_image;
            if($product_Name =="" ||$category =="" ||$brand =="" ||$Price =="" ||$type =="" ||$Decription =="" ){
                $alert = "<span class='error'>khong duoc de rong </span>";
                return $alert;

            }else{
                if(!empty($file_name)){
                    //neu chon anh
                    if($file_size>204800){
                        $alert = "<span class='success'>bạn chỉ có thể update kích thước ảnh < 2MB</span>";
                        return $alert;
                    }else if(in_array($file_ext, $permited)===false){
                        $alert =" <span class 'error'> bạn chỉ có thể upload: - ".implode(', ', $permited). "</span>";
                        return $alert;
                    }
                    if (move_uploaded_file($file_temp, $uploaded_image)) {
                        // Nếu tệp được tải lên thành công, tiến hành cập nhật thông tin sản phẩm
                        $query = "UPDATE tbl_product SET 
                            product_Name = '$product_Name',
                            cat_id = '$category',
                            brand_id = '$brand',
                            decription = '$Decription',
                            type = '$type',
                            price = '$Price',
                            image = '$unique_image'
                            WHERE product_id = '$id'";
            
                        $result = $this->db->update($query);
            
                        if ($result) {
                            $alert = "<span class='success'>Sửa sản phẩm thành công.</span>";
                            return $alert;
                        } else {
                            $alert = "<span class='error'>Không thể cập nhật sản phẩm.</span>";
                            return $alert;
                        }
                    } else {
                        $alert = "<span class='error'>Không thể tải lên tệp.</span>";
                        return $alert;
                    }
                }else{
                    //neu khong chon anh
                    $query="update tbl_product set 
                    product_Name='$product_Name',
                    cat_id='$category',
                    brand_id='$brand',
                    decription='$Decription',
                    type='$type',
                    price='$Price'
      
                     where product_id='$id'";
                }
            
               
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
        public function delete_product($id){
            $query="delete from tbl_product where product_id='$id' ";
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
        public function getproduct(){
            $query="select * from tbl_product where type ='0' limit 4 ";
            $result=$this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $query="select * from tbl_product order by product_id desc limit 4 ";
            $result=$this->db->select($query);
            return $result;
        }
        
        public function delete_product_detail($id){
            $query="select tbl_product.*, tbl_category.cat_Name, tbl_brand.brand_Name from tbl_product, tbl_brand ,tbl_category 
            where tbl_product.cat_id=tbl_category.cat_id and tbl_product.brand_id = tbl_brand.brand_id and product_id = '$id'";
            $result=$this->db->select($query);
            return $result;
        }

        public function getlouis(){
            $query="select * from tbl_product where brand_id ='8' order by product_id desc limit 1 ";
            $result=$this->db->select($query);
            return $result;
        }
        public function getgucci(){
            $query="select * from tbl_product where brand_id ='9' order by product_id desc limit 1 ";
            $result=$this->db->select($query);
            return $result;
        }
        public function gethermes(){
            $query="select * from tbl_product where brand_id ='10' order by product_id desc limit 1 ";
            $result=$this->db->select($query);
            return $result;
        }
        public function getceline(){
            $query="select * from tbl_product where brand_id ='11' order by product_id desc limit 1 ";
            $result=$this->db->select($query);
            return $result;
        }
    }
    
?>