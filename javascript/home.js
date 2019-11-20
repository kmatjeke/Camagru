function addComment(id, comment, login) {
  
    com = htmlEntities(comment.value);
    if (com.trim() === "")
      return ;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../functions/comment.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id_pic="+id+"&comment="+com);
    xhr.onreadystatechange = function () {
      if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        var div = document.createElement("DIV");
        div.setAttribute("class", "allcomments");
        div.innerHTML = "<b>"+login+"</b> "+com;
        document.getElementById('firstcomment_'+id).appendChild(div);
        comment.value = "";
      }
    }
  }
  
  function htmlEntities(str) {
      return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
      //converts special characters (like <) into their escaped/encoded values (like &lt;).
  }
  
  function deletePicture(id) {
    document.getElementById('delete_'+id).parentNode.remove();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../app/deletepic.php?id_pic="+id, true);
    xhr.send();
  }