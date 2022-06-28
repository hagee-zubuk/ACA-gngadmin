		<section class="tabContent" data-content="5" id="tabDisp">
			<div class="columns">
				<div class="column">
<table class="dense">
	<tr><td>Date Sold/Delivered/Scrapped</td>
		<td><input type="date" id="date_sds" name="date_sds" value="<?=$vehicle->date_sds ?>" /></td>
	</tr>
	<tr><td>Customer</td>
		<td><select id="customer_sds" name="customer_sds">
				<option></option>
			</select>
		</td>
	</tr>
</table>					
				</div>
				<div class="column">
<table class="dense">
	<tr><td>Customer ID</td>
		<td><input type="text" id="sds_custid" /></td>
	</tr>
	<tr><td>First Name</td>
		<td><input type="text" id="sds_first" /></td>
	</tr>
	<tr><td>Last Name</td>
		<td><input type="text" id="sds_last" /></td>
	</tr>
	<tr><td>Purchase Price</td>
		<td><input type="text" id="purch_price" name="purch_price" value="<?=$vehicle->purch_price?>" /></td>
	</tr>
</table>
				</div>
			</div>
			<div id="costsandfunding" class="statuslog" >
<table id="costs" class="dense log">
	<tr><th>Date</th><th>Type</th><th>Vendor</th><th>Amount</th><th>Reason</th><th>Updated</th></tr>
	<tr><td colspan="6"><a class="button is-light">add</a></td></tr>
</table>
<table id="funding" class="dense log">
	<tr><th>Amount</th><th>Source</th><th>Comments</th><th>Updated</th></tr>
	<tr><td colspan="4"><a class="button is-light">add</a></td></tr>
</table>
			</div>
		</section>
