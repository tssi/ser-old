<?php echo $this->Html->css(array('ss/test'));?>
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span2">
				<div class="module">
					<div class="module-wrap">
						<div class="module-name rawScores">
								<?php echo $this->Html->link( 'Grade Entry',
										'javascript:void()'
									);  ?>								
						</div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row-fluid">
					<div class="span5">
						<div class="btn-group">
							<button class="btn btn-medium">SCHOOL YEAR</button>
							<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<div>
										<span>SY:</span>
										<select name="data[SY]" id="SY"  class="w80">
											<option value="">select</option>
											<option value="0">2012-2014</option>
											<option value="1">2013-2014</option>
										</select>
									</div>
								</li>
								<li>
									<div >
										<span>QTR:</span>
										<div class="btn-group" id="QTR">
											<button class="btn">1</button>
											<button class="btn">2</button>
											<button class="btn">3</button>
											<button class="btn">4</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="span4">						
						<div class="btn-group">
										<button class="btn btn-medium">SUBJECT</button>
										<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
							<ul class="dropdown-menu">
								<li>
									<!-- DROPDOWN -->
									<li><a href="#"> English</a></li>								
									<li><a href="#"> Math</a></li>	
									<li class="divider"></li>
									<li><a href="#"><i class="icon-plus"></i> Subject</a></li>
								</li>
								
							</ul>
						</div>
					</div>
						<div class="span3">
							<div class="btn-group">
								<button class="btn btn-medium">SECTION</button>
								<button class="btn btn-medium dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li>
										<!-- DROPDOWN -->	
										<li><a href="#" class='btn'><i class="icon-plus"></i> SECTION</a></li>
										<li><a>No section(s) find. Click to Add</a></li>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
							<div class="pull-right text-right">
				<div class="nav-collapse collapse navbar-responsive-collapse">
						<a href="#" class=" btn dropdown-toggle" data-toggle="dropdown"><i class='icon-cog'></i> <b class="caret"></b></a>
						<ul class="dropdown-menu pull-left text-left">
								<li>
									<div>
										<span>SY:</span>
										<select name="data[SY]" id="SY"  class="w80">
											<option value="">select</option>
											<option value="0">2012-2014</option>
											<option value="1">2013-2014</option>
										</select>
									</div>
								</li>
								<li>
									<div >
										<span>QTR:</span>
										<div class="btn-group" id="QTR">
											<button class="btn">1</button>
											<button class="btn">2</button>
											<button class="btn">3</button>
											<button class="btn">4</button>
										</div>
									</div>
								</li>
							</ul>
						</li>
					
				</div>
			</div>
			<div class="pull-right text-right">
				<div class="nav-collapse collapse navbar-responsive-collapse">
						<a href="#" class=" btn dropdown-toggle" data-toggle="dropdown"><i class='icon-eye-open'></i> <b class="caret"></b></a>
						<ul class="dropdown-menu pull-left text-left">
								<li><a href="#"><input type='checkbox'>Raw Score</a></input></li>
								<li><a href="#"><input type='checkbox'>Quivalent</a></input></li>
								<li><a href="#"><input type='checkbox'>Summary</a></input></li>
						</ul>
						</li>
					
				</div>
			</div>

		</div>
	</div>
</div>



<div class="sub-content-container">
	<div class="w90 center">
		<div class="row-fluid">
			<div class="w90 center">
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="RawScoreTable" model="RawScore">
			<thead>
				<tr>
																								<th class="w10 text-center"><a >Name</a></th>
														<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td><span data-field='RawScore.name'></span></td>
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
															 
							  <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
							</ul>
						</div>
					</div>
						</td>
	</tr>
			</tbody>
			</table>
			
						</div>
		</div>

	</div>
</div>
<?php echo $this->Form->create('RawScore',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'rawScores', 'canvas'=>'#RawScoreCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Raw Score</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="rawScores form span12">

		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('name',array('placeholder'=>'Name','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
</div>
</div>
	
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary intent-save" type="submit">Save</button>
    <button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
  </div>
  
</div>
<?php echo $this->Form->end();?>
<!-- CANVASFORM -->
<?php echo $this->Form->create('RawScore',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'RawScoreCanvasForm',
															'model'=> 'RawScore',
															'canvas'=>'#RawScoreTable'
														)
											);?>
<?php echo $this->Form->end();?>


<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>