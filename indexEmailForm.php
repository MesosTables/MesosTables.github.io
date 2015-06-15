<!doctype html>
<html>
<head>
    <title>Email Form</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
	<style type="text/css"> 
		#wrapper{
			margin:0 auto;
			width:600px;
			font-family:helvetica;
			font-size:1.2em;
		}
		input{
			border-radius:5px;
			padding:5px;
			height:26px;
			width:300px;
			font-size:1.2em;
			border: 1px solid grey;
			margin-bottom:10px;
		}
		textarea{
			height:250px;
			width:300px;
			border-radius:5px;
			padding:5px;
			font-size:1.2em;
			border: 1px solid grey;
			margin-bottom:10px;
		}
		label{
			width:200px;
			float:left;
			padding-top:9px;
		}
		#submit{
			border-radius:5px;
			height:50px;
			width:200px;
			font-size:1.2em;
			border: 1px solid grey;
			margin-bottom:10px;
			margin-left:200px;
		}
		p{
			color: #D8000C;
			background-color: #FFBABA;
			margin:20px;
			padding: 20px;
		}
		#link{
			text-decoration:none;
			color:#2A5DB0;
		}
		#link a{
			text-decoration:none;
			color:#2A5DB0;
		}
		#link:hover{
			color: #2B2B2B;
		}
		h4{
			color: #7FAD4A;
			background-color: #DFF2BF;
			margin:20px;
			padding: 20px;
		}

	</style>
</head>

<body>
	<?php


		if($_POST["submit"]){
			
			$headers = "From: ".$_POST["emailFrom"];

			if(!$_POST['emailTo'] ){
				$error = $error."<br />Please enter your Email To address.";
			}
			//filter_var($_POST['emailTo'], FILTER_VALIDATE_EMAIL)

			if(!$_POST['subject']){
				$error = $error."<br /> Please enter your subject.";
			}
			if(!$_POST['body']){
				$error = $error."<br /> Please enter your body text.";
			}
			if(!$_POST['emailFrom']){
				$error = $error."<br />Please enter your Email From address.";
			}
			if($_POST['emailTo'] != "" AND !filter_var($_POST['emailTo'], FILTER_VALIDATE_EMAIL)){
				$error = $error."<br />Please enter a valid to email address.";
			}
			if($_POST['emailFrom'] != "" AND !filter_var($_POST['emailFrom'], FILTER_VALIDATE_EMAIL)){
				$error = $error."<br />Please enter a valid from email address.";
			}

			if($error){
				$result = "<p><b> There were error(s) in the form: </b>".$error."</p>";
			}else{
				if(mail($_POST["emailTo"], $_POST["subject"], $_POST["body"], $headers)){
					//$result =  "<h4>Last email sent successful.</h4>";
					unset($_POST);
					//unset($_REQUEST);
					//$result =  "<h4>Last email sent successful.</h4>";
					//header('Location: indexEmailForm.php');
					$result = "<h4>Last email sent successful.</h4>";
					
					
				}else{
					$result = " <br />Mail not Sent <br />". $result;
				}
			}
		}
		
	?>
<div id="wrapper">
	<form  method="post">
		<label for ="emailTo">Email To</label>
		<input name="emailTo" placeholder="email" type="email" value="<?php echo $_POST['emailTo']; ?>"/>
		<br />
		<label for ="subject">subject</label>
		<input name="subject" placeholder="re:" type="text"  value="<?php echo $_POST['subject']; ?>"/>
		<br />
		<label for ="body">body</label>
		<textarea name="body" placeholder="Hello, "><?php echo $_POST['body']; ?></textarea>
		<br />
		<label for ="emailFrom">Email From</label>
		<input name="emailFrom" type="text" placeholder="email"  value="<?php echo $_POST['emailFrom']; ?>"/>
		<br />
		<input id="submit" type="submit" name="submit" value="Send Your Email"/>
	</form>
	<?php
		echo $result;

	?>
	<br />
	<p>I have noticed that this does <strong>NOT</strong> immediately work with sending <strong>TO</strong> gMail addresses. Search for email address generators online to populate the email inputs. I have used the following email generators successfully <a id="link" href="https://www.guerrillamail.com/"> guerillamail</a> and <a id="link" href="http://www.throwawaymail.com/"> throwawaymail</a>.</p>
</div>
</body>
</html>