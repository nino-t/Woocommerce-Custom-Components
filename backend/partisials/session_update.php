<?php
	// FOr 8 Session

	session_start();
	if (isset($_POST['custom_data_2']) && $_POST['custom_data_2'] != '') {
		$_SESSION['custom_data_2'] = $_POST['custom_data_2'];
		if (isset($_POST['vocher_price']) && $_POST['vocher_price'] != '') {
			$_SESSION['vocher_price'] = $_POST['vocher_price'];
		}					
		$_SESSION['custom_data_1'] = $_POST['custom_data_1'];
	}
	if (isset($_POST['custom_data_3']) && $_POST['custom_data_3'] != '') {
		$_SESSION['custom_data_3'] = $_POST['custom_data_3'];
	}
	if (isset($_POST['custom_data_4']) && $_POST['custom_data_4'] != '') {
		$_SESSION['custom_data_4'] = $_POST['custom_data_4'];
	}
	if (isset($_POST['custom_data_5']) && $_POST['custom_data_5'] != '') {
		$_SESSION['custom_data_5'] = $_POST['custom_data_5'];
	}
	if (isset($_POST['custom_data_6']) && $_POST['custom_data_6'] != '') {
		$_SESSION['custom_data_6'] = $_POST['custom_data_6'];
	}
	if (isset($_POST['custom_data_7']) && $_POST['custom_data_7'] != '') {
		$_SESSION['custom_data_7'] = $_POST['custom_data_7'];
	}
	if (isset($_POST['custom_data_9']) && $_POST['custom_data_9'] != '') {
		$_SESSION['custom_data_2'] = $_POST['custom_data_9'];
		$_SESSION['custom_data_1'] = $_POST['custom_data_8'];
	}
	if (isset($_POST['custom_data_10']) && $_POST['custom_data_10'] != '') {
		$_SESSION['custom_data_8'] = $_POST['custom_data_10'];
	}	
	if (isset($_POST['custom_data_11']) && $_POST['custom_data_11'] != '') {
		$_SESSION['custom_data_7'] = $_POST['custom_data_11'];
	}		
?>