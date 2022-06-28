<div class="container">
	<h1 class="subtitle">Customers</h1>
	<table class="dense">
		<tr><th colspan="2">Name</th><th>City, State</th></tr>
<?php
if ($list === FALSE):
?>
<tr><td colspan="5">(no records)</td></tr>
<?php
else:
	foreach($list as $rw):
?>
	<tr><td>
		<a href="<?=base_url('Customer/view/'. $rw->guid)?>"><?= $rw->firstname ?></a></td>
		<td>
		<a href="<?=base_url('Customer/view/'. $rw->guid)?>"><?= $rw->lastname ?></a></td>
		<td><?= strtoupper($rw->city) ?>, <?= strtoupper($rw->state) ?></td>
		</tr>
<?php
	endforeach;
endif;
?>
	</table>
</div>	