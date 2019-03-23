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

html_head("Guild Adding");

navbar('bgimg_index_logged');

HelpButton();
pageFade();


if (isset($_POST['Send'])) {
	$conn = connect_db();

	$sql = "INSERT INTO `guilds` (name,shortcut,note) VALUES ('" . $_POST['name'] . "', '" . $_POST['short'] . "','" . htmlspecialchars($_POST['note']) . "')";
	$res = mysqli_query($conn, $sql);

	if ($res) {

		PopUpInfo("Successfully Added!", 1990, "");

		echo "<meta http-equiv='refresh' content='2; url=guilds-add.php'>";
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

    <p class="web-feature-title w3-center">Guild Adding</p>

    <form method="post" action="">

        <div style="margin-top: -2%;">

            <div class="w3-half pl-25_">
                <b><label class="fs-1p5vw" for="name">Guild Name: </label></b>
                <input type="text" class="web-feature-form-element w3-input w3-animate-input w3-transparent w3-text-light-grey w3-center w3-margin-top" placeholder="Fill in the Name..." name="name" id="name" required />

                <br /><br />
                <b><label class="web-feature-form-element" for="short">Guild Shortcut: </label></b>
                <input type="text" class="w3-input w3-animate-input w3-transparent w3-text-light-grey w3-center w3-margin-top" placeholder="Fill in the Image Link..." name="short" id="short" style="width: 70%; max-width: 90%; font-size: 1.25vw;" required />
            </div>

            <div class="w3-half pl-5_">
                <b><label for="note" class="w3-text-light-grey fs-2vw">Guild Description: </label></b><br />
                <textarea class="web-feature-note w3-transparent w3-text-light-grey w3-border-0 w3-leftbar" onKeyDown="limitText(this.form.note,this.form.countdown,255);" onKeyUp="limitText(this.form.note,this.form.countdown,255);" name="note" id="note"></textarea>
                <input class="w3-input w3-transparent w3-text-light-grey w3-center w-10_" name="countdown" value="255"" /> characters left
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