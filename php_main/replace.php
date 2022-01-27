<?php

	include("connection.php");

	function changeData($email) {
		global $con;

		$sql = "SELECT id,login,email FROM users WHERE email='$email'";
		$query = mysqli_query($con, $sql);
		
		$array = [];
		foreach($query as $key) {
			$array = $key;
		}
		
		$emailDB = $array['email'];


		$linkArray = [
			"id" => $array['id'],
			"login" => $array['login']
		];

		$queryString = http_build_query($linkArray);
		$link = "https://www.mytasks.pl/input-passwd?".$queryString;


		//repalce data in email message
		$emailWindow = file_get_contents("email-window.php");
		$editsData = [
			"{{login}}" => $linkArray['login'],
			"{{link}}" => $link
		];

		foreach($editsData as $key => $value) {
			$emailWindow = str_replace($key, $value, $emailWindow);
		}

		echo $emailWindow;
	}

?>