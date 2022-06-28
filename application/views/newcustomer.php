<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cbval($var) {
	if($var == NULL) {
		return(' ');
	}
	$zv = intval($var);
	if ($zv >= 1) {
		return(' ckecked ');
	}
}

if (! isset($next)) die('No form information found');
if (! isset($guid)) die('No record information found');

$attr = array('id' => 'frmAAA');
echo form_open($next, $attr);
?>
<input type="hidden" name="guid" id="guid" value="<?=$guid?>" />
<div class="container">
	<h1 class="subtitle">New Customer</h1>
<div class="columns">
	<div class="column">
<table class="dense">
	<tr><td>First Name</td><td><input type="text" id="firstname" name="firstname" value="<?= $firstname?>" /></td></tr>
	<tr><td>Last Name</td><td><input type="text" id="lastname" name="lastname" value="<?= $lastname?>" /></td></tr>
	<tr><td>Address</td><td><input type="text" id="address" name="address" value="<?= $address?>" /></td></tr>
	<tr><td>City/Town</td><td><input type="text" id="city" name="city" value="<?= $city?>" /></td></tr>
	<tr><td>State</td><td><select id="state" name="state" style="width: 50px; ">
  <option value="">. .</option>				
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
</select>
		ZIP <input type="text" id="zip" name="zip" maxlength="10" style="width: 180px;" value="<?= $zip?>" />
		</td></tr>
</table>
	</div>
	<div class="column is-2" style="text-align: center;">
		<button id="btnSave" class="button is-primary">Save</button>

<table class="dense has-background-grey-lighter" style="width: 100%; border: 1px dotted #ebebeb; border-radius: 4px; padding: 6px; margin-top: 10px;">
	<tr><td><input class="bigger" type="checkbox" id="chk_ineligible" name="chk_ineligible" value="1"/></td>
		<td>Ineligible</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_inactive" name="chk_inactive" value="1"/></td>
		<td>Inactive</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_closed" name="chk_closed" value="1"/></td>
		<td>Closed</td>
		</tr>
</table>
	</div>
	<div class="column is-3"><br />

<table class="dense" style="border: 1px dotted #bababa; border-radius: 4px; padding: 6px;">
	<tr><td style="width: 120px;"><input class="bigger" type="checkbox" id="chk_path" name="chk_path" value="1"/></td>
		<td>PATH</td>
		</tr>
	<tr><td>
					<select id="path_district" name="path_district">
						<option></option>
<?= $pathd ?>
					</select>
		</td>
		<td>PATH District</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_vr" name="chk_vr" value="1"/></td>
		<td>VR</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_jumpstart" name="chk_jumpstart" value="1"/></td>
		<td>JumpStart</td>
		</tr>
</table>
	</div>
</div>
	<div id="tabs" class="tabs is-boxed">
		<ul>
			<li data-tab="1" class="is-active"><a>Demographics</a></li>
			<li data-tab="2" ><a>Requirements</a></li>
			<li data-tab="3" ><a>Income Sources</a></li>
		</ul>
	</div>
	<div id="tab-contents">
		<section class="tabContent is-active" data-content="1" id="tabDemog">
<div class="columns">
	<div class="column">
<table class="dense">
	<tr><td>Birthdate</td><td><input type="date" id="dob" id="dob" plaecholder="mm/dd/yyyy" /></td></tr>
	<tr><td>Age Now</td><td><input type="number" id="agenow" readonly /></td></tr>
	<tr><td>Social Security #</td><td><input type="text" id="ssn" id="ssn" /></td></tr>
	<tr><td>Gender</td><td>
					<select id="marstatus" name="marstatus">
						<option></option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
	</td></tr>
	<tr><td>Marital Status</td><td>
					<select id="marstatus" name="marstatus">
						<option></option>
