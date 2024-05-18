<?php
	include '../class/adminlogin.php';
?>
<?php
	$class= new adminLogin();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$adminUser=$_POST['username'];
		$adminPass= md5 ($_POST['password']);
		$logincheck = $class->login_admin($adminUser,$adminPass);
        echo $adminPass;
        echo $adminUser;
	}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <span>
                    <?php
						if(isset($logincheck)){
							echo $logincheck;
						}
					?>
                </span>
                <div>
                    <input type="text" placeholder="Username" required="" name="username" />
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="password" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>