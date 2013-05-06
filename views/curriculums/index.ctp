
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name curriculums">
									 <?php echo $this->Html->link( 'Curriculums',
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
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="CurriculumTable" model="Curriculum">
			<thead>
				<tr>
																								<th class="w10 text-center"><a >Department Id</a></th>
																				<th class="w10 text-center"><a >Name</a></th>
																				<th class="w10 text-center"><a >Esp</a></th>
																																<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td>
			<span data-field='Department.name'></span></td>
		<td><span data-field='Curriculum.name'></span></td>
		<td><span data-field='Curriculum.esp'></span></td>
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
									
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-departments"><i class="icon-eye-open"></i> Departments</a></li>
											
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-courses"><i class="icon-eye-open"></i> Courses</a></li>
											
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-section_affiliations"><i class="icon-eye-open"></i> Section Affiliations</a></li>
																	 
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
<?php echo $this->Form->create('Curriculum',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'curriculums', 'canvas'=>'#CurriculumCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Curriculum</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="curriculums form span12">

		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('department_id',array('placeholder'=>'Department Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('name',array('placeholder'=>'Name','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('esp',array('placeholder'=>'Esp','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="CourseTable" model="Course">
				<caption class="caption-bordered">Courses</caption>
				<thead>
				<tr>
						<th><?php __('Curriculum Id'); ?></th>
		<th><?php __('Subject Id'); ?></th>
		<th><?php __('Level Id'); ?></th>
		<th><?php __('Weight Compute'); ?></th>
		<th><?php __('Weight Display'); ?></th>
		<th><?php __('Tree Index'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Has Child'); ?></th>
		<th><?php __('Has Parent'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
								<td><span data-field='Course.curriculum_id'></span></td>
		<td><span data-field='Course.subject_id'></span></td>
		<td><span data-field='Course.level_id'></span></td>
		<td><span data-field='Course.weight_compute'></span></td>
		<td><span data-field='Course.weight_display'></span></td>
		<td><span data-field='Course.tree_index'></span></td>
		<td><span data-field='Course.order_index'></span></td>
		<td><span data-field='Course.has_child'></span></td>
		<td><span data-field='Course.has_parent'></span></td>
						<td>
						<div class="btn-group">
							<div class="btn-group btn-center">
								<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									  <li><a  href="#courses-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
									 <li><a  href="#courses-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
									 <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
								</ul>
							</div>
						</div>
						</td>
					</tr>
				</tbody>
					
				<tfoot>
					<tr class="no-details">
						<td colspan="10">
							<div class="well text-center">
								<button class="btn  btn-medium"  id="add-courses" href="#courses-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Courses</button>
								<div class="muted">No Courses found, click to add.</div>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="SectionAffiliationTable" model="SectionAffiliation">
				<caption class="caption-bordered">Section Affiliations</caption>
				<thead>
				<tr>
						<th><?php __('Section Id'); ?></th>
		<th><?php __('Curriculum Id'); ?></th>
		<th><?php __('Esp'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
								<td><span data-field='SectionAffiliation.section_id'></span></td>
		<td><span data-field='SectionAffiliation.curriculum_id'></span></td>
		<td><span data-field='SectionAffiliation.esp'></span></td>
						<td>
						<div class="btn-group">
							<div class="btn-group btn-center">
								<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									  <li><a  href="#section-affiliations-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
									 <li><a  href="#section-affiliations-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
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
								<button class="btn  btn-medium"  id="add-section-affiliations" href="#section-affiliations-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Section Affiliations</button>
								<div class="muted">No Section Affiliations found, click to add.</div>
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
<?php echo $this->Form->create('Curriculum',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'CurriculumCanvasForm',
															'model'=> 'Curriculum',
															'canvas'=>'#CurriculumTable'
														)
											);?>
<?php echo $this->Form->end();?>

	<?php echo $this->Form->create('Course',array('name'=>'CourseModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'courses', 'canvas'=>'#CourseCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="courses-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Course</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="courses form span12">
					
							<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('curriculum_id',array('placeholder'=>'Curriculum Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('subject_id',array('placeholder'=>'Subject Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('level_id',array('placeholder'=>'Level Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('weight_compute',array('placeholder'=>'Weight Compute','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('weight_display',array('placeholder'=>'Weight Display','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('tree_index',array('placeholder'=>'Tree Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('has_child',array('placeholder'=>'Has Child','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('has_parent',array('placeholder'=>'Has Parent','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
					</div>		
				</div>
			</div>
			 <div class="modal-footer">
				<button class="btn btn-primary intent-save" type="submit">Save</button>
				<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
			 </div>
		</div>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('Course',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'CourseCanvasForm',
															'model'=> 'Course',
															'canvas'=>'#CourseTable'
														)
											);?>
<?php $this->Form->input('curriculum_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
	<?php echo $this->Form->create('SectionAffiliation',array('name'=>'SectionAffiliationModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'sectionAffiliations', 'canvas'=>'#SectionAffiliationCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="section-affiliations-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">SectionAffiliation</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="sectionAffiliations form span12">
					
							<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('section_id',array('placeholder'=>'Section Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('curriculum_id',array('placeholder'=>'Curriculum Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('esp',array('placeholder'=>'Esp','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
					</div>		
				</div>
			</div>
			 <div class="modal-footer">
				<button class="btn btn-primary intent-save" type="submit">Save</button>
				<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
			 </div>
		</div>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('SectionAffiliation',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'SectionAffiliationCanvasForm',
															'model'=> 'SectionAffiliation',
															'canvas'=>'#SectionAffiliationTable'
														)
											);?>
<?php $this->Form->input('curriculum_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>

<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>