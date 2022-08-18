<?
	include "../controllers/controller_autorization.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="../css/authorization.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/signup.js"></script>
</head>
<body>

	<form action="" method="POST">
			<div class="login-box">
				<center>
				<h1>Авторизация</h1>
				<label>Логин</label>
				<br>
				<input type="text" name="login" class="form-control" value="<? echo @$data['login']; ?>">
				<br>
				<br>
				<label>Пароль</label>
				<br>
				<input type="password" name="password" class="form-control">
				<br>
				<br>
				<button type="submit" class="btn btn-success" name="authorization">Войти в систему</button>
				<br>
				<br>
			</center>
			</div>		
	</form>

</body>
</html>