<?php
	include_once 'include/header.php';
	include_once 'include/slider.php';

?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
              $getproduct = $product->getproduct();
              if($getproduct){
                while($result = $getproduct ->fetch_assoc()){
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="detail.php"><img src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
                <h2><?php echo $result['product_Name']?></h2>
                <p><?php echo $fm->textShorten($result['decription'], 20)?></p>
                <p><span class="price"><?php echo $result['price']." VND"?></span></p>
                <div class="button"><span><a href="detail.php?product_id=<?php echo $result['product_id'] ?>"
                            class="details">Details</a></span>
                </div>
            </div>
            <?php
             }}
            ?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
              $getproduct_new = $product->getproduct_new();
              if($getproduct_new){
                while($result_new = $getproduct_new ->fetch_assoc()){
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="detail.php"><img src="admin/upload/<?php echo $result_new['image']?>" alt="" /></a>
                <h2><?php echo $result_new['product_Name']?></h2>
                <p><?php echo $fm->textShorten($result_new['decription'], 20)?></p>
                <p><span class="price"><?php echo $result_new['price']." VND"?></span></p>
                <div class="button"><span><a href="detail.php?product_id=<?php echo $result_new['product_id'] ?>"
                            class="details">Details</a></span></div>
            </div>
            <?php
             }}
            ?>
        </div>
    </div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>