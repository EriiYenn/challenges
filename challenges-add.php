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

html_head("Challenge Add");

navbar('bgimg_index_logged');

HelpButton();
pageFade();


if (isset($_POST['Send'])) {
	$conn = connect_db();

	$sql = "INSERT INTO `challenges` (id_run, id_party, id_difficulty, name, description, r_exp, r_money, date_set, date_end) VALUES ('" . $_POST['run'] . "', '" . $_POST['party'] . "', '" . $_POST['difficulty'] . "', '" . $_POST['name'] . "', '" . htmlspecialchars($_POST['description']) . "', '" . $_POST['exp'] . "', '" . $_POST['money'] . "', '" . $_POST['date_start'] . "', '" . $_POST['date_end'] . "')";
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Added!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=challenges-add.php'>";
	} else mysqli_error($conn);

	mysqli_close($conn);
}





$conn = connect_db();

$sql = "SELECT * FROM runs";
$res_r = mysqli_query($conn, $sql);

$sql = "SELECT * FROM parties";
$res_p = mysqli_query($conn, $sql);

$sql = "SELECT * FROM difficulties";
$res_d = mysqli_query($conn, $sql);

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

    <p class="web-challenges-add-title w3-center">Challenge Adding</p>

    <form method="post" action="" class="web-challenges-add-form">

        <div class="w3-row">
            <div class="w3-col l2 p-0-2_">
                <label for="run">Runs: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="run" id="run">
                    <?php while ($row = mysqli_fetch_array($res_r, MYSQLI_ASSOC)) {
						echo "<option class='w3-text-black' value=" . $row['id_run'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <div class="w3-col l2 p-0-2_">
                <label for="party">Parties: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="party" id="party">
                    <?php while ($row = mysqli_fetch_array($res_p, MYSQLI_ASSOC)) {
						echo "<option class='w3-text-black' value=" . $row['id_party'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <div class="w3-col l2 p-0-2_">
                <label for="difficulty">Difficulties: </label><br />
                <select class="w3-select w3-transparent w3-text-light-grey w3-center" name="difficulty" id="difficulty">
                    <?php while ($row = mysqli_fetch_array($res_d, MYSQLI_ASSOC)) {
						echo "<option class='w3-text-black' value=" . $row['id_difficulty'] . ">" . $row['name'] . "</option>";
					} ?>
                </select>
            </div>

            <!-- ///////////////////////////////////////////// -->

            <div class="w3-col l3 w3-leftbar p-0-2_">
                <label for="name">Challenge Name: </label><br />
                <input type="text" class="w3-input w3-transparent w3-text-light-grey" name="name" id="name" required />
            </div>

            <div class="w3-col l3 p-0-2_">
                <label for="description">Challenge Description: </label><br />
                <input type="text" class="w3-input w3-transparent w3-text-light-grey" name="description" id="description" required />
            </div>
        </div>



        <!-- ********************************************************************************* -->



        <div class="w3-row mt-5_">
            <div class="w3-col l2 w3-text-light-grey p-0-2_">
                <label for="exp">EXP Reward: </label><br />
                <input type="number" class="w3-input w3-transparent w3-text-light-grey w3-center" name="exp" id="exp" required />
            </div>

            <div class="w3-col l2 w3-text-light-grey p-0-2_">
                <label for="money">Currency Reward: </label><br />
                <input type="number" class="w3-input w3-transparent w3-text-light-grey w3-center" name="money" id="money" required />
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
                <input type="date" class="w3-input w3-transparent w3-text-light-grey" name="date_start" id="date_start" required />
            </div>

            <div class="w3-col l3 p-0-2_">
                <label for="date_end">End Date: </label><br />
                <input type="date" class="w3-input w3-transparent w3-text-light-grey" name="date_end" id="date_end" required />
            </div>
        </div>

        <div class='w3-center mt-4_'>
            <input type='submit' value='Add' name='Send' class='w3-btn w3-transparent w3-text-lime w3-border w3-border-lime w3-padding-large' />
            <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-5_' />
            <a href="challenges-set.php" class="web-challenges-add-back w3-btn w3-transparent w3-border w3-border-light-grey w3-text-light-grey w3-padding-large">Back</a>
        </div>

    </form>

</div>


</body>

</html> 