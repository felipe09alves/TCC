<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="static/css/bootstrap.min.css">
	<link href="static/fontawesome/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="static/css/style.css">
</head>

<body>
	<!-- <form id="wrapper" method="post" onsubmit="return confirma();"> -->
	<div id="wrapper">
		

		<div class="img-main">
			<img class="text-center" src="./static/logo.svg" alt="">
		</div>
		<div class="login-box">
			<div class="form-group">
				<label for="">Login:</label><span class="text-danger"></span>
				<input id="user" type="text" class="form-control campo" name="" placeholder="Login">
			</div>
			<div class="form-group">
				<label for="">Senha:</label><span class="text-danger"></span>
				<input id="senha" type="password" class="form-control campo" name="" placeholder="Senha">
			</div>
			<div class="form-group"></div>
			<div>
				<button id="entrar" class="form-control btn btn-outline-primary">Entrar</button>
			</div>
		</div>


		

	</div>


</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/fontawesome/js/all.min.js"></script>

<script>
	$("#entrar").click(function() {
		user = $("#user").val();
		senha = $("#senha").val();

		if( (user == "sollar" && senha == "admin") || (user == "admin" && senha == "admin") ) {
			window.location.href="./index.php"
		} else {
			alert("Usuário ou senha incorreta!");
		}

	});
</script>

</html>