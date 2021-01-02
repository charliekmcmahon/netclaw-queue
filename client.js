console.log('js running');

function joinQueue(){
		console.log('btn prerssed');
		var user_id1 = document.getElementById('user_name_label');
		var user_id2 = document.getElementById('user_name');
		document.cookie=`uuid=${user_id1}`;
}

document.getElementById("submitBtn").addEventListener("mouseover", myFunction);

function myFunction(){
			((document.getElementById("hiddenVal")).value) = (document.getElementById("user_name_label").textContent);
			((document.getElementById("hiddenName")).value) = (document.getElementById("user_name_name").textContent);
}