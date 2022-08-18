<?

	$data = $_POST;

	if (isset($data['success'])) {
		if ($data['filter1'] == 'on') {
			if ($data['select_gender'] == 1) {
				$filter1 = 'Ж';
			}
			if ($data['select_gender'] == 2) {
				$filter1 = 'М';
			}
			$_SESSION['filter1'] = $filter1;
		}
		if ($data['filter2'] == 'on') {
			$filter2 = $data['select_groop'];
			$_SESSION['filter2'] = $filter2;
		}
		if ($data['filter3'] == 'on') {
			$filter3 = $data['select_social_groop'];
			$_SESSION['filter3'] = $filter3;
		}	
		if ($data['filter4'] == 'on') {
			$filter4 = true;
			$_SESSION['filter4'] = $filter4;
		}	
		if ($data['filter5'] == 'on') {
			$filter5 = true;
			$_SESSION['filter5'] = $filter5;
		}
		if ($data['filter6'] == 'on') {
			$filter6 = true;
			$_SESSION['filter6'] = $filter6;
		}
		if ($data['filter7'] == 'on') {
			$filter7 = true;
			$_SESSION['filter7'] = $filter7;
		}
		if ($data['filter8'] == 'on') {
			$filter8 = true;
			$_SESSION['filter8'] = $filter8;
		}
	}

	function get_filter($filter1, $filter2, $filter3, $filter4, $filter5, $filter6, $filter7, $filter8) {
		$count = R::count('students');
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
			$info = R::find('students', $gender.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//2
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//3
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//4
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		//5
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////////
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' AND `corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', '`corpus` = '.$_SESSION['logged_user']->corpus.' ORDER BY `name`', [':id' => $array]);
		}
	}
	if ($_SESSION['logged_user']->rol == 3) {
		
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//2
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//3
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////
		if ($filter1 && !$filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////
		if (!$filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		///////////////////////
		if (!$filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		////////////////////////////////////
		if (!$filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//4
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//////////////////////////////
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////
		if (!$filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		//5
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && !$filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && $filter6 && !$filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && $filter3 && !$filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && $filter2 && !$filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if ($filter1 && !$filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $groops.' AND '.$social_groops.' AND '.$filter7.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		/////////////////////////////////////////////////////
		if ($filter1 && $filter2 && $filter3 && $filter6 && $filter7 && $filter8){
			$info = R::find('students', $gender.' AND '.$groops.' AND '.$social_groops.' AND '.$filter6.' AND '.$filter7.' AND '.$filter8.' ORDER BY `name`', [':id' => $array]);
		}
		if (!$filter1 && !$filter2 && !$filter3 && !$filter6 && !$filter7 && !$filter8){
			$info = R::find('students', 'ORDER BY `name`', [':id' => $array]);
		}
	}
			echo '<table class="table" id="myTable">';
					foreach ($info as $info_1) {
						if (!$filter4 && !$filter5) {
						$groop = R::findOne('groops', '`id` = ?', [$info_1->groop]);
						$social_groop = R::findOne('social_groops', '`id` = ?', [$info_1->social_groop]);
						$names = array_shift($array2);
						if ($info_1->social_scholarship == 'on') {$checked1 = "Да";} else {$checked1 = "Нет";}
						if ($info_1->pass == 'on') {$checked2 = "Да";} else {$checked2 = "Нет";}
						if ($info_1->nutrition == 'on') {$checked3 = "Да";} else {$checked3 = "Нет";}
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
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
						echo '</tr>';
						}
						if ($filter4) {
							$filter4 = get_age($info_1->age);
						if ($filter4 < 18) {
							$groop = R::findOne('groops', '`id` = ?', [$info_1->groop]);
						$social_groop = R::findOne('social_groops', '`id` = ?', [$info_1->social_groop]);
						$names = array_shift($array2);
						if ($info_1->social_scholarship == 'on') {$checked1 = "Да";} else {$checked1 = "Нет";}
						if ($info_1->pass == 'on') {$checked2 = "Да";} else {$checked2 = "Нет";}
						if ($info_1->nutrition == 'on') {$checked3 = "Да";} else {$checked3 = "Нет";}
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
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
						echo '</tr>';
						}
						}
						else if ($filter5) {
							$filter5 = get_age($info_1->age);
						if ($filter5 >= 18) {
							$groop = R::findOne('groops', '`id` = ?', [$info_1->groop]);
						$social_groop = R::findOne('social_groops', '`id` = ?', [$info_1->social_groop]);
						$names = array_shift($array2);
						if ($info_1->social_scholarship == 'on') {$checked1 = "Да";} else {$checked1 = "Нет";}
						if ($info_1->pass == 'on') {$checked2 = "Да";} else {$checked2 = "Нет";}
						if ($info_1->nutrition == 'on') {$checked3 = "Да";} else {$checked3 = "Нет";}
						echo '<tr id="spechal_tr">';
							echo '<td>'.$info_1->name.'</td>';
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
        								echo '</div>
        								<div class="modal-footer">
          									<button type="button" id="close'.$names.'" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        								</div>
      								</div>
    							</div>
  							</div>';
						echo '</tr>';
						}
						}
					}
				echo '</table>';
	}
?>