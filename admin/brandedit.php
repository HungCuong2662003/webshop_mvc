<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../class/brand.php'; 
?>
<?php 
    $brand=new brand();
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL|| $_GET['brandid'] ==''){
        echo "<script> window.location='brandlist.php'</script>";
        
    }else{
        $id=$_GET['brandid'];

    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandName=$_POST['brandName'];
        $updatebrand = $brand->update_brand($brandName,$id);
    }
?>
<?php 

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">
            <?php
            if(isset($updatebrand)){
                echo $updatebrand;
            }
            ?>
            <?php
                $get_brand_name= $brand->getbyID($id);
                if($get_brand_name){
                    while($result=$get_brand_name->fetch_assoc()){    
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $result['brand_Name'] ?>" name="brandName"
                                class="medium" ; placeholder='Sửa danh mục'>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Edit" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                    }
                } 
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>