<?php 
include 'classes/Login.php';


// $filepath = realpath(dirname(__FILE__));
//   include_once ($filepath.'/../classes/Login.php');
	




 ?>


<?php

  $a1 = new Adminlogin();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);
    $loginchk = $a1->adminLogin($adminUser,$adminPass);
  }

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>

      <span style="font-size:16px; color:red">
        <?php
          if(isset($loginmsg)){
            echo $loginmsg;
          }
         ?>
      </span>
			<div>
				<input type="text" placeholder="Username"  name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#"></a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
