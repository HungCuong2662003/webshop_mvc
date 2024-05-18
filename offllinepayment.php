<?php
	include_once 'include/header.php';

?>
<?php
    if(isset($_GET['orderid']) && $_GET['orderid']== 'order'){
        $customer_id = Session::get('customer_id');
        $insert_order = $cart ->insert_order($customer_id);
        $delCart =$cart -> del_all_data();
        header('Location: success.php');
    }
?>
<style>
.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;

}

.box_right {
    width: 45%;
    border: 1px solid #666;
    float: right;
    padding: 4px;

}

.submit_order {
    background: rebeccapurple;
    padding: 5px 20px;

    color: black;
    font-size: 21px;

}
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="headding"></div>
                <div class="clear"></div>
                <div class="box_left">
                    <div class="cartpage">
                        <h2>Giỏ hàng</h2>

                        <?php
                    if(isset($update_quantity_cart)){
                        echo $update_quantity_cart;
                    }
                 ?>
                        <?php
                    if(isset($deleteproduct_cart)){
                        echo $deleteproduct_cart;
                    }
                 ?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Product Name</th>
                                <th width="10%">Image</th>
                                <th width="15%">Price</th>
                                <th width="25%">Quantity</th>
                                <th width="20%">Total Price</th>

                            </tr>
                            <?php 
                        $get_product = $cart -> get_product_cart();
                        if($get_product){
                            $subtotal=0;
                            $quantity=0;
                            $i=0;
                            while($result_cart = $get_product ->fetch_assoc()){
                        $i++;
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result_cart['product_Name'] ?></td>
                                <td><img style=" height: auto; width: auto;"
                                        src="admin/upload/<?php echo $result_cart['image'] ?>" alt="" />
                                </td>
                                <td><?php echo $result_cart['price'] . " VND" ?></td>
                                <td>
                                    <?php echo $result_cart['quantity']; ?>
                                <td><?php
                            $total=  $result_cart['quantity'] *  $result_cart['price'];
                            echo $total?></td>

                            </tr>
                            <?php $subtotal += $total;
                         $quantity=$result_cart['quantity']+ $quantity; }} ?>


                        </table>
                        <?php
                $check_cart = $cart -> check_cart();
                    if($check_cart){
  
                ?>
                        <table style="float:right;text-align:left;" width="40%">
                            <tr>
                                <th>Sub Total : </th>
                                <td><?php echo  $subtotal ." VND";
                       
                            Session::set('sum',$subtotal);
                            Session::set('quantity',$quantity);

                        
                        ?></td>
                            </tr>
                            <tr>
                                <th>VAT : </th>
                                <td><?php $vat= 0.1 ; echo $vat * 100  . "% " ."(" .$subtotal * $vat." VND)" ?></td>
                            </tr>
                            <tr>
                                <th>Grand Total :</th>
                                <td><?php $grand = $subtotal + $subtotal * $vat; echo $grand." VND" ?> </td>
                            </tr>

                        </table>
                        <?php }else{
                    echo 'giỏ hàng trống';
                    }?>
                    </div>
                </div>

                <div class="box_right">
                    <div class="cartpage">
                        <h2>Thông tin đặt hàng</h2>

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
            <center><a href="?orderid=order" class="submit_order"> Đặt hàng</a></center>
        </div>
</form>
<?php

include_once 'include/footer.php';
?>