	<style>
		.bgBrown{
			background-color: brown;
		}
		.bgYellow{
			background-color: yellow;
		}
	</style>
	<!-- Button to trigger modal -->
	<a href="#myModal" role="button" class="btn" data-toggle="modal" id="Launch">Launch demo modal</a>
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header ">
			<!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
			<h3 id="myModalLabel">Create Check Voucher</h3>
		</div>
		<div class="modal-body">
			<h5 class="modal-section-header" >Check Voucher Details</h5>
			<div class="row-fluid">
				<label>CV No</label>
				<input class="span2 " type="text" placeholder="Auto Generated">
				
				<label style="width: 60px;">AP No</label>
				<input class="span2 " type="text">
				
				<label style="width: 57px;">Inv No</label>
				<input class="span2" type="text">
				
				<label style="width: 47px;">Date</label>
				<input class="span2" type="text">
			</div>
			<div class="row-fluid">
				<label>Payee</label>
				<input class="span7 w60" type="text" >
			</div>
			<div class="row-fluid">
			
				<label  >Amount</label>
				<input class="span2" type="text">
				<input class="span5 w45" type="text" placeholder="Amount in words">
			</div>
			<div class="row-fluid">
				<label class="">Expense Item</label>
				<select class="span7 w60">
					<option>Select</option>
				</select>
				
			</div>
			<div class="row-fluid">
				<label class="">Department</label>
				<select class="span3">
					<option>Select</option>
				</select>
				<label style="width: 49px;">Name</label>
				<select class="span3 w30">
					<option>Select</option>
				</select>
			</div>
			<div class="row-fluid">
				<label class="">Explanation</label>
				<input class="span6 w60" type="text">
			</div>
			<table class="table table-bordered table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th colspan="4" class="label label-info" style="text-align:center;">JOURNAL ENTRY</th>
					</tr>
					<tr>
						<th class="w20">Account Number</th>
						<th class="w50">Description</th>
						<th class="w15">Debit</th>
						<th class="w15">Credit</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true" id="close">Close</button>
			<button class="btn btn-primary">Save changes</button>
		</div>
	</div>