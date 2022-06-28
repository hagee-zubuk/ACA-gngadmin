		<section class="tabContent" data-content="2" id="tabVehicle">
			<div class="columns">
				<div class="column">
<table class="dense">
	<tr><td>VIN</td>
		<td><input type="text" id="vin" name="vin" maxlength="17" value="<?=$vehicle->vin?>" /></td>
	</tr>
	<tr><td>Transmission Type</td>
		<td><select id="transmission" name="transmission">
				<option></option>
<?= $tmxns ?>
			</select>
		</td>
	</tr>
	<tr><td>Mileage at Receipt</td>
		<td><input type="text" id="mileage" name="mileage" value="<?=$vehicle->mileage?>" /></td>
	</tr>
	<tr><td>Number of Cylinders</td>
		<td><select id="numcyls" name="numcyls">
				<option></option>
<?= $numcyls ?>				
			</select>
		</td>
	</tr>
	<tr><td>Drive Train</td>
		<td><select id="drivetrain" name="drivetrain">
				<option></option>
<?= $drive_trains ?>				
			</select>
		</td>
	</tr>
	<tr><td>Body Style</td>
		<td><select id="bodystyle" name="bodystyle">
				<option></option>
<?= $bodystyles ?>				
			</select>
		</td>
	</tr>
	<tr><td>Doors</td>
		<td><input type="number" id="doors" name="doors" maxlength="1" style="width: 40px;" value="<?=$vehicle->doors?>" /></td>
	</tr>
	<tr><td>Color</td>
		<td><input type="text" id="color" name="color" value="<?=$vehicle->color?>" /></td>
	</tr>
	<tr><td>Fuel Type</td>
		<td><select id="fueltype" name="fueltype">
				<option></option>
<?= $fuels ?>
			</select>
		</td>
	</tr>
	<tr><td>Valid/Rebuilt Title</td>
		<td><select id="titletype" name="titletype">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>	
</table>
<br /><br />
<p style="text-align: center;">Is vehicle currently:</p>
<table class="dense">
	<tr><td>
		<input type="checkbox" name="chklienreleased" id="chklienreleased" class="bigger" value="1" />
		</td><td>Lien Released?</td></tr>
	<tr><td>Registered?</td>
		<td><select id="isregistered" name="isregistered">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
	<tr><td>Inspected?</td>
		<td><select id="isinspected" name="isinspected">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
</table>
				</div>
				<div class="column">
<table class="dense">
	<tr><td>Car Currently Driven?</td>
		<td><select id="isdriven" name="isdriven">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
	<tr><td>If no, How Long?</td>
		<td><input type="text" id="howlongnotdriven" name="howlongnotdriven" value="<?=$vehicle->howlongnotdriven?>" /></td>
	</tr>
	<tr><td>Why not?</td>
		<td><input type="text" id="whynotdriven" name="whynotdriven" value="<?=$vehicle->whynotdriven ?>" /></td>
	</tr>
	<tr><td>Is Car Driveable?</td>
		<td><select id="driveable" name="driveable">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
</table>
<p>&nbsp;</p>
<table class="dense">
	<tr><td><input type="checkbox" name="chkpickup" id="chkpickup" class="bigger" value="1" /></td>
		<td>Pickup Necessary?</td></tr>
	<tr><td>&nbsp;</td><td>Pickup directions:<br />
		<textarea style="width: 100%;" id="pickupdirections" name="pickupdirections"><?=$vehicle->pickupdirections?></textarea>
		</td></tr>
</table>
<p>&nbsp;</p>
<table class="dense">
	<tr><td>Have AAA+?</td>
		<td><select id="have_aaa" name="have_aaa">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
	<tr><td>Towing Contribution?</td>
		<td><select id="towing_contrib" name="towing_contrib">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
	<tr><td>If tow &mdash; Tires Driveable?</td>
		<td><select id="tires_driveable" name="tires_driveable">
				<option></option>
				<option value="Y">Y</option>
				<option value="N">N</option>
			</select>
		</td>
	</tr>
</table>

				</div>
			</div>
		</section>
