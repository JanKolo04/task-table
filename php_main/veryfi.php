<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Kod</title>
</head>
<body>

	<div class='baner'>
		<div class='textBaner'>
			<h1 id='banerText'>TASK BOARD</h1>
		</div>
	</div>

	<div id="main">
		<div id="divText">
			<div id="hiDiv">
				<h1 style="font-size: 25px; margin: 0; margin-left: 10px;">Veryfi code</h1>
			</div>

			<div id="infoDiv">
				<p>Check your inbox for the email with the code. The code consists of 6 digits.</p>
			</div>

			<div id="emailDiv" style="margin-left: 10px;">
				<p>Code was sended on email {{link}}</p>
			</div>
		</div>

		<div id="inputDiv">
			<input type="text" name="code" id="code" placeholder="Code...">
		</div>


		<div id="submitsDiv">
			<div id="haventCodeDiv">
				<a id="link" href="">Didn't you get a code</a>
			</div>
			<div id="buttonDiv">
				<button id="cancel">Cancel</button>
				<button id="submit">Submit</button>
			</div>
		</div>
	</div>


</body>
</html>