<?php
	include_once 'include/header.php';
	// include_once 'include/slider.php';

?>
<?php 
    $login_check= Session::get('customer_login');
    if($login_check==false){
        header('Location:login.php');
    }       
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="order_page">
                <div class=not_found style="font-size: 40; color: red;"> oder page </div>

            </div>

        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>