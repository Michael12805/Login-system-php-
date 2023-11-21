<?php
  include_once 'header.php';
?>
  <div class="main-div">
    <section class="signup-form">
      <form action="records/signup-inc.php" method="post" class="forms-section">
        <h3 class="form-heading">Sign Up</h3>

        <hr>


        

        <label for="First Name"> <br>
          <input type="text" name="First-Name" maxlength="26" minlength="2" size="12" value="" placeholder="First Name" class="input-field">

        </label>

        <br>

        <label for="Second Name"><br>
          <input type="text" name="Second-Name" maxlength="26" minlength="2" size="12" value="" placeholder="Second Name" class="input-field">

        </label>

        <br>

        <label for="Username"><br>
          <input type="text" name="Uid" maxlength="15" minlength="2" size="15" value="" placeholder="Username" class="input-field">

        </label>

        <br>

        <label for="Email"><br>
          <input type="email" name="Email" maxlength="30" minlength="10" size="30" value="" placeholder="Email" class="input-field">

        </label>

        <br>

        <label for="Password"><br>
          <input type="password" name="Pwd" maxlength="12" minlength="5" size="12" value="" placeholder="Password" class="input-field">

        </label>

        <br>

        <label for="Password"><br>
          <input type="password" name="Pwdrepeat" maxlength="12" minlength="5" size="12" value="" placeholder="Repeat Password" class="input-field">

        </label>

        <br>

        <button type="submit" class="submit" name="submit">
          Sign Up
        </button>
       
        <div class="response-div">
          <?php
            if (isset($_GET["error"])){
              if($_GET["error"] == "invalidinput") {
                echo "<p>Kindly fill all fields!</p>";
              }

              else if ($_GET["error"] == "invalidUid") {
                echo "<p>Choose a valid username!</p>";
              }

              else if ($_GET["error"] == "invalidEmail") {
                echo "<p>Choose a proper email!</p>";
              }

              else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Passwords Don't match!</p>";
              }

              else if ($_GET["error"] == "stmtfailed") {
                echo "<p>OOPS!! Something went wrong. Kindly try again</p>";
              }

              else if ($_GET["error"] == "usernamealreadytaken") {
                echo "<p>Username already taken!</p>";
              }

              else if ($_GET["error"] == "none") {
                echo "<p>You are signed up!</p>";
              }
            }
          ?>
        </div>
      </form>
      
        
    </section>
  </div>

<?php
  include_once 'footer.php';
?>