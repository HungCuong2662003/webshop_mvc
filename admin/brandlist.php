<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include '../class/brand.php';
?>
<?php 
	$brand= new brand();
	if(!isset($_GET['deleteID']) || $_GET['deleteID']==NULL){
        // echo "<script> window.lobrandion ='brandlist.php'</script>";
        
    }else{
        $id=$_GET['deleteID'];
		$deletebrand = $brand->delete_brand($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>brandegory List</h2>
        <div class="block">
            <?php
            if(isset($deletebrand)){
                echo $deletebrand;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
						$show_brand=$brand->show_brand();
						if($show_brand){
							$i=0;
							while($result=$show_brand->fetch_assoc()){
								$i++;
							
						
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['brand_Name'] ?></td>
                        <td><a href="brandedit.php?brandid=<?php echo $result['brand_id']?>">Edit</a> || <a
                                onclick="return confirm('bạn có chắc chắn muốn xóa?')"
                                href="brandlist.php?deleteID=<?php echo $result['brand_id']?>">Delete</a>
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