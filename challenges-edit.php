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

html_head("Challenge Edit");

navbar('bgimg_index_logged');

HelpButton();
pageFade();


if (isset($_POST['Edit'])) {
	$conn = connect_db();

	$sql = "UPDATE `challenges` SET id_run='" . $_POST['run'] . "', id_party='" . $_POST['party'] . "', id_difficulty='" . $_POST['difficulty'] . "', name='" . $_POST['name'] . "', description='" . htmlspecialchars($_POST['description']) . "', r_exp='" . $_POST['exp'] . "', r_money='" . $_POST['money'] . "', date_set='" . $_POST['date_start'] . "', date_end='" . $_POST['date_end'] . "' WHERE id_challenge=" . $_POST['id'];
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Edited!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=challenges-set.php'>";
	} else mysqli_error($conn);

	mysqli_close($conn);
}

$id = $_POST['id'];





$conn = connect_db();

$sql = "SELECT * FROM runs";
$res_r = mysqli_query($conn, $sql);

$sql = "SELECT * FROM parties";
$res_p = mysqli_query($conn, $sql);

$sql = "SELECT * FROM difficulties";
$res_d = mysqli_query($conn, $sql);

$sql = "SELECT * FROM challenges WHERE id_challenge=" . $id;
$res_c = mysqli_query($conn, $sql);
$set_c = mysqli_fetch_array($res_c, MYSQLI_ASSOC);

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

    <p class="web-challenges-add-title w3-center">Edit of Challenge No.<?php echo $id; ?></p>

    <form method="post" action="" class="web-challenges-add-form">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="w3-row">
            <div class="w3-col l2 p-0-2_">
                <label for="run">Runs: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="run" id="run">
                    <?php while ($row = mysqli_fetch_array($res_r, MYSQLI_ASSOC)) {
						if ($set_c['id_run'] == $row['id_run']) echo "<option class='w3-text-black' value=" . $row['id_run'] . " selected>" . $row['name'] . "</option>";
						else echo "<option class='w3-text-black' value=" . $row['id_run'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <div class="w3-col l2 p-0-2_">
                <label for="party">Parties: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="party" id="party">
                    <?php while ($row = mysqli_fetch_array($res_p, MYSQLI_ASSOC)) {
						if ($set_c['id_party'] == $row['id_party']) echo "<option class='w3-text-black' value=" . $row['id_party'] . " selected>" . $row['name'] . "</option>";
						else echo "<option class='w3-text-black' value=" . $row['id_party'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <div class="w3-col l2 p-0-2_">
                <label for="difficulty">Difficulties: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="difficulty" id="difficulty">
                    <?php while ($row = mysqli_fetch_array($res_d, MYSQLI_ASSOC)) {
						if ($set_c['id_difficulty'] == $row['id_difficulty']) echo "<option class='w3-text-black' value=" . $row['id_difficulty'] . " selected>" . $row['name'] . "</option>";
						else echo "<option class='w3-text-black' value=" . $row['id_difficulty'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <!-- ///////////////////////////////////////////// -->

            <div class="w3-col l3 w3-leftbar p-0-2_">
                <label for="name">Challenge Name: </label><br />
                <input type="text" class="w3-input w3-transparent w3-text-light-grey" value="<?php echo $set_c['name']; ?>" name="name" id="name" required />
            </div>

            <div class="w3-col l3 p-0-2_">
                <label for="description">Challenge Description: </label><br />
                <input type="text" class="w3-input w3-transparent w3-text-light-grey" value="<?php echo $set_c['description']; ?>" name="description" id="description" required />
            </div>
        </div>



        <!-- ********************************************************************************* -->



        <div class="w3-row mt-5_">
            <div class="w3-col l2 w3-text-light-grey p-0-2_">
                <label for="exp">EXP Reward: </label><br />
                <input type="number" class="w3-input w3-transparent w3-text-light-grey w3-center" value="<?php echo $set_c['r_exp']; ?>" name="exp" id="exp" required />
            </div>

            <div class="w3-col l2 w3-text-light-grey p-0-2_">
                <label for="money">Currency Reward: </label><br />
                <input type="number" class="w3-input w3-transparent w3-text-light-grey w3-center" value="<?php echo $set_c['r_money']; ?>" name="money" id="money" required />
            </div>

            <!-- Special Reward -> 3rd column for reward
	<div class="w3-col l2" style="padding: 0 2%;">
	<label for="difficulty">Difficulties: </label><br />
	<input type="text" class="w3-input w3-transparent w3-text-light-grey" name="name" id="name" required />
	</div> -->

            <div class="w3-col l2">
                <p> </p>
            </div>

            <div class="w3-col l3 p-0-2_">
                <label for="date_start">Start Date: </label><br />
                <input type="date" class="w3-input w3-transparent w3-text-light-grey" value="<?php echo $set_c['date_set']; ?>" name="date_start" id="date_start" required />
            </div>

            <div class="w3-col l3 p-0-2_">
                <label for="date_end">End Date: </label><br />
                <input type="date" class="w3-input w3-transparent w3-text-light-grey" value="<?php echo $set_c['date_end']; ?>" name="date_end" id="date_end" required />
            </div>
        </div>

        <div class='w3-center mt-4_'>
            <input type='submit' value='Edit' name='Edit' class='w3-btn w3-transparent w3-text-green w3-border w3-border-green w3-padding-large' />
            <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-5_' />
            <a href="challenges-set.php" class="web-challenges-add-back w3-btn w3-transparent w3-border w3-border-light-grey w3-text-light-grey w3-padding-large">Back</a>
        </div>

    </form>

</div>


</body>

</html> 