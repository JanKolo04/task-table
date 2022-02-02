<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style-veryfi.css">
</head>
<body>

	<div class='baner'>
		<div class='textBaner'>
			<h1 id='banerText'>TASK BOARD</h1>
		</div>
	</div>

	<div id='mainVeryfi'>
		<div id='divText'>
			<div id='hiDiv'>
				<h1 style='font-size: 25px; margin: 0; margin-left: 10px;'>Veryfi code</h1>
			</div>

			<div id='infoDiv'>
				<p>Check your inbox for the email with the code. The code consists of 6 digits.</p>
			</div>

			<div id='emailDiv' style='margin-left: 10px;'>
				<p>Code was sended on email {{email}}</p>
			</div>
		</div>

		<form method='POST'>
			<div id='inputDiv'>
					<input type='text' name='code' id='code' placeholder='Code...'>
			</div>


			<div id='buttonDiv'>
				<a href='email' id='undo'>Undo</a>
				<button id='submit' name="submit" type="submit">Submit</button>
			</div>

		</form>
	</div>

</body>
</html>