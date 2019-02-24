<?php

// Global Color Variables [Not in use rn!]

$clr_x1 = "blue";
$clr_x2 = "pink";
$clr_x3 = "deep-orange";
$clr_x4 = "grey";
$clr_x5 = "yellow";
$clr_x6 = "lime";
$clr_x7 = "orange";


// ------------------------------


// Database connection

function connect_db()
{

require 'db.php';

// DATABASE
 $dbhost = 'localhost';
 $dbuser = $dbUsername;
 $dbpass = $dbPassword;
 $dbname = 'dauntless-challenges'; 

 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if( mysqli_connect_errno() ) {
        die('Cannot connect [1]: ' . mysqli_error());
    }
 mysqli_set_charset($conn, 'utf8');

 return $conn;
}


// This is the Help Button in the bottom-right corner with popping box

function HelpButton() {
echo <<<END

<script>
function Help() {
    var x = document.getElementById("HelpMenu");
    if (x.style.display === "none") {
        $('div[id="HelpMenu"]').fadeIn();
    } else {
        $('div[id="HelpMenu"]').fadeOut();
    }
}

$(document).mouseup(function(e) 
{
    var container = $("div[id='HelpMenu']");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.fadeOut();
    }
});
</script>


<div class='w3-display-bottomright' style='margin-right: 2%; margin-bottom: 4.5%; z-index: 10;'>

<div class="w3-container w3-card-2 w3-padding brand-dark-blue w3-round-large" id="HelpMenu" style="display: none; position: absolute; bottom: 100%; right: 4%;">
    <ul class="w3-ul w3-center w3-text-white" style="font-size: 0.7vw;">
		<li class="w3-padding"><a href="timeline/" class="text-deco-none">Timeline</a></li>
        <li class="w3-padding">Ticket</li>
        <li class="w3-padding">FAQ</li>
        <li class="w3-padding">Contact</li>
    </ul>
</div>

<button class="web-help-button w3-display-bottomright w3-btn w3-transparent far fa-question-circle w3-text-white" onclick="Help();"></button>
</div>

<a href="https://github.com/Dauntless-Challenges" class="web-help-github w3-display-bottomleft fab fa-github w3-text-white" target="_blank"></a>

END;
}


// ------------------------------


// Work In Progress Function => Writes everything important to say it's WIP

function WIP() {
echo <<<END

<div class='w3-display-middle w3-text-white Oswald'>
<p class='w3-jumbo animation-target'>COMING SOON</p>
<hr class="web-wip-hr w3-border-white">
<p class='w3-xxxlarge w3-center'>Few days left!</p>
</div>

END;
}


// ------------------------------


// Script Function to FadeIn the page, what a magic

function pageFade() {
echo <<<END

<script>
$(document).ready(function () {
    $('body').css('display', 'none');
    $('body').fadeIn(1000);
});
</script>

END;
}










// ------------------------------
// # SUPPORT FUNCTIONS # [Hidden for now]

// Definition of Bronze Monthly Suporter

function BronzeCard() {
echo <<<END
    
    <div class="w3-col l3 m12 s12 w3-card-4 w3-margin-large w3-round-xxlarge DonCard" id="Bronze">
        <p class="w3-xlarge w3-center w3-brown DonRound w3-padding-large">-[ Bronze Badge ]-</p>
            
        <p class="w3-large w3-padding-large w3-margin-left">- Uh?</p>
        
        <hr class="web-donor-hr w3-border-brown">
        <p class="w3-xxlarge w3-center"><b>$5 per month</b></p>
    </div>
    
END;
}


// ------------------------------


// Definition of Silver Monthly Suporter

function SilverCard() {
echo <<<END
    
    <div class="w3-col l3 m12 s12 w3-card-4 w3-margin-large w3-round-xxlarge DonCard" id="Silver">
        <p class="w3-xlarge w3-center w3-grey DonRound w3-padding-large">-[ Silver Badge ]-</p>
            
        <p class="w3-large w3-padding-large w3-margin-left">- Ehm?</p>
            
        <hr class="web-donor-hr w3-border-brown">
        <p class="w3-xxlarge w3-center"><b>$10 per month</b></p>
    </div>
    
END;
}


// ------------------------------


// Definition of Gold Monthly Suporter

