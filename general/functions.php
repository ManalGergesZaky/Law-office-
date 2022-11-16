<?php 

function testQuery($query , $message){
    if($query){
        echo "<div class='main alert alert-success' id='main' role='alert'>
        True $message
      </div>";
    }
    else{
        echo "<div class='main alert alert-danger' id='main' role='alert'>
        False ! $message
      </div> ";
    }
}

function location($path){
    echo "<script>window.location.replace('/ODC Back end/08/$path');</script>";

}

function authAdmin(){
  if(!$_SESSION['admin']){
    location('auth/pages-login.php');
}

}
function adminAndLawyerAuth(){
  if((!isset($_SESSION['admin'])) && (! isset($_SESSION['lawyer']) )){
    location('auth/pages-login.php');
  }
}

function notAllawoLawyer(){
  if(! isset($_SESSION['admin'])){
    location('pages-error-404.php');
  }
}
?>