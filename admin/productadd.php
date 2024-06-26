﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/category.php';?>
<?php include '../class/brand.php';?>
<?php include '../class/product.php'; ?>
<?php 
    	$product= new product();
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
            $productName=$_POST['product_Name'];
            $insertproduct = $product->insert_product($_POST, $_FILES);
            
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
            <?php
            if(isset($insertproduct)){
                echo $insertproduct;
            }
            ?>
            <form action="productadd.php" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="product_Name" placeholder="Enter Product Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>Select Category</option>
                                <?php 
                                    $cat = new category();
                                    $catlist=$cat->show_category();
                                    if($catlist){
                                        while($result = $catlist->fetch_assoc()){
    
                                ?>
                                <option value="<?php echo $result['cat_id'] ?>"><?php echo $result['cat_Name'] ?>
                                </option>
                                <?php 
                                        }}
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>Select Brand</option>
                                <?php 
                                    $brand = new brand();
                                    $brandlist=$brand->show_brand();
                                    if($brandlist){
                                        while($result = $brandlist->fetch_assoc()){
 
                                ?>
                                <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_Name'] ?>
                                </option>
                                <?php 
                                        }}
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="Decription" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="Price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                <option value="1">Featured</option>
                                <option value="0">Non-Featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>