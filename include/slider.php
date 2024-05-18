<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php $getlouis= $product-> getlouis();
                if($getlouis){
                    while($result_getlouis= $getlouis->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="detail.php?product_id=<?php echo $result['product_id'] ?>"> <img
                            src="admin/upload/<?php echo $result_getlouis['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $result_getlouis['product_Name']; ?></h2>
                    <p><?php echo $result_getlouis['decription']; ?></p>
                    <div class="button"><span><a
                                href="detail.php?product_id=<?php echo $result_getlouis['product_id'] ?>">Add to
                                cart</a></span></div>
                </div>
            </div>
            <?php }}?>
            <?php $getgucci= $product-> getgucci();
                if($getgucci){
                    while($result_getgucci= $getgucci->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="detail.php?product_id=<?php echo $result['product_id'] ?>"><img
                            src="admin/upload/<?php echo $result_getgucci['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $result_getgucci['product_Name']; ?></h2>
                    <p><?php echo $result_getgucci['decription']; ?></p>
                    <div class="button"><span><a
                                href="detail.php?product_id=<?php echo $result_getgucci['product_id'] ?>">Add to
                                cart</a></span></div>
                </div>
            </div>
            <?php }}?>
        </div>
        <div class="section group">
            <?php $gethermes= $product-> gethermes();
                if($gethermes){
                    while($result_gethermes= $gethermes->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="detail.php?product_id=<?php echo $result['product_id'] ?>"> <img
                            src="admin/upload/<?php echo $result_gethermes['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $result_gethermes['product_Name']; ?></h2>
                    <p><?php echo $result_gethermes['decription']; ?></p>
                    <div class="button"><span><a
                                href="detail.php?product_id=<?php echo $result_gethermes['product_id'] ?>">Add to
                                cart</a></span></div>
                </div>

            </div>
            <?php }}?>
            <?php $getceline= $product-> getceline();
                if($getceline){
                    while($result_getceline= $getceline->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2">
                <div class="listimg listimg_2_of_1">
                    <a href="detail.php?product_id=<?php echo $result['product_id'] ?>"><img
                            src="admin/upload/<?php echo $result_getceline['image']; ?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2><?php echo $result_getceline['product_Name']; ?></h2>
                    <p><?php echo $result_getceline['decription']; ?></p>
                    <div class="button"><span><a
                                href="detail.php?product_id=<?php echo $result_getceline['product_id'] ?>">Add to
                                cart</a></span></div>
                </div>
            </div>
            <?php }}?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <!-- <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img style="height: 20px; width:auto " src="admin/upload/3f7182f1ee.jpg" alt="" /></li>
                    <li><img style="height: 20px ; width:auto" src="admin/upload/15561ea479.jpg" alt="" /></li>
                    <li><img style="height: 20px; width:auto " src="admin/upload/190b4f4f66.jpg" alt="" /></li>
                    <li><img style="height: 20px ; width:auto" src="admin/upload/22967605a0.jpg" alt="" /></li>
                </ul>
            </div>
        </section> -->
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>