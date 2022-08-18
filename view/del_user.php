<?
	include "../controllers/controller_logout.php";
	$data = $_POST;
	$count = R::count('users');
	for ($i = 1; $i <= $count; $i++) {
		$array[] = $i;
		$array0[] = $i;
		$array1[] = $i;
		$array2[] = $i;
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
	if (isset($array)){
		foreach ($info as $info_0) {
			$arr = array_shift($array0);
			$first_names = array_shift($array1);
			if (isset($data['del'.$first_names.''])) {
				$delet = R::load('users', $info_0->id);
				R::trash($delet);
			}
		}
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
	<script type="text/javascript" src="../js/search_js.js"></script>
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
				$info = R::find('users',[':id' => $array]);
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
						$load_rol = R::findOne('roles', '`id` = ?', [$info_1->rol]);
						$load_corpus = R::findOne('corpus', '`id` = ?', [$info_1->corpus]);
						$names = array_shift($array2);
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
							echo '<td>'.$load_rol->text.'</td>';
							echo '<td>'.$load_corpus->text.'</td>';
							echo '<td><button type="submit" name="del'.$names.'" class="btn btn-danger">Удалить</button></td>';
						echo '</tr>';
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