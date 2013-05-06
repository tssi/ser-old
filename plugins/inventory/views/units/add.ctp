<div class="actions-container row-fluid animate">
	 <div id="profile-navigation" class="span12 nav-marginTop">		
		<div class="row-fluid">
			<div class="span6">		
				<div class="row-fluid">
					<div class="span4 module">
						<div class="module-wrap">
							<div class="module-name accountCharts">
									 <?php echo $this->Html->link( 'Inventory',
															'javascript:void()'
														);  ?>								
							</div>
						</div>
					</div>
					
					<div class="span3">
					 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-chevron-left')).
														$this->Html->tag('span', 'BACK', array('class' => 'action-label')),
														array('action' => 'apps'), array('escape' => false,'class'=>'btn btn-medium btn-block animate' ,'id'=>'intent-back')
													);  ?>					
					</div>
					<div class="span3">
					 <?php echo $this->Html->link( 	$this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).
														$this->Html->tag('span', 'CREATE', array('class' => 'action-label')),
														'#myModal', array('escape' => false,'data-toggle'=>'modal','href'=>'#myModal','role'=>'button','class'=>'btn btn-medium btn-primary btn-block animate' ,'id'=>'intent-create')
													);  ?>					
					</div>
					
				</div>
			</div>
			<div class="span6 text-right">
				 <input class="span3 m-t-5 p" type="text" placeholder="Search" id="search">
			</div>
		</div>
	</div>
</div>


<div class="units form">
<?php echo $this->Form->create('Unit');?>
	<fieldset>
		<legend><?php __('Add Unit'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('alias');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Units', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>