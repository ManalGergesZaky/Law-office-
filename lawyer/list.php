<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

authAdmin();

$select = "SELECT * FROM `lawyers`";
$allLawyers = mysqli_query($connection , $select);
// testQuery($allLawyers , "select All Lawyers");

if(isset($_GET['idshow'])){
    location('lawyer/profile.php');
  }
//delete
if(isset($_GET['idRemove'])){
       
    $id_R=$_GET['idRemove'];
    $delete = "DELETE FROM `lawyers` WHERE id = $id_R";
    $checkDelete = mysqli_query($connection , $delete);
    // testQuery($checkDelete , "Delete Lawyer");
    location('lawyer/list.php');
    // header("location:  index.php");
}
?>

<main class="main" id="main">

  <h1 class="text-center"> List Of Lawyers</h1>
  <table class="text-center table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      
          foreach($allLawyers as $lawyer){
              $idEdit =$lawyer['id'];
              $idRemove =$lawyer['id'];
          ?>
          <tr>
              <td id="<?php echo $lawyer['id'] ?>"> <?php echo $lawyer['id'] ?></td>
              <td> <?php echo $lawyer['name'] ?></td>
              
              <td>
                  <a name="edit" href="/ODC Back end/08/lawyer/lawyer-profile.php?idEdit=<?php echo $idEdit ?>" ><i class="padingIcon fa-solid fa-pen-to-square text-warning"></i></a>
                  <a name="remove" href="/ODC Back end/08/lawyer/list.php?idRemove=<?php echo $idRemove ?>" ><i class="padingIcon fa-regular fa-trash-can text-danger"></i></a>
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