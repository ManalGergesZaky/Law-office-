<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

authAdmin();
$select = "SELECT * FROM roles";
$allroles = mysqli_query($connection , $select);
// testQuery($allroles , "select All Roles");


//delete
if(isset($_GET['idRemove'])){
       
    $id_R=$_GET['idRemove'];
    $delete = "DELETE FROM `roles` WHERE id = $id_R";
    $checkDelete = mysqli_query($connection , $delete);
    // testQuery($checkDelete , "Delete role");
    location('role/list.php');
    // header("location:  index.php");
}
?>

<main class="main" id="main">
  <h1 class="text-center">List Of Roles</h1>
  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      
          foreach($allroles as $role){
              $idEdit =$role['id'];
              $idRemove =$role['id'];
          ?>
          <tr>
              <td id="<?php echo $role['id'] ?>"> <?php echo $role['id'] ?></td>
              <td> <?php echo $role['description'] ?></td>
              <td>
                  <a name="edit" href="/ODC Back end/08/role/update.php?idEdit=<?php echo $idEdit ?>" ><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                  <a name="remove" href="/ODC Back end/08/role/list.php?idRemove=<?php echo $idRemove ?>" ><i class="fa-regular fa-trash-can text-danger"></i></a>
              </td>
              
          </tr>
      <?php }  ?>
    </tbody>
  </table>
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>