<?php 
	include("includes/config.php");
	include("includes/classes/Constants.php");
	include("includes/classes/Account.php");
	$account = new Account($con);
	include("includes/handlers/register_handlers.php");
	include("includes/handlers/login_handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Ändet</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php 
	if(isset($_POST['loginButton2'])){
		echo '<script>
		$(document).ready(function(){
			$("#loginForm").hide();
			$("#registerForm").show();
		});
			</script>';	}
	else{
		echo '<script>
		$(document).ready(function(){
			$("#loginForm").show();
			$("#registerForm").hide();
		});
	</script>';
	}
	?>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>
						Login to your account
					</h2>
						<p>
							<?php echo $account->getError(Constants::$loginFailed); ?>
							<label for="loginUsername">Username</label>
							<input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername'); ?>" required>
						</p>
						<p>
							<label for="loginPassword">Password</label>
							<input id="loginPassword" type="password" name="loginPassword"  required>
						</p>
							<input class="button" type="submit" value="Log In" name="loginButton">
							
							<div class="hasAccountText">
								<span id="hideLogin">Don't have an account yet? Sign up here</span>
							</div>
					
				</form>

				<form id="registerForm" action="register.php" method="POST">
					<h2>
						Create your own account
					</h2>
						<p>
							<?php echo $account->getError(Constants::$user5to25); ?>
							<?php echo $account->getError(Constants::$usernameTaken); ?>
							<label for="username">Username</label>
							<input id="username" type="text" name="username" placeholder="e.g. bartSimpson" value="<?php getInputValue('username'); ?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$fName2To25); ?>
							<label for="firstName">First Name</label>
							<input id="firstName" type="text" name="firstName" placeholder="e.g. Bart" value="<?php getInputValue('firstName'); ?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$lastName5to25); ?>
							<label for="lastName">Last Name</label>
							<input id="lastName" type="text" name="lastName" placeholder="e.g. Simpson" value="<?php getInputValue('lastName'); ?>" required>
						</p>
						<p>
							
							<?php echo $account->getError(Constants::$emailInvalid); ?>
							<?php echo $account->getError(Constants::$emailTaken); ?>
							<label for="email">E-mail</label>
							<input id="email" type="text" name="email" value="<?php getInputValue('email'); ?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$emailNotMatch); ?>
							<label for="repEmail">Confirm E-mail</label>
							<input id="repEmail" type="text" name="repEmail" value="<?php getInputValue('repEmail'); ?>" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$passwordOnlyNum); ?>
							<?php echo $account->getError(Constants::$password5to30); ?>
							<label for="password">Password</label>
							<input id="password" type="password" name="loginPassword" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$passwordDoNoMatch); ?>
							<label for="password2">Confirm Password</label>
							<input id="password2" type="password" name="loginPassword2" required>
						</p>
							<input class="button" type="submit" value="Sign Up" name="loginButton2">	
							<div class="hasAccountText">
								<a href="#"></a>
								<span id="hideRegister">Alredy have an account? Login here</span>
							</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great music now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Dicover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>