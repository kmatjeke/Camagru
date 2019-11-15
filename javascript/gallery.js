(function() {
    var video = document.getElementById('video'),
    vendorUrl = window.URL || window.webkitURL
    canvas= document.getElementById('canvas'),
    context = canvas.getContext('2d'),
    photo= document.getElementById('photo');
    // submitupload = document.getElementById('#savebutton'),

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

    //Taking photo and displaying on canvas

    canvas.style.display="none";
    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 300, 210);
        var but= document.getElementById('download');
        var sav= document.getElementById('save');
        but.style.display="block";
        sav.style.display="block";
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });

    function getImage(canvas) {
        var imageData = canvas.toDataURL();
        var image = new Image();
        image.src = imageData;
        return image;
    }

// //saving image to computer
    function saveImage(image) {
        var link = document.createElement("a");

        link.setAttribute("href", image.src);
        link.setAttribute("download", "canvasImage");
        link.click();
    }

    var down = document.getElementById("download");
    down.onclick = function saveCanvasAsImageFile(){
        var image = getImage(document.getElementById("canvas"));
        saveImage(image);
    }


//saving photo to gallery 
    var sav = document.getElementById("save");
    sav.addEventListener('click', save_img);
    function save_img () {
        var log_user = document.getElementById('user');
        var img_src = getImage(document.getElementById("canvas"));
        var data = "log_user=" + log_user.innerHTML + "&img_src=" + img_src;
        
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../functions/save_to_gallery.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("pic="+encodeURIComponent(data));
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.reload();
                console.log(this.responseText);
            }
        };
        
    }

})();
