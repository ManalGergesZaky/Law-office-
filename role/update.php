<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

authAdmin();
$id =$_GET['idEdit'];

$select = "SELECT * FROM `roles`
                    WHERE id= $id";

$select_update = mysqli_query($connection , $select);
// testQuery($select_update , "select update Role");
$row = mysqli_fetch_assoc($select_update);
$description =$row['description'];

//insert
if(isset($_POST['update'])){
   
    $id = $_POST['id'];
    $description = $_POST['description'];

    $update = "UPDATE `roles` SET id =$id ,`description`='$description'   WHERE id = $id";
    $checkupdate = mysqli_query($connection , $update);
  //  testQuery($checkupdate , "update Role");
    // header("location:  /ODC Back end/05/employees/create.php");
    // location('employees/list.php');
}

?>

<main class="main" id="main">
  <h1 class="text-center">welcome in create New Roles</h1>
  <form class="mx-auto border border-secondary col-6 " method="post" >
  <div class="form-group">
      <label >Id</label>
      <input name="id" type="text" class="form-control btn-secondary" value="<?php echo $id; ?>" >
    </div>
    <div class="form-group">
      <label >Description</label>
      <input name="description" type="text" class="form-control btn-secondary" value="<?php echo $description; ?>" >
    </div>
    
    <div class="btn">
      <button name="update" type="submit" class="btn btn-info"> Update Role </button>
    </div>
    
  </form>
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>