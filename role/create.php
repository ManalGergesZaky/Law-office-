<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

authAdmin();
$id ="";
$description ="";

//insert
if(isset($_POST['insert'])){
   
    $id = $_POST['id'];
    $description = $_POST['description'];

    $insert = "INSERT INTO roles VALUES($id , '$description')";
    $checkInsert = mysqli_query($connection , $insert);
    // testQuery($checkInsert , "Insert new Department");
    // header("location:  /ODC Back end/05/employees/create.php");
    // location('employees/list.php');
}

?>

<main class="main" id="main">
  <h1 class="text-center">Create New Role</h1>
  <form class="mx-auto border border-secondary col-6 margin-botom " method="post" >
  <div class="form-group">
      <label >Id</label>
      <input name="id" type="text" class="form-control btn-secondary" value="<?php echo $id; ?>" >
    </div>
    <div class="form-group">
      <label >Description</label>
      <input name="description" type="text" class="form-control btn-secondary" value="<?php echo $description; ?>" >
    </div>
    
    <div class="btn">
      <button name="insert" type="submit" class="btn btn-success"> Insert Roles </button>
    </div>
    
  </form>
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>