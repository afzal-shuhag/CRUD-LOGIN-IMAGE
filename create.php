
<?php include 'inc/header.php' ?>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $address = $_POST['address'];
    // $add = $crd->insert($name,$email,$address,$_FILES);
    $add = $crd->insert($_POST,$_FILES);
  }
 ?>

  <div class="middlebar clear">
    <?php
      if(isset($add)){
        echo $add;
      }
     ?>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="email" name="email" placeholder="Enter Email">
        <input type="text" name="address" placeholder="Enter Address">
        <br> <br>
        <input type="file" name="image">
        <br> <br>
        <input type="submit" name="submit" value="submit">
      </form>

      <a class="button" style="background: blue; color:white" href="index.php">Home</a>
  </div>


<?php include 'inc/footer.php' ?>
