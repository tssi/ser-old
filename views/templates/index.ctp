
			<div class="navbar actions-container">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">Template</a>
                  <div class="nav-collapse collapse navbar-responsive-collapse" >
                    <ul class="nav">
                     <li class="dropdown" id="action-filter" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-filter"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="dept">
                           <li class="nav-header">
							Preschool
						   </li>
						    <li><a href="#"><i class="icon icon-check-empty"></i> Nursey</a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Kinder </a></li>
                          <li><a href="#"><i class="icon icon-check-empty"></i> Prep</a></li>
						   <li class="divider"></li>
						  <li class="nav-header">
							Grade School
						   </li>
						    <li><a href="#" data-value="G1"><i class="icon icon-check-empty"></i> Grade 1</a></li>
                          <li><a href="#" data-value="G2"><i class="icon icon-check-empty"></i> Grade 2 </a></li>
                          <li><a href="#" data-value="G3"><i class="icon icon-check-empty"></i> Grade 3</a></li>
                          <li><a href="#" data-value="G4"><i class="icon icon-check-empty"></i> Grade 4</a></li>
                          <li><a href="#" data-value="G5"><i class="icon icon-check-empty"></i> Grade 5</a></li>
                          <li><a href="#" data-value="G6"><i class="icon icon-check-empty"></i> Grade 6</a></li>
						     <li class="divider"></li>
						  <li class="nav-header">
							High School
						   </li>
						    <li><a href="#" data-value="G7"><i class="icon icon-check-empty"></i> Grade 7</a></li>
                          <li><a href="#" data-value="G8"><i class="icon icon-check-empty"></i> Grade 8 </a></li>
                          <li><a href="#" data-value="H3"><i class="icon icon-check-empty"></i> Third Year</a></li>
                          <li><a href="#" data-value="H4"><i class="icon icon-check-empty"></i> Fourth Year</a></li>
                        </ul>
                      </li>
					   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-book"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="subjects">
						  
                        </ul>
                      </li>
                    </ul>
                    <ul class="nav pull-right">
                      <li class="dropdown" id="view-template">
                        <a href="#"><i class="icon icon-eye-open"></i></a>
                      </li>
					   <li><a href="#" id='intent-create'><i class="icon icon-plus"></i></a></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>

<div class="sub-content-container">
	<div class="w90 center">
		<div class="row-fluid">
			<div class="w90 center">
				<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="TemplateTable" model="Template">
					<thead>
						<tr>
							<!--<th class="w5 text-center"><a >ID</a></th>-->
							<th class="w10 text-center"><a >Subject id</a></th>
							<th class="w25 text-center"><a >Template name</a></th>
							<th class="w15 text-center"><a >Year/Level</a></th>
							<th class="w15 text-center"><a >Effective School Year</a></th>
							<th class="w25 text-center"><a >Created By</a></th>
							<th class="actions w10"><a >Actions</a></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!--<td><span data-field='Template.id'></span></td>-->
							<td><span data-field='Subject.id'></span></td>
							<td><span data-field='Template.name'></span></td>
							<td><span data-field='Template.limit'></span></td>
							<td><span data-field='Template.sy_tb'></span></td>
							<td><span data-field='Template.created_by'></span></td>
							<td class="actions">
								<div class="btn-group">
									<div class="btn-group btn-center">
										<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#intent-modal" data-toggle="modal"  class="action-view view-template_details"><i class="icon-eye-open"></i> Template Details</a></li>						 
											<li><a href="#" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
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
								<button class="btn  btn-medium"  id="filter-template"><i class="icon icon-filter"></i> Templates</button>
								<div class="muted">No Templates found, click to filter.</div>
							</div>
						</td>
					</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->create('Template',array('name'=>'modalForm','action'=>'add', 'model'=> 'templates', 'canvas'=>'#TemplateCanvasForm',
													
																	)
											);?>

<div id="intent-modal" class="modal hide fade longModal " tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Template</span></h3>
  </div>
  <div class="modal-body">
<div class="row-fluid">
<div class="templates form span12 form-canvas">
			<?php  $school_yr = array('#'=>'School Year','2011'=>'2011-2012','2012'=>'2012-2013','2013'=>'2013-2014');?>
			<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
			<div class="row-fuild">
				<label for="TemplateSy" class="control-label">Effective SY</label>
				<?php echo $this->Form->input('sy',array('label'=>false,'required'=>true,'id'=>'template_sy','div'=>false,'options'=>$school_yr,'class'=>'span3'));?>
				<?php echo $this->Form->input('limit',array('div'=>false,'placeholder'=>'level','id'=>'yrlvl','readonly'=>'readonly','class'=>'span3'));?>
				<?php echo $this->Form->input('Subject.description',array('div'=>false,'label'=>'Subject','type'=>'text','placeholder'=>'subject','id'=>'subject_name','disabled'=>'disabled','class'=>'span3'));?>
				<?php echo $this->Form->input('name',array('div'=>false,'required'=>true,'placeholder'=>'Template name','div'=>false,'class'=>'span3'));?>
			</div>
			<?php echo $this->Form->input('esp',array('type'=>'hidden','id'=>'sy','class'=>'span3'));?>
			<?php echo $this->Form->input('status',array('type'=>'hidden','id'=>'subject_status','class'=>'span3'));?>
			<?php echo $this->Form->input('scope',array('type'=>'hidden','id'=>'subject_scope','value'=>'D','class'=>'span3'));?>
			<?php echo $this->Form->input('limit',array('type'=>'hidden','id'=>'subject_limit','class'=>'span3'));?>
			<?php echo $this->Form->input('subject_id',array('type'=>'hidden','id'=>'subject_id','class'=>'span3'));?>
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
										 <li><a href="#" class="action-delete-template-dtl"><i class="icon-remove"></i> Delete</a></li>
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
	<?php echo $this->Form->input('scope',array('type'=>'hidden','value'=>null)); ?>
	<?php echo $this->Form->input('limit',array('type'=>'hidden','value'=>null)); ?>
	<?php echo $this->Form->input('subject_id',array('type'=>'hidden','value'=>null)); ?>
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
						<?php //pr($templates);exit();?>
						<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('template_id',array('type'=>'hidden'));?>
						<?php echo $this->Form->input('Template.name',array('id'=>'template_name','placeholder'=>'Template','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('general_component_id',array('options'=>array($generalComponents),'placeholder'=>'General Component Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('percentage',array('placeholder'=>'Percentage','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php //echo $this->Form->input('under',array('options'=>array($generalComponents),'placeholder'=>'Under','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
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
<?php echo $this->Form->input('template_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
<?php echo $this->Html->css('recordbook/gradeentry'); ?>
<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>
<?php echo $this->Html->script(array('biz/templates'),array('inline'=>false));?>