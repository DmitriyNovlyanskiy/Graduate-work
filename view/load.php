<?
	include "../controllers/controller_logout.php";
	$data = $_POST;
	$count = R::count('students');
	for ($i = 1; $i <= $count; $i++) {
		$array[] = $i;
		$array2[] = $i;
	}
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
	function get_age($birthday) {
		$diff = date('Ymd') - date('Ymd', strtotime($birthday));
		return substr($diff, 0, -4 );
	}
	if (isset($data['otchet'])) {
		get_otchet($filter1, $filter2, $filter3, $filter4, $filter5, $filter6, $filter7, $filter8);
	}

	if (isset($data['save'])) {


	$Excel = PHPExcel_IOFactory::load($_FILES['filename']['tmp_name']);

	$Start = 2;
	for ($i = $Start; $i <= 1000; $i++) {
    	$Row = new stdClass();		
    	$Row->name = $Excel->getActiveSheet()->getCell('A'.$i )->getValue();
    	$Row->parents = $Excel->getActiveSheet()->getCell('B'.$i )->getValue();
    	$Row->gender = $Excel->getActiveSheet()->getCell('C'.$i )->getValue();
    	$Row->age = $Excel->getActiveSheet()->getCell('D'.$i )->getValue();
    	$Row->age = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($Row->age));
    	$Row->phone_number = $Excel->getActiveSheet()->getCell('E'.$i )->getValue();
    	$Row->parent_phone_number = $Excel->getActiveSheet()->getCell('F'.$i )->getValue();
    	$Row->groop = $Excel->getActiveSheet()->getCell('G'.$i )->getValue();
    	$Row->social_groop = $Excel->getActiveSheet()->getCell('H'.$i )->getValue();
    	$Row->documents = $Excel->getActiveSheet()->getCell('I'.$i )->getValue();
    	$Row->corpus = $Excel->getActiveSheet()->getCell('J'.$i )->getValue();
    	$Row->social_scholarship = $Excel->getActiveSheet()->getCell('K'.$i )->getValue();
    	$Row->pass = $Excel->getActiveSheet()->getCell('L'.$i )->getValue();
    	$Row->nutrition = $Excel->getActiveSheet()->getCell('M'.$i )->getValue();
 
    	if($Row->name == null) continue;    	

    	$groop = R::findOne('groops', '`name_groop` = ?', [$Row->groop]);
    	$social_groop = R::findOne('social_groops', '`name` = ?', [$Row->social_groop]);
    	$corpus = R::findOne('corpus', '`text` = ?', [$Row->corpus]);

    	if ($Row->social_scholarship == 'Да') {$yes1 = "on";} else {$yes1 = "NULL";}
		if ($Row->pass == 'Да') {$yes2 = "on";} else {$yes2 = "NULL";}
		if ($Row->nutrition == 'Да') {$yes3 = "on";} else {$yes3 = "NULL";}

    	$students = R::dispense('students');
		$students->name = $Row->name;
		$students->parents = $Row->parents;
		$students->gender = $Row->gender;
		$students->age = $Row->age;
		$students->phone_number = $Row->phone_number;
		$students->parent_phone_number = $Row->parent_phone_number;
		$students->groop = $groop->id;
		$students->social_groop = $social_groop->id;
		$students->documents = $Row->documents;
		$students->corpus = $corpus->id;
		$students->social_scholarship = $yes1;
		$students->pass = $yes2;
		$students->nutrition = $yes3;
		
		R::store($students);
	}
}

	if (isset($_SESSION['logged_user'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Все студенты</title>
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="../css/user.css">
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/search_js.js"></script>
	<script type="text/javascript" src="../js/user.js"></script>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<? if ($_SESSION['logged_user']->rol == 3) {?>
    	<nav class="navbar navbar-default" id="menu">
  			<div class="container-fluid">
    			<div class="navbar-header col-2">
    				<input type="text" name="myInput" id="myInput" class="form-control" placeholder="Поиск студента" disabled>
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

		<br>
		<div><input type="file" name="filename">  
		<button type="submit" class="btn btn-success" name="save">Загрузить</button></div>
	</form>
</body>
</html>
<?
	}
?>