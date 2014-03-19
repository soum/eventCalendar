
<?php
	$app_id = '39563317'; 
	$app_key = '8396021a9bde2aad2eaf8ca9dbeca353';
	$cons_str_prefix = 'https://api.cityofnewyork.us/calendar/v1/';
	$cons_str_suffix = '.htm?app_id='.$app_id.'&app_key='.$app_key;

	$category = "";
	if (isset($_POST['categoryChoiceVal'])){
		$category = $_POST['categoryChoiceVal'];
	}
	
	$calendar = "{$cons_str_prefix}search{$cons_str_suffix}&categories=$category";
	$event_specific_calendar = file_get_contents($calendar);

	$obj = json_decode($event_specific_calendar);
	$json = json_encode($obj, JSON_PRETTY_PRINT);
	echo $json;
?>