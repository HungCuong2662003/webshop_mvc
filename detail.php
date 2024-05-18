<?php
	include_once 'include/header.php';

?>
<?php
    if(!isset($_GET['product_id']) || $_GET['product_id']==NULL|| $_GET['product_id'] ==''){
        echo "<script> window.location='404.php'</script>";
        
    }else{
        $id= $_GET['product_id'];
    }
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $quanyity = $_POST['quantity'];
        
        $addtocart = $cart->add_to_cart($quanyity,$id);
        
    }
?>
<div class="main">
    <div class="content">
        <?php
            $get_product_detail =$product->delete_product_detail($id);
            if($get_product_detail){
                while($result_detail=$get_product_detail->fetch_assoc()){
            
        ?>
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/upload/<?php echo $result_detail['image']?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $result_detail['product_Name']?> </h2>
                    
                    <p><?php echo $fm->textShorten( $result_detail['decription'],50)?></p>
                    <div class="price">
                        <p>Price: <span><?php echo $result_detail['price']." VND"?></span></p>
                        <p>Category: <span><?php echo $result_detail['cat_Name']?></span></p>
                        <p>Brand:<span><?php echo $result_detail['brand_Name']?></span></p>
                    </div>

                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" value="1" min="1" />
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now" />
                        </form>
                        <?php if(isset($addtocart)){
                            echo '<span style="color: red; font-size: 20px;">Sản phẩm đã có trong giỏ</span>';

                        }?>
                    </div>

                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <?php echo $result_detail['decription']?>
                </div>
                <?php 
                }}
                ?>
            </div>
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIES</h2>
                <ul>
                    <?php $get_category= $cat->show_category();
                        if($get_category){
                            while($result_category = $get_category->fetch_assoc()){

                    ?>
                    <li><a
                            href="productbycat.php?cat_id=<?php echo $result_category['cat_id']?>"><?php echo $result_category['cat_Name'] ?></a>

                    </li>

                    <?php }} ?>
                </ul>

            </div>
        </div>
    </div>
</div>
<?php
include_once 'include/footer.php';
?>