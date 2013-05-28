<div class="navbar actions-container">
  <div class="navbar-inner">
	<div class="container">
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  <a class="brand" href="#">Component</a>
	  <div class="nav-collapse collapse navbar-responsive-collapse">
		<ul class="nav">
		 <li class="dropdown" id="action-filter">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-filter"></i> <b class="caret"></b></a>
			<ul class="dropdown-menu" id="sy_period">
			   <li class="nav-header">
				School Year
			   </li>
				<li class="sy"><a href="#" data-value="2012"><i class="icon icon-check-empty"></i> 2012-2013</a></li>
			  <li class="sy"><a href="#" data-value="2013"><i class="icon icon-check-empty"></i>  2013-2014</a></li>
			   <li class="divider"></li>
			   <li class="nav-header">Grading Period</li>
			 <li class="period"><a href="#" data-value="1"><i class="icon icon-check-empty"></i> First</a></li>
			  <li class="period"><a href="#" data-value="2"><i class="icon icon-check-empty"></i>  Second</a></li>
			  <li class="period"><a href="#" data-value="3"><i class="icon icon-check-empty"></i> Third</a></li>
			  <li class="period"><a href="#" data-value="4"><i class="icon icon-check-empty"></i> Fourth</a></li>
			</ul>
		  </li>
		  <li class="dropdown " id="action-subjects">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-book"></i> <b class="caret"></b></a>
			<ul class="dropdown-menu" id="subjects">
			</ul>
		  </li>
		  <li class="dropdown" id="view-loads">
			<a href="#"><i class="icon icon-eye-open"></i></a>
		  </li>
		   <li><a href="#" id='intent-create'><i class="icon icon-plus"></i></a></li>
		</ul>
		<ul class="nav pull-right">
		 <li><div id="simple-root"></div></li>
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>
<div class="sub-content-container">
	<div class="w90 center">
		<div class="row-fluid">
			<div class="w90 center">
				<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="RecordbookTable" model="Recordbook">
					<thead>
						<tr>
							<th class="w10 text-center"><a >Section Id</a></th>
							<th class="w10 text-center"><a >Subject Id</a></th>
							<th class="w10 text-center"><a >Esp</a></th>
							<th class="actions w5"><a >Actions</a></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<span data-field='Section.name'></span>
							</td>
							<td>
								<span data-field='Subject.id'></span>
							</td>
							<td><span data-field='Recordbook.esp'></span></td>
							<td class="actions">
								<div class="btn-group">
									<div class="btn-group btn-center">
										<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#intent-modal" data-toggle="modal"  class="action-view view-grade_components"><i class="icon-eye-open"></i> Grade Components</a></li>
											<li><a href="#intent-modal" data-toggle="modal"  class="action-view view-measurables"><i class="icon-eye-open"></i> Measurables</a></li>			 
											<!--<li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>-->
										</ul>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr class="no-details">
							<td colspan="4">
								<div class="well text-center">
									<button class="btn  btn-medium"  id="filter-recordbook"><i class="icon icon-filter"></i> Components</button>
									<div class="muted">No Components found, click to filter.</div>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>			
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->create('Recordbook',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'recordbooks', 'canvas'=>'#RecordbookCanvasForm',
																	)
											);?>

<div id="intent-modal" class="modal hide fade longModal" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Recordbook</span></h3>
  </div>
  <div class="modal-body">
<div class="row-fluid">
<div class="recordbooks form span12 form-canvas">
		<?php  $school_yr = array('#'=>'School Year','2011'=>'2011-2012','2012'=>'2012-2013','2013'=>'2013-2014');?>
		<?php echo $this->Form->input('id',array('placeholder'=>'Id','class'=>'span11','role'=>'primary-key'));?>
		<div class="row-fuild">
			<?php echo $this->Form->input('sy',array('div'=>false,'required'=>true,'id'=>'recordbook_sy','options'=>$school_yr,'class'=>'span2'));?>
			<?php echo $this->Form->input('Subject.nomenclature',array('label'=>'Subject','div'=>false,'id'=>'subject','class'=>'span3'));?>
			<?php echo $this->Form->input('section_id',array('label'=>'Section','div'=>false,'id'=>'section','class'=>'span3'));?>
		</div>
		<?php echo $this->Form->input('esp',array('type'=>'hidden','id'=>'sy','class'=>'span3'));?>
		<?php echo $this->Form->input('subject_id',array('type'=>'hidden','id'=>'subject_id','class'=>'span3'));?>
		<?php echo $this->Form->input('section_id',array('type'=>'hidden','id'=>'section_id','class'=>'span3'));?>
		<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="GradeComponentTable" model="GradeComponent">
			<caption class="caption-bordered">Grade Components</caption>
			<thead>
				<tr>
					<th><?php __('Order Index'); ?></th>
					<th><?php __('General Component Id'); ?></th>
					<th><?php __('Description'); ?></th>
					<th><?php __('Under'); ?></th>
					<th><?php __('Percentage'); ?></th>
				</tr>
			</thead>
			<tbody class="hide">
				<tr>
					<td><span data-field='GradeComponent.order_index'></span></td>
					<td><span data-field='GradeComponent.general_component_id'></span></td>
					<td><span data-field='GeneralComponent.description'></span></td>
					<td><span data-field='GradeComponent.under'></span></td>
					<td><span data-field='GradeComponent.percentage'></span></td>
				</tr>
			</tbody>
			<tfoot>
				<tr class="no-details">
					<td colspan="9">
						<div class="well text-center">
							<button class="btn  btn-medium action-btn"  id="add-grade-components" href="#grade-components-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Grade Components</button>
							<div class="muted">No Grade Components found, click to copy.</div>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="MeasurableTable" model="Measurable">
				<caption class="caption-bordered">Measurables</caption>
				<thead>
				<tr>
					<th><?php __('Order Index'); ?></th>
					<th><?php __('General Component Id'); ?></th>
					<th><?php __('Header'); ?></th>
					<th><?php __('Description'); ?></th>
					<th><?php __('Items'); ?></th>
					<th><?php __('Base'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
						<td><span data-field='Measurable.order_index'></span></td>
						<td><span data-field='Measurable.general_component_id'></span></td>
						<td><span data-field='Measurable.header'></span></td>
						<td><span data-field='Measurable.description'></span></td>
						<td><span data-field='Measurable.items'></span></td>
						<td><span data-field='Measurable.base'></span></td>
						<td>
							<div class="btn-group">
								<div class="btn-group btn-center">
									<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
									<ul class="dropdown-menu">
										  <li><a  href="#measurables-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
										 <li><a  href="#measurables-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
										 <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
									</ul>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
					
				<tfoot>
					<tr class="no-details">
						<td colspan="12">
							<div class="well text-center">
								<button class="btn  btn-medium action-btn"  id="add-measurables" href="#measurables-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Measurables</button>
								<div class="muted">No Measurables found, click to add.</div>
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
<?php echo $this->Form->create('Recordbook',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'RecordbookCanvasForm',
															'model'=> 'Recordbook',
															'canvas'=>'#RecordbookTable'
														)
											);?>
