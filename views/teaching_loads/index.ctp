
			<div class="navbar actions-container">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">Teaching Loads</a>
                  <div class="nav-collapse collapse navbar-responsive-collapse" >
                    <ul class="nav">
                     <li class="dropdown" id="action-filter" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-filter"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="sy_dept">
							<li class="nav-header">
								School Year
							</li>
								<li class="sy"><a href="#" data-value="2012"><i class="icon icon-check-empty"></i> 2012-2013</a></li>
								<li class="sy"><a href="#" data-value="2013"><i class="icon icon-check-empty"></i>  2013-2014</a></li>
							<li class="divider"></li>
                           <li class="nav-header level" dept="ps">
							Preschool
						   </li>
							<div class="ps">
									<li class="dept"><a href="#"><i class="icon icon-check-empty"></i> Nursey</a></li>
								  <li class="dept"><a href="#"><i class="icon icon-check-empty"></i> Kinder </a></li>
								  <li class="dept"><a href="#"><i class="icon icon-check-empty"></i> Prep</a></li>
							</div>
						   <li class="divider"></li>
						  <li class="nav-header level" dept="gs">
							Grade School
						   </li>
							<div class="gs">
								<li class="dept"><a href="#" data-value="G1"><i class="icon icon-check-empty"></i> Grade 1</a></li>
								<li class="dept"><a href="#" data-value="G2"><i class="icon icon-check-empty"></i> Grade 2 </a></li>
								<li class="dept"><a href="#" data-value="G3"><i class="icon icon-check-empty"></i> Grade 3</a></li>
								<li class="dept"><a href="#" data-value="G4"><i class="icon icon-check-empty"></i> Grade 4</a></li>
								<li class="dept"><a href="#" data-value="G5"><i class="icon icon-check-empty"></i> Grade 5</a></li>
								<li class="dept"><a href="#" data-value="G6"><i class="icon icon-check-empty"></i> Grade 6</a></li>
							</div>
						     <li class="divider"></li>
						  <li class="nav-header level" dept="hs">
							High School
						   </li>
						   <div class="hs">
							  <li class="dept"><a href="#" data-value="G7"><i class="icon icon-check-empty"></i> Grade 7</a></li>
							  <li class="dept"><a href="#" data-value="G8"><i class="icon icon-check-empty"></i> Grade 8 </a></li>
							  <li class="dept"><a href="#" data-value="H3"><i class="icon icon-check-empty"></i> Third Year</a></li>
							  <li class="dept"><a href="#" data-value="H4"><i class="icon icon-check-empty"></i> Fourth Year</a></li>
						  </div>
                        </ul>
                      </li>
						<input type="hidden" id="all_sections" value='<?php echo json_encode($sections); ?>'>
					   <li class="dropdown" id="sec_dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon icon-book"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu" id="sections">
						  
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
						<table class="table table table-striped table-bordered  table-condensed RECORD tablesorter canvasTable advancedTable" id="TeachingLoadTable" model="TeachingLoad">
			<thead>
				<tr>
					<th class="w10 text-center"><a >Teacher</a></th>
					<th class="w10 text-center"><a >Subject</a></th>
					<th class="w10 text-center"><a >Section</a></th>
					<!--<th class="w10 text-center"><a >Class Type</a></th>-->
					<!--<th class="w10 text-center"><a >School Year</a></th>-->
					<th class="actions w5"><a >Actions</a></th>
				</tr>
			</thead>
			<tbody>
					<td>
			<span data-field='Employee.full_name'></span></td>
		<td>
			<span data-field='Subject.description'></span></td>
		<td>
			<span data-field='Section.name'></span></td>
		<!--<td><span data-field='TeachingLoad.class_type'></span></td>-->
		<!--<td><span data-field='TeachingLoad.sy_tb'></span></td>-->
		<td class="actions">
					<div class="btn-group">
						<div class="btn-group btn-center">
							<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#intent-modal" data-toggle="modal"  class="action-edit intent-view"><i class="icon-edit"></i> Edit</a></li>								 
								<li><a href="#" class="intent-remove"><i class="icon-remove"></i> Delete</a></li>
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
							<button class="btn  btn-medium"  id="filter-load"><i class="icon icon-filter"></i> Teaching Loads</button>
							<div class="muted">No Teaching Loads found, click to filter.</div>
						</div>
					</td>
				</tr>
			</tfoot>
			</table>
			
						</div>
		</div>

	</div>
</div>
<?php echo $this->Form->create('TeachingLoad',array('name'=>'modalForm','action'=>'add','class'=>'form-horizontal', 'model'=> 'teachingLoads', 'canvas'=>'#TeachingLoadCanvasForm',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>

<div id="intent-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="intent-label" aria-hidden="true">
  <div class="modal-header">
     <h3 id="intent-label"><span class="intent-text">Create </span><span class="intent-object">Teaching Load</span></h3>
  </div>
  <div class="modal-body">
  

<div class="row-fluid">
<div class="teachingLoads form span12">
		<?php echo $this->Form->input('id',array('placeholder'=>'Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('Section.name',array('label'=>'Section','disabled'=>true,'type'=>'text','placeholder'=>'Section','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span5'));?>
		<?php echo $this->Form->input('subject_id',array('placeholder'=>'Subject Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span5'));?>
		<?php echo $this->Form->input('employee_id',array('placeholder'=>'Employee Id','options'=>$employees,'between'=>'<div class="controls">','after'=>'</div>','class'=>'span5'));?>
		
		<?php echo $this->Form->input('section_id',array('type'=>'hidden','placeholder'=>'Section Id','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('class_type',array('type'=>'hidden','placeholder'=>'Class Type','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
		<?php echo $this->Form->input('esp',array('type'=>'hidden','placeholder'=>'Esp','between'=>'<div class="controls">','after'=>'</div>' ,'class'=>'span11'));?>
</div>
</div>
	
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary intent-save" type="button">Save</button>
    <button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="submit">Cancel</button>
  </div>
  
</div>
<?php echo $this->Form->end();?>
<!-- CANVASFORM -->
<?php echo $this->Form->create('TeachingLoad',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'TeachingLoadCanvasForm',
															'model'=> 'TeachingLoad',
															'canvas'=>'#TeachingLoadTable'
														)
											);?>
<?php echo $this->Form->input('esp',array('type'=>'hidden','id'=>'load_esp','value'=>null)); ?>
<?php echo $this->Form->input('section_id',array('type'=>'hidden','id'=>'load_sec','value'=>null)); ?>
<?php echo $this->Form->end();?>

<?php echo $this->Html->css('recordbook/gradeentry'); ?>
<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>
<?php echo $this->Html->script(array('biz/teachingloads'),array('inline'=>false));?>