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

html_head("Profiles Set");

navbar('bgimg_index_logged');

HelpButton();
pageFade();



$conn = connect_db();

$sql = "SELECT * FROM profiles";
$res = mysqli_query($conn, $sql);

mysqli_close($conn);


?>



<script>
    function ProfileSearch() {
        var input, filter, btn, div, i;
        input = document.getElementById("ProfilesSearch");
        filter = input.value.toUpperCase();
        div = document.getElementById("ProfileDiv");
        btn = div.getElementsByTagName("button");
        for (i = 0; i < btn.length; i++) {
            if (btn[i].innerHTML.toUpperCase().indexOf(filter) > -1) btn[i].style.display = "";
            else btn[i].style.display = "none";
        }
    }
</script>


<div class="w3-text-light-grey Oswald">

    <div class="web-challenges-div w3-container">
        <input type="text" class="web-challenges-search w3-left w3-input w3-transparent w3-text-light-grey w3-border-bottom w3-animate-input" id="ProfilesSearch" placeholder="Search for a Profile..." onkeyup="ProfileSearch();" />
    </div>

    <hr class="web-challenges-hr-special" />

    <div class="w3-row ml-10_" id="ProfileDiv">
        <?php
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) ProfileButton($row);
        ?>
    </div>

</div>


</body>

</html> 