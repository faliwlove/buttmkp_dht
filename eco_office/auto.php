<?php 
include 'datacontainer.php';
include 'datacontainer_do.php';
include 'datacontainer_ph.php';
include 'datacontainer_tds.php';
include 'datacontainer_wt.php';
?>

<div class="test">

	<p> Nilai Kelembapan = <?php echo $a;?></p>
	<p>Nilai dissolved oxygen = <?php echo $do;?></p>
	<p>Nilai pH = <?php echo $ph;?></p>
	<p>Nilai Total Dissolved Solid = <?php echo $tds; ?></p>
	<p>Nilai Water temperature = <?php echo $wt; ?></p>

</div>