<?php

//ob_start();
session_start();


/* IMPORTANT TO SET ALSO FOR PASSWORD ENCRYPTION
 * Default in database is set SHA512
*/
$pass_hash = 'sha512';






// Declaration of variables before usage

$nameError = "";
$passError = "";
$emailError = "";
$userError = "";
$passLogError = "";

$conn = "";


// ------------------------------


require_once 'inc.php';


// If User is logged => redirect to tavern.php and announce it

if (isset($_SESSION['user'])) {
  $_SESSION['logged'] = 1;
  header("Location: tavern.php");
  echo "<meta http-equiv='refresh' content='0; url=tavern.php'>";
  exit;
}


// ------------------------------


// Start of Page with few functions

html_head("Challenges Login");

navbar('bgimg_login');
HelpButton();

pageFade();


// ------------------------------


// Registration PHP function

$error = false;

if (isset($_POST['Register'])) {

  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
    $error = true;
    $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
    $error = true;
    $nameError = "Name must have atleast 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $error = true;
    $nameError = "Name must contain alphabets and space.";
  }

  $conn = connect_db();
  $sql = "SELECT * FROM users WHERE name='" . $name . "'";
  $res_u = mysqli_query($conn, $sql);
  $nameCount = mysqli_num_rows($res_u);

  $sql = "SELECT * FROM users WHERE email='" . $email . "'";
  $res_u = mysqli_query($conn, $sql);
  $emailCount = mysqli_num_rows($res_u);
  mysqli_close($conn);

  if ($nameCount == 1) {
    $error = true;
    $nameError = "This name uses someone else.";
  } else if ($emailCount == 1) {
    $error = true;
    $emailError = "This email uses someone else.";
  }

  // password validation
  if (empty($pass)) {
    $error = true;
    $passError = "Please enter password.";
  } else if (strlen($pass) < 6) {
    $error = true;
    $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using hash();
  $password = hash($pass_hash, $pass);

  // if there's no error, continue to signup
  if (!$error) {

    $conn = connect_db();

    $sql = "SELECT * FROM `users`";
    $res_id = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($res_id);
    $rowCount = $rowCount + 1;


    $sql = "INSERT INTO `users` (name,email,password,note) VALUES ('" . $name . "','" . $email . "','" . $password . "',' ')";
    $res_ui = mysqli_query($conn, $sql);

    $sql = "INSERT INTO profiles (id_user,note) VALUES (" . $rowCount . ",' ')";
    $res_pi = mysqli_query($conn, $sql);

    mysqli_close($conn);



    if ($res_pi && $res_ui) {
      ?>

<script>
    swal({
        showConfirmButton: false,
        timer: 1990,
        width: 512,
        background: "transparent url(https://cdn.discordapp.com/attachments/470561270861398027/558779843144318986/unknown.png)",
        html: "<h1 class='mt-15_ Oswald'>Registration Successful!</h1>" +
            "<br /><br /><br /><br /><br /><br /><br /><br /><p> </p>"
    });
</script>

<?php
echo "<meta http-equiv='refresh' content='2; url=login.php'>";
} else $errMSG_r = "Something went wrong, try again later...";
}
}


// ------------------------------


// Login PHP function

if (isset($_POST['Login'])) {

  // prevent sql injections/ clear user invalid inputs
  $user = trim($_POST['username']);
  $user = strip_tags($user);
  $user = htmlspecialchars($user);

  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs

  if (empty($user)) {
    $error = true;
    $userError = "Set your name!";
  }

  if (empty($pass)) {
    $error = true;
    $passLogError = "Set your password!";
  }

  // if there's no error, continue to login
  if (!$error) {

    $conn = connect_db();
    $sql = "SELECT * FROM `users` WHERE name='" . $user . "'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
    mysqli_close($conn);

    $password = hash($pass_hash, $pass);
    if ($count == 1 && $row['password'] == $password) {
      $_SESSION['user'] = $row['id_user'];
      $_SESSION['password'] = $password;
      $_SESSION['log'] = 1;
      echo "<meta http-equiv='refresh' content='0; url=tavern.php'>";
    } else $errMSG = "Wrong user creditials...";
  }
}


// ------------------------------


// If User is logged out => announce it

if (isset($_SESSION['logout']) && $_SESSION['logout'] == 1) {

  PopUpInfo("Farewell, Slayer!", 2000, "");

  $_SESSION['logout'] = 0;
}


?>


<!-- ------------------------------


Start of HTML code with some PHP -->

<div class="LoginBox w3-row w3-display-middle w3-container">

    <div class='w3-col l5 w3-container w-45_' style="opacity: 1;">
        <p class='web-login-title w3-center'>New Slayer<p>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="NewSBox">
                    <input type="text" class="w3-input w3-center w3-opacity fs-0p75vw" name="name" placeholder="Enter your Nickname..." /><i><span class='w3-panel w3-text-white'><?php echo $nameError; ?></span></i>
                    <input type="email" class="w3-input w3-center w3-opacity fs-0p75vw mt-0p5_" name="email" placeholder="Enter your Email..." /><i><span class='w3-panel w3-text-white'><?php echo $emailError; ?></span></i>
                    <input type="password" class="w3-input w3-center w3-opacity fs-0p75vw mt-0p5_" name="pass" placeholder="Enter your Password..." /><i><span class='w3-panel w3-text-white'><?php echo $passError; ?></span></i>

                    <?php
                    if (isset($errMSG_r)) {
                      ?>
                    <div class="w3-container w3-text-white" style="margin-top: -10%;">
                        <i><span class='w3-panel pos-fixed'><?php echo $errMSG_r; ?></span></i>
                    </div>
                    <?php

                  }
                  ?>

                    <input type="submit" value="Join us!" name="Register" class="web-login-register-button w3-btn w3-white w3-opacity w3-round-xxlarge w3-center fs-0p9vw" />
                </form>
    </div>



    <div class='w3-right w3-col l5 w3-container w-45_' style="opacity: 1;">
        <p class='web-login-title w3-center'>Returning Slayer</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" class="ReturnSBox">
            <input type="text" class="w3-input w3-center w3-opacity fs-0p75vw" placeholder="Enter your Username..." name="username" /><i><span class='w3-panel w3-text-white'><?php echo $userError; ?></span></i>
            <input type="password" class="w3-input w3-center w3-opacity fs-0p75vw mt-0p5_" placeholder="Enter your Password..." name="password" /><i><span class='w3-panel w3-text-white'><?php echo $passLogError; ?></span></i>

            <?php
            if (isset($errMSG)) {
              ?>
            <div class="w3-text-white">
                <i><span class='w3-panel pos-fixed'><?php echo $errMSG; ?></span></i>
            </div>
            <?php

          }
          ?>

            <input type="submit" value="Login!" name="Login" class="web-login-login-button w3-btn w3-white w3-opacity w3-round-xxlarge fs-0p9vw w3-center" />
        </form>
    </div>

</div>


</body>

</html> 