<?
	require 'controller_connect_db.php';

	$data = $_POST;	

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
		if ($data['password'] == '') {
			$errors[] = 'Придумайте пароль';
		}
		if (empty($errors)) {
			$users = R::dispense('users');
			$users->login = $data['login'];
			$users->rol = 1;
			$users->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($users);
			header('Location: main.php');
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
?>