<?php 

    include 'classes/Session.php';

    Session::checkSession();
?>

<?php   

    if(isset($_GET['delId']) && $_GET['delId'] == 'logout') {
       
        Session::destroy();
    }

 ?>



            <h2 style="text-align: center; margin-top: 100px; font-size: 50px;">You are logged in!!</h2>

            <a style="width: 100px; background: blue; color:white; padding: 20px; text-align:center; display:inline-block; margin:0 auto;" href="dashboard.php?delId=logout"> Logout</a>

