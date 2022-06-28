<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$title = isset($title)? $title : 'Vehicle Registry';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?= base_url('favicon.ico')?>" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>

	<link rel="stylesheet" href="<?= base_url('css/bulma.min.css')?>">
    <!-- script defer src="js/all.js"></script -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css')?>">

    <script src="<?=base_url('js/jquery-3.4.1.min.js')?>"></script>
<script>
$(document).ready(function() {
	$('a.navibutton').click(function(){
		var link = $(this).data('link');
		if(link.length > 6) {
			console.log('going to ' + link);
			window.open(link
					, 'more_on'
					, 'channelmode=0,directories=0,fullscreen=0,height=500,location=0,menubar=0,resizable=1,scrollbars=1,status=0,titlebar=1,toolbar=0,width=800'
					, false
				);			
		}
	});	
});
</script>
</head>
<body>
	<nav class="navbar" role="navigation" aria-label="main navigation" style="border-bottom: 1px dashed #bba;">
		<div class="navbar-brand" style="background-color:white;">
			<a class="navbar-item" href="<?= base_url('Home') ?>">
				<img src="<?= base_url('images/gnglogo-50.jpg') ?>" width="194" height="36" alt="Good News Garage" title="Good News Garage" />
			</a>
			<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>
		<div id="navbarBasicExample" class="navbar-menu">
			<div class="navbar-start">
				<a class="navbar-item" href="<?= base_url('Home')?>">
					Home
				</a>
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link">
						Records
					</a>
					<div class="navbar-dropdown">
						<a class="navbar-item navibutton" data-link="" href="<?= base_url('Vehicle/list')?>">
							Vehicles
						</a>
						<a class="navbar-item navibutton" data-link="" href="<?= base_url('Customer/list')?>">
							Customers
						</a>
						<a class="navbar-item navibutton" data-link="" href="<?= base_url('Vehicle/candylist')?>">
							CANDY
						</a>
						<a class="navbar-item">
							Web Import
						</a>
						<hr class="navbar-divider">
						<a class="navbar-item">
							Search
						</a>
						<hr class="navbar-divider">
						<a class="navbar-item navibutton" data-link="" href="<?= base_url('Vehicle/warrantyclaims')?>">
							All Open Warrantee Claims
						</a>
						<hr class="navbar-divider">
						<a class="navbar-item">
							Batch Print
						</a>						
					</div>
				</div>
				<!--<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link">
						Documentation
					</a>
					<div class="navbar-dropdown">
						<a class="navbar-item">
							Donor Form
						</a>
						<a class="navbar-item">
							NH MA CT Form
						</a>
						<a class="navbar-item">
							Tow Order/Check-In Form
						</a>
					</div>
				</div> -->
				<div class="navbar-item has-dropdown is-hoverable">
					<a class="navbar-link">
						Reports
					</a>
					<div class="navbar-dropdown">
						<a class="navbar-item">
							Cars Under Warranty
						</a>
						<a class="navbar-item">
							Multiple Donor Report
						</a>
						<a class="navbar-item">
							Donations by Year, Make, Model
						</a>
						<a class="navbar-item">
							Donations by State, Town, Value
						</a>
						<a class="navbar-item">
							Vehicle Types Placed
						</a>
						<a class="navbar-item">
							How Heard Report
						</a>
					</div>
				</div>
			</div>
			<div class="navbar-end">
				<div class="navbar-item">
					<div class="buttons">
						<a class="button" href="<?= base_url('Customer/new') ?>">New Customer</a>
						<a class="button is-primary" href="<?= base_url('Vehicle/new') ?>">
							<strong>New Vehicle</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<section class="section" style="padding-top: 10px;">
