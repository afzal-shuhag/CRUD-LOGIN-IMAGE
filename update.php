
<?php include 'inc/header.php' ?>

<?php

if(!isset($_GET['id']) || $_GET['id'] == null){
echo "<script> window.location = 'index.php'; </script>";
}else{
$id = $_GET['id'];
}

 ?>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $update = $crd->update($name,$email,$address,$id);
  }
 ?>

  <div class="middlebar clear">
    <?php
      if(isset($update)){
        echo $update;
      }
     ?>

     <?php
        $getData = $crd->getDataById($id);
        if ($getData) {
          while ($result = $getData->fetch_assoc()) {
      ?>

      <form class="" action="" method="post">
        <input type="text" name="name" value=" <?php echo $result['name']; ?> ">
        <input type="email" name="email" value=" <?php echo $result['email']; ?> ">
        <input type="text" name="address" value=" <?php echo $result['address']; ?> ">
        <input type="submit" name="submit" value="Update">
      </form>

    <?php } } ?>

      <a class="button" style="background: blue; color:white" href="index.php">Home</a>
  </div>


<?php include 'inc/footer.php' ?>
