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

html_head("Profile/User Edit");

navbar('bgimg_index_logged');

HelpButton();
pageFade();




$id = $_POST['id'];

if (($id != "") || ($id != 0)) {

  if (isset($_POST['Edit'])) {
    $conn = connect_db();

    $sql = "UPDATE `users` SET permission=" . $_POST['perm'] . " WHERE id_user=" . $_POST['id'];
    $res_uu = mysqli_query($conn, $sql);

    if ($res_uu) {

      PopUpInfo("Successfully Edited!", 1990, "");

      echo "<meta http-equiv='refresh' content='2; url=profiles-set.php'>";
    } else mysqli_error($conn);
  }
} else {

  PopUpWarning("No User on route!", 3990, "");

  echo "<meta http-equiv='refresh' content='4; url=profiles-set.php'>";
}





$conn = connect_db();

$sql = "SELECT * FROM profiles WHERE id_profile=" . $id;
$res_u = mysqli_query($conn, $sql);
$profileRow = mysqli_fetch_array($res_u);

$sql = "SELECT * FROM users WHERE id_user=" . $profileRow['id_user'];
$res_u = mysqli_query($conn, $sql);
$userRow = mysqli_fetch_array($res_u);

mysqli_close($conn);


?>

<script>
    $(function() {
        $source = $("#name");
        $output = $("#result");
        $source.keyup(function() {
            $output.text($source.val());
        });
    });
</script>



<div class="web-challenges-add-div w3-text-light-grey Oswald">

    <p class="web-challenges-add-title w3-center">Edit of User No.<?php echo $userRow['id_user']; ?></p>

    <form method="post" action="" class="web-challenges-add-form">

        <input type="hidden" name="id" value="<?php echo $userRow['id_user']; ?>">

        <div class="w3-row">
            <div class="w3-col l3 p-0-2_">
                <label for="perm">Permission: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="perm" id="perm">
                    <option class="w3-text-black" value="0" <?php if ($userRow['permission'] == 0) echo "selected"; ?>>User</option>
                    <option class="w3-text-black" value="1" <?php if ($userRow['permission'] == 1) echo "selected"; ?>>Administrator</option>
                </select>
            </div>
        </div>

        <div class='w3-center mt-4_'>
            <input type='submit' value='Edit' name='Edit' class='w3-btn w3-transparent w3-text-green w3-border w3-border-green w3-padding-large' />
            <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-5_' />
            <a href="profiles-set.php" class="web-challenges-add-back w3-btn w3-transparent w3-border w3-border-light-grey w3-text-light-grey w3-padding-large">Back</a>
        </div>

    </form>

</div>


</body>

</html> 