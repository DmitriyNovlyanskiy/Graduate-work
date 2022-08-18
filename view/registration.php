<?	
	include "../controllers/controller_registration.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Администратор</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/signup.js"></script>
</head>
<body>

	<form action="" method="POST">

		<nav class="navbar navbar-default" id="menu">
  			<div class="container-fluid">
    			<div>
    				<button class="btn btn-primary" name="admin">Все пользователи</button>
    			</div>
    			<div class="btn-group">
    				<button class="btn btn-primary" name="registration">Зарегистрировать пользователя</button>
				</div>
				<div>
    				<button class="btn btn-primary" name="del_user">Удалить пользователя</button>
    			</div>
					<button type="submit" name="logout" class="btn btn-primary">Выйти</button>
  			</div>
		</nav>
		<div class="login-box">
		<center>
			<label>Логин</label>
			
			<br>
			<input type="text" name="login" class="form-control" value="<? echo @$data['login']; ?>">
			
			<br>
			<label>ФИО пользователя</label>
			<br>
			
			<input type="text" name="name" class="form-control" value="<? echo @$data['name']; ?>">
			<br>
			<label>Роль</label>
			<br>
			<select name="rol" class="form-control">
				<option value="0">Нажмите чтобы выбрать</option>
				<? get_rol(); ?>
			</select>
			<br>
			<label>Корпус</label>
			<br>
			<select name="corp" class="form-control">
				<option value="0">Нажмите чтобы выбрать</option>
				<? get_corpus(); ?>
			</select>
			
			<br>
			<label>Пароль</label>
			<br>
			
			<input type="password" name="password" class="form-control">
			<br>
			<br>
			<button type="submit" class="btn btn-success" name="registration">Зарегистрировать</button>
		</center>
		</div>

	</form>
	
</body>
</html>