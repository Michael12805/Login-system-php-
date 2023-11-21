<?php

function emptyInputSignup($FirstName, $SecondName, $Username, $Email, $Pwd, $pwdRepeat) {
  $result;
  if (empty($FirstName) || empty($FirstName) || empty($SecondName) || empty($Username) || empty($Email) || empty($Pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUid($Username) {
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
function invalidEmail($Email) {
  $result;

  if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function pwdMatch($Pwd, $pwdRepeat) {
  $result;

  if ($Pwd !== $pwdRepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}


function UidExists($conn, $Username, $Email) {
 $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)) {
  header("location: ../signup.php?error=Usernamealreadytaken");
    exit();
 }

 mysqli_stmt_bind_param($stmt, "ss", $Username, $Email);
 mysqli_stmt_execute($stmt);


 $resultData = mysqli_stmt_get_result($stmt);
 if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
 }
 else {
  $result = false;
  return $result;
 }

 mysqli_stmt_close($stmt);
}


function createUser($conn, $FirstName, $SecondName, $Username, $Email, $Pwd) {
  $sql = "INSERT INTO users (usersFirstName, usersSecondName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
   header("location: ../signup.php?error=Usernamealreadytaken");
     exit();
  }

  $hashedPwd = password_hash($Pwd, PASSWORD_DEFAULT);
 
  mysqli_stmt_bind_param($stmt, "sssss", $FirstName, $SecondName, $Email, $Username, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
    exit();
 }


 function emptyInputLogin($Username, $Pwd) {
  $result;
  if (empty($Username) || empty($Pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $Username, $Pwd) {
  $UidExists = UidExists($conn, $Username, $Username);

  if ($UidExists === false) {
    header("location: ../login.php?error=wrongusernameoremail");
    exit(); 
  }

  $pwdHashed = $UidExists["usersPwd"];
  $checkPwd = password_verify($Pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../login.php?error=wrongpassword");
    exit();    
  }
  else if ($checkPwd === true) {
    session_start();  
    $_SESSION["usersid"] = $UidExists["usersID"];
    $_SESSION["usersuid"] = $UidExists["usersUid"];
    header("location: ../index.php");
    exit();
  }
}

