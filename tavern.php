<?php

//ob_start();
session_start();

require_once 'inc.php';


// ------------------------------


// Start of Page with some functions

html_head("Challenges Crossroads");

navbar('bgimg_index_logged');
HelpButton();


// ------------------------------


// If User is logged => get his name an announce it as pop-up

if (!isset($_SESSION['user'])) {
    access();
} else {
    // select loggedin users detail
    $conn = connect_db();
    $sql = "SELECT * FROM `users` WHERE id_user=" . $_SESSION['user'];
    $res = mysqli_query($conn, $sql);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    mysqli_close($conn);

    pageFade();

    // Pop up |
    //        V

    if ($_SESSION['log'] == 1) {

            PopUpInfo("Greetings, " . $userRow['name'] . "!", 2000, "top-end");

            $_SESSION['log'] = 0;
        }


    // ------------------------------


    // Start of HTML Code with Javascript function on Admin Features




    ?>






<script type="text/javascript">
    $(function() {

        $(".notif").click(function() {
            var del_id = $(this).attr("value");
            var info = 'id=' + del_id;
            $.ajax({
                type: "POST",
                url: " ", //URL to the delete php script
                data: info,
                success: function() {}
            });
            $(this).animate({
                opacity: "hide",
                left: "2vw"
            }, 1000);
            return false;
        });
    });
</script>






<div class="w3-row mySlides">

    <div class="TavernBox w3-quarter w3-container fs-1p5vw">
        <p class='w3-center mb-0 PasseroOne fs-1p75vw'>Welcome <?php echo $userRow['name']; ?>!</p>

        <hr class="web-tavern-hr" />

        <div class="mb-10_ ml-10_"><a href="public-challenges.php" class="web-tavern-box-button w3-transparent w3-round-large w3-text-black"><i class="fas fa-tasks"></i>&nbsp; Challenges</a><br /></div>

        <div class="mb-10_ ml-10_"><a href="#" class="web-tavern-box-button w3-transparent w3-round-large w3-text-black"><i class="fas fa-stopwatch"></i>&nbsp; Speedrunning UwU</a><br /></div>

        <div class="mb-10_ ml-10_"><a href="profile.php" class="web-tavern-box-button w3-transparent w3-round-large w3-text-black"><i class="far fa-user-circle"></i>&nbsp; Profile Page</a><br /></div>

        <div class="mb-5_ ml-10_"><a href="#" class="web-tavern-box-button w3-transparent w3-round-large w3-text-black"><i class="fas fa-list-ol"></i>&nbsp; Leaderboard</a></div>
    </div>

    <div class="w3-col l4">
        <p> </p>
    </div>

    <div class="w3-quarter w3-center w3-text-white ml-4">
        <p class="ml-10_ fs-1p25vw"><u>Notifications</u></p>

        <?php
        $conn = connect_db();
        $sql = "SELECT * FROM notifications WHERE id_user=" . $_SESSION['user'];
        $res_n = mysqli_query($conn, $sql);
        mysqli_close($conn);

        if (isset($_POST['id'])) {
            $conn = connect_db();
            $sql = "DELETE FROM notifications WHERE id_user=" . $_SESSION['user'] . " AND id_challenge=" . $_POST['id'];
            $res = mysqli_query($conn, $sql);

            echo '<meta http-equiv="refresh" content="0;tavern.php">';
        }

        while ($notificationRow = mysqli_fetch_array($res_n, MYSQLI_ASSOC)) {
            ?>
        <div class="Oswald hvr-hang">
            <?php if ($notificationRow['decision'] == 1)
                echo '<button class="w3-btn w3-panel w3-display-container w3-card-2 w3-round-xlarge w3-row w3-center toast_success notif" value="' . $notificationRow['id_challenge'] . '" name="id">
			<p style="font-size: 0.9vw;"><span class="far fa-calendar-check" style="font-size: 1.25vw;"></span> &nbsp; Your challenge: <b>' . getChallenge($notificationRow['id_challenge']) . '</b> has been approved and counted for you :3</p>
		</button>';
            else
                echo '<button class="w3-btn w3-panel w3-display-container w3-card-2 w3-round-xlarge w3-row w3-center toast_deny notif" value="' . $notificationRow['id_challenge'] . '" name="id">
			<p style="font-size: 0.9vw;"><span class="far fa-calendar-times" style="font-size: 1.25vw;"></span> &nbsp; Your challenge: <b>' . getChallenge($notificationRow['id_challenge']) . '</b> has been denied and resetted for submission :C</p>
		</button>';
            ?>
        </div>
        <?php 
    } ?>
    </div>


    <?php if ($userRow['permission'] == 1) { ?>
    <div class='w3-display-right w3-xxxlarge w3-text-white'>
        <button class='fa fa-chevron-right w3-btn w3-transparent' onclick="plusDivs(1);"></button>
    </div>
    <?php 
} ?>

</div>

<?php if ($userRow['permission'] == 1) { ?>
<div class="w3-container mySlides w3-text-white Oswald d-none">
    <div class='w3-display-left w3-xxxlarge'>
        <button class='fa fa-chevron-left w3-btn w3-transparent' onclick="plusDivs(-1);"></button>
    </div>

    <div id="Panel">
        <p class="web-admin-title animation-target w3-center">Admin Panel</p>

        <div class="w3-row mt-4_">
            <p class="w3-col l2"> </p>
            <?php
            AdminButton("titles");
            AdminButton("runs");
            AdminButton("parties");
            ?>
        </div>
        <div class="w3-row mt-4_">
            <p class="w3-col l2"> </p>
            <?php
            AdminButton("difficulties");
            AdminButton("guilds");
            AdminButton("weapons");
            ?>
        </div>
        <div class="w3-row mt-4_">
            <p class="w3-col l2"> </p>
            <a href="challenges-set.php" class="w3-col l2 w3-btn w3-transparent w3-round-large w3-border w3-border-white w3-padding-large w3-hover-teal fs-2vw">Challenges</a>
            <p class="w3-col l1"> </p>
            <?php AdminButton("behemoths"); ?>
            <a href="profiles-set.php" class="w3-col l2 w3-btn w3-transparent w3-round-large w3-border w3-border-white w3-padding-large w3-hover-teal fs-2vw">Profiles</a>
            <p class="w3-col l1"> </p>
        </div>
    </div>

    <?php 
    AdminCat("titles");
    AdminCat("runs");
    AdminCat("parties");
    AdminCat("difficulties");
    AdminCat("guilds");
    AdminCat("weapons");
    AdminCat("behemoths");
    ?>

</div>


<?php 
}
} ?>
</body>

</html> 