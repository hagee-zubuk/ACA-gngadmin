<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! isset($next)) die('No form information found');
if (! isset($guid)) die('No record information found');
$tabc = array( '1' => '',
				'2' => '',
				'3' => '',
				'4' => '',
				'5' => '',
			);
if (isset($tab)) {
	if($tab == 'vehicleinfo') {
		$tabc['2'] = 'class="is-active"';
	} else {
		$tabc['1'] = '';
	}

}
$subtitle = (isset($subtitle))? $subtitle : 'New Vehicle Donation';
$strMoreJS = '';
$attr = array('id' => 'frmAAA');
echo form_open($next, $attr);
?>
<div class="container">
	<h1 class="subtitle"><?= $subtitle ?></h1>
<div class="vehinfo columns">
	<div class="column is-1 field">
		<div class="control">
			<input class="input" type="text" placeholder="Year" id="year" name="year" maxlength="4"  value="<?=$vehicle->year?>" />
			<input type="hidden" name="guid" id="guid" value="<?=$guid?>" />
		</div>
	</div>
	<div class="column is-2 field">
		<div class="select control is-fullwidth">
			<select id="make" name="make" style="width: 100%;">
				<option value="-1">Make</option>
<?= $makes ?>
			</select>
		</div>
	</div>
	<div class="column is-3 field">
		<div class="control is-fullwidth">
			<input class="input" type="text" placeholder="Model" id="model" name="model" maxlength="50" value="<?=$vehicle->model?>" />
		</div>
	</div>
	<div class="column is-1 field">
		<div class="control select is-fullwidth">
			<select id="location" name="location">
				<option value="-1">Location</option>
<?= $locs ?>
			</select>
		</div>
	</div>
	<div class="column field">
		<div class="control select is-fullwidth">
			<select id="ctype" name="ctype">
				<option value="-1">Type</option>
<?= $ctypes ?>
			</select>
		</div>
	</div>
	<div class="column">
		<button id="btnSave" class="button is-primary" disabled>Save</button>
		&nbsp;
	</div>
</div><!-- vehinfo columns -->


	<div id="tabs" class="tabs is-boxed">
		<ul>
			<li data-tab="1" <?=$tabc['1'] ?>><a>Donor Information</a></li>
			<li data-tab="2" <?=$tabc['2'] ?>><a>Vehicle Information</a></li>
			<li data-tab="4" <?=$tabc['4'] ?>><a>Vehicle Condition</a></li>
			<li data-tab="5" <?=$tabc['5'] ?>><a>Disposition</a></li>
			<li data-tab="3" <?=$tabc['3'] ?>><a>Adminitrative/Misc</a></li>
<?php
if (isset($blnShowDocu)) :
	if($blnShowDocu):
?>
<li data-tab="6" ><a>Documentation</a></li>
<?php
	endif;
endif;
?>
		</ul>
	</div>

	<div id="tab-contents">
<?php
$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabdonor.php');
$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabvehicle.php');
$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabmisc.php');
$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabcond.php');
$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabdisp.php');

if (isset($blnShowDocu)) {
	if($blnShowDocu) {
		$this->load->view('cars'. DIRECTORY_SEPARATOR .'tabdocu.php');
	}
}
?>		
	</div>
</div>
<?= form_close() ?>
<script>
/*
	$(idSel).children().remove().end().append('<option value="0"> </option>');
    $(idSel).append('<option value="154">BurlingtonFreePress.com</option>');
    $(idSel).append('<option value="155">Cars.com</option>');
	$(idSel).append('<option value="150">ConcordMonitor.com</option>');
	$(idSel).append('<option value="151">EagleTribune.com</option>');
	$(idSel).append('<option value="152">Google Ad</option>');
    $(idSel).append('<option value="156">Reviewed.com</option>');
	$(idSel).append('<option value="153">UnionLeader.com</option>');
	$(idSel).append('<option value="1">Other/Unlisted</option>')

howheard" name="howheard">
<div id="lblHDYH">HDYH detail</div></td>
<select id="hhdetail" name="hhdetail" disabled="disabled">
*/
<?php
$blnShowDocu = (isset($blnShowDocu))? $blnShowDocu : FALSE;
if (!$blnShowDocu) :
?>
function canSave() {
	if ( ($('#year').val() != '') 
			&& ($('#model').val() != '') 
			&& ( parseFloat($('#make').val() ) > 0) 
		) {
		console.log('Should-save!');
		$('#btnSave').prop('disabled', false);
	} else {
		console.log('Nope: ' + $('#year').val() + ':' + 
				$('#make').val() + ':' +
				$('#model').val() 
				);
		
		$('#btnSave').prop('disabled', true);
	}
}
<?php
	$strMoreJS =<<<MORE_SCRIPTSONREADY
	$('#year').change(function() { canSave()} );
	$('#make').change(function() { canSave()} );
	$('#model').change(function() { canSave()} );
MORE_SCRIPTSONREADY;
endif;
?>

$(document).ready(function() {
	$('#howheard').change(function() {
		var zzz = parseInt($('#howheard').val());
		console.log('Fetching options for: ' + zzz);
		var ajx = $.ajax({
				url: '<?=base_url('Vehicle/fetchRefDetail')?>'
				, type: 'GET'
				, data: 'ref=' + zzz
				, dataType: 'json'
				, success: function(data) {
					console.log(data);
					$('#lblHDYH').html(data.lbl);
					$('#hhdetail').prop("disabled", false);
					$('#hhdetail').children().remove().end().append(data.opt);
				}
				, error: function(e) {
					// error!
					$('#lblHDYH').html('HDYH detail');
					$('#hhdetail').children.remove().end().append('<option>(select a referrer above)</option>');
					$('#hhdetail').prop("disabled", true);
				}
		});

	});
	$('#tabs li').on('click', function() {
		var tab = $(this).data('tab');
		// console.log("clicked: " + tab);
		$('#tabs li').removeClass('is-active');
		$(this).addClass('is-active');

		$('#tab-contents section').removeClass('is-active');
		$('section[data-content="' + tab + '"]').addClass('is-active');
	});
	// $('#location').change(function() { canSave()} );
	// $('#ctype').change(function() { canSave()} );
<?php
	echo PHP_EOL. $strMoreJS . PHP_EOL;
	if (strlen($tabc['2']) > 5) {
		echo "$('#tab-contents section').removeClass('is-active');" . PHP_EOL;
		echo "$('section[data-content=\"2\"]').addClass('is-active');";
	}
	echo PHP_EOL . PHP_EOL;
?>
});
</script>