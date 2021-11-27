<?php 


	include("connection.php");

	$logged = 0;

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		//something was posted
		$login = $_POST['login'];
		$password = $_POST['passwd'];


		if(!empty($login) && !empty($password)) {

			//read from database
			$query = "SELECT * FROM users WHERE login = '$login' LIMIT 1";
			$result = mysqli_query($con, $query);

			if($result) {
				if($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] == $password) {
						echo "<script>console.log('how has login: " . $login . "' );</script>";
						$logged = 1;

						//whoes has been loged
						//append login to table 
						$append = "INSERT INTO tasks (login) VALUES ('$login')";
						$resultt = mysqli_query($con, $append);
						
				
					}

					else {
						echo '<script type ="text/JavaScript">';  
						echo 'alert("Password is wrong")';  
						echo '</script>';
					}
				}

				else if ($user_data["login"] != $login) {
					echo '<script type ="text/JavaScript">';  
					echo 'alert("Wrong login")';  
					echo '</script>'; 	
				}
			}			

		}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<link rel="stylesheet" type="text/css" href="style-profile.css">
	<script type="text/javascript" src="script-profile.js"></script>
</head>
<body>
	<?php

	if ($logged == 0) {
		echo "
		<div class='mainLogin'>
			<div class='white-background'>
			
				<h1 id='text1'>Login</h1>
				<p id='text2'>Enter your e-mail and password to login</p>

				<div class='allStuff'>
					
					<form method='post'>
						<center><input type='text' name='login' class='login' required placeholder='Login' maxlength='20'></center>
						<center><input type='password' name='passwd' class='passwd' required placeholder='Password' maxlength='30'></center>

						<div id='forgot'>
							<a id='forgot-text' href='signup.php'>Forgot password</a>
						</div>


						<div id='submit-div'>
							<input type='submit' value='Submit' class='submit' id='submit'>
						</div>

						<div id='register-div'>
							<p id='register'>Don't have an account? <a id='registerLink' href='register.php'>Sing up here</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>";
	}

	else {
		$html = <<<HTML
		<form method="POST">
			<script>
				disableAdd();
			</script>

			<div class="baner">
				<div class="textBaner">
					<h1 id="banerText">TASK BOARD</h1>
				</div>

				<div class="linkBaner">
					<a href="logout.php" id="logoutLink">Logout</a>
				</div>
			</div>


			<div class="header">		
				<!---input text---->
				<div class="inputDiv">
					<input type="text" id="myText" required size="1" placeholder="Task...">
				</div>

				<!---add button--->
				<div class="buttonDiv">
					<input type="submit" class="add_button" id="add_button" name="add_button" onclick="add_task()" value="Add">
				</div>
			</div>

			<div class="mainProfile">

				<div class="texts">
				<!---text--->
					<div class="text1">
						<h1 class="all_task_text" id="all_task_text">All tasks: 0</h1>
					</div>

					<div class="text2">
						<h1 class="tasks_in_progress" id="tasks_in_progress">Tasks in progress: 0</h1>
					</div>

					<div class="text3">
						<h1 class="end_tasks" id="end_tasks">End tasks: 0</h1>
					</div>
					
				</div>


				<!---task div--->
				<div class="tasks">
					<div id="tasks_all">
						<div id="tasksHolder1"></div>
					</div>

					<div id="progress_task">
						<div id="tasksHolder2"></div>
					</div>

					<div id="task_end">
						<div id="tasksHolder3"></div>
					</div>
				</div>
			</div>
		</form>
		HTML;

		echo $html;


		function adding() {
			global $con;
			global $html;
		    $classname = "taskHolder1";
		    $domdocument = new DOMDocument();
		    $domdocument->loadHTML($html);
		    $a = new DOMXPath($domdocument);
		    $spans = $a->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

		    for ($i = $spans->length - 1; $i > -1; $i--) {
		        $result[] = $spans->item($i)->firstChild->nodeValue;  
		    }


		  	$len = count($result);

		    for($y=$len-1; $y>=0; $y--){
		      	echo $result[$y]."<br>";
			    $sql = "INSERT INTO tasks (tasks, progress, endTask) VALUES ('$result[$y]', NULL, NULL)";
				$query = mysqli_query($con, $sql);
		    }
		}
	}


	?>

</body>
</html>