function GoldCard() {
echo <<<END
    
    <div class="w3-col l3 m12 s12 w3-card-4 w3-margin-large w3-round-xxlarge DonCard" id="Gold">
        <p class="w3-xlarge w3-center w3-yellow DonRound w3-padding-large">-[ Gold Badge ]-</p>
            
        <p class="w3-large w3-padding-large w3-margin-left">- ??</p>
            
        <hr class="web-donor-hr w3-border-brown">
        <p class="w3-xxlarge w3-center"><b>$15 per month</b></p>
    </div>
    
END;
}


// ------------------------------


// Support Layout with cards

function SupportUs() {
?>

<div class="w3-row mt-5_">
    <div class="w3-col l1 m12 s12">
        <p> </p>
    </div>
    
    <?php echo BronzeCard(); ?>
    
    <div class="w3-col w-4_">
        <p> </p>
    </div>
    
    <?php echo SilverCard(); ?>
    
    <div class="w3-col w-4_">
        <p> </p>
    </div>
    
    <?php echo GoldCard(); ?>
    
    <div class="w3-col l1 m12 s12">
        <p> </p>
    </div>
</div>

<?php
}


// ------------------------------


// Donations Button and pop-up window [Not Hidden]

function Donate() {
?>

    <script>
        function InfoDonate() {
            swal({
                title: "Please Login first!!",
                text: "We want to make sure we never forget about your donation",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Pay now",
                dangerMode: true,
                cancelButtonColor: "#e60000"
            }).then((result) => {
                if (result.value) {
                    window.location = "https://paypal.me/dauntlesschallenges";
                }
            });
        }
    </script>
        
        <?php if(!isset($_SESSION['user']))
            echo "<button onclick='InfoDonate();' class='web-donate-button w3-btn brand-light-blue w3-text-white w3-padding-large w3-round-xlarge' id='Donate'><span class='fab fa-paypal'></span>&nbsp;Donate</button>";
            else echo "<a href='https://www.paypal.me/dauntlesschallenges' target='_blank' class='web-donate-button w3-btn brand-light-blue w3-text-white w3-padding-large w3-round-xlarge' id='Donate'><span class='fab fa-paypal'></span>&nbsp;Donate</a>"; ?>
            
        <p class='w3-text-white fs-1vw' id='Donate'><i>* Please take a screenshot of your payment for us!!</i></p>

<?php
}


// ------------------------------


// Donation Cards with amount to be donated to achieve them

function Donor() {
echo <<<END

<script>
function ChallengeProfile() {
    $('div[id="DonateBox"]').fadeOut(1);
    $('div[id="Benefits"]').fadeIn();
}

function SupportBack() {
    $('div[id="Benefits"]').fadeOut(1);
    $('div[id="DonateBox"]').fadeIn();
}
</script>

<div class="w3-text-white" id="Benefits" style='display: none; margin-top: -2%;'>
    <p class="w3-xxxlarge w3-center w3-border w3-border-white" id="DonateTitle">Why to feed Gnashers?</p>
            
    <div class="w3-col l3 m12 s12 w3-card-4 w3-text-dark-grey w3-margin-large w3-round-xxlarge DonCard" id="Bronze">
        <p class="w3-xxlarge w3-center w3-pink DonRound w3-padding-large">Custom Background</p>
            
        <p class="w3-xlarge w3-padding-large w3-margin-left">- GIF not supported yet</p>
            
        <hr class="w3-border-pink" style="width: 90%; margin: auto;">
        <p class="w3-xxlarge w3-center"><b>Only For $1+</b></p>
    </div>
    
    <div class="w3-col" style="width: 4%">
        <p> </p>
    </div>
    
    <div class="w3-col l3 m12 s12 w3-card-4 w3-text-dark-grey w3-margin-large w3-round-xxlarge DonCard" id="Silver">
        <p class="w3-xxlarge w3-center w3-purple DonRound w3-padding-large">Colored Name</p>
            
        <p class="w3-xlarge w3-padding-large w3-margin-left">- Only Purple for now</p>
            
        <hr class="w3-border-purple" style="width: 90%; margin: auto;">
        <p class="w3-xxlarge w3-center"><b>For $5+</b></p>
    </div>
            
    <button class="w3-btn w3-transparent w3-display-bottommiddle w3-indigo w3-padding-large w3-round-jumbo w3-xlarge" style="margin-bottom: 2%;" onclick="SupportBack()">Back</button>
</div>

END;
}













// ------------------------------


// Landing Page when you write dauntless-challenges.com

