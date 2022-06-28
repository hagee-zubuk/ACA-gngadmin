		<section class="tabContent" data-content="6" id="tabDocu">
			<div style="height: 20rem;">
				<h1>Documentation</h1>
					<br /><br />
					<button class="button docubutton is-link is-light" id="btnDonor" data-link="<?= base_url('Form/donor/'. $guid)?>">Donor Form</button>
					<button class="button docubutton is-link is-light" id="btnNHMACT" data-link="<?= base_url('Form/state/'. $guid)?>">NH MA CT Form</button>
					<button class="button docubutton is-link is-light" id="btnChekin" data-link="<?= base_url('Form/tow/'. $guid)?>">Tow Order/Check-In Form</button>
			</div>
		</section>
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
$(document).ready(function() {
	$('button.docubutton').click(function(ev){
		ev.preventDefault();
		var link = $(this).data('link');
		if(link.length > 6) {
			console.log('going to ' + link);
			window.open(link
					, 'document'
					, 'channelmode=0,directories=0,fullscreen=0,height=600,location=0,menubar=0,resizable=1,scrollbars=1,status=0,titlebar=1,toolbar=0,width=800'
					, false
				);			
		}
	});	
});
</script>