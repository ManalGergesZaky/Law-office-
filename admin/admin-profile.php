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
// $id = $_GET['idshow'];

//variable

$select = "SELECT * FROM roles";
$allRoles = mysqli_query($connection , $select);
// testQuery($allRoles , "select All Roles");
// echo $id;
$update= "SELECT * FROM `admin`
                    WHERE admin_id= $id";

$select_update = mysqli_query($connection , $update);
// testQuery($select_update , "select update Admin");
$row = mysqli_fetch_assoc($select_update);

$name = $row['admin_name'];
$age = $row['admin_age'];
$address = $row['admin_address'];
$phone = $row['admin_phone'];
$email = $row['admin_email'];
$role = $row['admin_role'];
$password = $row['admin_password'];

$image = $row['admin_image'];
$name_image ="";
$size_image ="";
$type_image ="";
$tmp_image="";



//update
if(isset($_POST['update'])){

  //image
  if(empty($_FILES['image']['name'])){
    $image = $row['admin_image'];
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

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role=$_POST['role'];
    $password = $_POST['password'];
    
 $update = "UPDATE `admin` SET `admin_name`='$name' ,admin_age=$age , admin_address='$address',admin_phone='$phone', admin_email='$email' ,admin_image='$image',  `admin_password`='$password' ,`admin_role`=$role   WHERE admin_id = $id";
 $checkupdate = mysqli_query($connection , $update);
// testQuery($checkupdate , "update admin");
// header("location:  /ODC Back end/05/employees/create.php");
// location('employees/list.php');
}


if(isset($_POST['change_pass'])){
  $currentPassword = $_POST['currentPassword'];
  $newpassword = $_POST['newpassword'];
  $renewpassword = ['renewpassword'];

  if($currentPassword == $password){
    $update = "UPDATE `admin` SET   `admin_password`='$newpassword'  WHERE admin_id = $id";
    $checkupdate = mysqli_query($connection , $update);
    // testQuery($checkupdate , "update password ");

  }

}

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/ODC Back end/08/index.php">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/ODC Back end/08/admin/upload/<?php echo $image?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $name?></h2>
              <h3><?php echo $email?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

              

                <div class="tab-pane  show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form  method="post" enctype="multipart/form-data" >
                   <div class="form-group">
                      <label >Admin Name</label>
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
                      <label >Role</label>
                      <select class="btn-secondary" name="role">
                          <?php foreach($allRoles as $role) {?>
                          <option class="btn-secondary" value="<?php echo $role['id'] ;?>">
                            <?php echo $role['id']; ?>
                            </option>
                          <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Uplode  image</label>
                      <input name="image" type="file" class="form-control btn-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo $image;  ?>">
                    </div>

                    <div class="btn">
                      <button name="update" type="submit" class="btn btn-info"> Update Data </button>
                    </div>
                    
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method ='post'>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control btn-secondary" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control btn-secondary" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control btn-secondary" id="renewPassword">
                      </div>
                    </div>
                    
                    <div class="text-center">
                      <button name="change_pass" type="submit" class="btn btn-info">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



<?php
include '..//shared/footer.php';
include '..//shared/script.php';
?>
