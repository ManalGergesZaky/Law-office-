<?php
include '..//general/env.php';
include '..//general/functions.php';

include '..//shared/head.php';


//variable
$email ="";
$password ="";
session_start();

//insert
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password =$_POST['password'];

    $select = "SELECT * FROM `admin` WHERE `admin_email`= '$email' AND `admin_password` ='$password' ";
    $exeSelect = mysqli_query($connection , $select);
    // testQuery($exeSelect , "select Admin");
    $row = mysqli_fetch_assoc($exeSelect);
    $resulte =mysqli_num_rows($exeSelect);
    // echo $resulte;
    if($resulte >0){
        echo "True admin";
        $_SESSION['admin'] = [
          'adminEmail' => $email,
          'name'=>$row['admin_name'],
          'id'=>$row['admin_id'],
          'admin'=> true ,
      ];
      
      // print_r($_SESSION);
      // echo $_SESSION['admin']['admin'];
      location('admin/list.php');
    }
    else{
      $select = "SELECT * FROM `lawyers` WHERE `email`= '$email' AND `password` ='$password' ";
      $exeSelect = mysqli_query($connection , $select);
      // testQuery($exeSelect , "select lawyer");
      $row = mysqli_fetch_assoc($exeSelect);
      $resulte =mysqli_num_rows($exeSelect);
      echo $resulte;
      if($resulte >0){
        echo "True lawyer";
        $_SESSION['lawyer'] = [
          'lawyerEmail' => $email,
          'name'=>$row['name'],
          'id'=> $row['id'],
          'lawyer'=>true,
      ];
      location('articales/list.php');
      }else{
        echo "false Admin and false lawyer";
      }
    }

    
}

?>
  <main>
    <div class="container ">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container ">
          <div class="row justify-content-center ">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <!-- <img src="assets/img/logo.png" alt=""> -->
                  <i class="login-icon fa-solid fa-scale-balanced"></i>
                  <span class="d-none d-lg-block">Law Office</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your Email & password to login</p>
                  </div>

                  <form method="post" class="row g-3 needs-validation " novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-user-tie"></i></span>
                        <input type="text" name="email" class="form-control btn-secondary" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control btn-secondary" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="#">Manal Gerges</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  <?php
include '..//shared/script.php';
?>
