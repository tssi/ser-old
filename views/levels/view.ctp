<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name levels">
								 <?php echo $this->Html->link( 'Levels',
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
								<li><?php echo $this->Html->link(__('Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Courses', true), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Sections', true), array('controller' => 'sections', 'action' => 'index')); ?> </li>
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
<div class="levels view">
<h2><?php  __('Level');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Department'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($level['Department']['name'], array('controller' => 'departments', 'action' => 'view', $level['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['alias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order Index'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['order_index']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Esp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['esp']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $level['Level']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
<div class="related">
	<h3><?php __('Related Courses');?></h3>
	<?php if (!empty($level['Course'])):?>
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
		foreach ($level['Course'] as $course):
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
	<h3><?php __('Related Sections');?></h3>
	<?php if (!empty($level['Section'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Level Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Alias'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($level['Section'] as $section):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $section['id'];?></td>
			<td><?php echo $section['level_id'];?></td>
			<td><?php echo $section['name'];?></td>
			<td><?php echo $section['alias'];?></td>
			<td><?php echo $section['order_index'];?></td>
			<td><?php echo $section['status'];?></td>
			<td><?php echo $section['created'];?></td>
			<td><?php echo $section['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'sections', 'action' => 'view', $section['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'sections', 'action' => 'edit', $section['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'sections', 'action' => 'delete', $section['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $section['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Section', true), array('controller' => 'sections', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Templates');?></h3>
	<?php if (!empty($level['Template'])):?>
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
		foreach ($level['Template'] as $template):
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