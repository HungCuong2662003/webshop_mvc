<?php
	include_once 'include/header.php';

?>
<!-- <?php
    if(!isset($_GET['product_id']) || $_GET['product_id']==NULL|| $_GET['product_id'] ==''){
        echo "<script> window.location='404.php'</script>";
        
    }else{
        $id= $_GET['product_id'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $quanyity = $_POST['quantity'];
        
        $addtocart = $cart->add_to_cart($quanyity,$id);
        
    }
?> -->
<?php 
                    $login_check = Session::get('customer_login');
                    if($login_check==false){
                        header('Location: login.php');

                    }
                    
                    ?>
<div class="main">
    <div class="content">

        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thông tin cá nhân</h3>
                </div>
                <div class="clear"></div>
            </div>

            <table class="tblone">
                <?php 
                $id = Session::get('customer_id');
                $get_customer = $customer->show_customer($id);
                if($get_customer){
                while($result_customer = $get_customer->fetch_assoc()){
                
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $result_customer['name'] ?></td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>:</td>
                    <td><?php echo $result_customer['address'] ?></td>
                </tr>

                <tr>
                    <td>city</td>
                    <td>:</td>
                    <td><?php echo $result_customer['city'] ?></td>
                </tr>

                <tr>
                    <td>country</td>
                    <td>:</td>
                    <td><?php echo $result_customer['country'] ?></td>
                </tr>
                <tr>
                    <td>zipcode</td>
                    <td>:</td>
                    <td><?php echo $result_customer['zipcode'] ?></td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>:</td>
                    <td><?php echo $result_customer['phone'] ?></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>:</td>
                    <td><?php echo $result_customer['email'] ?></td>
                </tr>


                <?php }}?>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>