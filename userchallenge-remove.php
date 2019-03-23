<?php

//ob_start();
session_start();


// If User is logged => redirect to tavern.php and announce it

if (!isset($_SESSION['user'])) {
   $_SESSION['logged'] = 1;
   header("Location: tavern.php");
   echo "<meta http-equiv='refresh' content='0; url=tavern.php'>";
   exit;
}

require_once 'inc.php';


// ------------------------------


// Start of Page with some functions

html_head("Remove of Challenge");

navbar('bgimg_challenges');
pageFade();
HelpButton();

$id = $_POST['challenge'];



if (($id != "") || ($id != 0)) {

   $conn = connect_db();

   $sql = "DELETE FROM userchallenges WHERE id_challenge=" . $id;
   $res = mysqli_query($conn, $sql);

   if ($res) {

      PopUpInfo("Successfully Abandoned!", 1990, "");

      echo "<meta http-equiv='refresh' content='2; url=public-challenges.php'>";
   } else mysqli_error($conn);
} else {

   PopUpWarning("No Challenge on route!", 3990, "");

   echo "<meta http-equiv='refresh' content='4; url=public-challenges.php'>";
}

mysqli_close($conn);

?>

</body>

</html> 