<?php
if (get_cookie('usr_name') != null) {
	$fullname = get_cookie('usr_name');
}
?>
	</section>
	<footer class="footer">
	
		T/D: <div class="foot_ts"><?= date("Y-m-d H:i:s") ?></div>
		&nbsp;|&nbsp;
		Rendered in: <div class="foot_ts">{elapsed_time}seconds</div>
		&nbsp;|&nbsp;
		You are logged in as <strong><a href="#"><?= $fullname ?></a></strong>
		
	</footer>
</body>
</html>