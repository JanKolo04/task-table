<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<h1 style='font-size: 30px; margin: 0px; font-weight: bold;'>Veryfi code</h1>
			</div>

			<div id='infoDiv'>
				<p style="margin: 0px;">Check your inbox for the email with the code. The code consists of 6 digits.</p>
			</div>

			<div id='emailDiv' style='margin-left: 10px;'>
				<p style="margin: 0px">Code was sended on email <mark id="email" style="margin: 0px">{{email}}</mark></p>
			</div>
		</div>

		<form method='POST'>
			<div id='inputDiv'>
				<input type='text' name='code' id='code' placeholder='Code...'>
			</div>


			<div class="d-flex justify-content-end align-items-center" id='buttonDiv'>
				<a href='email' id='undo'>Undo</a>
				<button id='submit' name="submit" type="submit">Submit</button>
			</div>

		</form>
	</div>

</body>
</html>
