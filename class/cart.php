<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class cart 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function add_to_cart($quantity, $id){
            $quantity = $this-> fm ->validation($quantity); 
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sid=session_id();
            $query ="select * from tbl_product where product_id='$id'";
            $result= $this->db->select($query)->fetch_assoc();
            $check_cart = "select * from tbl_cart where product_id = '$id' and sid='$sid'";
            $result_cart = $this-> db->select($check_cart);
               
            if($result_cart){
            //     $query_quantity ="select * from tbl_cart where product_id='$id'";
            //     $result_quan= $this->db->select($query_quantity)->fetch_assoc();
            //     $temp = $quantity + $result_quan['quantity'];
            //     $update_quantity = "update  tbl_cart set quantity = '$temp' where  sid = '$sid'";
            //     $result_quantity = $this-> db->update($update_quantity);
                
            //    if($result_quantity==true){
            //         $alert="<span class='success'> Sửa thành công </span>";
            //         return$alert;
            //    }else{
            //         $alert="<span class='error'> Sửa không thành công </span>";
            //         return$alert;
            //    }
                $msg ="Sản phẩm đã có trong giỏ hàng";
                return $msg;
            }else{
                $query_insert = "INSERT INTO tbl_cart (product_id, cat_id, sid, product_Name, price, quantity, image) VALUES ('$id','{$result['cat_id']}', '$sid', '{$result['product_Name']}', '{$result['price']}', '$quantity', '{$result['image']}')";
                $insert_cart = $this-> db->insert($query_insert);
               if($insert_cart==true){
                    header('Location:cart.php');
               }else{
                    header('Location:404.php');
               }
            }
        }
        public function get_product_cart(){
            $sid = session_id();
            $query="select * from tbl_cart where sid = '$sid' ";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_quantity($quantity, $cart_id){
            $quantity= mysqli_real_escape_string($this->db->link, $quantity);
            $cart_id= mysqli_real_escape_string($this->db->link, $cart_id);
            $query = "UPDATE tbl_cart SET 
                            quantity = '$quantity'
                            
                            WHERE cart_id = '$cart_id'";
            
            $result = $this->db->update($query);
            if($result){
                // header('Location: cart.php');
                $msg= "<span class='success' style='color: green; font-size: 30'> update thanh cong</span>";
                
                return $msg;
            }else{
                $msg= "<span class='error' style='color: green; font-size: 30'> update khong thanh cong </span>";
                return $msg;
            }
        }
        public function delete_product_cart($cart_id){
            $cart_id= mysqli_real_escape_string($this->db->link, $cart_id);
            $query = "DELETE FROM tbl_cart WHERE `tbl_cart`.`cart_id` = '$cart_id'";
            $result = $this->db->delete($query);
            if($result){
               
                // header('Location: cart.php');
                $msg= "<span class='success' style='color: green; font-size: 30'> delete thanh cong</span>";
                
                return $msg;
                
            }else{
                $msg= "<span class='error' style='color: green; font-size: 30'> delete khong thanh cong </span>";
                return $msg;
            }
            
        }
        public function check_cart(){
            $sid = session_id();
            $query = "select * from tbl_cart where sid ='$sid'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_order($customer_id){
            $sid = session_id();
            $query = "select * from tbl_order where customer_id ='$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data(){
            $sid = session_id();
            $query = "delete  from tbl_cart where sid = '$sid'";
            $result = $this->db->delete($query);
            return $result;
        }

        ////////////////////////////////////////////////
        public function insert_order($customer_id){
            $sid = session_id();
            $query = "select * from tbl_cart where sid ='$sid'";
            $get_cart = $this->db->select($query);
            if($get_cart){
                while($result=$get_cart->fetch_assoc()){
                    $product_id=$result['product_id'];
                    $cat_id=$result['cat_id'];
                    $product_Name=$result['product_Name'];
                    $quantity=$result['quantity'];
                    $price=$result['price']* $quantity;
                    $image=$result['image'];
                    $customer_id= $customer_id;
                    $query_order = "INSERT INTO tbl_order (product_id,cat_id, product_Name, quantity, price,image, customer_id) VALUES ('$product_id','$cat_id' ,'$product_Name', '$quantity', '$price', '$image', '$customer_id')";
                    $insert_cart = $this-> db->insert($query_order);
              
                }
            }
        }
        public function getamountprice($customer_id){
          
            $query = "select price from tbl_order where customer_id ='$customer_id' and date_order = now()";
        
            $get_price = $this->db->select($query);
            return $get_price;

        }
        public function get_ordered($customer_id){
            $query = "select * from tbl_order where customer_id ='$customer_id'";
        
            $get_ordered = $this->db->select($query);
            return $get_ordered;

        }
        public function get_inbox_cart(){
            $query = "select * from tbl_order order by date_order";
        
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;

        }
        public function shifted($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link, $id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET 
                            status='1'
                            
                            WHERE id = '$id' and date_order='$time' and price='$price'";
            
            $result = $this->db->update($query);
            if($result){
                // header('Location: cart.php');
                $msg= "<span class='success' style='color: green; font-size: 30'> update thanh cong</span>";
                
                return $msg;
            }else{
                $msg= "<span class='error' style='color: green; font-size: 30'> update khong thanh cong </span>";
                return $msg;
            }
        }
        public function del_shifted($delid,$time,$price){
            $delid= mysqli_real_escape_string($this->db->link, $delid);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            $query = "delete from tbl_order
                            
                            WHERE id = '$delid' and date_order='$time' and price='$price'";
            
            $result = $this->db->update($query);
            if($result){
                // header('Location: cart.php');
                $msg= "<span class='success' style='color: green; font-size: 30'> update thanh cong</span>";
                
                return $msg;
            }else{
                $msg= "<span class='error' style='color: green; font-size: 30'> update khong thanh cong </span>";
                return $msg;
            }
        }
        public function shifted_confirm($confirm_id,$time,$price){
            $confirm_id= mysqli_real_escape_string($this->db->link, $confirm_id);
            $price= mysqli_real_escape_string($this->db->link, $price);
            $time= mysqli_real_escape_string($this->db->link, $time);
           
            $query =  "UPDATE tbl_order SET status = '2' WHERE customer_id = '$confirm_id' AND date_order = '$time' AND price = '$price'";
            
                $result = $this->db->update($query);
        
            if($result){
                // header('Location: cart.php');
                $msg= "<span class='success' style='color: green; font-size: 30'> update thanh cong</span>";
                
                return $msg;
            }else{
                $msg= "<span class='error' style='color: green; font-size: 30'> update khong thanh cong </span>";
                return $msg;
            }
        }


    }
    
?>