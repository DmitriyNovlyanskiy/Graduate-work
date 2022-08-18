<?
	require 'controller_connect_db.php';

	$data = $_POST;

	function get_rol(){
		$count_rol = R::count('roles');
		for ($i = 1; $i <= $count_rol; $i++) {
			$arr_rol[] = $i;
		}
		$roles = R::loadAll('roles', $arr_rol);
		foreach ($roles as $rol) {
			echo "<option value=".$rol->id.">".$rol->text."</option>";
		}
	}
	function get_corpus(){
		$count_corp = R::count('corpus');
		for ($i = 1; $i <= $count_corp; $i++) {
			$arr_corp[] = $i;
		}
		$corpus = R::loadAll('corpus', $arr_corp);
		foreach ($corpus as $corp) {
			echo "<option value=".$corp->id.">".$corp->text."</option>";
		}
	}	

	if (isset($data['registration'])) {
		$errors = array();
		if (trim($data['login'] == '')) {
			$errors[] = 'Придумайте логин';
			
		}
		else {
			if (R::count('users', '`login` = ?', array($data['login'])) > 0) {
				$errors[] = 'Пользователь с таким логином уже существует, придумайте новый логин';
			}
		}
		if (trim($data['name'] == '')) {
			$errors[] = 'Введите имя';
		}
		if ($data['rol'] == '0') {
			$errors[] = 'Выберите роль пользователя';
		}
		if ($data['corp'] == '0') {
			$errors[] = 'Выберите с каким корпусом работает пользователь';
		}
		if ($data['password'] == '') {
			$errors[] = 'Придумайте пароль';
		}
		if (empty($errors)) {
			$users = R::dispense('users');
			$users->login = $data['login'];
			$users->name = $data['name'];
			$users->rol = $data['rol'];
			$users->corpus = $data['corp'];
			$users->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($users);
			header('Location: ../view/admin.php');
		}
		else {
			echo '<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
    			<div class="modal-dialog">
      				<div class="modal-content">
        				<div class="modal-header">
          					<h5 class="modal-title" id="modal-label">Ошибка</h5>
        				</div>
        				<div class="modal-body">
          					<p class="mb-5">'.array_shift($errors).'</p>
        				</div>
        				<div class="modal-footer">
          					<button class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        				</div>
      				</div>
    			</div>
  			</div>';
		}
	}
	if (isset($data['admin'])) {
		header('Location: admin.php');
	}
	if (isset($data['registration'])) {
		header('Location: registration.php');
	}
	if (isset($data['del_user'])) {
		header('Location: del_user.php');
	}
	if (isset($data['logout'])) {
		unset($_SESSION['logged_user']); //завершение сессии
		header('Location: ../index.php');
	}
?>