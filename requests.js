var mainCamera = "http://ramcraft.ddns.net:8082/video"
var sideCamera = "http://ramcraft.ddns.net:8081/video"

window.onload = function() {
  var right = new XMLHttpRequest();
    right.open("GET","http://ramcraft.ddns.net:81/start");
    right.send();
}

function up() {
    var up = new XMLHttpRequest();
    up.open("GET","http://ramcraft.ddns.net:81/up");
    up.send();
}
function down() {
    var down = new XMLHttpRequest();
    down.open("GET","http://ramcraft.ddns.net:81/down");
    down.send();
}
function left() {
    var left = new XMLHttpRequest();
    left.open("GET","http://ramcraft.ddns.net:81/left");
    left.send();
}
function right() {
    var right = new XMLHttpRequest();
    right.open("GET","http://ramcraft.ddns.net:81/right");
    right.send();
}
function stop() {
    var stop = new XMLHttpRequest();
    stop.open("GET","http://ramcraft.ddns.net:81/stop");
    stop.send();
}

function swicherydoo(){

    document.getElementById("stream").src = currentVid;

    if (currentVid == mainCamera){
      currentVid = sideCamera;
    }
    else {
      currentVid = mainCamera;
    }

}
function drop() {
    var drop = new XMLHttpRequest();
    drop.open("GET","http://ramcraft.ddns.net:81/drop");
    drop.send();
}
var currentVid = "http://ramcraft.ddns.net:8082/video";
