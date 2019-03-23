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

html_head("Difficulty Adding");

navbar('bgimg_index_logged');

HelpButton();
pageFade();


if (isset($_POST['Send'])) {
	$conn = connect_db();

	$sql = "INSERT INTO `difficulties` (name,img,note) VALUES ('" . $_POST['name'] . "', '" . $_POST['image'] . "','" . htmlspecialchars($_POST['note']) . "')";
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Added!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=difficulties-add.php'>";
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



<div class="w3-row w3-text-light-grey Oswald">

    <p class="web-feature-title w3-center">Difficulty Adding</p>

    <form method="post" action="">

        <div style="margin-top: -2%;">

            <div class="w3-half pl-25_">
                <b><label class="fs-1p5vw" for="name">Difficulty Name: </label></b>
                <input type="text" class="web-feature-form-element w3-input w3-animate-input w3-transparent w3-text-light-grey w3-center w3-margin-top" placeholder="Fill in the Name..." name="name" id="name" required />

                <br /><br />
                <b><label class="fs-1p5vw" for="image">Image Link: </label></b>
                <input type="text" class="web-feature-form-element w3-input w3-animate-input w3-transparent w3-text-light-grey w3-center w3-margin-top" placeholder="Fill in the Image Link..." name="image" id="image" />
            </div>

            <div class="w3-half pl-5_">
                <b><label for="note" class="w3-text-light-grey fs-1p5vw">Difficulty Description: </label></b><br />
                <textarea class="web-feature-note w3-transparent w3-text-light-grey w3-border-0 w3-leftbar" onKeyDown="limitText(this.form.note,this.form.countdown,255);" onKeyUp="limitText(this.form.note,this.form.countdown,255);" name="note" id="note"></textarea>
                <input class="w3-input w3-transparent w3-text-light-grey w3-center w-10_" name="countdown" value="255" /> characters left
            </div>


            <div class='web-feature-buttons w3-center'>
                <input type='submit' value='Add' name='Send' class='w3-btn w3-transparent w3-text-lime w3-border w3-border-lime w3-padding-large' />
                <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-5_' />
            </div>

        </div>

    </form>

</div>


</body>

</html> 