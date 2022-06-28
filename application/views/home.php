<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$sess = (isset($sess))? $sess : null;
?>
		<div class="container">
			<h1 class="title">Welcome to Good News Garage!</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<article class="message">
				<pre class="fortune is-fluid message-body" style="font-size:75%;">
<?= shell_exec('/usr/games/fortune') ?>
<?= var_dump($sess) ?>
Groups: <?= $sess->groups ?>
				</pre>	
			</article>
		</div>