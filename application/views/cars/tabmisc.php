<?php
function fixDate($strDt) {
	$strDt = trim($strDt);
	if (strlen($strDt) < 6) {
		return('');
	}
	$tmpZ = strtotime($strDt);
	if ($tmpZ < strtotime('1990-01-01')) {
		return('');
	} else {
		return(date('Y-m-d', $tmpZ));
	}
}

$vehicle->dategiventogng 	= fixDate($vehicle->dategiventogng);
$vehicle->datedonorinformed = fixDate($vehicle->datedonorinformed);
$vehicle->sentto_nhmact 	= fixDate($vehicle->sentto_nhmact);
$vehicle->thankyou_postcard = fixDate($vehicle->thankyou_postcard);
$vehicle->datesurveysent 	= fixDate($vehicle->datesurveysent);
$vehicle->date_tax_letter 	= fixDate($vehicle->date_tax_letter);
?>
		<section class="tabContent" data-content="3" id="tabMisc">
			<div class="columns">
				<div class="column">
<table class="dense">
	<tr><td>Accepted?</td>
		<td><select id="accepted" name="accepted">
				<option></option>
				<option value="Y">Yes</option>
				<option value="N">No</option>
				<option value="T">Thinking about it</option>
				<option value="H">NH</option>
			</select></td></tr>
	<tr><td>Date given to GNG</td>
		<td><input type="date" id="dategiventogng" name="dategiventogng" value="<?=$vehicle->dategiventogng ?>" /></td>
	</tr>
	<tr><td>Date Donor Informed</td>
		<td><input type="date" id="datedonorinformed" name="datedonorinformed" value="<?=$vehicle->datedonorinformed ?>" /></td>
	</tr>
	<tr><td>Date Sent to NH/MA/CT</td>
		<td><input type="date" id="sentto_nhmact" name="sentto_nhmact" value="<?=$vehicle->sentto_nhmact?>" /></td>
	</tr>
	<tr><td>Initials</td>
		<td><input type="text" id="initials" name="initials" value="<?=$vehicle->initials ?>" /></td>
	</tr>
	<tr><td>Trade-in Value</td>
		<td><input type="text" id="tradein_value" name="tradein_value" value="<?=$vehicle->tradein_value?>" /></td>
	</tr>
	<tr><td>Retail Value</td>
		<td><input type="text" id="retail_value" name="retail_value" value="<?=$vehicle->retail_value ?>" /></td>
	</tr>
</table>
				</div>
				<div class="column">
<table class="dense">
	<tr><td>Thank You Post Card</td>
		<td><input type="text" id="thankyou_postcard" name="thankyou_postcard" value="<?=$vehicle->thankyou_postcard ?>" /></td>
	</tr>
	<tr><td>Date Survey Sent</td>
		<td><input type="date" id="datesurveysent" name="datesurveysent" value="<?=$vehicle->datesurveysent ?>" /></td>
	</tr>
	<tr><td>Issue Tax Letter</td>
		<td><input type="text" id="issue_tax_letter" name="issue_tax_letter" value="<?=$vehicle->issue_tax_letter?>" /></td>
	</tr>
	<tr><td>Date Tax Letter</td>
		<td><input type="date" id="date_tax_letter" name="date_tax_letter" value="<?=$vehicle->date_tax_letter ?>" /></td>
	</tr>
	<tr><td></td>
		<td><input type="checkbox" name="chk1098_over500" id="chk1098_over500" class="bigger" value="1"/>
			1098 Over 500
		</td>
	</tr>
	<tr><td></td>
		<td><input type="checkbox" name="chk1098_program" id="chk1098_program" class="bigger" value="1" />
			1098 Program
		</td>
	</tr>
</table>
				</div>
			</div>
			<div id="statuschanges" class="statuslog" >
<table class="dense log">
	<tr><th>Date</th><th>Status</th><th>Comments</th></tr>
	<tr><td colspan="3"><a class="button is-light">add</a></td></tr>
</table>
			</div>
		</section>
