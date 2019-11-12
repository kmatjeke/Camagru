(function() {
    var video = document.getElementById('video'),
    vendorUrl = window.URL || window.webkitURL,
    canvas= document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    photo= document.getElementById('photo'),
    submitupload = document.getElementById('#savebutton'),
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

    function getImage(canvas) {
        var imageData = canvas.toDataURL();
        var image = new Image();
        image.src = imageData;
        return image;
    }

    function saveImage(image) {
        var link = document.createElement("a");

        link.setAttribute("href", image.src);
        link.setAttribute("download", "canvasImage");
        link.click();
    }

    var down = document.getElementById("button_download");
    down.onclick = function saveCanvasAsImageFile(){
        var image = getImage(document.getElementById("canvas"));
        saveImage(image);
    }

    document.getElementById('takephoto').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('imgs/png'));

    });


    var handler = document.getElementById('handler');
    var button_upload = document.getElementById('button_upload');
    var newImg = document.getElementById("upImg");

    button_upload.addEventListener('click', uploadImg);

    function uploadImg(e) {
        e.preventDefault();
        var img = new FileReader();
        img.onload = function (a) {
            newImg.src = a.target.result;
            captureImg(newImg.src);
        };
    }

    var captureImg = function (src)
    {
        var context = canvas.getContext('2d');
        var newImg = new Image();
        newImg.src = src;
        context.drawImage(newImg, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('imgs/png'));
    }
})();