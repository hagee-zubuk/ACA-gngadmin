<?php
if (isset($MSG)) {
	if (strlen($MSG)>3) {
		echo "<div class=\"err\">$MSG</div>". PHP_EOL;
	}
}
?>
<div class="container">
	<h1 class="subtitle">Vehicles</h1>
	<div class="table-container">
	<table class="table is-striped is-hoverable is-fullwidth dense">
		<tr><th align="center" colspan="2">Year, Make, Model</th><th>Location, Type</th><th>Transmission</th><th>Body style</th></tr>
<?php
if ($list === FALSE):
?>
<tr><td colspan="5" style="text-align:center;">(no records)</td></tr>
<?php
else:
	foreach($list as $rw):
		$loctype = trim($rw->locationstr);
		$loctype .= (strlen($loctype) > 0) ? ', ':'';
		$loctype .= $rw->car_type;
		$a_tag = base_url('Vehicle/view/'. $rw->guid);
?>
	<tr><td>
			<a href="<?= $a_tag ?>"><?= $rw->year ?></a></td>
		<td>
			<a href="<?= $a_tag ?>"><?= $rw->make ?> <?= $rw->model ?></a></td>
		<td><?= $loctype?></td>
		<td><?= $rw->transmission ?></td>
		<td><?= $rw->bodystyle ?></td>
		</tr>
<?php
	endforeach;
endif;
?>		
	</table>
	</div><!-- table container -- this should make it scrollable -->
</div>	