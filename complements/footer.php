<?php
$time_start = microtime(true);

usleep(100);

$time_end = microtime(true);
$time = $time_end - $time_start;
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/complements.css">
    <link rel="icon" type="image/jpg" href="../img/vgs.jpg">
</head>

<body>
<div class="footer">
    <footer class="footer normal" id="toggle_footer">

        <div>
            <p>
                Volp'Gang Scantrad &copy; 2020 - v1.0 BETA<br>
                <?php //echo "Page généré en $time s"; ?>
            </p>

            <div>
                <a href="https://discord.gg/DvvSNdN" Target="_BLANK"><div id="discord_footer"></div></a>
                <a href="https://twitter.com/VolpGang" Target="_BLANK"><div id="twitter_footer"></div></a>
                <a href="https://www.facebook.com/VGSTeams" Target="_BLANK"><div id="facebook_footer"></div></a>
                <a href="https://www.youtube.com/channel/UCMnKgOVkuoBamqcvZjGko7Q" Target="_BLANK"><div id="youtube_footer"></div></a>
                <a href="https://www.twitch.tv/volpgangscantrad" Target="_BLANK"><div id="twitch_footer"></div></a>
            </div>

            <div>
                <input id="light" class="back light" type="button" value="Light" placeholder="Light" onclick="switch_theme('white')">
                <input id="normal" class="back normal" type="button" value="Normal" placeholder="Normal" onclick="switch_theme('normal')">
                <input id="dark" class="back dark" type="button" value="Dark" placeholder="Dark" onclick="switch_theme('dark')">
            </div>
        </div>

    </footer>
</div>
</body>
</html>