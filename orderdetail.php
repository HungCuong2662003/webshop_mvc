<?php
	include_once 'include/header.php';
	// include_once 'include/slider.php';
    

?>
<!-- <?php
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
?>-->
<?php 
                    $login_check = Session::get('customer_login');
                    if($login_check==false){
                        header('Location: login.php');

                    }
                    $cart = new cart();
                    if(isset($_GET['confirm_id'])){
                        $confirm_id=$_GET['confirm_id'];
                        $time=$_GET['time'];
                        $price=$_GET['price'];
                        $shifted_confirm = $cart -> shifted_confirm($confirm_id,$time,$price); 
                     }
                    ?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Đơn hàng đã đặt</h2>


                <table class="tblone">
                    <tr>
                        <th width="5%">ID</th>

                        <th width="15%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="10%">Quantity</th>
                        <th width="25%">Date</th>
                        <th width="10%">Status</th>

                        <th width="10%">Action</th>
                    </tr>
                    <?php 
                        $customer_id = Session::get('customer_id');
                        $get_ordered = $cart -> get_ordered($customer_id);
                        if($get_ordered){
                          $i=0;
                          $quantity=0;
                            while($result_cart = $get_ordered ->fetch_assoc()){
                                $i++;
                            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result_cart['product_Name'] ?></td>
                        <td><img style=" height: auto; width: auto;"
                                src="admin/upload/<?php echo $result_cart['image'] ?>" alt="" />
                        </td>
                        <td><?php echo $result_cart['price'] ." VND"?></td>
                        <td> <?php echo $result_cart['quantity']; ?></td>
                        <td><?php echo $fm->formatDate($result_cart['date_order']) ?></td>
                        <td><?php if($result_cart['status']=='0'){
                            echo 'Đang xử lý';
                            }elseif($result_cart['status']=='1'){
                              ?>
                            <a
                                href="?confirm_id=<?php echo $customer_id?>&price=<?php echo $result_cart['price']?>&time=<?php echo $result_cart['date_order']?>">Đang
                                xử
                                lý</a>
                            <?php
                            }else{
                                echo 'Đã nhận';
                            }
                            
                            ?>
                        </td>
                        <td>

                        </td>
                        <?php if($result_cart['status']=='0'){
                
                        ?>
                        <td><?php echo 'N/A'; ?></td>
                        <?php }else{?>
                        <td><a onclick=" return confirm('Bạn có chắc chắn muốn xóa?')"
                                href="?cart_id=<?php echo $result_cart['product_Name'] ?>">Xóa</a></td>
                        <?php }?>
                    </tr>
                    <?php  }} ?>


                </table>


            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
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