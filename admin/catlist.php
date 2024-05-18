<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include '../class/category.php';
?>
<?php 
	$cat= new category();
	if(!isset($_GET['deleteID']) || $_GET['deleteID']==NULL){
        // echo "<script> window.location ='catlist.php'</script>";
        
    }else{
        $id=$_GET['deleteID'];
		$deleteCat = $cat->delete_category($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <?php
            if(isset($deleteCat)){
                echo $deleteCat;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$show_cat=$cat->show_category();
						if($show_cat){
							$i=0;
							while($result=$show_cat->fetch_assoc()){
								$i++;
							
						
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['cat_Name'] ?></td>
                        <td><a href="catedit.php?catid=<?php echo $result['cat_id']?>">Edit</a> || <a
                                onclick="return confirm('bạn có chắc chắn muốn xóa?')"
                                href="catlist.php?deleteID=<?php echo $result['cat_id']?>">Delete</a>
                        </td>
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