<div class="columns">
	<div class="column is-half">
		<div style="width: 100%; border: 2px solid #666; padding: 3px 5px;">
<table class="ldense">
	<tr><td colspan="3">
		Date Donor Contact: <?= date('m/d/Y', strtotime($vehicle->ts)) ?>
		</td></tr>
	<tr><td colspan="3">
		<?=$vehicle->salutation_text?> <?=$vehicle->first?> <?=$vehicle->middle?> <?=$vehicle->last?>
		</td></tr>
	<tr><td colspan="3" style="padding: 5px 10px 15px;">
		<?=$vehicle->street?><br />
		<?=$vehicle->city?>, <?=$vehicle->state?> <?=$vehicle->zip?><br />
		</td></tr>
	<tr><td>(H) <?=$vehicle->homephone?></td>
		<td>(W) <?=$vehicle->workphone?></td>
		<td>Ext: <?=$vehicle->workext?></td>
		</tr>
	<tr><td colspan="3">
		Cell: <?=$vehicle->cellphone?> </td>
		</tr>
</table>
		</div>
		<div style="width: 100%; border: 2px solid #666; padding: 3px 5px; margin-top: 2px;">
<table class="ldense">
	<tr><td style="width: 20% !important;">Year</td>
		<td style="width: 35% !important;">Make</td>
		<td style="width: 45% !important;">Model</td>
		</tr>
	<tr><td><div style="border: 2px inset #777;"><?= $vehicle->year?></div></td>
		<td><div style="border: 2px inset #777;"><?= $vehicle->make_text ?></div></td>
		<td><div style="border: 2px inset #777;"><?= $vehicle->model ?></div></td>
		</tr>		
</table>
<table class="ldense">
	<tr><td class="align-right">Color</td>
		<td><?= $vehicle->color ?></td>
		<td class="align-right" style="font-size: 60%;">Staff Initials</td>
		<td><?= $vehicle->initials?></td>
		<td class="align-right">VIN</td>
		<td><?= $vehicle->vin?></td>
		</tr>
</table>
<table class="ldense">
	<tr><td class="align-right">Style</td>
		<td><?= $bdyst ?></td>
		<td class="align-right">Doors</td>
		<td><?= $vehicle->doors?></td>
		<td class="align-right" style="font-size: 60%;">Fuel Type</td>
		<td><?= $futyp?></td>
		</tr>
</table>
<table class="ldense">
	<tr><td class="align-right">Trans</td>
		<td><?= $tmxns ?></td>
		<td class="align-right">Cylinders</td>
		<td><?= $vehicle->numcyls?></td>
		<td class="align-right">Mileage</td>
		<td><?= $vehicle->mileage?></td>
		</tr>	
</table>
<table class="ldense">
	<tr><td class="align-right">Drive Wheels</td>
		<td><?= $drvtr ?></td>
</table>
<table class="ldense">
	<tr><td class="align-right">Appraisal Needed?</td>
		<td><?= $drvtr ?></td>
</table>
		</div>
		<div style="font-size: 80%; width: 100%; clear: both; margin: 2px 0px 1px 0px; position: relative;" class="columns">
				<div class="column is-one-fifth" style="border: 2px solid #666; padding: 3px 2px; margin: 2px 4px 0px 0px;">
					<strong style="font-size: 80%;">Valid Title?</strong> <?=$vehicle->titletype ?>
				</div>
				<div class="column" style="border: 2px solid #666; padding: 3px 5px; margin-top: 2px;">
					<table class="ldense">
						<tr><td class="align-right">Vehicle Insured?</td>
							<td>&nbsp;</td>
							<td class="align-right">Registered?</td>
							<td><?=$vehicle->isregistered ?></td>
							<td class="align-right">Insp.Now?</td>
							<td><?=$vehicle->isinspected ?></td>
							</tr>
					</table>
				</div>

		</div>
		<div style="width: 100%; border: 2px solid #666; padding: 3px 5px; margin-top: 2px;">
<table class="ldense">
	<tr><td class="align-right">Is Vehicle Currently Being Driven?</td>
		<td style="border: 1px solid #888; width: 30px;"><?= $vehicle->isdriven ?></td></tr>
</table>
<table class="ldense" style="margin-top: 3px;">
	<tr><td class="align-right" style="font-size: 70%;">If&nbsp;no,&nbsp;how&nbsp;long?</td>
		<td style="border: 1px solid #888; width: 30%;"><?= $vehicle->howlongnotdriven ?></td>
		<td class="align-right" style="font-size: 70%;">Is car driveable?</td>
		<td style="border: 1px solid #888; width: 30px;"><?= $vehicle->driveable ?></td></tr>
</table>
<table class="ldense" style="margin-top: 3px;">
	<tr><td class="align-right" style="font-size: 70%;">Why not?</td>
	<td style="border: 1px solid #888; width: 80%;"><?= $vehicle->whynotdriven ?></td></tr>
</table>
		</div>
	</div>
	<div class="column is-half" style="font-size: 90%; padding-top: 4px;">
Body Condition
<div style="width: 100%; height: 65px; border: 2px solid #666;">
	<?=$vehicle->bodycondition?>
</div>
Repair Needs/Recent Repairs
<div style="width: 100%; height: 65px; border: 2px solid #666;">
	<?=$vehicle->repairneeds?>
</div>
<div style="display: block;">
	<input type="checkbox" name="chkpickup" id="chkpickup" class="bigger" value="1" <?= ($vehicle->chkpickup == '1')? 'checked':'' ?> />
	Pickup Necessary? Directions
	<div style="width: 100%; height: 75px; border: 2px solid #666; position: relative;">
	<?=$vehicle->pickupdirections?>
		<div style="width: 100%; position: absolute; bottom: 0px; font-size: 75%; display: block;">
			<div style="float: left; display: block; width: 50%;">
			Do you have AAAPlus? 
				<div style="display: inline-block; border: 1px solid #888; height: 17px; width: 30px; padding: 1px 3px;"><?=$vehicle->have_aaa?></div>
			</div>
			<div style="float: right; display: block; width: 50%;">
			Towing Contribution
				<div style="display: inline-block; border: 1px solid #888; height: 17px; width: 30px; padding: 1px 3px;"><?=$vehicle->towing_contrib?></div>
			</div>
		</div>
	</div>
</div>
General Comments
<div style="width: 100%; height: 60px; border: 2px solid #666;">
	<?=$vehicle->generalcomments ?>
</div>
<div style="width: 100%; height: 80px; border: 2px solid #666; margin-top: 4px; font-size: 90%;">
	How did you hear about the GNG?
	<div><?= $refer ?></div>
	Detail: <?= $refer ?>
</div>
	</div>