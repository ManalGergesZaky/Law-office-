<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

// testQuery($connection , "connection");
adminAndLawyerAuth();
notAllawoLawyer();
//id while Edit
$id = $_GET['idEdit'];

//variable

$update= "SELECT * FROM `articales`
                    WHERE id= $id";

$select_update = mysqli_query($connection , $update);
// testQuery($select_update , "select update Articales");
$row = mysqli_fetch_assoc($select_update);

$title =$row['title'];
$description =$row['description'];
$auther="";
$image =$row['image'];
$image_profile ="";
$update_time="";
$name_image ="";
$size_image ="";
$type_image ="";
$tmp_image="";





//update
if(isset($_POST['update'])){

  //image
  if(empty($_FILES['image']['name'])){
    $image = $row['image'];
    
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
    //end image
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    
 $update = "UPDATE `articales` SET `title`='$title' ,`description`='$description' , `update_time`= DEFAULT     WHERE id = $id";
 $checkupdate = mysqli_query($connection , $update);
// testQuery($checkupdate , "update articale");
// header("location:  /ODC Back end/05/employees/create.php");
location('articales/list.php');
// location('employees/list.php');
}



?>

<main class="main" id="main">
  <h1 class="text-center">welcome to Update articales</h1>
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
      <button name="update" type="submit" class="btn btn-info"> Update Data </button>
    </div>
    
</form>
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>