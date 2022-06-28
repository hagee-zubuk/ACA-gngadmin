<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title = isset($title)? $title : 'Vehicle Registry';
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

    <script src="<?=base_url('js/jquery-3.4.1.min.js')?>"></script>
</head>
<body>
	<section class="section" style="padding-top: 5px;">