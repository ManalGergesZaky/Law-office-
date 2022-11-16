<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';


adminAndLawyerAuth();
notAllawoLawyer();
//variable
$name ="";
$age ="";
$address="";
$phone ="";
$email="";
$password ="";
$role="";
$image ="";
$name_image ="";
$size_image ="";
$type_image ="";
$tmp_image="";


$select = "SELECT * FROM roles";
$allRoles = mysqli_query($connection , $select);
// testQuery($allRoles , "select All Roles");

//insert
if(isset($_POST['insert'])){
  if(empty($_FILES["image"]['name'])){
    $image = "";
  }else{
    $name_image = $_FILES['image']['name'];
    $size_image = $_FILES['image']['size'];
    $type_image = $_FILES['image']['type'];
    $tmp_image = $_FILES['image']['tmp_name'];

    $upload =".//upload/";
    $loc= $upload .time() . $name_image ;
    move_uploaded_file($tmp_image , $loc);
    $image = time() . $name_image ;
    echo $name_image;
    echo $size_image;
    echo $type_image;
    echo $tmp_image;
  }
    

    

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role=$_POST['rol'];
    $password = $_POST['password'];
    

    

$insert = "INSERT INTO `admin` VALUES(null,'$name', $age, '$address', '$phone', '$email', '$password','$image' , $role)";
$checkInsert = mysqli_query($connection , $insert);
// testQuery($checkInsert , "Insert new Admin");
// header("location:  /ODC Back end/05/employees/create.php");
// location('employees/list.php');
}

?>
<main class="main" id="main">
  <h1 class="text-center">Create New Admin</h1>
  <form class="mx-auto border border-secondary col-8 " method="post" enctype="multipart/form-data" >
  <div class="form-group">
      <label >Admin Name</label>
      <input name="name" type="text" class="form-control btn-secondary" value="<?php echo $name; ?>" >
    </div>
    <div class="form-group">
      <label >Age</label>
      <input name="age" type="text" class="form-control btn-secondary" value="<?php echo $age; ?>" >
    </div>
    <div class="form-group">
      <label >Address</label>
      <input name="address" type="text" class="form-control btn-secondary" value="<?php echo $address; ?>" >
    </div>
    <div class="form-group">
      <label >Phone</label>
      <input name="phone" type="text" class="form-control btn-secondary" value="<?php echo $phone; ?>" >
    </div>
    <div class="form-group">
      <label >Email</label>
      <input name="email" type="text" class="form-control btn-secondary" value="<?php echo $email; ?>" >
    </div>
    <div class="form-group">
      <label >password</label>
      <input name="password" type="password" class="form-control btn-secondary" value="<?php echo $password ;?>" >
    </div>

    <div class="form-group">
      <label >Role</label>
      <select class="btn-secondary" name="rol">
          <?php foreach($allRoles as $role) {?>
          <option class="btn-secondary" value="<?php echo $role['id'] ;?>">
            <?php echo $role['id']; ?>
            </option>
          <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Uplode  image</label>
      <input name="image" type="file" class="form-control btn-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo $image;  ?>">
    </div>

    <div class="btn">
      <button name="insert" type="submit" class="btn btn-success"> Insert Data </button>
    </div>
    
  </form>
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>