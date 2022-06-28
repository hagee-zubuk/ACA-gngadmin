<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title = isset($title)? $title : 'Vehicle Registry';
$form = isset($form)? $form : 'Form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>

	<link rel="stylesheet" href="<?= base_url('css/bulma.min.css')?>">
    <!-- script defer src="js/all.js"></script -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css')?>">
</head>
<body>
	<div class="level">
		<div class="level-left">
			<img class="level-item" src="<?= base_url('images/gnglogo-50.jpg') ?>" width="194" height="36" alt="Good News Garage" title="Good News Garage" />
		</div>
		<div class="level-item"><h1 class="title"><?=$form?></h1></div>
<?php
	if (isset($carid)) :
?>
	<div class="level-item"><div style="text-align: center;">
			<div style="font-size: 9px;">Car&nbsp;ID</div>
			<div style="width: 70px; border: 1px solid #777; padding: 1px 5px; line-height: 0.95rem; font-family: Courier, 'Courier New', Fixed;"><?=$carid?></div>
		</div>
	</div>
<?php
	endif;
?>
	</div>

	<section class="section" style="padding-top: 10px;">
