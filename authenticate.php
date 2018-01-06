<?php 

	if(isset($_POST['send'])){

		$arr= array();

		if($_POST['credential'] == '1'){
			$arr['success'] = true;
		} else {
			$arr['success'] = false;
		}

		echo json_encode($arr);
	}

?>