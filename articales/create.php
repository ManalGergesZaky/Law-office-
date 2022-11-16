<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

adminAndLawyerAuth();
//variable
$title ="";
$description ="";
$auther="";
$image ="";
$image_profile ="";
$create_time="";
$name_image ="";
$size_image ="";
$type_image ="";
$tmp_image="";

$date= date("Y-m-d",time());

$time= date("h:i:sa");


//insert
if(isset($_POST['insert'])){
  if(empty($_FILES['image']['name'])){
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
    

  if($_SESSION['admin']['admin']){
    $auther=$_SESSION['admin']['adminEmail'];
    $select= "SELECT * FROM `admin`
                    WHERE admin_email= '$auther'";
    $adminInfo = mysqli_query($connection , $select);
    // testQuery($adminInfo , "select Admin $auther info");
    
    $row = mysqli_fetch_assoc($adminInfo);
    $image_profile = $row['admin_image'];
  }
  else if($_SESSION['lawyer']['lawyerEmail']){
    $auther= $_SESSION['lawyer']['lawyerEmail'];

    $select= "SELECT * FROM `lawyers`
                    WHERE email= '$auther'";
    $lawyerInfo = mysqli_query($connection , $select);
    // testQuery($lawyerInfo , "select Lawyer $auther info");
    
    $row = mysqli_fetch_assoc($lawyerInfo);
    $image_profile = $row['image'];

  }
    

    $title = $_POST['title'];
    $description = $_POST['description'];
    
    

    

$insert = "INSERT INTO `articales` VALUES(null,'$title', '$description','$auther' ,'$image',DEFAULT,DEFAULT , '$image_profile' )";
$checkInsert = mysqli_query($connection , $insert);
// testQuery($checkInsert , "Insert new Articales");
// header("location:  /ODC Back end/05/employees/create.php");
// location('employees/list.php');
}

?>

<main class="main" id="main">
  <h1 class="text-center">welcome to create New Lawyer</h1>
  <form class="mx-auto border border-secondary col-6 " method="post" enctype="multipart/form-data" >
  <div class="form-group">
      <label >Title Articales</label>
      <input name="title" type="text" class="form-control btn-secondary" value="<?php echo $title; ?>" >
    </div>
    <div class="form-group">
      <label >Description</label>
      <input name="description" type="text" class="form-control btn-secondary" value="<?php echo $description; ?>" >
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