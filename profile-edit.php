<?php

//ob_start();
session_start();



require_once 'inc.php';

html_head("Profile Edit");

navbar('bgimg_index_logged');

HelpButton();


// If User is logged => get his name an announce it as pop-up

if (!isset($_SESSION['user'])) {
	access();
} else {

	pageFade();









	if (isset($_POST['ProfileEdit'])) {

		$conn = connect_db();

		$sql = "UPDATE profiles SET id_title=" . $_POST['title'] . ", color='" . $_POST['color'] . "', clanbg='" . $_POST['clanbg'] . "', id_weapon=" . $_POST['weapon'] . ", id_guild=" . $_POST['guild'] . ", id_challenge=" . $_POST['challenge'] . ", public=" . $_POST['visibility'] . ", note='" . mysqli_real_escape_string($conn, $_POST['note']) . "' WHERE id_user=" . $_POST['id'];
		$res = mysqli_query($conn, $sql);

		if ($res) {

			PopUpInfo("Successfully Edited!", 1990, "");

			echo "<meta http-equiv='refresh' content='2; url=profile.php'>";
		} else mysqli_error($conn);

		mysqli_close($conn);
	}




	$_POST['title'] = 0;
	$_POST['color'] = "";

	$id = $_POST['id'];

	$conn = connect_db();

	$sql = "SELECT * FROM profiles WHERE id_user=" . $id;
	$res_p = mysqli_query($conn, $sql);
	$row_p = mysqli_fetch_array($res_p, MYSQLI_ASSOC);

	$sql = "SELECT * FROM usertitles WHERE id_user=" . $id;
	$res_t = mysqli_query($conn, $sql);
	$count_t = mysqli_num_rows($res_t);

	$sql = "SELECT * FROM usercolors WHERE id_user=" . $id;
	$res_c = mysqli_query($conn, $sql);
	$count_c = mysqli_num_rows($res_c);

	$sql = "SELECT * FROM userclanbacks WHERE id_user=" . $id;
	$res_cb = mysqli_query($conn, $sql);
	$count_cb = mysqli_num_rows($res_cb);

	$sql = "SELECT * FROM weapons";
	$res_w = mysqli_query($conn, $sql);
	$count_w = mysqli_num_rows($res_w);

	$sql = "SELECT * FROM guilds";
	$res_g = mysqli_query($conn, $sql);
	$count_g = mysqli_num_rows($res_g);

	$sql = "SELECT * FROM userchallenges WHERE state=2 AND id_user=" . $id;
	$res_ch = mysqli_query($conn, $sql);
	$count_ch = mysqli_num_rows($res_ch);

	mysqli_close($conn);


	if ($row_p['clanbg'] == 0) $clanBg = "background-color: #532d2d;";
	else $clanBg = "background-image: url('" . getClanBg($row_p['clanbg']) . "');";

	?>


<p class="web-profile-edit-title animation-target w3-center PasseroOne w3-text-white">Edit of your Profile</p>

<div class="ProfileBox web-profile-edit-div w3-card-4 w3-display-middle">

    <form class="w3-row w3-container" method="post" action="">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="w3-col l4 mt-5_">
            <div class="web-profile-edit-column">

                <label class="w3-opacity-min" for="title">Choose your Title:</label>
                <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="title" id="title">
                    <?php
					if ($count_t < 1) echo "<option value=0>None</option>";
					else {
						echo "<option value=0>None</option>";
						while ($row = mysqli_fetch_array($res_t, MYSQLI_ASSOC)) {
							if ($row['id_title'] == $row_p['id_title']) echo "<option class='w3-text-black' value=" . $row['id_title'] . " selected>" . getTitle($row['id_title']) . "</option>";
							else echo "<option class='w3-text-black' value=" . $row['id_title'] . ">" . getTitle($row['id_title']) . "</option>";
						}
					}
					?>
                </select>

                <div class="mt-15_">
                    <label class="w3-opacity-min" for="color">Choose your Name Color:</label>
                    <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="color" id="color">
                        <?php 
						if ($count_c < 1) echo "<option value=''>Default</option>";
						else {
							echo "<option value='none'>Default</option>";
							while ($row = mysqli_fetch_array($res_c, MYSQLI_ASSOC)) {
								if ($row['id_color'] == $row_p['color']) echo "<option class='w3-text-black' value='" . $row['id_color'] . "' selected>" . getColorName($row['id_color']) . "</option>";
								else echo "<option class='w3-text-black' value='" . $row['id_color'] . "'>" . getColorName($row['id_color']) . "</option>";
							}
						}
						?>
                    </select>
                </div>

                <div class="mt-15_">
                    <label class="w3-opacity-min" for="clanbg">Choose your Clan Background:</label>
                    <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="clanbg" id="clanbg">
                        <?php 
						if ($count_cb < 1) echo "<option value=0>Default</option>";
						else {
							echo "<option value=0>Default</option>";
							while ($row = mysqli_fetch_array($res_cb, MYSQLI_ASSOC)) {
								if ($row['id_cb'] == $row_p['clanbg']) echo "<option class='w3-text-black' value='" . $row['id_cb'] . "' selected>" . getClanBgName($row['id_cb']) . "</option>";
								else echo "<option class='w3-text-black' value='" . $row['id_cb'] . "'>" . getClanBgName($row['id_cb']) . "</option>";
							}
						}
						?>
                    </select>
                </div>

            </div>
        </div>



        <div class="w3-col l4 mt-5_">
            <div class="web-profile-edit-column">

                <label class="w3-opacity-min" for="weapon">Choose your Favourite Weapon:</label>
                <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="weapon" id="weapon">
                    <?php
					if ($count_w < 1) echo "<option value=0>None</option>";
					else {
						echo "<option value=0>None</option>";
						while ($row = mysqli_fetch_array($res_w, MYSQLI_ASSOC)) {
							if ($row['id_weapon'] == $row_p['id_weapon']) echo "<option class='w3-text-black' value=" . $row['id_weapon'] . " selected>" . getWeapon($row['id_weapon']) . "</option>";
							else echo "<option class='w3-text-black' value=" . $row['id_weapon'] . ">" . getWeapon($row['id_weapon']) . "</option>";
						}
					}
					?>
                </select>

                <div class="mt-15_">
                    <label class="w3-opacity-min" for="guild">Choose your Guild:</label>
                    <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="guild" id="guild">
                        <?php 
						if ($count_g < 1) echo "<option value=0>None</option>";
						else {
							echo "<option value=0>None</option>";
							while ($row = mysqli_fetch_array($res_g, MYSQLI_ASSOC)) {
								if ($row['id_guild'] == $row_p['id_guild']) echo "<option class='w3-text-black' value='" . $row['id_guild'] . "' selected>" . getGuildName($row['id_guild']) . "</option>";
								else echo "<option class='w3-text-black' value='" . $row['id_guild'] . "'>" . getGuild($row['id_guild']) . "</option>";
							}
						}
						?>
                    </select>
                </div>

                <div class="mt-15_">
                    <label class="w3-opacity-min" for="challenge">Choose your Finest Challenge:</label>
                    <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="challenge" id="challenge">
                        <?php 
						if ($count_ch < 1) echo "<option value=0>None</option>";
						else {
							echo "<option value=0>None</option>";
							while ($row = mysqli_fetch_array($res_ch, MYSQLI_ASSOC)) {
								if ($row['id_challenge'] == $row_p['id_challenge']) echo "<option class='w3-text-black' value='" . $row['id_challenge'] . "' selected>" . getChallenge($row['id_challenge']) . "</option>";
								else echo "<option class='w3-text-black' value='" . $row['id_challenge'] . "'>" . getChallenge($row['id_challenge']) . "</option>";
							}
						}
						?>
                    </select>
                </div>

            </div>
        </div>



        <div class="w3-col l4 mt-5_">
            <div class="web-profile-edit-column">

                <label class="w3-opacity-min" for="visibility">Choose your Visibility:</label>
                <select class="w3-select w3-center w3-transparent w3-border-black select-noarrow" name="visibility" id="visibility">
                    <option value="0" <?php if ($row_p['public'] == 0) echo "selected"; ?>>Hidden</option>
                    <option value="1" <?php if ($row_p['public'] == 1) echo "selected"; ?>>Public</option>
                </select>

                <div class="mt-15_">
                    <label class="w3-opacity-min" for="note">Set your BIO:</label>
                    <textarea class="web-profile-edit-note w3-transparent w3-border-0 w3-leftbar w3-border-black" name="note" id="note" maxlength="255"><?php echo htmlspecialchars($row_p['note']); ?></textarea>
                </div>

            </div>
        </div>



        <div class="web-profile-edit-buttons w3-col l12 w3-center">
            <input type='submit' value='Edit' name='ProfileEdit' class='w3-btn w3-transparent w3-teal w3-padding-large w3-round-large' />
            <input type='reset' value='Reset' class='w3-btn w3-transparent w3-red w3-padding-large w3-round-large ml-2_' />
            <a href="profile.php" class="w3-btn midnight-blue w3-padding-large w3-round-large ml-2_">Back</a>
        </div>



    </form>

</div>

<?php 
} ?>

</body>

</html> 