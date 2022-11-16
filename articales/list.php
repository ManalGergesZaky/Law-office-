<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

adminAndLawyerAuth();

$select = "SELECT * FROM `articales` ";
$allArticales= mysqli_query($connection , $select);
// testQuery($allArticales , "select Articales ");

if(isset($_GET['idRemove'])){
       
    $id_R=$_GET['idRemove'];
    $delete = "DELETE FROM `articales` WHERE id = $id_R";
    // $checkDelete = mysqli_query($connection , $delete);
    // testQuery($checkDelete , "Delete Articales");
    location('articales/list.php');
    // header("location:  index.php");
}

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


?>
<main class="main" id="main">
    <h1 class="text-center">All Articales </h1>
    <?php
        foreach($allArticales as $articale){

    ?>
    <div class="articales col-6 mx-auto">
        <div class="mx-auto card text-center text-white bg-secondary" >
        <img src="/ODC Back end/08/articales/upload/<?php echo $articale['image'];?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h6 class="card-title"><i class="fa-solid fa-feather"></i> <?php echo $articale['auther'] ;?></h5>
            <h5 class="card-title"><i class="fa-brands fa-square-font-awesome-stroke"></i> <?php echo $articale['title'] ;?></h5>
            <p class="card-text"><i class="fa-solid fa-book-open-reader text-info"></i>  <?php echo $articale['description']; ?></p>
            <p class="card-text"><i class="fa-regular fa-clock"></i> <?php echo $articale['create_time']; ?></p>

            <?php if(isset($_SESSION['admin']) || (isset($_SESSION['lawyer']) && $_SESSION['lawyer']['lawyerEmail']==$auther)  ){ ?> 

            <a href="/ODC Back end/08/articales/update.php?idEdit=<?php echo $articale['id']?>" class="btn btn-primary">Edit</a>
            <a href="/ODC Back end/08/articales/list.php?idRemove=<?php echo $articale['id']?>" class="btn btn-danger">Delete </a>
            <?php } ?>
        </div>
        </div>
    </div>
    <?php } ?>
    
</main>
<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>