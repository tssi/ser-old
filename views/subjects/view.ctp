<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name subjects">
								 <?php echo $this->Html->link( 'Subjects',
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
								<li><?php echo $this->Html->link(__('Courses', true), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Recordbooks', true), array('controller' => 'recordbooks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Templates', true), array('controller' => 'templates', 'action' => 'index')); ?> </li>
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
<div class="span6">
<div class="subjects view">
<h2><?php  __('Subject');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nomenclature'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['nomenclature']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Weight'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['weight']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scope'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['scope']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['limit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subject['Subject']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
<div class="related">
	<h3><?php __('Related Courses');?></h3>
	<?php if (!empty($subject['Course'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Curriculum Id'); ?></th>
		<th><?php __('Subject Id'); ?></th>
		<th><?php __('Level Id'); ?></th>
		<th><?php __('Weight Compute'); ?></th>
		<th><?php __('Weight Display'); ?></th>
		<th><?php __('Tree Index'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Has Child'); ?></th>
		<th><?php __('Has Parent'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Course'] as $course):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $course['id'];?></td>
			<td><?php echo $course['curriculum_id'];?></td>
			<td><?php echo $course['subject_id'];?></td>
			<td><?php echo $course['level_id'];?></td>
			<td><?php echo $course['weight_compute'];?></td>
			<td><?php echo $course['weight_display'];?></td>
			<td><?php echo $course['tree_index'];?></td>
			<td><?php echo $course['order_index'];?></td>
			<td><?php echo $course['has_child'];?></td>
			<td><?php echo $course['has_parent'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'courses', 'action' => 'delete', $course['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course', true), array('controller' => 'courses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Recordbooks');?></h3>
	<?php if (!empty($subject['Recordbook'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Section Id'); ?></th>
		<th><?php __('Subject Id'); ?></th>
		<th><?php __('Esp'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Recordbook'] as $recordbook):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $recordbook['id'];?></td>
			<td><?php echo $recordbook['section_id'];?></td>
			<td><?php echo $recordbook['subject_id'];?></td>
			<td><?php echo $recordbook['esp'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'recordbooks', 'action' => 'view', $recordbook['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'recordbooks', 'action' => 'edit', $recordbook['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'recordbooks', 'action' => 'delete', $recordbook['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recordbook['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recordbook', true), array('controller' => 'recordbooks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Templates');?></h3>
	<?php if (!empty($subject['Template'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Subject Id'); ?></th>
		<th><?php __('Level Id'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Esp'); ?></th>
		<th><?php __('Created By'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Template'] as $template):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $template['id'];?></td>
			<td><?php echo $template['subject_id'];?></td>
			<td><?php echo $template['level_id'];?></td>
			<td><?php echo $template['status'];?></td>
			<td><?php echo $template['esp'];?></td>
			<td><?php echo $template['created_by'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'templates', 'action' => 'view', $template['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'templates', 'action' => 'edit', $template['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'templates', 'action' => 'delete', $template['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $template['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Template', true), array('controller' => 'templates', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
</div>