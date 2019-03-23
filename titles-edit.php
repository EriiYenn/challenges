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

html_head("Title Edit");

navbar('bgimg_index_logged');

HelpButton();
pageFade();




if (isset($_POST['Edit'])) {
	$conn = connect_db();

	$sql = "UPDATE titles SET name='" . $_POST['name'] . "', note='" . htmlspecialchars($_POST['note']) . "' WHERE id_title=" . $_POST['id'];
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Edited!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=tavern.php'>";
	} else mysqli_error($conn);

	mysqli_close($conn);
}



if (isset($_POST['value'])) $id = $_POST['value'];
else $id = $_POST['id'];

$conn = connect_db();

$sql = "SELECT * FROM titles WHERE id_title=" . $id;
$res = mysqli_query($conn, $sql);
$set = mysqli_fetch_array($res, MYSQLI_ASSOC);

mysqli_close($conn);

$noteValue = 255 - strlen($set['note']);


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



<div class="w3-row w3-text-light-grey Oswald">

    <p class="web-feature-title-edit w3-center">Edit of Title No.<?php echo $id; ?></p>

    <div class="web-feature-live-div w3-half w3-center w3-text-black">
        <p class="web-feature-live w3-text-light-grey">Live example: </p>

        <p class='ProfileName w3-padding PasseroOne'><?php echo getUser($_SESSION['user']); ?></p>
        <p class='ProfileTitle web-feature-live-title w3-padding w3-card-4 PasseroOne' id="result"><?php echo $set['name']; ?></p>
    </div>

    <div class="w3-half">
        <form method="post" action="">
            <div class="web-feature-live-titles-div">

                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                <b><label class="fs-1p5vw" for="name">Title Name: </label></b>
                <input type="text" class="web-feature-single-form-element w3-input w3-animate-input w3-transparent w3-text-light-grey w3-center w3-margin-top" placeholder="Fill in the Name..." maxlength="20" name="name" id="name" value="<?php echo $set['name']; ?>" required />

                <div class="mt-5_">
                    <b><label for="note" class="w3-text-light-grey fs-1p5vw">Title Description: </label></b><br />
                    <textarea class="web-feature-single-note w3-transparent w3-text-light-grey w3-border-0 w3-leftbar" onKeyDown="limitText(this.form.note,this.form.countdown,255);" onKeyUp="limitText(this.form.note,this.form.countdown,255);" name="note" id="note"><?php echo htmlspecialchars($set['note']); ?></textarea>
                    <input class="w3-input w3-transparent w3-text-light-grey w3-center w-10_" name="countdown" value="<?php echo $noteValue; ?>" /> characters left
                </div>

                <div class='web-feature-single-buttons w3-center'>
                    <input type='submit' value='Edit' name='Edit' class='w3-btn w3-transparent w3-text-green w3-border w3-border-green w3-padding-large' />
                    <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-10_' />
                </div>

            </div>
        </form>
    </div>

</div>


</body>

</html> 