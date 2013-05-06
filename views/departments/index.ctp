
<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name departments">
									 <?php echo $this->Html->link( 'Departments',
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
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable" id="DepartmentTable" model="Department">
			<thead>
				<tr>
																								<th class="w10 text-center"><a >Name</a></th>
																				<th class="w10 text-center"><a >Alias</a></th>
																				<th class="w10 text-center"><a >Order Index</a></th>
																				<th class="w10 text-center"><a >Esp</a></th>
																																<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td><span data-field='Department.name'></span></td>
		<td><span data-field='Department.alias'></span></td>
		<td><span data-field='Department.order_index'></span></td>
		<td><span data-field='Department.esp'></span></td>
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
									
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-curriculums"><i class="icon-eye-open"></i> Curriculums</a></li>
											
											 <li><a href="#intent-modal" data-toggle="modal"  class="action-view view-levels"><i class="icon-eye-open"></i> Levels</a></li>
																	 
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
<?php echo $this->Form->create('Department',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'departments', 'canvas'=>'#DepartmentCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Department</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="departments form span12">

		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('name',array('placeholder'=>'Name','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('alias',array('placeholder'=>'Alias','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('esp',array('placeholder'=>'Esp','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="CurriculumTable" model="Curriculum">
				<caption class="caption-bordered">Curriculums</caption>
				<thead>
				<tr>
						<th><?php __('Department Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Esp'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
								<td><span data-field='Curriculum.department_id'></span></td>
		<td><span data-field='Curriculum.name'></span></td>
		<td><span data-field='Curriculum.esp'></span></td>
						<td>
						<div class="btn-group">
							<div class="btn-group btn-center">
								<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									  <li><a  href="#curriculums-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
									 <li><a  href="#curriculums-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
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
								<button class="btn  btn-medium"  id="add-curriculums" href="#curriculums-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Curriculums</button>
								<div class="muted">No Curriculums found, click to add.</div>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-condensed RECORD tablesorter canvasTable" id="LevelTable" model="Level">
				<caption class="caption-bordered">Levels</caption>
				<thead>
				<tr>
						<th><?php __('Department Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Alias'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Esp'); ?></th>
					<th class="actions">Actions</th>
				</tr>
				</thead>
				<tbody class="hide">
					<tr>
								<td><span data-field='Level.department_id'></span></td>
		<td><span data-field='Level.name'></span></td>
		<td><span data-field='Level.alias'></span></td>
		<td><span data-field='Level.order_index'></span></td>
		<td><span data-field='Level.esp'></span></td>
						<td>
						<div class="btn-group">
							<div class="btn-group btn-center">
								<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
								<ul class="dropdown-menu">
									  <li><a  href="#levels-modal" data-toggle="modal" data-dismiss="modal" class="action-add"><i class="icon-plus"></i> Add</a></li>
									 <li><a  href="#levels-modal" data-toggle="modal" data-dismiss="modal" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
									 <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
								</ul>
							</div>
						</div>
						</td>
					</tr>
				</tbody>
					
				<tfoot>
					<tr class="no-details">
						<td colspan="8">
							<div class="well text-center">
								<button class="btn  btn-medium"  id="add-levels" href="#levels-modal" data-toggle="modal" data-dismiss="modal"><i class="icon-plus"></i> Levels</button>
								<div class="muted">No Levels found, click to add.</div>
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
<?php echo $this->Form->create('Department',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'DepartmentCanvasForm',
															'model'=> 'Department',
															'canvas'=>'#DepartmentTable'
														)
											);?>
<?php echo $this->Form->end();?>

	<?php echo $this->Form->create('Curriculum',array('name'=>'CurriculumModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'curriculums', 'canvas'=>'#CurriculumCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="curriculums-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
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
					</div>		
				</div>
			</div>
			 <div class="modal-footer">
				<button class="btn btn-primary intent-save" type="submit">Save</button>
				<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
			 </div>
		</div>
<?php echo $this->Form->end();?>
<?php echo $this->Form->create('Curriculum',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'CurriculumCanvasForm',
															'model'=> 'Curriculum',
															'canvas'=>'#CurriculumTable'
														)
											);?>
<?php $this->Form->input('department_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>
	<?php echo $this->Form->create('Level',array('name'=>'LevelModal','action'=>'add','class'=>'form-horizontal', 'model'=> 'levels', 'canvas'=>'#LevelCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

		<div id="levels-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
			<div class="modal-header">
				<h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Level</span></h3>
			</div>
			<div class="modal-body">
  
				<div class="row-fluid">
					<div class="levels form span12">
					
							<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('department_id',array('placeholder'=>'Department Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('name',array('placeholder'=>'Name','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('alias',array('placeholder'=>'Alias','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('order_index',array('placeholder'=>'Order Index','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
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
<?php echo $this->Form->create('Level',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'LevelCanvasForm',
															'model'=> 'Level',
															'canvas'=>'#LevelTable'
														)
											);?>
<?php $this->Form->input('department_id',array('type'=>'hidden','value'=>null,'role'=>'foreign-key')); ?>
<?php echo $this->Form->end();?>

<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>