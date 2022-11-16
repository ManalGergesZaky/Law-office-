<?php
session_start();
// echo isset($_SESSION['lawyer']);
// echo isset($_SESSION['admin']);

$name = "";
$id = "";
$image="";
if(isset($_SESSION['admin'])){
  $name= $_SESSION['admin']['name'];
  $id =$_SESSION['admin']['id'];
  $select = "SELECT * FROM `admin` WHERE admin_id=$id";
  $select_data = mysqli_query($connection , $select);
  $row = mysqli_fetch_assoc($select_data);
  $image=$row['admin_image'];
}
else if(isset($_SESSION['lawyer'])){
  $name = $_SESSION['lawyer']['name'];
  $id =$_SESSION['lawyer']['id'];
  $select = "SELECT * FROM `lawyers` WHERE id=$id";
  $select_data = mysqli_query($connection , $select);
  $row = mysqli_fetch_assoc($select_data);
  $image=$row['image'];
}



if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/ODC Back end/08/index.php');
}
?>  
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center btn-dark">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <i class="login-icon fa-solid fa-scale-balanced text-light"></i>
        <span class="d-none d-lg-block text-light">Low Office</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
      <i class="fa-solid fa-bars toggle-sidebar-btn text-light"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        


        <?php  if(isset($_SESSION['admin']) ||  isset($_SESSION['lawyer']) ){ ?>
        <li class="nav-item dropdown pe-3">

          <a class=" text-light nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/ODC Back end/08/<?php
              if(isset($_SESSION['admin'])){
                echo "admin/upload/$image";
              }else{
                echo "lawyer/upload/$image";
              }
             ?>" alt="Profile" class="image-header rounded-circle">
            <span><?php echo $name ;?></span> <i class="margin-pro fa-solid fa-caret-down"></i>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
         
            <li>
              <form>
              
                <button name="logout" type="submit" class="dropdown-item d-flex align-items-center btn text-danger"> <i class="text-danger fa-solid fa-arrow-right-from-bracket"></i> Sign Out  </button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
    <?php } ?>
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->