<?= $marsta ?>
					</select>
	</td></tr>

	<tr><td>Number of Adults</td><td><input type="number" id="numadults" id="numadults" /></td></tr>
	<tr><td>Number of Children</td><td><input type="number" id="numchildren" id="numchildren" /></td></tr>
	<tr><td>Family Size</td><td><input type="number" id="fam_size" readonly /></td></tr>
	<tr><td>Valid Driver's License?</td><td>
					<select id="validlicense" name="validlicense">
						<option></option>
						<option value="Y">Yes</option>
						<option value="N">No</option>
					</select>
	</td></tr>

	<tr><td>Day Phone</td><td><input type="tel" id="dayphone" id="dayphone" /></td></tr>
	<tr><td>Evening Phone</td><td><input type="tel" id="eveningphone" id="eveningphone" /></td></tr>
</table>
	</div>
	<div class="column">
<table class="dense">
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_veteran" name="chk_dem_veteran" value="1"/></td>
		<td>Veteran</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_femhead" name="chk_dem_femhead" value="1"/></td>
		<td>Female Head of Household</td>
		</tr>		
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_disabled" name="chk_dem_disabled" value="1"/></td>
		<td>Handicapped/Disabled</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_minority" name="chk_dem_minority" value="1"/></td>
		<td>Minority</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_white" name="chk_dem_white" value="1"/></td>
		<td>White</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_black" name="chk_dem_black" value="1"/></td>
		<td>Black/African American</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_asian" name="chk_dem_asian" value="1"/></td>
		<td>Asian</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_hisp" name="chk_dem_hisp" value="1"/></td>
		<td>Hispanic</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_hpacs" name="chk_dem_hpacs" value="1"/></td>
		<td>Native Hawaiian/Other Pacific Islander</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_amind" name="chk_dem_amind" value="1"/></td>
		<td>American Indian/Alaskan Native</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_asian_white" name="chk_dem_asian_white" value="1"/></td>
		<td>Asian + White</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_black_white" name="chk_dem_black_white" value="1"/></td>
		<td>Black/African American + White</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_amind_white" name="chk_dem_amind_white" value="1"/></td>
		<td>American Indian/Alaskan Native + White</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_amind_black" name="chk_dem_amind_black" value="1"/></td>
		<td>American Indian/Alaskan Native + Black African American</td>
		</tr>
	<tr><td><input class="bigger" type="checkbox" id="chk_dem_multirac" name="chk_dem_multirac" value="1"/></td>
		<td>Other Multiracial</td>
		</tr>
</table>		
	</div>
	<div class="column">
		<h1>Priorities</h1>
<table class="dense">
	<tr><th>Rank</th><th colspan="2">&nbsp;</th></tr>
	<tr><td><input type="number" id="pri_emp_training" name="pri_emp_training" /></td>
		<td><input class="bigger" type="checkbox" id="prc_emp_training" name="prc_emp_training" value="1" /></td>
		<td>Employment/Training</td></tr>
	<tr><td><input type="number" id="pri_dependents" name="pri_dependents" /></td>
		<td><input class="bigger" type="checkbox" id="prc_dependents" name="prc_dependents" value="1" /></td>
		<td>Dependents</td></tr>
	<tr><td><input type="number" id="pri_medical" name="pri_medical" /></td>
		<td><input class="bigger" type="checkbox" id="prc_medical" name="prc_medical" value="1" /></td>
		<td>Medical</td></tr>
	<tr><td><input type="number" id="pri_other" name="pri_other" /></td>
		<td><input class="bigger" type="checkbox" id="prc_other" name="prc_other" value="1" /></td>
		<td>Other</td></tr>
	<tr><td><input type="number" id="pri_other" name="pri_other" /></td>
		<td colspan="2">Ap age, <input type="number" id="pri_ap_mos" name="pri_ap_mos" placeholder="months"/></td>
		</td></tr>
	<tr><td><input type="number" id="pri_avg" readonly /></td></tr>
</table>		
	</div>

