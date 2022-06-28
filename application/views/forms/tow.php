<div class="columns">
	<div class="column is-half" style="padding-top: 4px;">

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
</table>
<table class="ldense">		
	<tr><td>
		Cell: <?=$vehicle->cellphone?> </td>
		<td>
		E-Mail: <?=$vehicle->nlemail?> </td>
		</tr>
</table>
		</div>
		<div style="width: 100%; border: 2px solid #666; padding: 3px 5px; margin-top: 2px;">
<table class="ldense">
	<tr><td style="text-align: center; font-size: 70%; width: 20% !important;">Year</td>
		<td style="text-align: center; font-size: 70%; width: 35% !important;">Make</td>
		<td style="text-align: center; font-size: 70%; width: 45% !important;">Model</td>
		</tr>
	<tr><td><div style="text-align: center; font-size: 120%; border: 2px inset #777;"><?= $vehicle->year?></div></td>
		<td><div style="text-align: center; font-size: 120%; border: 2px inset #777;"><?= $vehicle->make_text ?></div></td>
		<td><div style="text-align: center; font-size: 120%; border: 2px inset #777;"><?= $vehicle->model ?></div></td>
		</tr>		
</table>
<table class="ldense">
	<tr><td class="align-right">VIN</td>
		<td><div style="width: 100%; text-align: center; font-size: 120%; border: 2px inset #777;"><?= $vehicle->vin?></div></td>
		</tr>
</table>
<table class="ldense">
	<tr><td class="align-right">Mileage</td>
		<td><div class="boxit"><?= $vehicle->mileage?></div></td>
		<td class="align-right">Style</td>
		<td><div class="boxit"><?= $bdyst ?></div></td>
		<td class="align-right">Doors</td>
		<td><div class="boxit"><?= $vehicle->doors?></div></td></tr>
</table>
<table class="ldense">		
	<tr><td class="align-right">Trans</td>
		<td><div class="boxit"><?= $tmxns ?></div></td>
		<td class="align-right">Drive Wheels</td>
		<td><div class="boxit"><?= $drvtr ?></div></td>
		</tr>
	<tr><td class="align-right">Cylinders</td>
		<td><div class="boxit"><?= $vehicle->numcyls?></div></td>
		<td class="align-right">Color</td>
		<td><div class="boxit"><?= $vehicle->color ?></div></td>
		</tr>
</table>
		</div>
		<div style="width: 100%; border: 2px solid #666; padding: 3px 5px; margin-top: 2px;">
<table class="ldense">
	<tr><td class="align-right">Retail</td>
		<td><div class="boxit"><?= $vehicle->retail_value ?></div></td>
		<td class="align-right">Trade-in</td>
		<td><div class="boxit"><?= $vehicle->tradein_value ?></div></td>
		<td class="align-right">Appraisal?</td>
		<td><div class="boxit">&nbsp;&nbsp;</div></td>		
		</tr>
	<tr><td colspan="5">
		Pickup Necessary?
		<input type="checkbox" name="chkpickup" id="chkpickup" class="bigger" value="1" <?= ($vehicle->chkpickup == '1')? 'checked':'' ?> />
		</td></tr>
	<tr><td colspan="6" style="height: 40px;">
		<?=$vehicle->pickupdirections?>	
		</td></tr>
</table>
		<div class="boxit"><h1>Please Check All:</h1></div>
			<table class="ldense">
				<tr><td>
					<table class="ldense">
						<tr><td class="align-right" style="height: 20px;">True Mileage </td><td style="border-bottom: 1px solid #777; width: 60%;"></td></tr>
						<tr><td class="align-right" style="height: 20px;">Trim Level</td><td style="border-bottom: 1px solid #777; width: 60%;"></td></tr>
						<tr><td class="align-right" style="height: 20px;">Location</td><td style="border-bottom: 1px solid #777; width: 60%;"></td></tr>
						
					</table>
				</td><td style="width: 40%;">
					<div class="boxit">
						<table class="ldense">
							<tr><td colspan="2">Plates Removed</td></tr>
							<tr><td class="align-right">Returned to Owner</td><td><div class="boxit" style="width: 18px; height: 18px;">&nbsp;</div></td></tr>
							<tr><td class="align-right">Put in GNG box</td><td><div class="boxit" style="width: 18px; height: 18px;">&nbsp;</div></td></tr>
						</table>
					</div>
				</td></tr>
			</table>
			<table class="ldense" style="font-size: 12.8px;">
				<tr><td class="align-right">Date</td><td style="border-bottom: 1px solid #777; width: 20%;"></td>
					<td class="align-right">Hang Tag on Mirror</td><td><div class="boxit" style="width: 16px; height: 16px;">&nbsp;</div></td>
					<td class="align-right">Keys Tagged</td><td><div class="boxit" style="width: 16px; height: 16px;">&nbsp;</div></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="column is-half" style="padding-top: 4px; font-size: 90%;">
Body Condition
<div style="width: 100%; height: 80px; border: 2px solid #666;">
	<?=$vehicle->bodycondition?>
</div>
Repair Needs/Recent Repairs
<div style="width: 100%; height: 80px; border: 2px solid #666;">
	<?=$vehicle->repairneeds?>
</div>
General Comments
<div style="width: 100%; height: 80px; border: 2px solid #666;">
	<?=$vehicle->generalcomments ?>
</div>

	</div>
</div>