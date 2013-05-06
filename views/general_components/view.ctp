<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name generalComponents">
								 <?php echo $this->Html->link( 'General Components',
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
								<li><?php echo $this->Html->link(__('Grade Components', true), array('controller' => 'grade_components', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Measurables', true), array('controller' => 'measurables', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Template Details', true), array('controller' => 'template_details', 'action' => 'index')); ?> </li>
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
<div class="generalComponents view">
<h2><?php  __('General Component');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $generalComponent['GeneralComponent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $generalComponent['GeneralComponent']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
<div class="related">
	<h3><?php __('Related Grade Components');?></h3>
	<?php if (!empty($generalComponent['GradeComponent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Recordbook Id'); ?></th>
		<th><?php __('General Component Id'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Under'); ?></th>
		<th><?php __('Percentage'); ?></th>
		<th><?php __('Ceil'); ?></th>
		<th><?php __('Floor'); ?></th>
		<th><?php __('Rule'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($generalComponent['GradeComponent'] as $gradeComponent):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $gradeComponent['id'];?></td>
			<td><?php echo $gradeComponent['recordbook_id'];?></td>
			<td><?php echo $gradeComponent['general_component_id'];?></td>
			<td><?php echo $gradeComponent['order_index'];?></td>
			<td><?php echo $gradeComponent['under'];?></td>
			<td><?php echo $gradeComponent['percentage'];?></td>
			<td><?php echo $gradeComponent['ceil'];?></td>
			<td><?php echo $gradeComponent['floor'];?></td>
			<td><?php echo $gradeComponent['rule'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'grade_components', 'action' => 'view', $gradeComponent['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'grade_components', 'action' => 'edit', $gradeComponent['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'grade_components', 'action' => 'delete', $gradeComponent['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gradeComponent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grade Component', true), array('controller' => 'grade_components', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Measurables');?></h3>
	<?php if (!empty($generalComponent['Measurable'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Recordbook Id'); ?></th>
		<th><?php __('General Component Id'); ?></th>
		<th><?php __('Header'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Items'); ?></th>
		<th><?php __('Base'); ?></th>
		<th><?php __('Ceil'); ?></th>
		<th><?php __('Floor'); ?></th>
		<th><?php __('Rule'); ?></th>
		<th><?php __('Sigfig'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($generalComponent['Measurable'] as $measurable):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $measurable['id'];?></td>
			<td><?php echo $measurable['recordbook_id'];?></td>
			<td><?php echo $measurable['general_component_id'];?></td>
			<td><?php echo $measurable['header'];?></td>
			<td><?php echo $measurable['description'];?></td>
			<td><?php echo $measurable['order_index'];?></td>
			<td><?php echo $measurable['items'];?></td>
			<td><?php echo $measurable['base'];?></td>
			<td><?php echo $measurable['ceil'];?></td>
			<td><?php echo $measurable['floor'];?></td>
			<td><?php echo $measurable['rule'];?></td>
			<td><?php echo $measurable['sigfig'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'measurables', 'action' => 'view', $measurable['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'measurables', 'action' => 'edit', $measurable['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'measurables', 'action' => 'delete', $measurable['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $measurable['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Measurable', true), array('controller' => 'measurables', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Template Details');?></h3>
	<?php if (!empty($generalComponent['TemplateDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Template Id'); ?></th>
		<th><?php __('General Component Id'); ?></th>
		<th><?php __('Order Index'); ?></th>
		<th><?php __('Percentage'); ?></th>
		<th><?php __('Under'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($generalComponent['TemplateDetail'] as $templateDetail):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $templateDetail['id'];?></td>
			<td><?php echo $templateDetail['template_id'];?></td>
			<td><?php echo $templateDetail['general_component_id'];?></td>
			<td><?php echo $templateDetail['order_index'];?></td>
			<td><?php echo $templateDetail['percentage'];?></td>
			<td><?php echo $templateDetail['under'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'template_details', 'action' => 'view', $templateDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'template_details', 'action' => 'edit', $templateDetail['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'template_details', 'action' => 'delete', $templateDetail['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $templateDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Template Detail', true), array('controller' => 'template_details', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
</div>
</div>