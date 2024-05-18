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
.success {
    text-align: center;
    color: green;

}

.succes_note {
    text-align: center;
    padding: 8px;
    font-size: 17px;
}
</style>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <h2 class="success">Success Order</h2>
                <?php 
                 $customer_id = Session::get('customer_id');
                $get_amount = $cart -> getamountprice($customer_id);
                if($get_amount){
                    $amount=0;
                    while($result=$get_amount->fetch_assoc()){
                        $price =$result['price'];
                        $amount += $price;
                    }
                }
                ?>
                <p class="succes_note">Tổng tiền bạn đã mua từ web:
                    <?php $vat =$amount*0.1; $total= $vat+$amount; echo $total ." VND"; ?></p>
                <p class="succes_note">Chúng tôi sẽ liên lạc với bạn sớm nhất có thể <a href="orderdetail.php">Click
                        Here</a></p>
            </div>

        </div>
</form>
<?php

include_once 'include/footer.php';
?>