<?php echo $this->Form->input('subject_id',array('id'=>'load_subjects','type'=>'hidden','value'=>null)); ?>
<?php echo $this->Form->input('section_id',array('id'=>'load_section','type'=>'hidden','value'=>null)); ?>
<?php echo $this->Form->input('esp',array('id'=>'load_esp','type'=>'hidden','value'=>null)); ?>
<?php echo $this->Form->end();?>

	<?php echo $this->Form->create('GradeComponent',array('name'=>'GradeComponentModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'gradeComponents', 'canvas'=>'#GradeComponentCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="grade-components-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">GradeComponent</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="gradeComponents form span12">
						<input type="hidden" readonly="readonly" name="data[Recordbook][id]" role="foreign-key">
						<?php echo $this->Form->input('Template.templates',array('options'=>'','between'=>'<div class="controls">','id'=>'GradeComponentTemplates','after'=>'</div>' ,'class'=>'span4'));?>
						<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="TemplateDetailTable" model="TemplateDetail">
							<caption class="caption-bordered">Grade Components</caption>
							<thead>
								<tr>
									<th><?php __('Recordbook Id'); ?></th>
									<th><?php __('General Component Id'); ?></th>
									<th><?php __('Order Index'); ?></th>
									<th><?php __('Percentage'); ?></th>
									<th><?php __('Under'); ?></th>
								</tr>
							</thead>
							<tbody class="hide">
								<tr>
									<td>
										<input type="text" readonly="readonly" vname="data[GradeComponent][%][recordbook_id]" role="foreign-key">
									</td>
									<td data-field='TemplateDetail.general_component_id'>
										<input type="text" readonly="readonly" vname="data[GradeComponent][%][general_component_id]">
									</td>
									<td data-field='TemplateDetail.order_index'>
										<input type="text" readonly="readonly" vname="data[GradeComponent][%][order_index]">
									</td>
									<td data-field='TemplateDetail.percentage'>
										<input type="text" readonly="readonly" vname="data[GradeComponent][%][percentage]">
									</td>
									<td data-field='TemplateDetail.under'>
										<input type="text" readonly="readonly" vname="data[GradeComponent][%][under]">
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr class="no-details">
									<td colspan="9">
										<div class="well text-center">
											<button class="btn  btn-medium"  id="filter-grade-components" data-toggle="modal" data-dismiss="modal"><i class="icon icon-filter"></i> Filter Grade Components</button>
											<div class="muted">No Grade Components found, click to filter.</div>
										</div>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>		
				</div>
			</div>
			 <div class="modal-footer">
				<button class="btn btn-primary intent-save" id="populate_comp" type="submit">Ok</button>
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
<?php echo $this->Form->input('template_id',array('type'=>'hidden','id'=>'template-id','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('GradeComponent',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'GradeComponentCanvasForm',
															'model'=> 'GradeComponent',
															'canvas'=>'#GradeComponentTable'
														)
											);?>
<?php echo $this->Form->input('recordbook_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('Measurable',array('name'=>'MeasurableModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'measurables', 'canvas'=>'#MeasurableCanvasForm',
						'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
													'div'=>array('class'=>'control-group')
												)
						)

);?>
		<div id="measurables-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Measurable</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="measurables form span12 form-canvas">
						<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('general_component_id',array('placeholder'=>'General Component Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('header',array('placeholder'=>'Header','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('description',array('placeholder'=>'Description','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('items',array('placeholder'=>'Items','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('base',array('placeholder'=>'Base','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('ceil',array('placeholder'=>'ceil','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('floor',array('placeholder'=>'floor','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('rule',array('placeholder'=>'rule','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						<?php echo $this->Form->input('sigfig',array('placeholder'=>'sigfig','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
						
						<?php echo $this->Form->input('recordbook_id',array('type'=>'hidden','role'=>'foreign-key'));?>
						
					</div>		
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary intent-save" type="submit">Save</button>
				<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
			</div>
		</div>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('Measurable',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'MeasurableCanvasForm',
															'model'=> 'Measurable',
															'canvas'=>'#MeasurableTable'
														)
											);?>
<?php echo $this->Form->input('recordbook_id',array('type'=>'hidden','id'=>'load_recordbook','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
<?php echo $this->Html->css('recordbook/gradeentry'); ?>
<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>
<?php echo $this->Html->script(array('biz/recordbooks'),array('inline'=>false));?>