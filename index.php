

Choose a category here<br>
<?php
	
	$app_id = '39563317'; 
	$app_key = '8396021a9bde2aad2eaf8ca9dbeca353';
	$cons_str_prefix = 'https://api.cityofnewyork.us/calendar/v1/';
	$cons_str_suffix = '.htm?app_id='.$app_id.'&app_key='.$app_key;
	
	$query_string = "{$cons_str_prefix}categories{$cons_str_suffix}";
	$data = json_decode(file_get_contents($query_string));
	
	echo "<select class='categoryChoice'>";
	foreach($data as $value){
		echo "<option>$value</option>";
	}
	echo "</select>";
	
	//print_r($event_specific_calendar);


?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>
$(function(){
	var categoryChoiceVal = '';
	$('select').change(function() {
		categoryChoiceVal = $('.categoryChoice option:selected').text().replace(/ /g, '%20');
		$.post("ajax.php", { categoryChoiceVal:categoryChoiceVal},function(data) {
		
			$('.dataContainer').text(data);
		}); 
	});
});
</script>


<div class="dataContainer"></div>



