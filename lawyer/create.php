<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

//variable
$name ="";
$age ="";
$address="";
$salary="";
$yearsEx="";
$phone ="";
$email="";
$password ="";
$image ="";
$name_image ="";
$size_image ="";
$type_image ="";
$tmp_image="";


authAdmin();
//insert
if(isset($_POST['insert'])){
  if(empty($_FILES["image"])){
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
    $salary = $_POST['salary'];
    $yearsEx = $_POST['yearsEx'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    

$insert = "INSERT INTO `lawyers` VALUES(null,'$name', $age, '$address',$salary, $yearsEx ,'$phone', '$email', '$password','$image' )";
$checkInsert = mysqli_query($connection , $insert);
// testQuery($checkInsert , "Insert new Admin");
// header("location:  /ODC Back end/05/employees/create.php");
// location('employees/list.php');
}

?>

<main class="main" id="main">
  <h1 class="text-center"> Create New Lawyer</h1>
  <form class="mx-auto border border-secondary col-6 " method="post" enctype="multipart/form-data" >
  <div class="form-group">
      <label >Lawyers Name</label>
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
      <label >Salary</label>
      <input name="salary" type="text" class="form-control btn-secondary" value="<?php echo $salary; ?>" >
    </div>
    <div class="form-group">
      <label >Years Experience</label>
      <input name="yearsEx" type="text" class="form-control btn-secondary" value="<?php echo $yearsEx; ?>" >
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