function Landing() {
echo <<<END

<div class='w3-display-middle LandingBox w3-container w3-center fs-1p25vw'>

<p class="fs-2p5vw">Welcome Slayers</p>

<p>It seems you have climbed to the top, defeated the most dangerous of behemoths and have ran out of challenges. . . 

<br />Well, it seems you have come to the right place. We dont serve normal hunts here. All hunts presented are deadly or worse!

<br /><br />Your reward for surviving these challenges? 
<br />Bragging rights.
<br />We keep track of both the solo and team challenges to make sure you always have something to brag about to others.

<br /><br />Do you think you've got what it takes?</p>

<div id="badge">
<a href="login.php" class="text-deco-none">
<img src="images/badge.png" alt="Badge" width="15%" />
<p class='web-landing-button w3-text-white'>Join Now!</p>
</a>
</div>

</div>

END;
}


// ------------------------------


// Access check if User is logged in where he/she has to be logged in

function access() {
echo <<<END

<script>
swal({
  title: "~ You don't have permissions ~",
  text: "You have to be logged in!",
  type: "error",
  dangerMode: true
});
</script>

<meta http-equiv='refresh' content='5; url=login.php'>

END;
}


// ------------------------------


// Loading function for LOOOOONG loadings [Not in use rn]

function loading() {
echo <<<END

<script>
swal({
  title: "Loading!",
  text: "Please wait a bit...",
  type: "info",
  timer: 3000,
  buttons: false 
});
</script>

END;
}













// ------------------------------


// Admin Button for access to Admin Features from Tavern

function AdminButton($name) {
?>
    <script>
        function <?php echo $name; ?>() {
            $('div[id="Panel"]').fadeOut(1);
            $('div[id="<?php echo $name; ?>"]').fadeIn();
        }
    </script>
    
    <button class="w3-col l2 w3-btn w3-transparent w3-round-large w3-border w3-border-white w3-padding-large w3-hover-teal fs-2vw" onclick="<?php echo $name; ?>();"><?php echo ucwords($name); ?></button>
    <p class="w3-col l1"> </p>
<?php  
}


// ------------------------------


// Admin Categories and it's managing

function AdminCat($name) {

$conn = connect_db();

	$sql = "SELECT * FROM ". $name;
	$res = mysqli_query($conn, $sql);

	if($res) $count = mysqli_num_rows($res);

mysqli_close($conn);


?>
    
    <div class="w3-container w3-display-middle w3-center w3-text-white" style="width: 40%;" id="<?php echo $name; ?>" hidden>
        <p class="w3-xxlarge animation-target"><?php echo ucwords($name); ?></p>
        
        <form method="post" action="<?php echo $name; ?>-edit.php">
        <select class='web-admin-types w3-select w3-text-white w3-transparent' name='value' id='<?php echo $name; ?>'>
            <?php
			 if($count == 0) {
				echo "<option class='w3-xxlarge w3-text-black'>There are no rows</option>";
				$dis = "disabled";
			 } else {
				$dis = "";
			
				if($name == "titles") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_title'] ."'>". $row['name'] ."</option>"; }
				if($name == "runs") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_run'] ."'>". $row['name'] ."</option>"; }
				if($name == "parties") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_party'] ."'>". $row['name'] ."</option>"; }
				if($name == "difficulties") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_difficulty'] ."'>". $row['name'] ."</option>"; }
				if($name == "guilds") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_guild'] ."'>". $row['name'] ."</option>"; }
				if($name == "weapons") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_weapon'] ."'>". $row['name'] ."</option>"; }
				if($name == "behemoths") while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) { echo "<option class='w3-xxlarge w3-text-black' value='". $row['id_behemoth'] ."'>". $row['name'] ."</option>"; }
			 }
			?>
        </select>
        
        <div class='web-admin-buttons w3-center'>
			<a href="<?php echo $name; ?>-add.php" class="w3-btn w3-transparent w3-text-lime w3-border w3-border-lime w3-padding-large" style="margin-left: -1%;">Add</a>
            <input type='submit' value='Edit' name='Send' class='w3-btn w3-transparent w3-text-cyan w3-border w3-border-cyan w3-padding-large ml-10_' <?php echo $dis; ?> />
            <input type='reset' value='Reset' class='w3-btn w3-transparent w3-text-red w3-border w3-border-red w3-padding-large ml-10_' />
			<a href="tavern.php" class="w3-btn w3-transparent w3-text-light-grey w3-border w3-border-flat-light-grey w3-padding-large ml-10_">Back</a>
        </div>
        </form>
    </div>

<?php
}




// ------------------------------


