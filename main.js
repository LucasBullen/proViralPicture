function search() {
	var campagin = document.getElementById('campaign').value;
	console.log(campagin);
	$.ajax({
	  type: "POST",
	  url: "http://lucasbullen.github.io/proViralPicture/api.php",
	  success: function(){alert("we good");}
	});
}
