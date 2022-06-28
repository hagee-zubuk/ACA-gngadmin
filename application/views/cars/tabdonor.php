		<section class="tabContent is-active" data-content="1" id="tabDonor">
			<div class="columns">
				<div class="column">
<table class="dense">
	<tr><td>Sal</td>
		<td><select id="salutation" name="salutation">
				<option></option>
<?=$sal1?>
			</select>
		</td>
		</tr>
	<tr><td>First</td>
		<td><input type="text" id="first" name="first" value="<?=$vehicle->first?>" /></td>
	</tr>
	<tr><td>Middle</td>
		<td><input type="text" id="middle" name="middle" value="<?=$vehicle->middle?>" /></td>
	</tr>
	<tr><td>Last</td>
		<td><input type="text" id="last" name="last" value="<?=$vehicle->last?>" /></td>
	</tr>
	<tr><td>Donor SS#</td>
		<td><input type="text" id="ssn" name="ssn" value="<?=$vehicle->ssn ?>" /></td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td>P Sal</td>
		<td><select id="psalutation" name="psalutation">
				<option></option>
<?=$sal2?>
			</select>
		</td>
	</tr>
	<tr><td>P First</td>
		<td><input type="text" id="pfirst" name="pfirst" value="<?=$vehicle->pfirst?>" /></td>
	</tr>
	<tr><td>P Middle</td>
		<td><input type="text" id="pmiddle" name="pmiddle" value="<?=$vehicle->pmiddle?>" /></td>
	</tr>
	<tr><td>P Last</td>
		<td><input type="text" id="plast" name="plast" value="<?=$vehicle->plast?>" /></td>
	</tr>
	<tr><td>Partner SS#</td>
		<td><input type="text" id="pssn" name="pssn" value="<?=$vehicle->pssn?>" /></td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td>Home Phone</td>
		<td><input type="tel" id="homephone" name="homephone" value="<?=$vehicle->homephone?>" /></td>
	</tr>
	<tr><td>Work Phone</td>
		<td><input type="tel" id="workphone" name="workphone" value="<?=$vehicle->workphone?>" /></td>
	</tr>
	<tr><td>Extension</td>
		<td><input type="tel" id="workext" name="workext" value="<?=$vehicle->workext?>" /></td>
	</tr>
	<tr><td>Cell Phone</td>
		<td><input type="tel" id="cellphone" name="cellphone" value="<?=$vehicle->cellphone?>" /></td>
	</tr>
</table>
				</div>
				<div class="column" style="padding-top: 50px;">
<table class="dense">
	<tr><td>Street</td>
		<td><input type="text" id="street" name="street" value="<?=$vehicle->street?>" /></td>
	</tr>
	<tr><td>Town/City</td>
		<td><input type="text" id="city" name="city" value="<?=$vehicle->city?>" /></td>
	</tr>
	<tr><td>State</td>
		<td><select id="state" name="state" style="width: 180px;" value="<?=$vehicle->state?>" >
<?=$state?>
</select>
			ZIP
			<input type="text" id="zip" name="zip" style="width: 120px;" maxwidth="10" value="<?=$vehicle->zip?>" />
		</td>
	</tr>
</table>
<table class="dense">
	<tr><td>How did you hear?</td>
		<td><select id="howheard" name="howheard">
				<option></option>
<?=$rfr?>
			</select>
		</td>
	</tr>
	<tr><td><div id="lblHDYH">HDYH detail</div></td>
		<td><select id="hhdetail" name="hhdetail" disabled="disabled">
				<option>(select a referrer above)</option>
			</select>
		</td>
	</tr>
	<tr><td>Organization</td>
		<td><input type="text" id="organization" name="organization" value="<?=$vehicle->organization?>" /></td>
	</tr>	
	<tr><td>Contact Person First</td>
		<td><input type="text" id="cpfirst" name="cpfirst" value="<?=$vehicle->cpfirst?>" /></td>
	</tr>
	<tr><td>Contact Person Last</td>
		<td><input type="text" id="cplast" name="cplast" value="<?=$vehicle->cplast?>" /></td>
	</tr>
</table>
<table class="dense">
	<tr><td><input type="checkbox" name="chknewsletter" id="chknewsletter" class="bigger" value="1" /></td>
		<td>Would you like to receive our e-Newsletter?</td>
	</tr>
	<tr><td></td>
		<td>e-Mail: <input type="email" id="nlemail" name="nlemail" style="width: 80%;" value="<?=$vehicle->nlemail?>" /></td>
	</tr>
	<tr><td><input type="checkbox" name="chkremove" id="chkremove"  class="bigger" value="1" /></td>
		<td>Remove from mailing list</td>
	<tr><td><input type="checkbox" name="chkvip" id="chkvip"  class="bigger" value="1" /></td>
		<td>VIP. (specify reason below)</td>		
	<tr><td></td>
		<td><input type="text" id="vipreason" name="vipreason" value="<?=$vehicle->vipreason?>" /></td>
	</tr>
	<tr><td><input type="checkbox" name="chknameinclude" id="chknameinclude" class="bigger" value="1" /></td>
		<td>Include name in publications</td>
</table>
				</div>
			</div>
		</section>