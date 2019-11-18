(function() {

    var streaming = false,
        video = document.querySelector('#video'),
        cover = document.querySelector('#cover'),
        canvas = document.querySelector('#canvas'),
        photo = document.querySelector('#photo'),
        startbutton = document.querySelector('#startbutton'),
        savebutton = document.querySelector('#savebutton'),
        img1 = document.querySelector('#img1'),
        img2 = document.querySelector('#img2'),
        img3 = document.querySelector('#img3'),
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
  
    function addMinipic(id, data) {
      var div = document.createElement("DIV");
      div.setAttribute("class", "displaypic");
      var pic = document.createElement("IMG");
      pic.setAttribute("src", data);
      pic.setAttribute("class", "minipic");
      var x = document.createElement("IMG");
      x.setAttribute("src", "../imgs/delete.png");
      x.setAttribute("class", "deletepic");
      x.setAttribute("id", "delete_"+id);
      x.setAttribute("onclick", "deletePicture("+id+")");
      var minipic = document.getElementById('side');
      minipic.insertBefore(div, minipic.childNodes[0]);
      div.insertBefore(x, div.childNodes[0]);
      div.insertBefore(pic, div.childNodes[0]);
    }
  
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
        //   addMinipic(id_pic, data);
        }
      }
    }
  
  })();
  

