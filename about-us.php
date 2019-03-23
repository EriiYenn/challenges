<?php

//ob_start();
session_start();

require_once 'inc.php';


// ------------------------------


// Start of Page with some functions

html_head("About Us");

navbar('bgimg_index_logged');

pageFade();
HelpButton();

?>

<div class="w3-row AboutBox w3-center fs-1vw">
    <p class="animation-target fs-1p5vw">About Us</p>
    <p class="web-about-title">Meet the team that aims to challenge you!</p>

    <div class="w3-half w3-text-light-grey mb-2_">
        <div class="web-about-card w3-row w3-card-4 w3-light-grey w3-border w3-border-black hvr-buzz-out">
            <div class="w3-third">
                <img src="images/Syra.jpg" class="web-about-image">
            </div>

            <div class="w3-twothird w3-right pr-10_">
                <p class="m-1-0_">Merlijn "Syraleaf" Eskens</p>
                <hr class="w3-border-black m-0" />
                <p class="web-about-desc"><br />I have no clue what to put here. I'll think about it at some point.<br /><br /></p>
            </div>
        </div>
    </div>

    <div class="w3-half w3-text-light-grey mb-2_">
        <div class="web-about-card 3-row w3-card-4 brand-dark-blue w3-border w3-border-black hvr-float">
            <div class="w3-third">
                <img src="images/Erii.jpg" class="web-about-image">
            </div>

            <div class="w3-twothird w3-right pr-10_">
                <p class="m-1-0_">Josef "Erii" Zacek</p>
                <hr class="m-0" />
                <p class="web-about-desc">~ Chief Programmer of the Website Development. ~<br /><br />I'm 18 years old student of Programming currently living in Czech Republic. Magnificent image, eh?</p>
            </div>
        </div>
    </div>

    <div class="w3-half w3-text-light-grey mb-2_">
        <div class="web-about-card w3-row w3-card-4 w3-pink w3-border w3-border-black hvr-wobble-horizontal">
            <div class="w3-third">
                <img src="images/Gabriel.png" class="web-about-image">
            </div>

            <div class="w3-twothird w3-right pr-10_">
                <p class="m-1-0_">Gabriel "Photophobia" Portela</p>
                <hr class="m-0" />
                <p class="web-about-desc">~ Graphic Designer ~<br />I'm 22 years old game designer.<br />Born, raised and stuck in Brazil :p<br />Thanks to me this website is poop emoji free.</p>
            </div>
        </div>
    </div>

    <div class="w3-half w3-text-light-grey mb-2_">
        <div class="web-about-card w3-row w3-card-4 w3-green w3-border w3-border-black hvr-skew">
            <div class="w3-third">
                <img src="images/Riddle.jpg" class="web-about-image">
            </div>

            <div class="w3-twothird w3-right pr-10_">
                <p class="m-1-0_">Polished "TheRiddlex" Polish</p>
                <hr class="m-0" />
                <p class="web-about-desc">IDK.</p>
            </div>
        </div>
    </div>
</div>

</body>

</html> 