// Challenges buttons

function ChallengeButton($challengesRow, $type) {

	if($challengesRow['id_difficulty'] == 1) $color = "diff_easy";
	if($challengesRow['id_difficulty'] == 2) $color = "diff_medium";
	if($challengesRow['id_difficulty'] == 3) $color = "diff_hard";
	if($challengesRow['id_difficulty'] == 4) $color = "diff_hard_plus";

	if($type == "edit") $popup = 'onClick="EditChallenge(this.value, 0)"';
	else if($type == "get") $popup = 'onClick="GetChallenge(this.value)"';
	else $popup = "";

	$date_end = date_create(date('Y-m-d H:i:s', strtotime($challengesRow['date_end'])));
	$date_now = date_create(date('Y-m-d H:i:s', strtotime("now")));
	
	if($date_now > $date_end) {
		$ending = "Ended:";
		$end = date_diff($date_now, $date_end);
		$when = "ago";
	}
	else {
		$ending = "Ending in:";
		$end = date_diff($date_end, $date_now);
		$when = "";
	}



	$conn = connect_db();
	$sql = 'SELECT * FROM userchallenges WHERE id_challenge='. $challengesRow['id_challenge'];
	$res = mysqli_query($conn, $sql);
	$userChallengesRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
	mysqli_close($conn);
	if($userChallengesRow['state'] == 1) {
		$submit = '<span class="w3-text-green fs-1vw">| Submitted &nbsp; <span class="fa fa-check"></span></span>';
		$popup = 'onClick="EditChallenge(this.value, 1)"';
	}
	else $submit = '';
	
	if($type == "form") 
		echo '<form method="post" action="challenges-edit.php" id="Challenge">
			  <input type="hidden" name="id" value="'. $challengesRow['id_challenge'] .'" />';
	echo '
	<button class="w3-btn w3-card-2 hvr-hang w3-quarter '. $color .' w3-round-xxlarge w3-center Oswald m-2_" value="'. $challengesRow['id_challenge'] .'" '. $popup .'>
		<p class="web-challenges-name PasseroOne">--| '. $challengesRow['name'] .' |--</p>
		<hr class="w3-border-light-grey" style="margin: auto; width: 90%;" />
		<div class="w3-row w3-center" style="font-size: 1.1vw;">
			<div class="w3-half w3-row">
				<div class="w3-quarter"><p> </p></div>
				<div class="w3-quarter">
					<img src="images/XP.png" class="web-challenges-image" />
				</div>
				<div class="w3-quarter w3-text-light-grey">
					<p>'. $challengesRow['r_exp'] .'</p>
				</div>
			</div>
			<div class="w3-half w3-row">
				<div class="w3-quarter"><p> </p></div>
				<div class="w3-quarter">
					<img src="images/CT.png" class="web-challenges-image" />
				</div>
				<div class="w3-quarter w3-text-amber">
					<p>'. $challengesRow['r_money'] .'</p>
				</div>
			</div>
		</div>
		<hr class="web-challenges-hr-1 w3-border-light-grey" />
		<p class="fs-0p9vw">'. $ending .' '. $end->format("%m months and %d days") .' '. $when .' '. $submit .'</p>
		<hr class="web-challenges-hr-1 w3-border-light-grey" />
		<i class="web-challenges-desc">- '. $challengesRow['description'] .'</i>
	</button>
	';
	if($type == "form") echo '</form>';
}


function SubmitChallengeButton($challengesRow) {

	$difficulty = getCHallengeDifficulty($challengesRow['id_challenge']);
    if($difficulty == 1) $color = "diff_easy";
	if($difficulty == 2) $color = "diff_medium";
	if($difficulty == 3) $color = "diff_hard";
	if($difficulty == 4) $color = "diff_hard_plus";
	
	echo '
	<button class="w3-btn w3-card-2 hvr-hang '. $color .' w3-quarter w3-round-xxlarge w3-center Oswald m-2_" value="'. $challengesRow['proof'] .'" onClick="SubmitChallenge('. $challengesRow['id_challenge'] .', '. $challengesRow['id_user'] .', this.value)">
		<p class="web-challenges-name PasseroOne">Challenge '. getChallenge($challengesRow['id_challenge']) .' by <u>'. getUser($challengesRow['id_user']) .'</u></p>
		<hr class="web-challenges-hr-1 w3-border-light-grey" />
		<p class="fs-0p9vw">Started: '. date('F jS, Y \a\t h:mA', strtotime($challengesRow['date_started'])) .'</p>
		<hr class="web-challenges-hr-2 w3-border-light-grey" />
		<i class="web-challenges-desc">- '. $challengesRow['note'] .'</i>
	</button>
	';
}




