<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include_once "./bdd.php";

if(isset($_POST['signup'])){

if(isset($_POST['username']) && !empty($_POST['username']))
{
	$username=strip_tags(htmlspecialchars(htmlentities(trim($_POST['username']))));
}else{
	$erros['U']="username invalide";
}

if(isset($_POST['email']) && !empty($_POST['email']))
{
	$email=strip_tags(htmlspecialchars(htmlentities(trim($_POST['email']))));
}else{
	$erros['U']="email invalide";
}

if(isset($_POST['password']) && !empty($_POST['password']))
{
	$password=strip_tags(htmlspecialchars(htmlentities(trim($_POST['password']))));
}else{
	$erros['U']="password cannot be null";
}


if(!isset($erros)){
	$querUser=$conn->prepare("INSERT INTO utilisateur(user_name,email,password) VALUES(?,?,?)");
	$querUser->execute([$username,$email,$password]);
}

}
$log = null;
$email=null;

if(isset($_POST['signin'])){

	if (isset($_POST['user']) && !empty($_POST['user'])) {
        $email = strip_tags(htmlspecialchars(htmlentities(trim($_POST['user']))));
    }else{
		$erros['e']="email invalide";
	}

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = strip_tags(htmlspecialchars (htmlentities(trim($_POST['password']))));
	}else{
		$erros['e']="Password invalide";
	}

	$log = "SELECT email, password from utilisateur where email='$email' and password='$password'";
	$result = $conn->query($log);

	if(isset($result)){
		$ligne=$result->fetchObject();
		if($ligne!=0){
			session_start();
			$_SESSION['monlogin']=$_POST['user'];
			header("location: ./Acceuil.php");
		}else{
			$erros['suc']="Information incorrecte !!";
		}
	}else{
		$erros['e'] = "Email ou mot de passe incorrect";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../ProjetAMP_Samandina_Jerome/assets/css/login.css">
	<title>Sam's management login</title>
</head>
<body>

	<h1 style="color:black; position:absolute; top:0;">SAM'S REPERAGE</h1>
	<div class="container right-panel-active">
		<!-- Sign Up -->
		<div class="container__form container--signup">
			<form action="" class="form" id="form1" method="POST">
				<h2 class="form__title">Sign Up</h2>
				<input type="text" placeholder="User" name="username" class="input"  required/>
				<input type="email" placeholder="Email" name="email" class="input" required/>
				<input type="password" placeholder="Password" name="password" class="input" autocomplete="off" required/>
				<button class="btn" name="signup" type="submit">Sign Up</button>
				<span style="text-align: center; witdh: 100%; margin-top: 30px; color:#F30;"><?= isset($erros['U']) ? $erros['U'] : '' ?></span>
			</form>
		</div>
	
		<!-- Sign In -->
		<div class="container__form container--signin">
			<form action="" class="form" id="form2" method="POST">
				<h2 class="form__title">Sign In</h2>
				<input type="email" name="user" placeholder="Email" class="input" required/>
				<input type="password" name="password" placeholder="Password" class="input" required/>
				<span><?= isset($erros['e']) ? $erros['e'] : '' ?></span>
				<a href="#" class="link">Forgot your password?</a>
				<button class="btn" name="signin" type="submit">Sign In</button>
				<span style="text-align: center; witdh: 100%; margin-top: 30px; color:#F30;"><?= isset($erros['suc']) ? $erros['suc'] : '' ?></span>
			</form>
		</div>
	
		<!-- Overlay -->
		<div class="container__overlay">
			<div class="overlay">
				<div class="overlay__panel overlay--left">
					<button class="btn" id="signIn">Sign In</button>
				</div>
				<div class="overlay__panel overlay--right">
					<button class="btn" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script src="./assets/js/login.js"></script>
</body>
</html>