</div>
		</section>
		<section class="tabContent" data-content="2" id="tabReqts">
<div class="columns">
	<div class="column">
		<table class="dense">
			<tr><td>Maximum Budget</td>
				<td><input type="text" id="maxbudget" name="maxbudget" />
				</td></tr>
			<tr><td>Required Transmission</td>
				<td>
					<select id="reqxmissn" name="reqxmissn">
						<option></option>
<?= $tmxns ?>
					</select>
				</td></tr>
			<tr><td>Required Body Style</td>
				<td>
					<select id="reqbodystyle" name="reqbodystyle">
						<option></option>
<?= $bodystyles ?>
					</select>
				</td></tr>
		</table>		
	</div>
	<div class="column">
		<h1>Eligible for Agency Money?</h1>
		<table class="dense">
			<tr><td><input class="bigger" type="checkbox" id="chkSelf" name="chkSelf" value="1" /></td>
				<td>Self</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkReachup" name="chkReachup" value="1" /></td>
				<td>Reach-up</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkDET" name="chkDET" value="1" /></td>
				<td>DET</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkVocRehab" name="chkVocRehab" value="1" /></td>
				<td>Voc Rehab</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkCreditUnion" name="chkCreditUnion" value="1" /></td>
				<td>Credit Union</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkPathgrant" name="chkPathgrant" value="1" /></td>
				<td>PATH Grant</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkNcic" name="chkNcic" value="1" /></td>
				<td>NCIC</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkAgyOther" name="chkAgyOther" value="1" /></td>
				<td>Other</td>
			</tr>
		</table>
	</div>			
</div>
		</section>
		<section class="tabContent" data-content="3" id="tabIncome">
<div class="columns">
	<div class="column">
		<h1>Income sources</h1>
		<table class="dense">
			<tr><td><input class="bigger" type="checkbox" id="chkEmployed" name="chkEmployed" value="1" /></td>
				<td>Employed</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkTANF" name="chkTANF" value="1" /></td>
				<td>TANF/ANFC</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkUnemployment" name="chkUnemployment" value="1" /></td>
				<td>Unemployment Insurance</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkChildSupport" name="chkChildSupport" value="1" /></td>
				<td>Child Support</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkVAPension" name="chkVAPension" value="1" /></td>
				<td>VA Pension</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkSocialSecurity" name="chkSocialSecurity" value="1" /></td>
				<td>Social Security/SS Disability</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkOther" name="chkOther" value="1" /></td>
				<td>Other</td>
			</tr>
		</table>
		<table class="dense">
			<tr><td>Gross Monthly Income</td>
				<td><input type="text" id="grossincome" name="grossincome" />
				</td></tr>
		</table>
	</div>
	<div class="column">
		<h1>Employment</h1>
		<table class="dense">
			<tr><td><input class="bigger" type="checkbox" id="chkFulltime" name="chkFulltime" value="1" /></td>
				<td>Full Time</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkParttime" name="chkParttime" value="1" /></td>
				<td>Part Time</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkUnemployed" name="chkUnemployed" value="1" /></td>
				<td>Unemployed</td>
			</tr>
			<tr><td><input class="bigger" type="checkbox" id="chkTraining" name="chkTraining" value="1" /></td>
				<td>Training</td>
			</tr>
		</table>
		<table class="dense">
			<tr><td>Number of hours per week</td>
				<td><input type="text" id="numhours" name="numhours" />
				</td></tr>
		</table>
	</div>
</div>			
		</section>
	</div>
</div>
<?= form_close() ?>
<script>
$(document).ready(function() {
	$('#tabs li').on('click', function() {
		var tab = $(this).data('tab');
		console.log("clicked: " + tab);
		$('#tabs li').removeClass('is-active');
		$(this).addClass('is-active');

		$('#tab-contents section').removeClass('is-active');
		$('section[data-content="' + tab + '"]').addClass('is-active');
	});
});
</script>