<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name curriculums">
								 <?php echo $this->Html->link( 'Curriculums',
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
		<li><?php echo $this->Html->link(__('Section Affiliations', true), array('controller' => 'section_affiliations', 'action' => 'index')); ?> </li>
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
<div class="curriculums view">
<h2><?php  __('Curriculum');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curriculum['Curriculum']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Department'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($curriculum['Department']['name'], array('controller' => 'departments', 'action' => 'view', $curriculum['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curriculum['Curriculum']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Esp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curriculum['Curriculum']['esp']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curriculum['Curriculum']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $curriculum['Curriculum']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
<div class="related">
	<h3><?php __('Related Courses');?></h3>
	<?php if (!empty($curriculum['Course'])):?>
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
		foreach ($curriculum['Course'] as $course):
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
	<h3><?php __('Related Section Affiliations');?></h3>
	<?php if (!empty($curriculum['SectionAffiliation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Section Id'); ?></th>
		<th><?php __('Curriculum Id'); ?></th>
		<th><?php __('Esp'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($curriculum['SectionAffiliation'] as $sectionAffiliation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $sectionAffiliation['id'];?></td>
			<td><?php echo $sectionAffiliation['section_id'];?></td>
			<td><?php echo $sectionAffiliation['curriculum_id'];?></td>
			<td><?php echo $sectionAffiliation['esp'];?></td>
			<td><?php echo $sectionAffiliation['created'];?></td>
			<td><?php echo $sectionAffiliation['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'section_affiliations', 'action' => 'view', $sectionAffiliation['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'section_affiliations', 'action' => 'edit', $sectionAffiliation['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'section_affiliations', 'action' => 'delete', $sectionAffiliation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sectionAffiliation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Section Affiliation', true), array('controller' => 'section_affiliations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
</div>