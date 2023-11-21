<php
session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Login</title>

<link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <nav>
    <header>
      <div class="wrapper">
        <div class="logo-container">
          <img class="logo" src="Images/ang-consultancy-high-resolution-logo.png" alt="ANG logo">
        </div>
        
        
        <ul class="menu-list">
          <a href="index.php"><li title="HOME">HOME</li></a>
          <a href="discover.php"><li title="ABOUT">ABOUT</li></a>
          <a href="contact.php"><li title="CONTACT">CONTACT</li></a>
          
          <?php
          if (isset($_SESSION["usersuid"])) {
            echo "<a href='profile.php'><li title='PROFILE'>PROFILE</li></a>";
            
            echo "<a href='logout-inc.php'><li title='LOG OUT'>LOG OUT</li></a>";
            
          }
          else {
            echo "<a href='login.php'><li title='LOG IN'>LOG IN</li></a>";
            echo "<a href='signup.php'><li title='SIGN UP'>SIGN UP</li></a>";
            
          }
          ?>
          
        </ul>
      </div> 
      
    </header>
    <hr>
  </nav>
  <div class="main-wrapper"> 