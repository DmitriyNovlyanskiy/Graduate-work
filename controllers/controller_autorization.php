<?
	require 'controller_connect_db.php';

	$data = $_POST;

	if (isset($data['authorization'])) {
		$errors = array();
		$users = R::findOne('users', 'login = ?', array($data['login']));
		if ($users) {
			if (password_verify($data['password'], $users->password)) {
				$_SESSION['logged_user'] = $users;
				if ($_SESSION['logged_user'] = $users) {
					if ($users->rol == 1) {
						header('Location: ../view/admin.php');
					}
					else {
						header('Location: ../view/user.php');
					}
				}
			}
			else {
				$errors[] = "Неверно введён пароль!";
			}
		}
		else {
			$errors[] = "Пользователь не найден!";
		}
	}
	if (!empty($errors)){
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
?>