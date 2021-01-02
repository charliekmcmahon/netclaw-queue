<?php session_start(); ?>
<?php include('global_variables.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Netclaw Queue</title>
		<script
			src="https://scripts.v1.authpack.io/index.js"
			data-key="wga-client-key-6ed202d7ed2323b01de2499a6">
		</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  <body>
    <h1>Netclaw Queue</h1>
		<h3>Welcome to Netclaw, <span data-authpack="hide" data-value="user" data-trigger="present">please log in to play.</span> <span data-authpack="replace" data-value="user.name_given"></span> </h3>
    <p id="counter">Login and press the button below to join the queue</p>
		<div data-authpack="hide" data-value="user" data-trigger="present">
		<button data-authpack="open">
			Sign up / Login
		</button>
		</div>
		<form action="submit.php" method="get">
		<input type="hidden" id="hiddenVal" name="var" value="hi"/>
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
		<script>
		console.log('js running');

		function joinQueue(){
				console.log('btn prerssed');
				var user_id1 = document.getElementById('user_name_label');
				document.cookie=`uuid=${user_id1}`;
		}

		</script>

  </body>
  <script src="client.js"></script>
</html>