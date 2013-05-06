
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name gradeComponents">
									 <?php echo $this->Html->link( 'Grade Components',
															'javascript:void()'
														);  ?>								
							</div>
						</div>
					</div>
					<div class="span3 upAccount">
					 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-chevron-left')).
													$this->Html->tag('span', 'BACK', array('class' => 'action-label')),
													'/pages/apps',array('escape' => false,'class'=>'btn btn-medium tree-back btn-block animate' ,'id'=>'intent-back')
													); ?> 					
					</div>
					<div class="span3">
					 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).
														$this->Html->tag('span', 'CREATE', array('class' => 'action-label')),
														array('action' => 'add'), array('escape' => false,'class'=>'btn btn-medium btn-primary btn-block animate' ,'id'=>'intent-create')
													);  ?>					</div>
					
				</div>
			</div>
			<div class="span3 pull-right">
				 <div id="simple-root"></div> 
			</div>
		</div>
	</div>
 </div>
<div class="sub-content-container">
	<div class="w90 center">
		<div class="row-fluid">
			<div class="w90 center">
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="GradeComponentTable" model="GradeComponent">
			<thead>
				<tr>
																								<th class="w10 text-center"><a >Recordbook Id</a></th>
																				<th class="w10 text-center"><a >General Component Id</a></th>
																				<th class="w10 text-center"><a >Order Index</a></th>
																				<th class="w10 text-center"><a >Under</a></th>
																				<th class="w10 text-center"><a >Percentage</a></th>
																				<th class="w10 text-center"><a >Ceil</a></th>
																				<th class="w10 text-center"><a >Floor</a></th>
																				<th class="w10 text-center"><a >Rule</a></th>
														<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td>
			<span data-field='Recordbook.id'></span></td>
		<td>
			<span data-field='GeneralComponent.id'></span></td>
		<td><span data-field='GradeComponent.order_index'></span></td>
		<td><span data-field='GradeComponent.under'></span></td>
		<td><span data-field='GradeComponent.percentage'></span></td>
		<td><span data-field='GradeComponent.ceil'></span></td>
		<td><span data-field='GradeComponent.floor'></span></td>
		<td><span data-field='GradeComponent.rule'></span></td>
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
									
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-recordbooks"><i class="icon-eye-open"></i> Recordbooks</a></li>
											
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-general_components"><i class="icon-eye-open"></i> General Components</a></li>
																	 
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
<?php echo $this->Form->create('GradeComponent',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'gradeComponents', 'canvas'=>'#GradeComponentCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Grade Component</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="gradeComponents form span12">

		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('recordbook_id',array('placeholder'=>'Recordbook Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('general_component_id',array('placeholder'=>'General Component Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('under',array('placeholder'=>'Under','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('percentage',array('placeholder'=>'Percentage','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('ceil',array('placeholder'=>'Ceil','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('floor',array('placeholder'=>'Floor','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('rule',array('placeholder'=>'Rule','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
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
<?php echo $this->Form->create('GradeComponent',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'GradeComponentCanvasForm',
															'model'=> 'GradeComponent',
															'canvas'=>'#GradeComponentTable'
														)
											);?>
<?php echo $this->Form->end();?>


<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>