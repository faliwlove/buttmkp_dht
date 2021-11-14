<?php
	$temp=$_POST["temp"];
	$Write="<?php $" . "temp='" . $temp . "'; ?>";
	file_put_contents('datacontainer_temp.php',$Write);
?>