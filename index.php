<?php session_start(); ?>
<?php include('global_variables.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Netclaw - Play a claw machine over the internet for free</title>
		<script
			src="https://scripts.v1.authpack.io/index.js"
			data-key="wga-client-key-6ed202d7ed2323b01de2499a6">
		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="queue-index.css">
  </head>
  <body>
    <h1>Netclaw - Play a claw machine over the internet for free!</h1>
		<h3>Welcome to Netclaw, <span data-authpack="hide" data-value="user" data-trigger="present">please log in to play.</span> <b style="color:darkgreen;"><span data-authpack="replace" data-value="user.name_given"></span></b> </h3>
    <p id="counter">Login and press the button below to join the queue</p>
		<div data-authpack="hide" data-value="user" data-trigger="present">
		<button data-authpack="open">
			Sign up / Login
		</button>
		</div>
		<form action="submit.php" method="get">
		<input type="hidden" id="hiddenVal" name="var" value="hi"/>
		<input type="hidden" id="hiddenName" name="name" value="hi"/>
		<input
			type = "submit"
			class = "button"
			id = "submitBtn"
			data-authpack = "show"
			data-value = "user"
			data-trigger = "present"
			name = "joinQueueButton"
			value="Join Queue"
			onclick="myFunction()">
		</form>
		<p id="user_name_label" style="color:white;" data-authpack="replace" data-value="user.username"></p>
		<p id="user_name_name" style="color:white;" data-authpack="replace" data-value="user.name_given"></p>
		<script>
		console.log('js running');

		function joinQueue(){
				console.log('btn prerssed');
				var user_id1 = document.getElementById('user_name_label');
				document.cookie=`uuid=${user_id1}`;
		}

		</script>
		<br>
		<h3>Info</h3>
		<h4> How to play </h5>
		<ol>
		<li>Login to netclaw with your Google Account or an email & password.
		<li>Click 'Join Queue'
		<li>Wait paitently in the queue -- each play of NetClaw lasts 30 seconds.
		<li>You will be redirected to the player once you reach the top of the queue
		<li>Your play will last 30 seconds, so be quick!
		<li>You will be redirected back to the homepage, where you can choose to play again if you wish,
		</ol>
		<h4>Who made this?</h4>
		<p><a href="https://www.youtube.com/channel/UCo_gr8-NmNrjp6gATzX-mzw">Ramsom</a> and <a href="https://www.macca.xyz">Macca</a> are two friends from Queensland, Australia. <br> NetClaw started as an idea in early 2020, and an alpha version was created soon after. <br> The project lay dormant for almost a year, when it was eventually rebuilt from the ground up. <br> Ramsom is an arcade machine engineer, and Macca is a full-stack developer, with each working<br> on their respective aspects of the project.
		<h4>The data we use</h5>
		<ul>
		<li>Your first name - For the welcome screen. Only seen by you.
		<li>Your username. - For the queue. Shown to other users.
		<li>Your email address. - For account verification & password reset purposes - only visible to you.
		</ul>
		<p>For more info, contact the developer of this site on Discord -> Macca#0001
  </body>
  <script src="client.js"></script>
</html>