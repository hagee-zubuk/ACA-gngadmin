<?php
if (isset($MSG)) {
	if (strlen($MSG)>3) {
		echo "<div class=\"err\">$MSG</div>". PHP_EOL;
	}
}
$title = (isset($title)) ? $title : 'Please wait...';
$next = (isset($next)) ? $next : base_url('Home');
?>
<div class="container">
	<h1 class="subtitle"><?=$title?></h1>
	<img src="<?=base_url("images/gears.gif")?>" alt="" title="please wait" />
</div>	
<script>
$(document).ready(function() {
	setTimeout( function() { window.location = "<?= $next ?>"; }, 1500);
});
</script>	