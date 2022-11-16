<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';
include '..//shared/header.php';
include '..//shared/aside.php';

// testQuery($connection , "connection");
authAdmin();
$id = $_GET['idEdit'];

//variable

$select = "SELECT * FROM roles";
$allRoles = mysqli_query($connection , $select);
// testQuery($allRoles , "select All Roles");

$update= "SELECT * FROM `lawyers`
                    WHERE id= $id";

$select_update = mysqli_query($connection , $update);
// testQuery($select_update , "select update Admin");
$row = mysqli_fetch_assoc($select_update);

$name = $row['name'];
$age = $row['age'];
$address = $row['address'];
$phone = $row['phone'];
$salary = $row['salary'];
$yearsEx = $row['yearsEx'];
$email = $row['email'];
$password = $row['password'];

$image = $row['image'];

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
    // echo $name_image;
    // echo $size_image;
    // echo $type_image;
    // echo $tmp_image;
  }
    //end image

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $yearsEx = $_POST['yearsEx'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
 $update = "UPDATE `lawyers` SET `name`='$name' ,age=$age , `address`='$address',phone='$phone',salary=$salary , yearsEx=$yearsEx , email='$email' ,`image`='$image',  `password`='$password'    WHERE id = $id";
 $checkupdate = mysqli_query($connection , $update);
// testQuery($checkupdate , "update Lawyer");
// header("location:  /ODC Back end/05/employees/create.php");
// location('employees/list.php');
}



if(isset($_POST['change_pass'])){
  $currentPassword = $_POST['currentPassword'];
  $newpassword = $_POST['newpassword'];
  $renewpassword = ['renewpassword'];

  if($currentPassword == $password){
    $update = "UPDATE `lawyers` SET   `password`='$newpassword'  WHERE id = $id";
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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Lawyer</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/ODC Back end/08/lawyer/upload/<?php echo $image?>" alt="Profile" class="rounded-circle">
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

                <!-- <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8">Web Designer</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                </div> -->

                <div class="tab-pane  show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data" >
                     <div class="form-group">
                      <label >Lawyers Name</label>
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
                      <label >Salary</label>
                      <input name="salary" type="text" class="form-control btn-secondary" value="<?php echo $salary; ?>" >
                    </div>
                    <div class="form-group">
                      <label >Years Experience</label>
                      <input name="yearsEx" type="text" class="form-control btn-secondary" value="<?php echo $yearsEx; ?>" >
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
                      <label>Uplode  image</label>
                      <input name="image" type="file" class="form-control btn-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo $image;  ?>">
                    </div>

                    <div class="btn">
                      <button name="update" type="submit" class="btn btn-info"> Update Data </button>
                    </div>
                    
                  </form>

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method ='post'>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
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
