<?php
	include_once 'include/header.php';
	// include_once 'include/slider.php';

?>
<?php 
    $login_check= Session::get('customer_login');
    if($login_check){
        header('Location:order.php');
    }       
?>
<?php 
  
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){

            $insertcustomer = $customer->insert_customer($_POST);
            
        }
?>
<?php 
    
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){

            $login_customer = $customer->login_customer($_POST);
            
        }
?>
<div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Existing Customers</h3>
            <p>Sign in with the form below.</p>
            <?php if(isset($login_customer)){
                echo $login_customer;
            } ?>
            <form action="" method="post">
                <input type="text" name="email" class="field" placeholder="nhap email">
                <input type="password" name="Password" class="field" placeholder="nhap password">

                <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons">
                    <div><input type="submit" name="login" class="grey" value="sign in"></input></div>
                </div>
            </form>
        </div>

        <?php  ?>
        <div class="register_account">
            <h3>Register New Account</h3>
            <?php if(isset($insertcustomer)){
                echo $insertcustomer;
            } ?>
            <form action="" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="Name" placeholder="Nhập Name">
                                </div>

                                <div>
                                    <input type="text" name="City" placeholder="Nhập City">
                                </div>

                                <div>
                                    <input type="text" name="ZipCode" placeholder="Nhập Zip-Code">
                                </div>
                                <div>
                                    <input type="text" name="EMail" placeholder="Nhập E-Mail">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="Address" placeholder="Nhập Address">
                                </div>
                                <div>
                                    <select id="country" name="country" onchange="change_country(this.value)"
                                        class="frm-field required">
                                        <option value="null">Select a Country</option>
                                        <option value="AF">Afghanistan</option>


                                    </select>
                                </div>

                                <div>
                                    <input type="text" name="Phone" placeholder="Nhập Phone">
                                </div>

                                <div>
                                    <input type="text" name="Password" placeholder="Nhập Password">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><input type="submit" name="submit" class="grey" value="Create Account"></input></div>
                </div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.
                </p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<?php
include_once 'include/footer.php';
?>