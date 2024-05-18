<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   include '../class/category.php'; 
   $filepath = realpath(dirname(__FILE__));
    require_once $filepath.'/../class/customer.php';
    require_once $filepath.'/../helper/format.php';
?>
<?php 
    $customer = new customer();
    if(!isset($_GET['customer_id']) || $_GET['customer_id']==NULL|| $_GET['customer_id'] ==''){
        echo "<script> window.location='inbox.php'</script>";
        
    }else{
        $customer_id=$_GET['customer_id'];

    }
    // if($_SERVER['REQUEST_METHOD']=='POST'){
    //     $catName=$_POST['catName'];
    //     $updateCat = $customer->update_category($catName,$id);
    // }
?>
<?php 

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">

            <?php
                $get_customer= $customer->show_customer($customer_id);
                if($get_customer){
                    while($result=$get_customer->fetch_assoc()){    
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>" name="catName"
                                class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['address'] ?>"
                                name="catName" class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['city'] ?>" name="catName"
                                class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>country</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['country'] ?>"
                                name="catName" class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>zipcode</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['zipcode'] ?>"
                                name="catName" class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['phone'] ?>" name="catName"
                                class="medium" ;>
                        </td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['email'] ?>" name="catName"
                                class="medium" ;>
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