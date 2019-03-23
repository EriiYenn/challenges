<!DOCTYPE html>
<html lang="en">

<title>Timeline</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="../images/logo.png">
<link rel="stylesheet" href="css/timeline.css">
<link rel="stylesheet" href="../css/hover.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/tippy.js@4/themes/light-border.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@4"></script>
<script type="text/javascript" src="js/timeline.js"></script>

<head>
</head>

<body>

    <?php
    function tippyBrand($name)
    {
      echo 'data-tippy="' . $name . '" data-tippy-theme="light-border" data-tippy-arrow="true" data-tippy-placement="right-start"';
    }
    ?>


    <div class="avatar-wall">
        <p class="avatar-title-web animation-avatar-title-1"><i class="fas fa-lg fa-desktop"></i>&nbsp; <b>Web Developers</b></p>

        <img class="avatar animation-avatar-1" src="images/Melioo.jpg" alt="Melioo" id="Melioo" onClick="Highlight('Melioo', 'slateblue')" data-tippy="Melioo ~Chief Programmer" data-tippy-placement="right-start">


        <p class="avatar-title-design animation-avatar-title-2"><i class="fas fa-lg fa-pen-fancy"></i>&nbsp; <b>Designers</b></p>

        <img class="avatar animation-avatar-2" src="images/Syraleaf.jpeg" alt="Syraleaf" id="Syraleaf" onClick="Highlight('Syraleaf', 'gold')" data-tippy="Syraleaf ~Chief Designer" data-tippy-placement="right-start">

        <div class="back-button">
            <i class="far fa-3x fa-arrow-alt-circle-left hvr-hang" onClick="window.history.back();"></i>
        </div>
    </div>

    <div class="brands-wall">
        <p class="animated flipInX delay-3p5s brands-title"><i class="fas fa-lg fa-fill"></i>&nbsp; <b>Brand Legend</b></p>

        <span class="animated zoomInRight delay-4s brand-circle brand-dark-red" <?php tippyBrand("Functionality"); ?>></span>
        <span class="animated zoomInRight delay-4p5s brand-circle brand-amber" <?php tippyBrand("Coding"); ?>></span>
        <span class="animated zoomInRight delay-5s brand-circle brand-violet" <?php tippyBrand("Structuring"); ?>></span>
        <span class="animated zoomInRight delay-5p5s brand-circle brand-blue" <?php tippyBrand("Design Features"); ?>></span>
    </div>


    <header>
        <p>Dauntless Challenges history in a nutshell!</p>
        <h1>~ Development Timeline ~</h1>
    </header>

    <hr class="divider" />

    <ul class="timeline">


        <li>
            <div class="direction-r">

                <div class="flag-wrapper" data-tippy="Current LATEST version" data-tippy-placement="left-start" data-tippy-distance="40" data-tippy-arrow="true">

                    <span class="hexa h-big"></span>
                    <span class="flag flag-big" id="current">#1.4.0</span>
                    <span class="time-wrapper"><span class="time">23rd of Mar, 2019</span></span>
                </div>
                <div class="desc">
                    Design and Code Quality &nbsp;<i class="fas fa-lg fa-pen brand-text-violet"></i><br /><br />

                    <span class="desc-update">
                        - Code Quality revisions<br />
                        - Pop-Up logic and design changes<br />
                        - Extended Admin Panel features<br />
                        <span class="desc-update-list-r">+ Profiles<br /></span>
                    </span>

                    <img src="images/Syraleaf.jpeg" class="avatar-small-r r-first hvr-wobble-vertical Syraleaf" alt="Syraleaf" />
                    <img src="images/Melioo.jpg" class="avatar-small-r r-second hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-l">
                <div class="flag-wrapper">

                    <span class="hexa h-small"></span>
                    <span class="flag flag-small">#1.3.8</span>
                    <span class="time-wrapper"><span class="time">22nd of Mar, 2019</span></span>
                </div>
                <div class="desc">
                    Additional Patches of #1.3.0 &nbsp;<i class="fas fa-lg fa-bug brand-text-dark-red"></i><br /><br />

                    <span class="desc-update">
                        - Extended Challenges logics<br />
                        - Changed font from Sedgwick to Sniglet<br />
                        - Added tooltip for Finest Challenge<br />
                        - CSS review and refactorized<br />
                        - Performance fixes<br />
                        - Minor Bugs fixed
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-l hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-r">

                <div class="flag-wrapper">

                    <span class="hexa h-small"></span>
                    <span class="flag flag-small">#1.3.5</span>
                    <span class="time-wrapper"><span class="time">16th of Mar, 2019</span></span>
                </div>
                <div class="desc">
                    Patch & Bug Fixes of #1.3.0 &nbsp;<i class="fas fa-lg fa-bug brand-text-dark-red"></i><br /><br />

                    <span class="desc-update">
                        - Challenges Logic fixes<br />
                        - Registration fixes<br />
                        - EXP fixes<br />
                        - Submissions patch improvement<br />
                        - Tavern improvements
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-r hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>



        <li>
            <div class="direction-l">
                <div class="flag-wrapper">

                    <span class="hexa"></span>
                    <span class="flag">#1.3.0</span>
                    <span class="time-wrapper"><span class="time">6th of Mar, 2019</span></span>
                </div>
                <div class="desc">
                    Registration & Patches &nbsp;<i class="fas fa-lg fa-screwdriver brand-text-blue"></i><br /><br />

                    <span class="desc-update">
                        - Extended Markdown files<br />
                        - Design and Responsibility fixes<br />
                        - Server-side logic fixes<br />
                        <span class="desc-update-list-l">+ EXP<br /></span>
                        - Enabled Registration<br />
                    </span>

                    <img src="images/Syraleaf.jpeg" class="avatar-small-l l-second hvr-wobble-vertical Syraleaf" alt="Syraleaf" />
                    <img src="images/Melioo.jpg" class="avatar-small-l l-first hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-r">

                <div class="flag-wrapper">

                    <span class="hexa"></span>
                    <span class="flag">#1.2.0</span>
                    <span class="time-wrapper"><span class="time">24th of Feb, 2019</span></span>
                </div>
                <div class="desc">
                    Profile and Changelog &nbsp;<i class="far fa-lg fa-address-book brand-text-blue"></i><br /><br />

                    <span class="desc-update">
                        - Extended Profile Edit functional<br />
                        - Local styles moved to Classes<br />
                        - Icons upgraded to v5<br />
                        - Timeline micro-site<br />
                        - Stability Improvement<br />
                        - Faster loading time
                    </span>

                    <img src="images/Syraleaf.jpeg" class="avatar-small-r r-first hvr-wobble-vertical Syraleaf" alt="Syraleaf" />
                    <img src="images/Melioo.jpg" class="avatar-small-r r-second hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="hexa h-small"></span>
                    <span class="flag flag-small">#1.0.1</span>
                    <span class="time-wrapper"><span class="time">20th of Feb, 2019</span></span>
                </div>
                <div class="desc">
                    Patch of minor issues &nbsp;<i class="fab fa-lg fa-accessible-icon brand-text-dark-red"></i><br /><br />

                    <span class="desc-update">
                        - Improved load time performance<br />
                        - Libraries are accessible online<br />
                        - Fixed Notification bug closing
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-l hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-r">
                <div class="flag-wrapper" data-tippy="First FULL version, Woohoo!" data-tippy-placement="left-start" data-tippy-distance="40" data-tippy-arrow="true">
                    <span class="hexa"></span>
                    <span class="flag">#1.0.0</span>
                    <span class="time-wrapper"><span class="time">19th of Feb, 2019</span></span>
                </div>
                <div class="desc">
                    Challenges Cycle &nbsp;<i class="fas fa-lg fa-user-clock brand-text-amber"></i><br /><br />

                    <span class="desc-update">
                        - Challenge assign to player<br />
                        - Challenge submit and abandon<br />
                        - Challenge approving and denying by Administrators<br />
                        - Simple Notifications<br />
                        - Design Improvements<br />
                        - Database rebuilding and optimization<br />
                        - Security Upgrade
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-r hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="hexa"></span>
                    <span class="flag">#0.8.0</span>
                    <span class="time-wrapper"><span class="time">23rdth of Oct, 2018</span></span>
                </div>
                <div class="desc">
                    Design Update &nbsp;<i class="fas fa-lg fa-palette brand-text-blue"></i><br /><br />

                    <span class="desc-update">
                        - Hover Effects library<br />
                        - Better Backgrounds<br />
                        - Behemoths System<br />
                        - Edit of Challenges for Admins<br />
                        - Early Profile Edit<br />
                        - Profile Design update<br />
                        - About Us page<br />
                        - Tavern Info box
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-l hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-r">
                <div class="flag-wrapper">
                    <span class="hexa h-small"></span>
                    <span class="flag flag-small">#0.6.5</span>
                    <span class="time-wrapper"><span class="time">14th of Oct, 2018</span></span>
                </div>
                <div class="desc">
                    Challenges Preparations &nbsp;<i class="fas fa-lg fa-suitcase brand-text-dark-red"></i><br /><br />

                    <span class="desc-update">
                        - Challenges Add for Admins<br />
                        - Challenges Dashboard for Admins<br />
                        - Code Quality improvements
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-r hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="hexa"></span>
                    <span class="flag">#0.6.0</span>
                    <span class="time-wrapper"><span class="time">13th of Oct, 2018</span></span>
                </div>
                <div class="desc">
                    Admin Panel Iprovements &nbsp;<i class="fas fa-lg fa-columns brand-text-amber"></i><br /><br />

                    <span class="desc-update">
                        - Admin Panel for Features (Add and Edit)<br />
                        <span class="desc-update-list-l">+ Titles<br /></span>
                        <span class="desc-update-list-l">+ Run Types<br /></span>
                        <span class="desc-update-list-l">+ Party Types<br /></span>
                        <span class="desc-update-list-l">+ Difficulties<br /></span>
                        <span class="desc-update-list-l">+ Guilds<br /></span>
                        <span class="desc-update-list-l">+ Weapons<br /></span>
                        - Database upgrade<br />
                        - Design update<br />
                        - Security Upgrade
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-l hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-r">
                <div class="flag-wrapper">
                    <span class="hexa"></span>
                    <span class="flag">#0.5.0</span>
                    <span class="time-wrapper"><span class="time">12th of Oct, 2018</span></span>
                </div>
                <div class="desc">
                    Code Migration to GitHub &nbsp;<i class="fas fa-lg fa-code brand-text-amber"></i><br /><br />

                    <span class="desc-update">
                        - Moved all the code from Live Site to GitHub
                    </span>

                    <img src="images/Melioo.jpg" class="avatar-small-r hvr-wobble-vertical Melioo" alt="Melioo" />
                </div>
            </div>
        </li>


        <li>
            <div class="direction-l">
                <div class="flag-wrapper">
                    <span class="hexa h-big"></span>
                    <span class="flag flag-big">START</span>
                    <span class="time-wrapper"><span class="time">8th of Oct, 2018</span></span>
                </div>
                <div class="desc">
                    GitHub Organisation Founded &nbsp;<i class="fas fa-lg fa-code-branch brand-text-violet"></i><br /><br />

                    <span class="desc-update">
                        - Yep, all started here like a little seedling
                    </span>
                </div>
            </div>
        </li>
    </ul>

</body>

</html> 