
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name templates">
									 <?php echo $this->Html->link( 'Templates',
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
							<div class="btn-group" id="dept" data-toggle="buttons-radio">
							  <button type="button" class="btn btn-primary">Left</button>
							  <button type="button" class="btn btn-primary">Middle</button>
							  <button type="button" class="btn btn-primary">Right</button>
							</div>
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
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="TemplateTable" model="Template">
			<thead>
				<tr>
																								<th class="w10 text-center"><a >Subject Id</a></th>
																				<th class="w10 text-center"><a >Status</a></th>
																				<th class="w10 text-center"><a >Scope</a></th>
																				<th class="w10 text-center"><a >Limit</a></th>
																				<th class="w10 text-center"><a >Esp</a></th>
																				<th class="w10 text-center"><a >Created By</a></th>
														<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td>
			<span data-field='Subject.id'></span></td>
		<td><span data-field='Template.status'></span></td>
		<td><span data-field='Template.scope'></span></td>
		<td><span data-field='Template.limit'></span></td>
		<td><span data-field='Template.esp'></span></td>
		<td><span data-field='Template.created_by'></span></td>
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
									
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-subjects"><i class="icon-eye-open"></i> Subjects</a></li>
											
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-template_details"><i class="icon-eye-open"></i> Template Details</a></li>
																	 
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
<?php echo $this->Form->create('Template',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'templates', 'canvas'=>'#TemplateCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Template</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="templates form span12">

		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('subject_id',array('placeholder'=>'Subject Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('status',array('placeholder'=>'Status','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('scope',array('placeholder'=>'Scope','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('limit',array('placeholder'=>'Limit','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('esp',array('placeholder'=>'Esp','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('created_by',array('placeholder'=>'Created By','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="TemplateDetailTable" model="TemplateDetail">
				<caption class="caption-bordered">Template Details</caption>
				<thead>
				<tr>
						<th><?php __('Template Id'); ?></th>
		<th><?php __('General Component Id'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Percentage'); ?></th>
		<th><?php __('Under'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
								<td><span data-field='TemplateDetail.template_id'></span></td>
		<td><span data-field='TemplateDetail.general_component_id'></span></td>
		<td><span data-field='TemplateDetail.order_index'></span></td>
		<td><span data-field='TemplateDetail.percentage'></span></td>
		<td><span data-field='TemplateDetail.under'></span></td>
						<td>
						<div class="btn-group">
							<div class="btn-group btn-center">
								<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									  <li><a  href="#template-details-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
									 <li><a  href="#template-details-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
									 <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
								</ul>
							</div>
						</div>
						</td>
					</tr>
				</tbody>
					
				<tfoot>
					<tr class="no-details">
						<td colspan="6">
							<div class="well text-center">
								<button class="btn  btn-medium"  id="add-template-details" href="#template-details-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Template Details</button>
								<div class="muted">No Template Details found, click to add.</div>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
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
<?php echo $this->Form->create('Template',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'TemplateCanvasForm',
															'model'=> 'Template',
															'canvas'=>'#TemplateTable'
														)
											);?>
<?php echo $this->Form->end();?>

	<?php echo $this->Form->create('TemplateDetail',array('name'=>'TemplateDetailModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'templateDetails', 'canvas'=>'#TemplateDetailCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="template-details-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">TemplateDetail</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="templateDetails form span12">
					
							<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('template_id',array('placeholder'=>'Template Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('general_component_id',array('placeholder'=>'General Component Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('percentage',array('placeholder'=>'Percentage','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('under',array('placeholder'=>'Under','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
					</div>		
				</div>
			</div>
			 <div class="modal-footer">
				<button class="btn btn-primary intent-save" type="submit">Save</button>
				<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
			 </div>
		</div>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('TemplateDetail',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'TemplateDetailCanvasForm',
															'model'=> 'TemplateDetail',
															'canvas'=>'#TemplateDetailTable'
														)
											);?>
<?php $this->Form->input('template_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>

<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>
<?php echo $this->Html->script(array('biz/templates'),array('inline'=>false));?>