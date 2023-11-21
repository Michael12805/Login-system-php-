<?php
  include_once 'header.php';
?>
  <div class="main-div">
    <section class="signup-form login-form">
      <form action="records/login-inc.php" method="post" class="forms-section">
        <h3 class="form-heading">Log In</h3>

        <hr>

        <label for="Email"><br>
          <input type="text" name="Uid" maxlength="30" minlength="5" size="30" value="" placeholder="Username/Email" class="input-field">

        </label>

        <br>

        <label for="Password"><br>
          <input type="password" name="Pwd" maxlength="12" minlength="5" size="12" value="" placeholder="Password" class="input-field">
          <span><i class="far fa-eye" id="togglePassword"></i></span>
          
        </label>
        <?php
          if (isset($_GET["error"])){
            if($_GET["error"] == "invalidinput") {
              echo "<p>Kindly fill all fields!</p>";
            }

            else if ($_GET["error"] == "wrongusernameoremail") {
              echo "<p>Wrong username or email!</p>";
            }

            else if ($_GET["error"] == "wrongpassword") {
              echo "<p>Wrong password!!!</p>";
            }
          }
          ?>

        <br>

        <button class="submit" type="submit" name="submit">
          Log In
        </button>
       

      </form>
      
          
    </section>
  </div>  
<?php
  include_once 'footer.php';
?>