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
<img src="netclawlogo.png" width="200" height="50">
    <p>
    <script>var _uox = _uox || {};(function() {var s=document.createElement("script");
s.src="https://static.usuarios-online.com/uo2.min.js";document.getElementsByTagName("head")[0].appendChild(s);})();</script>
<a href="https://www.usuarios-online.com/en/" data-id="a0334b99c9031699a086c91692df0ef4" data-type="default" target="_blank" id="uox_link">users online</a>
    <p>
    <h2>Queue coming soon!</h2>
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