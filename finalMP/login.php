<!-- <?php include('connection.php') ?> -->
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontaweome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="loginContainer">
	<div class="form-box">
		<h1 id="title">Sign Up</h1>
		<form method="post" action="login.php">
			<div class="input-group">
				<div class="input-field" id="nameField">
					<i class="fa-solid fa-user"></i>
					<input type="text" placeholder="Name">
				</div>

				<div class="input-field">
					<i class="fa-solid fa-envelope"></i>
					<input type="email" placeholder="Email">
				</div>

				<div class="input-field">
					<i class="fa-solid fa-lock"></i>
					<input type="password" placeholder="Password">
				</div>
				<p>Forgot password <a href="#">Click Here!</a></p>
			</div>
			<div class="btn-field">
				<button type="button" id="signupBtn">Sign up</button>
				<button type="button" id="signinBtn" class="disable">Sign in</button>
			</div>
		</form>
	</div>
  </div>

  <script>
	let signupBtn = document.getElementById("signupBtn");
	let signinBtn = document.getElementById("signinBtn");
	let nameField = document.getElementById("nameField");
	let title = document.getElementById("title");

	signinBtn.onclick = function(){
		nameField.style.maxHeight = "0";
		title.innerHTML = "Sign In";
		signupBtn.classList.add("disable");
		signinBtn.classList.remove("disable");
	}
	signupBtn.onclick = function(){
		nameField.style.maxHeight = "60px";
		title.innerHTML = "Sign Up";
		signupBtn.classList.remove("disable");
		signinBtn.classList.add("disable");
	}
  </script>

</body>
</html>