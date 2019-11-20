
  function deletePicture(id) {
    document.getElementById('delete_'+id).parentNode.remove();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../app/deletepic.php?id_pic="+id, true);
    xhr.send();
  }