// ------------------------------


// Header of every file

function html_head($title) {
echo <<<END


<!DOCTYPE html>
<html lang="en">

        <title>$title</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/w3.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Passero+One" rel="stylesheet">
	    <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/hover.css">
        <link rel="icon" type="image/png" href="images/logo.png">
	
	<script src="js/jquery.min.js"></script>
	<script src="js/core.min.js"></script>

	<link rel="stylesheet" href="css/sweetalert2.min.css" />
	<script src="js/sweetalert2.min.js"></script>

<head>

<script>

function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function myAcco(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-grey", "w3-red");
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace("w3-red", "w3-grey");
    }
}


var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

	function limitText(limitField, limitCount, limitNum) {
		if (limitField.value.length > limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);
		} else {
			limitCount.value = limitNum - limitField.value.length;
		}
	}


</script>

</head>	     \n\n

END;
}


// ------------------------------


// Navbar function 

function navbar($body_class) {
// Taking the global colors [As said not in use rn]
$clr_x1 = $GLOBALS['clr_x1'];
$clr_x2 = $GLOBALS['clr_x2'];
$clr_x3 = $GLOBALS['clr_x3'];
$clr_x4	= $GLOBALS['clr_x4'];
$clr_x5	= $GLOBALS['clr_x5'];
$clr_x6	= $GLOBALS['clr_x6'];
$clr_x7	= $GLOBALS['clr_x7'];



echo "<body class=". $body_class .">";

?>

<div class="web-bar-div w3-bar w3-text-white w3-hover w3-hide-medium w3-hide-small">

<!-- LOGO -->
 <div class='w3-left'>
  <a href='./'><img src="images/badge.png" class="web-bar-logo" /></a>
 </div>

<div class="w3-row web-bar brand-dark-blue w3-card-4">

<!-- HOME -->
 <div class='web-bar-home brand-light-blue w3-xlarge w3-bar-item w3-hide-small Sedgwick' style="width: 12vw;">
  <a class="text-deco-none" href="index.php"><p class="web-bar-title">Dauntless<br />Challenges</p></a>
 </div>

<div class='w3-center'>
<!-- About Us -->
 <div class='w3-third w3-xlarge w3-bar-item w3-hide-small Oswald h-100_'>
  <a class="text-deco-none" href="about-us.php"><p class="web-bar-item">About Us</p></a>
 </div>

<!-- Leaderboards -->
 <div class='w3-third w3-xlarge w3-bar-item w3-hide-small Oswald h-100_'>
  <a class="text-deco-none" href="public-leaderboards.php"><p class="web-bar-item">Leaderboards</p></a>
 </div>

 <!-- Speedruns -->
 <div class='w3-third w3-xlarge w3-bar-item w3-hide-small Oswald h-100_'>
  <a class="text-deco-none" href="https://speedruns.dauntless-challenges.com/"><p class="web-bar-item">Speedruns</p></a>
 </div>

<!-- Support -->
 <div class='w3-third w3-xlarge w3-bar-item w3-hide-small Oswald h-100_'>
  <a class="text-deco-none" href="support-us.php"><p class="web-bar-item">Support Us</p></a>
 </div>
</div>

<span class="web-bar-divider w3-bar-item w3-border-left"> </span>

<form method="get" action="public-profile.php">
<input type="text" class="web-search-bar w3-bar-item w3-input w3-large Oswald w3-transparent w3-text-white" name="public-user" placeholder="Search for Player..." id="Search">
</form>

 <?php 
 if(isset($_SESSION['user'])) {

 $conn = connect_db();

 $sql = "SELECT * FROM users WHERE id_user=". $_SESSION['user'];
 $res = mysqli_query($conn, $sql);
 $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

 mysqli_close($conn);


 if($userRow['permission'] == 1) {

 $conn = connect_db();

 $sql = "SELECT * FROM userchallenges WHERE state=1";
 $res = mysqli_query($conn, $sql);
 $count = mysqli_num_rows($res);

 mysqli_close($conn);
 
 ?>
<span class="web-bar-bell fa-stack fa-2x w3-bar-item">
 <a href='submissions.php'>
  <i class="fas fa-bell fa-stack-1x fa-inverse hvr-buzz-out"></i>
  <span class='fa-stack w3-opacity-min' data-count='<?php echo $count; ?>'></span>
 </a>
</span>
<?php } 


$conn = connect_db();

 $sql = "SELECT * FROM profiles WHERE id_user=". $_SESSION['user'];
 $res = mysqli_query($conn, $sql);
 $profileRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

 mysqli_close($conn);

?>

<div class="web-bar-money w3-bar-item w3-row PasseroOne" style="width: 10%;">
	<image src="images/CT.png" class="w3-quarter hvr-bounce-in w-25_" />
	<p class="w3-quarter web-bar-money-text"><?php echo $profileRow['money']; ?></p>
</div>

<?php } ?>


<!-- LOGIN -->

 <?php if(!isset($_SESSION['user'])) { ?>
 <div class='web-bar-log-button brand-light-blue w3-right w3-xlarge w3-bar-item w3-btn w3-hide-small Oswald' style="width: 8%;">
  <a class="text-deco-none" href="login.php"><p class="web-bar-log-text">LOG IN</p></a>
 </div>
 <?php } else { ?>
 <div class='web-bar-log-button brand-red w3-right w3-xlarge w3-bar-item w3-btn w3-hide-small Oswald' style="width: 8%;">
  <a class="text-deco-none" href="logout.php?logout"><p class="web-bar-log-text">LOG OUT</p></a>
 </div>
 <?php } ?>

</div>
</div>

<div class="web-bar-p-b"><p> </p></div>

<?php
}





