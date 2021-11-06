<?php\
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../database/Database.php');
  // include_once '../lib/Database.php';
  // include_once '../helpers/Format.php';
?>

<?php

  /**
   *
   */
  class Crud
  {
    private $db;

    function __construct()
    {
      $this->db = new Database();
    }

    public function getData()
    {
      $query = " SELECT * FROM tbl_data ORDER BY id DESC ";
      $result = $this->db->select($query);
      return $result;

    }

    public function insert($data,$file)
    {
      $name = $data['name'];
      $email = $data['email'];
      $address = $data['address'];

      $permited  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $file['image']['name'];
      $file_size = $file['image']['size'];
      $file_temp = $file['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
      $uploaded_image = "upload/".$unique_image;

      if($name == '' || $email == '' || $address == '' || $file_name == ''){
        $msg = " <span class='error'>Fields must not be empty</span> ";
        return $msg;
      }
      elseif ($file_size >1048567) {
       echo "<span class='error'>Image Size should be less then 1MB!
       </span>";
      }
      elseif (in_array($file_ext, $permited) === false) {
       echo "<span class='error'>You can upload only:-"
       .implode(', ', $permited)."</span>";
      }

      else{
        move_uploaded_file($file_temp, $uploaded_image);
       $query = "INSERT INTO tbl_data(name,email,address,image)
       VALUES('$name','$email','$address','$uploaded_image')";
       $productInsert = $this->db->insert($query);
       if($productInsert){
         $msg = " <span class='success'>Product inserted successffully...</span> ";
         return $msg;
       }else{
         $msg = " <span class='error'>Failed...</span> ";
         return $msg;
       }
      }


      // $query = "INSERT INTO tbl_data(name,email,address)
      //   VALUES('$name','$email','$address')";
      //   $result = $this->db->insert($query);

      // if ($result) {
      //   $msg = "Successfully Added";
      //   return $msg;
      // }else{
      //   $msg = "Sorry! Something went wrong";
      //   return $msg;
      // }
    }

    public function getDataById($id)
    {
      $query = " SELECT * FROM tbl_data WHERE id = '$id' ";
      $result = $this->db->select($query);
      return $result;
    }

    public function update($name,$email,$address,$id)
    {
      $query = "
       UPDATE tbl_data
       SET
       name = '$name',
       email = '$email',
       address = '$address'

       WHERE id = '$id'
      ";
      $cartUpdate = $this->db->update($query);
      if($cartUpdate){
        $msg = " <span class='success'>Upated successffully...</span> ";
        return $msg;
      }else{
        $msg = " <span class='error'>Failed...</span> ";
        return $msg;
      }
    }

    public function delete($id)
    {
      $query = " DELETE FROM tbl_data WHERE id = '$id' ";
      $result = $this->db->delete($query);
      if($result){
        $msg = "<span class='success'>Deleted Successfully</span>";
        return $msg;
      }else{
        $msg = "<span class='error'>Something went wrong</span>";
        return $msg;
      }
    }


  }


 ?>
