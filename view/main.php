<? 

	include "../controllers/controller_main.php";

	$data = $_POST;

	if (isset($data['authorization'])) {
		header('Location: authorization.php');
	}
	if (isset($data['registration'])) {
		header('Location: registration_admin.php');
	}
	$users = R::count('users')
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Главная страница</title>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/search_js.js"></script>
	<script type="text/javascript" src="../js/user.js"></script>
</head>
<body>
	<form action="" method="POST">
    	<nav class="navbar navbar-default" id="menu">
    		<? if ($users > 0) { ?>
  			<div class="container-fluid">
    			<div class="but">
    				<button class="btn btn-primary " name="authorization">Авторизироваться</button>
    			</div>
    		</div>
    		<? }
    		else {?>
    		<div class="container-fluid">
    			<div class="but">
    				<button class="btn btn-primary " name="registration">Зарегистрироваться</button>
    			</div>
    		</div>
    		<? } ?>
    	</nav>
    	<p class="text">Веб-приложение «Социальный паспорт ГБПОУ ИО ИРКПО» для работников отдела Социально-педагогического и психологического сопровождения</p>
	</form>
</body>
</html>