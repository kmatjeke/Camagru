(function() {
    var video = document.getElementById('video'),
    canvas= document.getElementById('canvas'),
    context = canvas.getContext('2d');

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;
    if (navigator.getUserMedia)
    {
        navigator.getUserMedia({ audio: false, video: true},
        function(stream)
        {
            video = document.querySelector('video');
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
    );
    }
    else
    {
        console.log("getUserMedia not supported");
    };
    document.getElementById('capture').addEventListener('click ', function() {
        context.drawImage(video, 0, 0, 200, 200);
    });
})();