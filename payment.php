<?php
	include_once 'include/header.php';
	include_once 'include/slider.php';

?>
<style>
h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;


}

.wrapper_method {
    text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    background: cornsilk;
}

.wrapper_method a {
    padding: 10px;
    background: red;
    color: #fff;

}

.wrapper_method h3 {
    margin-bottom: 20px;
}
</style>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>payment method</h3>
            </div>

            <div class="clear"></div>
            <div class="wrapper_method">
                <h3 class="payment">Chọn phương thức thanh toán</h3>
                <a href="offllinepayment.php">Thanh toán offline</a>
                <a href="onlinepayment.php">Thanh toán online</a> <br> <br><br>
                <a style="background: grey;" href="cart.php">Quay lại</a>
            </div>
        </div>



    </div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>