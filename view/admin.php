<?
	include "../controllers/controller_logout.php";
	$data = $_POST;
	$count = R::count('users');
	for ($i = 1; $i <= $count; $i++) {
		$array[] = $i;
	}
	$info = R::find('users',[':id' => $array]);

	if (isset($data['admin'])) {
		header('Location: admin.php');
	}
	elseif (isset($data['registration'])) {
		header('Location: registration.php');
	}
	elseif (isset($data['del_user'])) {
		header('Location: del_user.php');
	}

	if (isset($_SESSION['logged_user'])) {
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
</head>
<body>

	<form action="" id="myform" method="POST">
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
		

		<div>
			<?
				echo '<table class="table" id="myTable">';
					echo '<tr>';
						echo '<td>';
							echo 'ФИО пользователя';
						echo '</td>';
						echo '<td>';
							echo 'Роль';
						echo '</td>';
						echo '<td>';
							echo 'Корпус';
						echo '</td>';
					echo '</tr>';
					foreach ($info as $info_1) {
						if ($info_1->rol > 1) {
						$load_rol = R::findOne('roles', '`id` = ?', [$info_1->rol]);
						$load_corpus = R::findOne('corpus', '`id` = ?', [$info_1->corpus]);
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
							echo '<td>'.$load_rol->text.'</td>';
							echo '<td>'.$load_corpus->text.'</td>';
						echo '</tr>';
						}
					}
				echo '</table>';
			?>
		</div>
	</form>
</body>
</html>
<?
	}
?>