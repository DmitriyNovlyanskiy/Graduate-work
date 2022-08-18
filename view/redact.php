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
	if (isset($data['ok'])) {
		if (isset($array)){
			foreach ($info as $info_0) {
				$arr = array_shift($array0);
				$update = R::load('students', $info_0->id);
				$first_names = array_shift($array1);
				$update->phone_number = $data['phone_number'.$first_names.''];
				$update->parent_phone_number = $data['parent_phone_number'.$first_names.''];
				$update->documents = $data['documents'.$first_names.''];
				$update->social_scholarship = $data['social_scholarship'.$first_names.''];
				$update->pass = $data['pass'.$first_names.''];
				$update->nutrition = $data['nutrition'.$first_names.''];
				R::store($update);		
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
	<title>Редактирование</title>
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/search_js.js"></script>
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
					echo '<tr>';
						echo '<td>';
							echo 'ФИО студента';
						echo '</td>';
						echo '<td>';
							echo 'Представитель';
						echo '</td>';
						echo '<td>';
							echo 'Пол студента';
						echo '</td>';
						echo '<td>';
							echo 'Дата рождения студента';
						echo '</td>';
						echo '<td>';
							echo 'Телефонный номер студента';
						echo '</td>';
						echo '<td>';
							echo 'Телефонный номер родителя студента';
						echo '</td>';
						echo '<td>';
							echo 'Группа студента';
						echo '</td>';
						echo '<td>';
							echo 'Социальная группа';
						echo '</td>';
						echo '<td>';
							echo 'Документы студента';
						echo '</td>';
						echo '<td>';
							echo 'Социальная стипендия';
						echo '</td>';
						echo '<td>';
							echo 'Проживание в общежитии';
						echo '</td>';
						echo '<td>';
							echo 'Внеурочная деятельность';
						echo '</td>';
					echo '</tr>';
					foreach ($info as $info_1) {
						$groop = R::findOne('groops', '`id` = ?', [$info_1->groop]);
						$social_groop = R::findOne('social_groops', '`id` = ?', [$info_1->social_groop]);
						$names = array_shift($array2);
						if ($info_1->social_scholarship == 'on') {$checked1 = "checked";} else {$checked1 = "";}
						if ($info_1->pass == 'on') {$checked2 = "checked";} else {$checked2 = "";}
						if ($info_1->nutrition == 'on') {$checked3 = "checked";} else {$checked3 = "";}
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
							echo '<td>'.$info_1->parents.'</td>';
							echo '<td>'.$info_1->gender.'</td>';
							echo '<td>'.$info_1->age.'</td>';
							echo '<td><textarea name="phone_number'.$names.'">'.$info_1->phone_number.'</textarea></td>';
							echo '<td><textarea name="parent_phone_number'.$names.'">'.$info_1->parent_phone_number.'</textarea></td>';
							echo '<td>'.$groop->name_groop.'</td>';
							echo '<td>'.$social_groop->name.'</td>';
							echo '<td><textarea name="documents'.$names.'">'.$info_1->documents.'</textarea></td>';
							echo '<td><input type="checkbox" name="social_scholarship'.$names.'" '.$checked1.'></td>';
							echo '<td><input type="checkbox" name="pass'.$names.'" '.$checked2.'></td>';
							echo '<td><input type="checkbox" name="nutrition'.$names.'" '.$checked3.'></td>';
						echo '</tr>';
					}
				echo '</table>';
			?>
		</div>
		<center><button type="submit" class="btn btn-success" name="ok">Сохранить</button></center>
	</form>
</body>
</html>
<?
	}
?>