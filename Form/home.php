<?php
session_start();
?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="home.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
    </HEAD>
    <BODY>
        <HEADER>
            <?php include('../includes/header.php') ?>
        </HEADER>
        <?php if (isset($_SESSION['id'])) { ?>
            <div class="webcam-capture">
                <video></video>
                <script>
                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
                    if (navigator.getUserMedia)
                    {
                        navigator.getUserMedia({ audio: false, video: true},
                        function(stream)
                        {
                            var video = document.querySelector('video');
                            video.srcObject = stream;
                            video.onloadedmetadata = function(e)
                            {
                            video.play();
                            };
                        },
                        function(err)
                        {
                            console.log("The following error occurred: " + err.name);
                        }
                        document.getElementById
                    );
                    }
                    else
                    {
                        console.log("getUserMedia not supported");
                    }
                </script>
                <div class="captured-picture">
                </div>
            </div>
            <div class="takebutton">
                <a href="#" id=capture class="booth-capture-button">Take Photo</a>
            </div>
            <?php } ?>
    </BODY>
</HTML>