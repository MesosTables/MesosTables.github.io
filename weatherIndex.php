<!doctype html>
<html>
<head>

  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Weather Scraper</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


	<style type="text/css"> 
		.contentContainer {
 	 	 background-image:url("images/backgroundCliff.jpg");
 	 	 height:800px;
 	 	 width:100%;
 	 	 background-size: cover;
 	 	 background-position:center;
 	 	 padding-top:100px;
 	 	 }
 	 	 body{
 	 	 	color: white;
 	 	 	font-family: Helvetica;
 	 	 }
 	 	 .center{

 	 	 	text-align:center;
 	 	 }
 	 	 .container{
 	 	 	padding-top:150px;
 	 	 }
 	 	 p{
 	 	 	padding: 20px 0 15px 0;
 	 	 }
 	 	 #submit{
 	 	 	margin-top:15px;
 	 	 	margin-bottom: 15px;
 	 	 }
 	 	 .result{
 	 	 	margin-top:20px;
 	 	 	display:none;
 	 	 }
 	 	 .error{
 	 	 	margin-top:20px;
 	 	 	display:none;
 	 	 }

	</style>
</head>

<body>
	<?php


		
	?>

	<div class=" container contentContainer" id = "topContainer">

		<div class = "row">
			<div class ="col-md-6 col-md-offset-3 center">
				<h1 class="center">Weather Forecast Getter</h1>
				<p class="lead center"> Enter in your City's information below to get the current weather forecast</p>
				<form>
					<div class="form-group">
						<input id="city" class="form-control" name="city" type="text" placeholder="Eg. Paris, Raleigh, San Francisco..." />
						<br />
						<input class ="btn btn-success btn-lg" id="submit" type="submit" name="submit" value="Find My Weather"/>
					</div>
				</form>
				<div id = "success" class="alert alert-success center result"></div>
				<div id="fail" class="alert alert-danger center result"></div>
			</div>
		</div>
	
	</div>

 <script>

 	$(".contentContainer").css("min-height",$(window).height());

 	$("#submit").click(function(event){

 		event.preventDefault();
 		$(".alert").hide();
 		if($("#city").val()!=""){

	 		var city = $("#city").val();
	 		var url = "scraper.php?city="+city;
	 		$.get(url, function(data){
	 			
	 			if(data.length=="" ){
	 				$("#fail").html("Not a known City.").fadeIn();
	 			}else{
	 				$("#success").html(data).fadeIn();
	 			}
	 		})
	 	}else{
	 		$("#fail").html("Please enter a city.").fadeIn();
	 	}
 	});
 		

 </script>
</body>
</html>