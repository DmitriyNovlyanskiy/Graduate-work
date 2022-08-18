<?
	include "../controllers/controller_logout.php";
	$data = $_POST;
	$count = R::count('students');
	for ($i = 1; $i <= $count; $i++) {
		$array[] = $i;
		$array0[] = $i;
		$array1[] = $i;
		$array2[] = $i;
	}
	$info = R::find('students', [':id' => $array]);
	if (isset($data['user'])) {
		header('Location: user.php');
	}
	if (isset($data['expelled'])) {
		header('Location: expelled.php');
	}
	if (isset($data['load'])) {
		header('Location: load.php');
	}
	if (isset($data['redact'])) {
		header('Location: redact.php');
	}
	if (isset($data['delet'])) {
		header('Location: delet.php');
	}
	if (isset($array)){
		foreach ($info as $info_0) {
			$arr = array_shift($array0);
			$first_names = array_shift($array1);
			if (isset($data['del'.$first_names.''])) {
				$delet = R::load('students', $info_0->id);
				$expelled = R::dispense('expelled');
				$expelled->name = $info_0->name;
				$expelled->parents = $info_0->parents;
				$expelled->gender = $info_0->gender;
				$expelled->age = $info_0->age;
				$expelled->phone_number = $info_0->phone_number;
				$expelled->parent_phone_number = $info_0->parent_phone_number;
				$expelled->groop = $info_0->groop;
				$expelled->social_groop = $info_0->social_groop;
				$expelled->documents = $info_0->documents;
				$expelled->social_groop = $info_0->social_groop;
				$expelled->pass = $info_0->pass;
				$expelled->nutrition = $info_0->nutrition;
				R::store($expelled);
				R::trash($delet);
			}
		}
	}
	function get_age($birthday) {
		$diff = date('Ymd') - date('Ymd', strtotime($birthday));
		return substr($diff, 0, -4 );
	}
	if (isset($_SESSION['logged_user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Удаление</title>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/search_js.js"></script>
	<script type="text/javascript" src="../js/user.js"></script>
</head>
<body>

	<form action="" method="POST">
    	<? if ($_SESSION['logged_user']->rol == 3) {?>
    	<nav class="navbar navbar-default" id="menu">
  			<div class="container-fluid">
    			<div class="navbar-header col-2">
    				<input type="text" name="myInput" id="myInput" class="form-control" placeholder="Поиск студента">
    			</div>
    			<div>
    				<button class="btn btn-primary" name="user">Все студенты</button>
    			</div>
    			<div>
    				<button class="btn btn-primary" name="expelled">Отчисленные</button>
    			</div>
    			<div>
    				<button type="button" id="sort" class="btn btn-secondary" data-toggle="dropdown" disabled>Фильтры</button>
    				<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
    					<div class="modal-dialog">
      						<div class="modal-content">
        						<div class="modal-header">
          							<h5 class="modal-title" id="modal-label">Фильтры</h5>
        						</div>
        						<div class="modal-body">
        							<table class="table" id="modal-table">
        								<tr>
        									<td>Пол
        									<div id="gender" style="display: none;">
        											<select name="select_gender" id="select" class="form-control">
        												<option value="0">Выбрать</option>
        												<option value="1">Ж</option>
        												<option value="2">М</option>
        											</select>
        										</div>
        									</td>
        									<td>
        										<input type="checkbox" name="filter1" id="filter1">
        									</td>
        								</tr>
        								<tr>
        									<td>
        										Группа
        										<div id="groop" style="display: none;">
        											<select name="select_groop" id="select" class="form-control">
        												<option value="0">Выбрать</option>
        												<? get_groops($data); ?>
        											</select>
        										</div>
        									</td>
        									<td>
        										<input type="checkbox" name="filter2" id="filter2">
        									</td>
        								</tr>
        								<tr>
        									<td>
        										Социальная группа
        										<div id="social_groop" style="display: none;">
        											<select name="select_social_groop" id="select" class="form-control">
        												<option value="0">Выбрать</option>
        												<? get_social_groops($data); ?>
        											</select>
        										</div>
        									</td>
        									<td>
        										<input type="checkbox" name="filter3" id="filter3">
        									</td>
        								</tr>
        								<tr>
        									<td>Несовершеннолетние</td>
        									<td><input type="checkbox" name="filter4"></td>
        								</tr>
        								<tr>
        									<td>Совершеннолетние</td>
        									<td><input type="checkbox" name="filter5"></td>
        								</tr>
        								<tr>
        									<td>Социальная стипендия</td>
        									<td><input type="checkbox" name="filter6"></td>
        								</tr>
        								<tr>
        									<td>Проживание в общежитии</td>
        									<td><input type="checkbox" name="filter7"></td>
        								</tr>
        								<tr>
        									<td>Внеурочная деятельность</td>
        									<td><input type="checkbox" name="filter8"></td>
        								</tr>
        							</table>
        						</div>
        						<div class="modal-footer">
        							<button type="submit" name="success" class="btn btn-success">Применить</button>
          							<button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        						</div>
      						</div>
    					</div>
  					</div>
				</div>
				<div>
    				<button class="btn btn-primary" name="load">Загрузить список</button>
    			</div>
				<div>
    				<button class="btn btn-primary" name="redact">Редактирование</button>
    			</div>
    			<div>
    				<button class="btn btn-primary" name="delet">Изменения статуса</button>
    			</div>
					<button type="submit" name="logout" class="btn btn-primary">Выйти</button>
  			</div>
		</nav>
		<div>
		<div>

		<?}?>
			<?
				$info = R::find('students', [':id' => $array]);
				echo '<table class="table" id="myTable">';
					foreach ($info as $info_1) {
						$groop = R::findOne('groops', '`id` = ?', [$info_1->groop]);
						$social_groop = R::findOne('social_groops', '`id` = ?', [$info_1->social_groop]);
						$names = array_shift($array2);
						if ($info_1->social_scholarship == 'on') {$checked1 = "Да";} else {$checked1 = "Нет";}
						if ($info_1->pass == 'on') {$checked2 = "Да";} else {$checked2 = "Нет";}
						if ($info_1->nutrition == 'on') {$checked3 = "Да";} else {$checked3 = "Нет";}
						echo '<tr id="spechal_tr">';
							echo '<td id="td1">'.$info_1->name.'</td>';
							echo '<td><a id="'.$names.'" class="detals" href="#">Детали</a></td>';
							echo '<div class="modal fade" id="modal'.$names.'" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
    							<div class="modal-dialog">
      								<div class="modal-content" id="mod">
        								<div class="modal-header">
          									<h5 class="modal-title" id="modal-label">'.$info_1->name.'</h5>
        								</div>
        								<div class="modal-body">';
        									echo '<div id="tabs'.$names.'">';
  													echo '<ul>';
  														echo '<li><a href="#tabs-1">О студенте</a></li>';
  														echo '<li><a href="#tabs-2">Телефонные номера</a></li>';
  														echo '<li><a href="#tabs-3">Группа</a></li>';
  														echo '<li><a href="#tabs-4">Социальная группа</a></li>';
  														echo '<li><a href="#tabs-5">Документы</a></li>';
  														echo '<li><a href="#tabs-6">Соц. пакеты</a></li>';
  													echo '</ul>';
  													echo '<div id="tabs-1">';
  														echo 'ФИО: '.$info_1->name.'<br>';
  														echo 'Пол: '.$info_1->gender.'<br>';
  														echo 'Дата рождения: '.$info_1->age.'<br>';
														echo 'Возраст: '.get_age($info_1->age).'<br>';
														echo 'Представитель: '.$info_1->parents.'';
  													echo '</div>';
  													echo '<div id="tabs-2">';

  														echo 'Номер студента: '.$info_1->phone_number.'<br>';
														echo 'Номер представителя: '.$info_1->parent_phone_number;
  													echo '</div>';
  													echo '<div id="tabs-3">';
  														echo 'Группа студента: '.$groop->name_groop;
  													echo '</div>';
  													echo '<div id="tabs-4">';
  														echo 'Социальная группа: '.$social_groop->name;
  													echo '</div>';
  													echo '<div id="tabs-5">';
  														echo $info_1->documents;
  													echo '</div>';
  													echo '<div id="tabs-6">';
  														echo 'Социальная стипендия: '.$checked1.'<br>';
														echo 'Проживание в общежитии: '.$checked2.'<br>';
														echo 'Внеурочная деятельность: '.$checked3.'';
  													echo '</div>';
  												echo '</div>';
        								echo '</div>
        								<div class="modal-footer">
          									<button type="button" id="close'.$names.'" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        								</div>
      								</div>
    							</div>
  							</div>';
  							echo '<td><button type="submit" name="del'.$names.'" class="btn btn-danger">Изменить статус на отчисленного</button></td>';
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