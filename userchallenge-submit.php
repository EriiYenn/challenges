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

html_head("Submit of Challenge");

navbar('bgimg_challenges');
pageFade();
HelpButton();


if (isset($_POST['challenge'])) {
	$id = $_POST['challenge'];

	if (($id != "") || ($id != 0)) {

		$conn = connect_db();

		$sql = "SELECT * FROM challenges WHERE id_challenge=" . $id;
		$res = mysqli_query($conn, $sql);
		$challengeRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

		$sql = "SELECT * FROM userchallenges WHERE id_user=" . $_SESSION['user'] . " AND id_challenge=" . $id;
		$res = mysqli_query($conn, $sql);
		$userChallengeRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$noteValue = 255 - strlen($userChallengeRow['note']);

		mysqli_close($conn);
	}
}


$date_end = date_create(date('Y-m-d H:i:s', strtotime($challengeRow['date_end'])));
$date_start = date_create(date('Y-m-d H:i:s', strtotime($challengeRow['date_set'])));
$date_now = date_create(date('Y-m-d H:i:s', strtotime("now")));


if (($date_end < $date_now) || ($date_start > $date_now)) die();



if (isset($_POST['Submit'])) {

	$proof = htmlspecialchars($_POST['proof']);
	$note = htmlspecialchars($_POST['note']);
	$id = $_POST['challenge'];

	$conn = connect_db();

	$sql = "UPDATE userchallenges SET proof='" . $proof . "', state=1, note='" . $note . "' WHERE id_user=" . $_SESSION['user'] . " AND id_challenge=" . $id;
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Submitted!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=public-challenges.php'>";
	} else mysqli_error($conn);

	mysqli_close($conn);
}


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


<div class="w3-center Oswald fs-1p25vw">
    <form class="w3-row" action="" method="post">
        <p class="web-challenges-submission-title animation-target w3-display-top w3-border-bottom w3-border-black">Submit of Challenge: <?php echo $challengeRow['name']; ?></p>
        <input type="hidden" value="<?php echo $id; ?>" name="challenge" />


        <div class="w3-half mt-5_">
            <div class="web-challenges-submission-card xp w3-padding-large w3-round-xxlarge w3-text-white w3-row">
                <div class="web-challenges-submission-image w3-quarter">
                    <img src="images/XP.png" class="w-100_" />
                </div>
                <div class="w3-rest">
                    <p>Exp: <?php echo $challengeRow['r_exp']; ?></p>
                </div>
            </div>

            <div class="web-challenges-submission-card ct w3-padding-large w3-round-xxlarge w3-text-white w3-row mt-5_">
                <div class="web-challenges-submission-image w3-quarter">
                    <img src="images/CT.png" class="w-100_" />
                </div>
                <div class="w3-rest">
                    <p>Money: <?php echo $challengeRow['r_money']; ?></p>
                </div>
            </div>

            <div class="web-challenges-submission-buttons w3-black w3-padding-large w3-round-xxlarge w3-opacity-min">
                <input type='submit' <?php if ($userChallengeRow['state'] == 1) echo "value='Re-Submit'";
										else echo "value='Submit'"; ?> name='Submit' class='w3-btn w3-transparent w3-text-teal w3-border w3-border-teal w3-padding-large' />
                <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-5_' />
                <a href="public-challenges.php" class="w3-btn w3-transparent w3-text-light-grey w3-border w3-border-flat-light-grey w3-padding-large ml-10_">Back</a>
            </div>
        </div>


        <div class="w3-half w3-text-light-grey w3-padding-large mt-2_">
            <div class="w3-black w3-round-xxlarge w3-opacity-min p-5_">
                <p style="margin-top: -2%;">Evidence: </p>
                <input type="url" placeholder="Insert link to the proof..." <?php if ($userChallengeRow['state'] == 1) echo "value='" . $userChallengeRow['proof'] . "'"; ?> name="proof" class="web-challenges-submission-proof w3-input w3-transparent w3-text-light-grey" />

                <div class="mt-10_">
                    <p>Feedback: </p>
                    <textarea placeholder="Fill the Feedback for us..." rows="4" cols="50" name="note" onKeyDown="limitText(this.form.note,this.form.countdown,255);" onKeyUp="limitText(this.form.note,this.form.countdown,255);" class="web-challenges-submission-note w3-transparent w3-border-0 w3-leftbar w3-text-light-grey"><?php if ($userChallengeRow['state'] == 1) echo $userChallengeRow['note']; ?></textarea>
                    <input class="web-challenges-submission-note-count w3-input w3-transparent w3-text-light-grey w3-center" name="countdown" value="<?php echo $noteValue; ?>" /> characters left
                </div>
            </div>
        </div>
    </form>
</div>

</body>

</html> 