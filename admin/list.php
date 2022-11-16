<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

adminAndLawyerAuth();
notAllawoLawyer();
// if($_SESSION['admin']['admin']){
//   echo "admin session";
// }else{
//   echo "false session";
// }
$select = "SELECT * FROM `admin`";
$allAdmin = mysqli_query($connection , $select);
// testQuery($allAdmin , "select All Admin");

if(isset($_GET['idshow'])){
    location('admin/profile.php');
  }
//delete
if(isset($_GET['idRemove'])){
       
    $id_R=$_GET['idRemove'];
    $delete = "DELETE FROM `admin` WHERE admin_id = $id_R";
    $checkDelete = mysqli_query($connection , $delete);
    // testQuery($checkDelete , "Delete Admin");
    location('admin/list.php');
    // header("location:  index.php");
}
?>

<main id="main" class="main">
  <h1 class="text-center">List Of Admin</h1>
  <table class="text-center table table-bordered table-dark texe-center">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      
          foreach($allAdmin as $admin){
              // $idshow = $admin['admin_id'];
              $idEdit =$admin['admin_id'];
              $idRemove =$admin['admin_id'];
          ?>
          <tr>
              <td id="<?php echo $admin['admin_id'] ?>"> <?php echo $admin['admin_id'] ?></td>
              <td> <?php echo $admin['admin_name'] ?></td>
              
              <td>
                  <a name="edit" href="/ODC Back end/08/admin/admin-profile.php?idEdit=<?php echo $idEdit ?>" ><i class="padingIcon fa-solid fa-pen-to-square text-warning"></i></a>
                  <a name="remove" href="/ODC Back end/08/admin/list.php?idRemove=<?php echo $idRemove ?>" ><i class="padingIcon fa-solid fa-user-xmark text-danger"></i></a>
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