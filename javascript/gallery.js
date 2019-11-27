(function() {

    var streaming = false,
        video = document.querySelector('#video'),
        cover = document.querySelector('#cover'),
        canvas = document.querySelector('#canvas'),
        context = canvas.getContext('2d'),
        photo = document.querySelector('#photo'),
        startbutton = document.querySelector('#startbutton'),
        savebutton = document.querySelector('#savebutton'),
        img1 = document.getElementById('img1'),
        img2 = document.getElementById('img2'),
        img3 = document.getElementById('img3'),
        img4 = document.getElementById('img4'),
        img5 = document.getElementById('img5'),
        img6 = document.getElementById('img6'),
        img7 = document.getElementById('img7'),
        img8 = document.getElementById('img8'),
        img9 = document.getElementById('img9'),
        img10 = document.getElementById('img10'),
        upload = document.querySelector('#uploadpic'),
        submitupload = document.querySelector('#uploadsubmitbutton'),
        data = 0,
        uploadData = 0,
        width = 320,
        height = 240,
        imgselected = 0;
  
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

  
    function mergePicAndDisplay(pic) {
      var picData = pic.replace("data:image/png;base64,", "");
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../functions/mergepic.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("pic="+encodeURIComponent(picData)+"&img="+imgselected);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          response = "data:image/png;base64,"+response;
          data = response;
          image = new Image();
          image.src = response;
          image.onload = function() {
            canvas.getContext('2d').drawImage(image, 0, 0, width, height);
            canvas.toDataURL('image/png');
          }
        }
      }
    }
  
    function takePicture(vid) { // if vid == 1, take picture from webcam // if vid == 0, take picture from upload
        var newcanvas = document.createElement('canvas');
        newcanvas.width = width;
        newcanvas.height = height;
        canvas.width = width;
        canvas.height = height;
        if (vid == 1) {
          newcanvas.getContext('2d').drawImage(video, 0, 0, width, height);
          var pic = newcanvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
        else {
          var image = new Image();
          image.src = uploadData;
          image.onload = function() {
            newcanvas.getContext('2d').drawImage(image, 0, 0, width, height);
            var pic = newcanvas.toDataURL('image/png');
            mergePicAndDisplay(pic);
          }
        }
      }
  
    startbutton.addEventListener('click', function(ev){
      
        takePicture(1);
      ev.preventDefault();
    }, false);
  
    
  
    savebutton.addEventListener('click', function(ev){
      if (data != 0)
        savePicture(data);
        
      ev.preventDefault();
    }, false);
  
    upload.addEventListener('change', function(e) {
        var file = this.files[0];
        var imageType = /image.*/;
            if (file.type.match(imageType) && file.size < 1500000) {
                   var reader = new FileReader();
        reader.addEventListener('load', function() {
          uploadData = reader.result;
        }, false);
        reader.readAsDataURL(file);
      }
    }, false);
  
    submitupload.addEventListener('click', function(ev) {
      if (uploadData == 0)
        displayError("NoUpload");
      else
        takePicture(0);
    }, false);
  
  
    function savePicture(data) {
      var picData = data.replace("data:image/png;base64,", "");
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../functions/savepic.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("pic="+encodeURIComponent(picData));
      xhr.onreadystatechange = function () {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          var id_pic = response['id_pic'];
        }
      }
    }
    
    img1.addEventListener('click', function() {
      addsticker(1);
    });

    img2.addEventListener('click', function(ev) {
      addsticker(2);
    });

    img3.addEventListener('click', function(ev) {
      addsticker(3);
    });

    img4.addEventListener('click', function(ev) {
      addsticker(4);
    });

    img5.addEventListener('click', function(ev) {
      addsticker(5);
    });

    img6.addEventListener('click', function(ev) {
      addsticker(6);
    });

    img7.addEventListener('click', function(ev) {
      addsticker(7);
    });

    img8.addEventListener('click', function(ev) {
      addsticker(8);
    });

    img9.addEventListener('click', function(ev) {
      addsticker(9);
    });

    img10.addEventListener('click', function(ev) {
      addsticker(10);
    });

    function addsticker(path){
      var image = new Image;
      var newcanvas = document.createElement('canvas');
      name = null;

      if (path == 1)
      {
        name = "../imgs/image1.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 130, 110, 110);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 2)
      {
        name = "../imgs/image2.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 220, 168, 100, 70);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 3)
      {
        name = "../imgs/image3.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 0, 90, 70);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 4)
      {
        name = "../imgs/image4.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 30, 30, 90, 90);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 5)
      {
        name = "../imgs/image5.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 110, 0, 90, 90);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 6)
      {
        name = "../imgs/image6.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 110, 105, 110, 90);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 7)
      {
        name = "../imgs/image7.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 0, 320, 240);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 8)
      {
        name = "../imgs/image8.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 0, 320, 240);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 9)
      {
        name = "../imgs/image9.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 0, 320, 240);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
      if (path == 10)
      {
        name = "../imgs/image10.png";
        image.src = name;
        if (canvas)
        {
          context.drawImage(image, 0, 0, 320, 240);
          canvas.setAttribute('src', canvas.toDataURL('image/png'));
          var pic = canvas.toDataURL('image/png');
          mergePicAndDisplay(pic);
        }
      }
    }
      
  
  })();