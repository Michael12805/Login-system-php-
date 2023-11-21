<?php

if (isset($_POST["submit"])) {
  
  $FirstName = $_POST["First-Name"];
  $SecondName = $_POST["Second-Name"];
  $Username = $_POST["Uid"];
  $Email = $_POST["Email"];
  $Pwd = $_POST["Pwd"];
  $pwdRepeat = $_POST["Pwdrepeat"];


  require_once 'dbh-inc.php';
  require_once 'functions-inc.php';

  
if (emptyInputSignup($FirstName, $SecondName, $Username, $Email, $Pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=invalidinput");
    exit();
  }
  if (invalidUid($Username) !== false) {
    header("location: ../signup.php?error=invalidUsername");
    exit();
  }

  if (invalidEmail($Email) !== false) {
    header("location: ../signup.php?error=invalidEmail");
    exit();
  }


  if (pwdMatch($Pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

  if (UidExists($conn, $Username, $Email) !== false) {
    header("location: ../signup.php?error=usernamealreadytaken");
    exit();
  }

  createUser($conn, $FirstName, $SecondName, $Username, $Email, $Pwd);

}

else {
    header("location: ../signup.php");
    exit();
}






 
