<?php

if (isset($_POST["submit"])) {

  $Username = $_POST["Uid"];
  $Pwd = $_POST["Pwd"];

  require_once 'dbh-inc.php';
  require_once 'functions-inc.php';

  if (emptyInputLogin($Username, $Pwd) !== false) {
    header("location: ../login.php?error=invalidinput");
    exit();
  }

  loginUser($conn, $Username, $Pwd);

}
else {
  header("location: ../login.php?");
  exit();
}

