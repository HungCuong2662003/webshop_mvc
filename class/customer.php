<?php
$filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../lib/database.php';
    require_once $filepath.'/../helper/format.php';    
?>
<?php

    class customer 
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
            
        }
        public function insert_customer($data){
            $Name = mysqli_real_escape_string($this->db->link, $data['Name']);
            $City = mysqli_real_escape_string($this->db->link, $data['City']);
            $ZipCode = mysqli_real_escape_string($this->db->link, $data['ZipCode']);
            $EMail = mysqli_real_escape_string($this->db->link, $data['EMail']);
            $Address = mysqli_real_escape_string($this->db->link, $data['Address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $Phone = mysqli_real_escape_string($this->db->link, $data['Phone']);
            $Password = mysqli_real_escape_string($this->db->link, md5($data['Password']));
            if($Name == "" ||$City == "" ||$ZipCode == "" ||$EMail == "" ||$Address == "" ||$country == "" ||$Phone == ""||$Password == ""){
                $alert = "<span class='error' style='color: red' >khong duoc de rong </span>";
                return $alert;

            }else{
                $check_email= "select * from tbl_customer where email = '$EMail'";
                $result_check = $this ->db->select($check_email);
                if($result_check){
                    $alert = "<span class='error' style='color: red>email da ton tai </span>";
                    return $alert;
                }else{
                    $query="INSERT INTO `tbl_customer`(`name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES('$Name','$Address','$City','$country','$ZipCode','$Phone','$EMail','$Password')";
                    
                    $result = $this-> db->insert($query);
                    if($result==true){
                            $alert="<span class='success'style='color: green'> Thêm thành công </span>";
                            return$alert;
                    }else{
                            $alert="<span class='error'style='color: red'> Thêm không thành công </span>";
                            return$alert;
                    }
                }
            }
        }
        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $Password = mysqli_real_escape_string($this->db->link, md5($data['Password']));
            
            if ($email == "" || $Password == "") {
                $alert = "<span class='error' style='color: red'>khong duoc de rong</span>";
                return $alert;
            } else {
                $check_email = "select * from tbl_customer where email = '$email' and password = '$Password'";
                $result_check = $this->db->select($check_email);
                
                if ($result_check) {
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id', $value['id']);
                    Session::set('customer_name', $value['name']);
                    header("Location:order.php");
               
             

                } else {
                    $alert = "<span class='error' style='color: red'>sai email hoac password</span>";
                    return $alert;
                }
            }
        }
        public function show_customer($id){
            $query = "select * from tbl_customer where id = '$id'";
            $result = $this->db->select($query);   
            return $result;
        }
        

    }
    
?>