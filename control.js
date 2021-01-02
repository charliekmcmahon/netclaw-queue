// Code © 2020 Charlie McMahon. All Rights Reserved.
//this caused me so much pain
var fired = false;
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

document.onkeydown = function(event) {
    if(!fired) {
        fired = true;
          if (event.keyCode == 38){
            up();
          }
          else if (event.keyCode == 40){
            down();
          }
          else if (event.keyCode == 37){
            left();
          }
          else if (event.keyCode == 39){
            right();
          }
          else if (event.keyCode == 32){
            drop();
          }
          else if (event.keyCode == 83){
            swicherydoo();
          }
    }
};

document.onkeyup = function(event) {
    fired = false;
      stop();
};
