function newSite(string) {

    document.getElementById('myFrame').src =string ;
}

function reloadParent(){
  window.parent.location.reload();
}
