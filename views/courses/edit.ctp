<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name courses">
							
							 <?php echo $this->Html->link( 'Courses',
														array('action' => 'index')
													);  ?>							</div>
						</div>
					</div>
					<div class="span3">
					 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).
														$this->Html->tag('span', 'CREATE', array('class' => 'action-label')),
														array('action' => 'add'), array('escape' => false,'class'=>'btn btn-medium btn-info btn-block animate')
													);  ?>					</div>
					<div class="btn-group span3">
					  <a class="btn btn-medium btn-block dropdown-toggle" data-toggle="dropdown" href="#">
						<i class=" icon-th-list"></i><span class="action-label">LINKS</span>	
					  </a>
					  <ul class="dropdown-menu">
						<!-- dropdown menu links -->
								<li><?php echo $this->Html->link(__('Curriculums', true), array('controller' => 'curriculums', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Subjects', true), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
					  </ul>
					</div>
				</div>
			</div>
			<div class="span6 text-right">
				 <input class="span6 m-t-5 p" type="text" placeholder="Search">
			</div>
		</div>
	</div>
 </div>

<div class="row-fluid">
<div class="courses form span6 offset3">

<?php echo $this->Form->create('Course',array(	'class'=>'form-horizontal',
																	'inputDefaults' => array( 	'label'=>array('class'=>'control-label'),
																								'div'=>array('class'=>'control-group')
																							)
																	)
											);?>
	<fieldset>
		<legend><?php __('Edit Course'); ?></legend>
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
	</fieldset>
	<div class="control-group">
		<div class="controls">
		<?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-info'));?>
		<?php echo $this->Form->button('Cancel',array('type'=>'reset','class'=>'btn'));?>
		</div>
	</div>
	<?php echo $this->Form->end();?>
</div>
</div>