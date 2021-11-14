<?php
	$humi=$_POST["humi"];
	$Write="<?php $" . "humi='" . $humi . "'; ?>";
	file_put_contents('datacontainer_humi.php',$Write);
?>