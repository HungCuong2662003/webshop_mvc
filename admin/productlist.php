<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/category.php';?>
<?php include '../class/brand.php';?>
<?php include '../class/product.php'; ?>
<?php include_once '../helper/format.php'; ?>
<?php 
	$product= new product();
    
	if(!isset($_GET['product_id']) || $_GET['product_id']==NULL){
        // echo "<script> window.location ='catlist.php'</script>";
        
    }else{
        $id=$_GET['product_id'];
		$deleteproduct = $product->delete_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
            <?php
            if(isset($deleteproduct)){
                echo $deleteproduct;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$product = new product();
						$fm = new Format();
						$productlist= $product -> show_product();
						if($productlist){
							$i=0;
							while($result=$productlist->fetch_assoc()){
								$i++;
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_Name'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td> <img alt="" src=" upload/<?php echo $result['image'] ?> " width="80"></td>
                        <td><?php echo $result['cat_Name'] ?></td>
                        <td><?php echo $result['brand_Name'] ?></td>
                        <td><?php echo $fm->textShorten( $result['decription'], 50)?></td>
                        <td><?php 
							if($result['type']==0){
								echo 'Feathered';
							}else{
								echo 'Non Feathered';
							}
						
						?></td>
                        <td class="center"> 4</td>
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id']?>">Edit</a> || <a
                                onclick="return confirm('bạn có chắc chắn muốn xóa?')"
                                href="productlist.php?product_id=<?php echo $result['product_id']?>">Delete</a></td>
                    </tr>
                    <?php
						}}
					?>

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