<?

	$data = $_POST;

	$filter1 = $_SESSION['filter1'];
	$filter2 = $_SESSION['filter2'];
	$filter3 = $_SESSION['filter3'];
	$filter4 = $_SESSION['filter4'];
	$filter5 = $_SESSION['filter5'];
	$filter6 = $_SESSION['filter6'];
	$filter7 = $_SESSION['filter7'];
	$filter8 = $_SESSION['filter8'];

	function get_otchet($filter1, $filter2, $filter3, $filter4, $filter5, $filter6, $filter7, $filter8) {
		$count = R::count('expelled');
		for ($i = 1; $i <= $count; $i++) {
			$array[] = $i;
			$array1[] = $i;
			$array2[] = $i;
			$array3[] = $i;
		}
		if ($filter1) {
			$gender = '`gender` = "'.$filter1.'"';
		}
		if ($filter2) {
			$groops = '`groop` = "'.$filter2.'"';
		}
		if ($filter3) {
			$social_groops = '`social_groop` = "'.$filter3.'"';
		}
		if ($filter6) {
			$filter6 = '`social_scholarship` = "on"';
		}
		if ($filter7) {
			$filter7 = '`pass` = "on"';
		}
		if ($filter8) {
			$filter8 = '`nutrition` = "on"';
		}
		//1
		if ($_SESSION['logged_user']->rol == 2) {
		
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//2
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//3
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//4
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//5
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////////
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', '`corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
	}
	if ($_SESSION['logged_user']->rol == 3) {
		
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//2
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//3
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//4
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//5
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////////
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$load = R::find('expelled', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$load = R::find('expelled', 'ORDER BY `name`', [':id' => $array]);
		}
	}
		$a = 2;
		$myXls = new PHPExcel();
		$myXls->setActiveSheetIndex(0);
		$mySheet = $myXls->getActiveSheet();
		$mySheet->setTitle("??????????");
		$mySheet ->getColumnDimension("A")->setAutoSize(true);
		$mySheet ->getColumnDimension("B")->setAutoSize(true);
		$mySheet ->getColumnDimension("C")->setAutoSize(true);
		$mySheet ->getColumnDimension("D")->setAutoSize(true);
		$mySheet ->getColumnDimension("E")->setAutoSize(true);
		$mySheet ->getColumnDimension("F")->setAutoSize(true);
		$mySheet ->getColumnDimension("G")->setAutoSize(true);
		$mySheet ->getColumnDimension("H")->setAutoSize(true);
		$mySheet ->getColumnDimension("I")->setAutoSize(true);
		$mySheet ->getColumnDimension("J")->setAutoSize(true);
		$mySheet ->getColumnDimension("K")->setAutoSize(true);
		$mySheet ->getColumnDimension("L")->setAutoSize(true);
		$mySheet ->getColumnDimension("M")->setAutoSize(true);
		$mySheet->setCellValue("A1", "?????? ????????????????");
		$mySheet->setCellValue("B1", "??????????????????????????");
		$mySheet->setCellValue("C1", "?????? ????????????????");
		$mySheet->setCellValue("D1", "???????? ???????????????? ????????????????");
		$mySheet->setCellValue("E1", "???????????????????? ?????????? ????????????????");
		$mySheet->setCellValue("F1", "???????????????????? ?????????? ???????????????? ????????????????");
		$mySheet->setCellValue("G1", "???????????? ????????????????");
		$mySheet->setCellValue("H1", "???????????????????? ????????????");
		$mySheet->setCellValue("I1", "?????????????????? ????????????????");
		$mySheet->setCellValue("J1", "????????????");
		$mySheet->setCellValue("K1", "???????????????????? ??????????????????");
		$mySheet->setCellValue("L1", "???????????????????? ?? ??????????????????");
		$mySheet->setCellValue("M1", "???????????????????? ????????????????????????");
		foreach ($load as $load_1) {
			if (!$filter4 && !$filter5){
			$load_groop = R::findOne('groops', '`id` = ?', [$load_1->groop]);
			$load_social_groop = R::findOne('social_groops', '`id` = ?', [$load_1->social_groop]);
			$load_??orpus = R::findOne('corpus', '`id` = ?', [$load_1->corpus]);
			if ($load_1->social_scholarship == 'on') {$yes1 = "????";} else {$yes1 = "";}
			if ($load_1->pass == 'on') {$yes2 = "????";} else {$yes2 = "";}
			if ($load_1->nutrition == 'on') {$yes3 = "????";} else {$yes3 = "";}
			$mySheet->setCellValue("A".$a."", $load_1->name);
			$mySheet->setCellValue("B".$a."", $load_1->parents);
			$mySheet->setCellValue("C".$a."", $load_1->gender);
			$mySheet->setCellValue("D".$a."", $load_1->age);
			$mySheet->setCellValue("E".$a."", $load_1->phone_number);
			$mySheet->setCellValue("F".$a."", $load_1->parent_phone_number);
			$mySheet->setCellValue("G".$a."", $load_groop->name_groop);
			$mySheet->setCellValue("H".$a."", $load_social_groop->name);
			$mySheet->setCellValue("I".$a."", $load_1->documents);
			$mySheet->setCellValue("J".$a."", $load_??orpus->text);
			$mySheet->setCellValue("K".$a."", $yes1);
			$mySheet->setCellValue("L".$a."", $yes2);
			$mySheet->setCellValue("M".$a."", $yes3);
			$a++;
			}
			if ($filter4){
				$filter4 = get_age($load_1->age);
				if ($filter4 < 18) {
			$load_groop = R::findOne('groops', '`id` = ?', [$load_1->groop]);
			$load_social_groop = R::findOne('social_groops', '`id` = ?', [$load_1->social_groop]);
			$load_??orpus = R::findOne('corpus', '`id` = ?', [$load_1->corpus]);
			if ($load_1->social_scholarship == 'on') {$yes1 = "????";} else {$yes1 = "";}
			if ($load_1->pass == 'on') {$yes2 = "????";} else {$yes2 = "";}
			if ($load_1->nutrition == 'on') {$yes3 = "????";} else {$yes3 = "";}
			$mySheet->setCellValue("A".$a."", $load_1->name);
			$mySheet->setCellValue("B".$a."", $load_1->parents);
			$mySheet->setCellValue("C".$a."", $load_1->gender);
			$mySheet->setCellValue("D".$a."", $load_1->age);
			$mySheet->setCellValue("E".$a."", $load_1->phone_number);
			$mySheet->setCellValue("F".$a."", $load_1->parent_phone_number);
			$mySheet->setCellValue("G".$a."", $load_groop->name_groop);
			$mySheet->setCellValue("H".$a."", $load_social_groop->name);
			$mySheet->setCellValue("I".$a."", $load_1->documents);
			$mySheet->setCellValue("J".$a."", $load_??orpus->text);
			$mySheet->setCellValue("K".$a."", $yes1);
			$mySheet->setCellValue("L".$a."", $yes2);
			$mySheet->setCellValue("M".$a."", $yes3);
			$a++;
			}
		}
			if ($filter5){
				$filter5 = get_age($load_1->age);
				if ($filter5 >= 18) {
			$load_groop = R::findOne('groops', '`id` = ?', [$load_1->groop]);
			$load_social_groop = R::findOne('social_groops', '`id` = ?', [$load_1->social_groop]);
			$load_??orpus = R::findOne('corpus', '`id` = ?', [$load_1->corpus]);
			if ($load_1->social_scholarship == 'on') {$yes1 = "????";} else {$yes1 = "";}
			if ($load_1->pass == 'on') {$yes2 = "????";} else {$yes2 = "";}
			if ($load_1->nutrition == 'on') {$yes3 = "????";} else {$yes3 = "";}
			$mySheet->setCellValue("A".$a."", $load_1->name);
			$mySheet->setCellValue("B".$a."", $load_1->parents);
			$mySheet->setCellValue("C".$a."", $load_1->gender);
			$mySheet->setCellValue("D".$a."", $load_1->age);
			$mySheet->setCellValue("E".$a."", $load_1->phone_number);
			$mySheet->setCellValue("F".$a."", $load_1->parent_phone_number);
			$mySheet->setCellValue("G".$a."", $load_groop->name_groop);
			$mySheet->setCellValue("H".$a."", $load_social_groop->name);
			$mySheet->setCellValue("I".$a."", $load_1->documents);
			$mySheet->setCellValue("J".$a."", $load_??orpus->text);
			$mySheet->setCellValue("K".$a."", $yes1);
			$mySheet->setCellValue("L".$a."", $yes2);
			$mySheet->setCellValue("M".$a."", $yes3);
			$a++;
			}
		}
		}
		$b = $a - 2;
		$mySheet->setCellValue("A".$a."", "???????????????????? ??????????????????:");
		$mySheet->setCellValue("B".$a."", $b);
		header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=??????????.xls");
		$objWriter = new PHPExcel_Writer_Excel5($myXls);
		$objWriter->save("php://output");
						
		unset($_SESSION['filter1']);
		unset($_SESSION['filter2']);
		unset($_SESSION['filter3']);
		unset($_SESSION['filter4']);
		unset($_SESSION['filter5']);
		unset($_SESSION['filter6']);
		unset($_SESSION['filter7']);
		unset($_SESSION['filter8']);
	}
?>