// ------------------------------


// Get functions for all kinds of enhancement

function getUser($id) {
$conn = connect_db();

$sql='SELECT name FROM users WHERE id_user='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['name'];
}

// ------------------------------

function getUserPerm($id) {
$conn = connect_db();

$sql='SELECT permission FROM users WHERE id_user='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['permission'];
}

// ------------------------------

function getUserID($id) {
$conn = connect_db();

$sql='SELECT id_user FROM users WHERE name="'. $id .'"';
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['id_user'];
}

// ------------------------------

function getGuild($id) {
$conn = connect_db();

$sql='SELECT shortcut FROM guilds WHERE id_guild='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['shortcut'];
}

// ------------------------------

function getGuildName($id) {
$conn = connect_db();

$sql='SELECT name FROM guilds WHERE id_guild='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['name'];
}

// ------------------------------

function getTitle($id) {
$conn = connect_db();

$sql='SELECT name FROM titles WHERE id_title='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['name'];
}

// ------------------------------

function getWeapon($id) {
$conn = connect_db();

$sql='SELECT name FROM weapons WHERE id_weapon='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['name'];
}

// ------------------------------

function getBadgeImage($id) {
$conn = connect_db();

$sql='SELECT image FROM badges WHERE id_badge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return $gotValue['image'];
}

// ------------------------------

function getBadgeDesc($id) {
$conn = connect_db();

$sql='SELECT note FROM badges WHERE id_badge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['note']);
}

// ------------------------------

function getBadgeEXP($id) {
$conn = connect_db();

$sql='SELECT exp FROM badges WHERE id_badge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['exp']);
}

// ------------------------------

function getBadgeName($id) {
$conn = connect_db();

$sql='SELECT name FROM badges WHERE id_badge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['name']);
}

// ------------------------------

function getDifficulty($id) {
$conn = connect_db();

$sql='SELECT name FROM difficulties WHERE id_difficulty='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['name']);
}

// ------------------------------

function getCHallengeDifficulty($id) {
$conn = connect_db();

$sql='SELECT id_difficulty FROM challenges WHERE id_challenge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['id_difficulty']);
}

// ------------------------------

function getChallenge($id) {
$conn = connect_db();

$sql='SELECT name FROM challenges WHERE id_challenge='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['name']);
}

// ------------------------------

function getColor($id) {
$conn = connect_db();

$sql='SELECT name FROM colors WHERE id_color="'. $id .'"';
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['name']);
}

// ------------------------------

function getClanBgName($id) {
$conn = connect_db();

$sql='SELECT name FROM clanbacks WHERE id_cb='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['name']);
}

// ------------------------------

function getClanBg($id) {
$conn = connect_db();

$sql='SELECT background FROM clanbacks WHERE id_cb='. $id;
$sql_res = mysqli_query($conn, $sql);

mysqli_close($conn);

$gotValue = mysqli_fetch_array($sql_res, MYSQLI_ASSOC);

return nl2br($gotValue['background']);
}

// ------------------------------



?>
