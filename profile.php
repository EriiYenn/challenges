<?php

//ob_start();
session_start();

require_once 'inc.php';


// ------------------------------


// Start of Page with some functions

html_head("Profile Page");

navbar('bgimg_index_logged');
HelpButton();


// ------------------------------


// If User isn't logged => Access denied | else show the code

if (!isset($_SESSION['user'])) {
	access();
} else {


	pageFade();


	// ------------------------------


	// Connection to DB and selecting profiles table by UserID

	$conn = connect_db();

	$sql = "SELECT * FROM `profiles` WHERE id_user=" . $_SESSION['user'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$sql = "SELECT * FROM userchallenges WHERE state=2 AND id_user=" . $row['id_user'];
	$res_ch = mysqli_query($conn, $sql);
	$count_ch = mysqli_num_rows($res_ch);

	mysqli_close($conn);


	$date = new DateTime();
	$date_user = date_create(date('Y-m-d H:i:s', strtotime($row['date'])));
	$date_now = date_create(date('Y-m-d H:i:s', strtotime("now")));

	$ago = date_diff($date_now, $date_user, false);

	// ------------------------------


	if ($row['clanbg'] == 0) $clanBg = "background-color: #532d2d;";
	else $clanBg = "background-image: url('" . getClanBg($row['clanbg']) . "');";

	if ($row['color'] == 'none') $color = "color: black;";
	else $color = "color: " . getColor($row['id_user']) . ";";

	// Start of HTML Code with PHP array variables from the Select Query

	?>

<script>
    function ProfileBadge() {
        $('div[id="ProfileNotes"]').fadeOut(1);
        $('div[id="ProfileBadge"]').fadeIn();
        $('div[id="ProfileStats"]').fadeOut(1);
    }

    function ProfileNotes() {
        $('div[id="ProfileNotes"]').fadeIn();
        $('div[id="ProfileBadge"]').fadeOut(1);
        $('div[id="ProfileStats"]').fadeOut(1);
    }

    function ProfileStats() {
        $('div[id="ProfileNotes"]').fadeOut(1);
        $('div[id="ProfileBadge"]').fadeOut(1);
        $('div[id="ProfileStats"]').fadeIn();
    }
</script>


<div class="ProfileBox w3-display-middle w3-container w3-row">

    <div class='w3-col l3 w3-center'>
        <div class="badgeBg" style="<?php echo $clanBg; ?>">
            <img class="w3-padding w-70_" id="badge" src="images/shield.png" alt="Shield">
        </div>

        <p class='ProfileName w3-padding w3-card-2 PasseroOne' style="<?php echo $color; ?>"><?php echo getUser($row['id_user']); ?> [<?php if ($row['id_guild'] != 0) echo getGuild($row['id_guild']);
																																		else echo "No Guild"; ?>]</p>
        <p class='ProfileTitle w3-padding w3-card-4 PasseroOne'><?php if ($row['id_title'] == 0) echo "None";
																else echo getTitle($row['id_title']); ?></p>

        <p class="web-profile-tooltip w3-tooltip"><span class="web-profile-tooltip-popup brand-dark-blue w3-round-xxlarge w3-animate-opacity w3-padding w3-text w3-tag"><i>Since <?php echo date('F jS, Y \a\t h:mA', strtotime($row['date'])); ?></i></span>Member for <u><?php echo $ago->format("%m months and %d days"); ?></u></p>
    </div>

    <div class="w3-col l7 m-auto" id="ProfileNotes">
        <div class='w3-right ProfileNote w3-border w3-border-black w3-round-xxlarge'>
            <p class="web-profile-note-desc w3-padding-large"><?php if ($row['note'] != "") echo nl2br($row['note']);
																else echo "No description!"; ?></p>
        </div>
    </div>

    <div class="web-profile-badge w3-col l7" id="ProfileBadge" hidden>
        <?php
		if ($row['id_badge'] == 1) $lowerbadgeEXP = 0;
		else $lowerbadgeEXP = getBadgeEXP($row['id_badge'] - 1);

		$diffexp = (getBadgeEXP($row['id_badge']) - $lowerbadgeEXP);
		$lowerexp = ($row['exp'] - $lowerbadgeEXP);
		$exp = ($lowerexp / $diffexp) * 100;
		echo "<span class='fs-1p25vw'>Current EXP: &nbsp " . $row['exp'] . " / " . getBadgeEXP($row["id_badge"]) . " (" . round($exp, 2) . "%)</span>";
		?>
        <!--<div class="w3-opacity w3-border w3-border-black w3-round-xlarge">
        <div class="web-profile-badge-xp w3-container w3-round-xlarge" style="width:<?php echo $exp; ?>%;"></div>
    </div>-->

        <div class="web-progress-bar">
            <div style="width:<?php echo $exp; ?>%;"></div>
        </div>

        <div class="w3-row mt-5_">
            <div class="w3-half">
                <img src="<?php echo getBadgeImage($row['id_badge']); ?>" width="80%" class="mt-10_" />
            </div>
            <div class="web-profile-badge-desc w3-half w3-center PasseroOne">
                <p><?php if ($row['id_badge'] != 0) { ?>----------------------------------------<br /><?php echo getBadgeDesc($row['id_badge']); ?><br />----------------------------------------</p>
                <?php 
			} else echo "No Badge T^T"; ?>
            </div>
        </div>

    </div>

    <div class="web-profile-stats w3-col l7" id="ProfileStats" hidden>
        <div class="w3-row">
            <div class="w3-half">

                <p class="w3-tooltip">
                    <span class="web-profile-stats-tooltip-popup w3-animate-opacity w3-left w3-padding w3-text w3-tag brand-dark-blue w3-round-xxlarge">
                        Challenge you are proud of
                    </span>
                    Finest Challenge: &nbsp; <span class="fs-1p75vw"><br /><?php echo getChallenge($row['id_challenge']); ?></span></p>

                <p class="mt-5_">Completed Challenges: &nbsp; <span class="fs-1p75vw"><?php echo $count_ch; ?></span></p>
                <p>Speedruns on Board: &nbsp; <span class="fs-1p75vw"><?php echo $row['sp_board']; ?></span></p>
            </div>

            <div class='w3-half w3-center fs-1p5vw'>
                <p>Favourite Weapon: <br /> <span class="fs-1p75vw"><?php if ($row['id_weapon'] != 0) echo getWeapon($row['id_weapon']);
																	else echo "None"; ?></span></p>
            </div>
        </div>
    </div>

    <div class="web-profile-buttons w3-col l2 w3-center">
        <button class="w3-btn ProfileBtn hvr-forward w3-indigo w3-padding-large w3-margin-top o-none" onclick="ProfileNotes()">Main Tab</button>
        <button class="w3-btn ProfileBtn hvr-forward w3-deep-purple w3-padding-large w3-margin-top o-none" onclick="ProfileBadge()">Badge</button>
        <button class="w3-btn ProfileBtn hvr-forward w3-pink w3-padding-large w3-margin-top o-none" onclick="ProfileStats()">Statistics</button>

        <form method="post" action="profile-edit.php">
            <input type="hidden" name="id" value="<?php echo $_SESSION['user']; ?>">
            <input type="submit" class="web-profile-button-edit w3-btn ProfileBtn hvr-forward w3-teal w3-padding-large" value="Edit Profile" name="Edit" />
        </form>
    </div>

</div>

<?php 
} ?>
</body>

</html> 