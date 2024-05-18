<?php
	include_once 'include/header.php';
	include_once 'include/slider.php';
    

?>
<?php
if(!isset($_GET['cart_id_delete']) || $_GET['cart_id_delete']==NULL){
    // echo "<script> window.location ='catlist.php'</script>";
    
}else{
    $cart_id = $_GET['cart_id_delete'];
    $deleteproduct_cart = $cart->delete_product_cart($cart_id);
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $quantity = $_POST['quantity'];
        $cart_id = $_POST['cart_id'];
        $update_quantity_cart = $cart->update_quantity($quantity,$cart_id);
        if($quantity<=0){
            $deleteproduct_cart = $cart->delete_product_cart($cart_id);
        }
    }
?>
<?php
    if(isset($_GET['cart_id'])){
        echo "<meta http-equiv='refresh' content='0; URL=?cart_id=live'>";
    }
?>

<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>

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
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php 
                        $get_product = $cart -> get_product_cart();
                        if($get_product){
                            $subtotal=0;
                            $quantity=0;
                            while($result_cart = $get_product ->fetch_assoc()){
                        
                    ?>
                    <tr>
                        <td><?php echo $result_cart['product_Name'] ?></td>
                        <td><img style=" height: auto; width: auto;"
                                src="admin/upload/<?php echo $result_cart['image'] ?>" alt="" />
                        </td>
                        <td><?php echo $result_cart['price'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $result_cart['cart_id'] ?>" />
                                <input type="number" name="quantity" min="0"
                                    value="<?php echo $result_cart['quantity']; ?>" />

                                <input type="submit" name="submit" value="Update" />
                            </form>
                        </td>
                        <td><?php
                            $total=  $result_cart['quantity'] *  $result_cart['price'];
                            echo $total?></td>
                        <td><a onclick="return confirm('bạn có chắc chắn muốn xóa?')"
                                href="?cart_id_delete=<?php echo $result_cart['cart_id'] ?>">X</a></td>
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
                        <td><?php echo  $subtotal;
                       
                            Session::set('sum',$subtotal);
                            Session::set('quantity',$quantity);

                        
                        ?></td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td><?php $vat= 0.1 ; echo $vat * 100  . "%" ?></td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td><?php $grand = $subtotal + $subtotal * $vat; echo $grand ?> </td>
                    </tr>
                </table>
                <?php }else{
                    echo 'giỏ hàng trống';
                    }?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>