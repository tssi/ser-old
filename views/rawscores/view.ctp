<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name rawscores">
								 <?php echo $this->Html->link( 'Rawscores',
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
								<li><?php echo $this->Html->link(__('Students', true), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Measurables', true), array('controller' => 'measurables', 'action' => 'index')); ?> </li>
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
<div class="rawscores view">
<h2><?php  __('Rawscore');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rawscore['Rawscore']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Student'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($rawscore['Student']['id'], array('controller' => 'students', 'action' => 'view', $rawscore['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Measurable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($rawscore['Measurable']['id'], array('controller' => 'measurables', 'action' => 'view', $rawscore['Measurable']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Score'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rawscore['Rawscore']['score']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="span6">
</div>
</div>