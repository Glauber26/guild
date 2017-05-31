<?php
session_start();
if(isset($_SESSION['user'])){
	// Está logado
	$url = '/guild/home.php';
	header("location:$url");
} else {
	// Não está logado
}
?>


<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Guld Manager - Login/Cadastre-se</title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<div class="form">

		<ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a href="#login">Log In</a></li>
		</ul>

		<div class="tab-content">
			<div id="signup">   
				<h1>Guild Manager - Cadastre se</h1>

				<form action="cadastro.php" method="post">

					<div class="top-row">
						<div class="field-wrap">
							<label>
								Nome<span class="req">*</span>
							</label>
							<input type="text" name="nome" required autocomplete="off" />
						</div>

						<div class="field-wrap">
							<label>
								Nick<span class="req">*</span>
							</label>
							<input type="text" name="nick" required autocomplete="off"/>
						</div>
					</div>

					<div class="field-wrap">
						<label>
							Email<span class="req">*</span>
						</label>
						<input type="email" name="email" required autocomplete="off"/>
					</div>

					<div class="field-wrap">
						<label>
							Insira uma senha<span class="req">*</span>
						</label>
						<input type="password" name="senha" required autocomplete="off"/>
					</div>

					<button type="submit" class="button button-block"/>Cadastre - se</button>

				</form>

			</div>

			<div id="login">   
				<h1>Welcome Back!</h1>

				<form action="login.php" method="post">

					<div class="field-wrap">
						<label>
							Nick<span class="req">*</span>
						</label>
						<input type="text" name="nick" required autocomplete="off"/>
					</div>

					<div class="field-wrap">
						<label>
							Password<span class="req">*</span>
						</label>
						<input type="password" name="senha" required autocomplete="off"/>
					</div>

					<p class="forgot"><a href="#">Forgot Password?</a></p>

					<button class="button button-block"/>Log In</button>

				</form>

			</div>

		</div><!-- tab-content -->

	</div> <!-- /form -->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script src="js/index.js"></script>

</body>
</html>
