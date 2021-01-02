<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
    <script type="text/javascript" src="buttons.js"></script>
    <script type="text/javascript" src="requests.js"></script>
    <script type="text/javascript" src="control.js"></script>
    <title>NetClaw | Online Claw Machine</title>
  </head>
  <body>
    <div class="title">
    <h1>NetClaw - Play a claw machine for free over the internet!</h1>
    <p>
    <br><div id="some_div"></div>
    <script>
        var timeLeft = 30;
        var elem = document.getElementById('some_div');
        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft == -1) {
                clearTimeout(timerId);
                doSomething();
            } else {
                elem.innerHTML = timeLeft + ' seconds remaining';
                timeLeft--;
            }
        }

        function doSomething() {
            console.log('redirecting');
        }
    </script>
    <br>
    <p>
    <p>
    </div>
    <div class="set">

  <div class="top-container">
    <img class="stream" id="stream" style="-webkit-user-select: none;" src="http://ramcraft.ddns.net:8082/video" width="614" height="460">
  </div>
<div class="controls">
  <nav class="d-pad">
    <a class="up" onmousedown="up()" onmouseup="stop()"></a>
    <a class="right" onmousedown="right()" onmouseup="stop()"></a>
    <a class="down" onmousedown="down()" onmouseup="stop()"></a>
    <a class="left" onmousedown="left()" onmouseup="stop()"></a>
  </nav>
  <div class="circle-button">
    <a onclick="drop()" class="circle-button" id="circlebutton">DROP</a>
  </div>
  <div class="switch-button">
    <a onclick="swicherydoo()" class="switch-button">Switch Camera</a>
  </div>
</div>


    </div>

  </body>

</html>