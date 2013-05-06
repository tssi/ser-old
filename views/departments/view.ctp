<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name departments">
								 <?php echo $this->Html->link( 'Departments',
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
<div class="span6">
<div class="departments view">
<h2><?php  __('Department');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['alias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order Index'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['order_index']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Esp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['esp']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
<div class="related">
	<h3><?php __('Related Curriculums');?></h3>
	<?php if (!empty($department['Curriculum'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Department Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Esp'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($department['Curriculum'] as $curriculum):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $curriculum['id'];?></td>
			<td><?php echo $curriculum['department_id'];?></td>
			<td><?php echo $curriculum['name'];?></td>
			<td><?php echo $curriculum['esp'];?></td>
			<td><?php echo $curriculum['created'];?></td>
			<td><?php echo $curriculum['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'curriculums', 'action' => 'view', $curriculum['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'curriculums', 'action' => 'edit', $curriculum['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'curriculums', 'action' => 'delete', $curriculum['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $curriculum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Curriculum', true), array('controller' => 'curriculums', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Levels');?></h3>
	<?php if (!empty($department['Level'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Department Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Alias'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Esp'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($department['Level'] as $level):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $level['id'];?></td>
			<td><?php echo $level['department_id'];?></td>
			<td><?php echo $level['name'];?></td>
			<td><?php echo $level['alias'];?></td>
			<td><?php echo $level['order_index'];?></td>
			<td><?php echo $level['esp'];?></td>
			<td><?php echo $level['created'];?></td>
			<td><?php echo $level['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'levels', 'action' => 'view', $level['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'levels', 'action' => 'edit', $level['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'levels', 'action' => 'delete', $level['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $level['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Level', true), array('controller' => 'levels', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
</div>