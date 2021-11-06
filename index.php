
<?php include 'inc/header.php' ?>

<?php
if(isset($_GET['delId'])){
  $id = $_GET['delId'];
  $delete = $crd->delete($id);
}
 ?>
  <div class="middlebar clear">
    <?php
    if(isset($delete)){
      echo $delete;
    }
     ?>
    <table style="width: 95%;" class="table clear">
      <tr>
        <th width="25%">Name</th>
        <th width="25%">Email</th>
        <th width="25%">Address</th>
        <th width="25%">Action</th>
      </tr>
      <?php
        $data = new Crud();
        $getData = $data->getData(); 
        if($getData){
          while($result = $getData->fetch_assoc()){
      ?>

      <tr>
        <td width="15%"><?php echo $result['name']; ?></td>
        <td width="15%"><?php echo $result['email']; ?></td>
        <td width="15%"><?php echo $result['address']; ?></td>
        <?php  if($result['image'] == null) { ?> <td width="15px">No Image</td> <?php } else { ?> <td width="15%"> <img width="100px" height="100px" src="<?php echo $result['image']; ?>"> </td> <?php } ?> 

        <td width="10%"> <a href="update.php?id=<?php echo $result['id']; ?>">Edit</a> <a onclick="return confirm('Are you sure to delete!!?')" href="?delId=<?php echo $result['id']; ?>">Delete</a> </td>
      </tr>
    <?php } } ?>
    </table>

    <a class="button" style="background: blue; color:white" href="create.php">Create</a>

  </div>


<?php include 'inc/footer.php' ?>


                    <?php   

          // foreach ($getData as $data) {
          //   echo $data['name'] . "<br>" . $data['email'] . "<br>" . $data['address'];
          //   echo "<br>";
          //   echo "<br>";
          // }

       ?> 