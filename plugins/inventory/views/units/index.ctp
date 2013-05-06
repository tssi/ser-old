<script type="text/javascript">
		$(document).ready(function(){
		//Init Product Data Table
		$('#UnitTable').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bScrollCollapse": true,
		});
	});
</script>
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

<div class="sub-content-container">				
	<div class="w90 center">
		
		<table class="table table-striped table-condensed table-hover table-bordered tablesorter display" id="UnitTable">
			<thead>
				<tr>
					<th><a>ID</a></th>
					<th><a>Name</a></th>
					<th><a>Alias</a></th>
					<th><a>Created</a></th>
					<th><a>Modified</a></th>
					<th><a>Actions</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
			$i = 0;
			foreach ($units as $unit):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $unit['Unit']['id']; ?></td>
				<td><?php echo $unit['Unit']['name']; ?></td>
				<td><?php echo $unit['Unit']['alias']; ?></td>
				<td><?php echo $unit['Unit']['created']; ?></td>
				<td><?php echo $unit['Unit']['modified']; ?></td>
				<td class="actions">
					<div class="btn-group">
						<button class="btn btn-center dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
							<li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>
						</ul>
					</div>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

	
	</div>
	
	
	<?php echo $this->Form->create('Unit',array('action'=>'add','name'=>'modalForm','model'=>'inventory/units'));?>
	<div id="intent-modal" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
			<h3 id="myModalLabel">Create New Unit</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">	
				<?php echo $this->Form->input('Unit.name',array('class'=>'span3','div'=>false));?>	
				<?php echo $this->Form->input('Unit.alias',array('class'=>'span3','div'=>false));?>	
			</div>

		</div>
	<?php echo $this->Form->end();?>
		<div class="modal-footer">
			<button class="btn btn-primary intent-save" type="button">Save</button>
			<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="button">Cancel</button>
		</div>
	</div>	
	
</div>
	
	

