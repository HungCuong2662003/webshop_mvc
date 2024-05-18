<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath = realpath(dirname(__FILE__));
require_once $filepath.'/../class/cart.php';
require_once $filepath.'/../helper/format.php';
?>
<?php    
	$cart=new cart();
    if(isset($_GET['shiftid'])){
       $id=$_GET['shiftid'];
	   $time=$_GET['time'];
	   $price=$_GET['price'];
	   $shifted = $cart -> shifted($id,$time,$price); 
	}
    if(isset($_GET['delid'])){
       $delid=$_GET['delid'];
	   $time=$_GET['time'];
	   $price=$_GET['price'];
	   $del_shifted = $cart -> del_shifted($delid,$time,$price); 
	}
    ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <?php
			if(isset($shifted)){
				echo $shifted;
			}
			?>
            <?php
			if(isset($del_shifted)){
				echo $del_shifted;
			}
			?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Oder time</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Customer ID</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$cart=new cart();
					$fm = new Format();
					$get_inbox = $cart-> get_inbox_cart();
					if($get_inbox){
						$i=0;
						while($result= $get_inbox ->fetch_assoc()){
							$i++;
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $fm->formatDate( $result['date_order'])?></td>
                        <td><?php echo $result['product_Name'];?></td>
                        <td><?php echo $result['quantity'];?></td>
                        <td><?php echo $result['price']."  VND";?></td>
                        <td><?php echo $result['customer_id'];?></td>
                        <td><a href="customer.php?customer_id=<?php echo $result['customer_id']?>">view customer</a>
                        </td>

                        <td>
                            <?php
							if($result['status']==0){

							
							?>
                            <a
                                href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Đang
                                xử
                                lý</a>
                            <?php
							}else if($result['status']==1){
								
							?>
                            <a
                                href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Đã
                                vận chuyển</a>
                            <?php
							}else {
								
							?>

                            <a
                                href="?delid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Hoàn
                                thành đơn hàng</a>
                            <?php } ?>
                        </td>
                    </tr>S
                    <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>