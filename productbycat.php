<?php
	include_once 'include/header.php';
	//include 'include/slider.php';

?>
<?php 

    if(!isset($_GET['cat_id']) || $_GET['cat_id']==NULL || $_GET['cat_id'] ==''){
        echo "<script> window.location='404.php'</script>";
        
    }else{
        $id=$_GET['cat_id'];

    }
    
    // if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    //     $updateproduct = $product->update_product($_POST,$_FILES,$id);
    // }
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>category:</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php  
                $product_by_cat = $cat -> product_by_cat($id);
                if($product_by_cat){
                    while($result=$product_by_cat->fetch_assoc()){
                
            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="detail.php?product_id=<?php echo $result['product_id']?>"><img
                        src="admin/upload/<?php echo $result['image']?>" alt="" /></a>
                <h2><?php echo $result['product_Name']?> </h2>
                <p><?php echo $result['decription']?></p>
                <p><span class="price"><?php echo $result['price'] . " VND"?></span></p>
                <div class="button"><span><a href="detail.php?product_id=<?php echo $result['product_id']?>"
                            class="details">Details</a></span></div>
            </div>
            <?php }} ?>
        </div>



    </div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>