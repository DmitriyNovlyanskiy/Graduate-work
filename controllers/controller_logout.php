<?
	require_once("../phpexcel/PHPExcel.php");
	require_once("../phpexcel/PHPExcel/Writer/Excel5.php");
	require 'controller_connect_db.php';
	
	$data = $_POST;

	function get_groops($data){
		$count_groops = R::count('groops');
		for ($i = 1; $i <= $count_groops; $i++) {
			$arr_groops[] = $i;
		}
		$groops = R::loadAll('groops', $arr_groops);
		foreach ($groops as $groop) {
			if ($data['select_groop'] == $groop->id) {
				$selected = "selected";
			} 
			else {
				$selected = "";
			}
			echo "<option ".$selected." value=".$groop->id.">".$groop->name_groop."</option>";
		}
	}

	function get_social_groops($data){
		$count_social_groops = R::count('social_groops');
		for ($i = 1; $i <= $count_social_groops; $i++) {
			$arr_social_groops[] = $i;
		}
		$social_groops = R::loadAll('social_groops', $arr_social_groops);
		foreach ($social_groops as $social_groop) {
			if ($data['select_social_groop'] == $social_groop->id) {
				$selected = "selected";
			} 
			else {
				$selected = "";
			}
			echo "<option ".$selected." value=".$social_groop->id.">".$social_groop->name."</option>";
		}
	}

	if (isset($data['logout'])) {
		unset($_SESSION['logged_user']); //завершение сессии
		header('Location: ../index.php');
	}
?>