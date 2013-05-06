<?php	
	echo $this->Html->script(array('plugins/products'),array('inline'=>false));
?>
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
														array('controller'=>'pages','plugin'=>null,'action' => 'apps'), array('escape' => false,'class'=>'btn btn-medium btn-block animate' ,'id'=>'intent-back')
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
		</div>
	</div>
</div>


	
	
		
<div class="sub-content-container">
	<div class="w90 center">
		<table class="table table-striped table-condensed table-hover table-bordered  RECORD display" id="ProductsTable">
			<thead>
				<tr role='row'>
					<th class=""><a>ID</a></th>
					<th class="w15"><a>Item Code</a></th>
					<th class="w55"><a>Item Description</a></th>
					<th class="w10"><a>Qty</a></th>
					<th class="w5"><a>Unit</a></th>
					<th class="w10" style="display:none"><a>Selling Price</a></th>
					<th class="w10"><a>Average Price</a></th>
					<th class="w5"><a>Action</a></th>
				</tr>
			</thead>
			<tbody >		
				<tr>
					<td class='id '><span data-field='Product.id'></span></td>
					<td><span data-field='Product.item_code'></span></td>
					<td><span data-field='Product.name'></span></td>
					<td><span data-field='Product.qty'></span></td>
					<td><span data-field='Product.unit_id'></span></td>
					<td style="display:none"><span data-field='Product.selling_price'></span></td>
					<td><span data-field='Product.avg_price'></span></td>
					<td class="actions">
						<div class="btn-group">
							<button class="btn btn-center dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#" class="action-edit"><i class="icon-edit"></i> Edit</a></li>
								<li><a href="#" class="action-delete-product"><i class="icon-remove"></i> Delete</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		
		
	</div>


	<!-- Modal -->
	<?php echo $this->Form->create('Product',array('action'=>'add','name'=>'modalForm','model'=>'inventory/products'));?>
	<div id="intent-modal" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
			<h3 id="myModalLabel">Add Item</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<?php echo $this->Form->input('item_code',array('placeholder'=>'Item Code','class'=>'span2','label'=>'Product','div'=>false));?>	
				<?php echo $this->Form->input('name',array('placeholder'=>'Description','class'=>'span7','label'=>false,'div'=>false));?>	
			</div>

			<div class="row-fluid">
				<?php echo $this->Form->input('unit',array('options'=>$units,'empty'=>'Select','class'=>'span2','div'=>false));?>	
				<?php echo $this->Form->input('qty',array('class'=>'span2','label'=>'Qty','div'=>false));?>	
			</div>
			<div class="row-fluid" style='display:none'>	
				<?php echo $this->Form->input('selling_price',array('class'=>'span2','div'=>false));?>	
				<?php echo $this->Form->input('avg_price',array('class'=>'span2','label'=>array('style'=>'width:115px'),'div'=>false));?>	
			</div>

		</div>
		<?php echo $this->Form->end();?>
		<div class="modal-footer">
			<button class="btn btn-primary intent-save" type="button">Save</button>
			<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="button">Cancel</button>
		</div>
	</div>

	


	<!-- Modal -->
	<?php echo $this->Form->create('Unit',array('action'=>'add','name'=>'modalForm2','model'=>'inventory/units'));?>
	<div id="add-unit" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header ">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
			<h3 id="myModalLabel">Create New Unit</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<?php echo $this->Form->input('name',array('class'=>'span3','autocomplete'=>'off','div'=>false));?>	
				<?php echo $this->Form->input('alias',array('class'=>'span3','autocomplete'=>'off','div'=>false));?>	
			</div>
		</div>
		<?php echo $this->Form->end();?>
		<div class="modal-footer">
			<button class="btn btn-primary btn-save" type="button">Save</button>
			<button class="btn intent-cancel" data-dismiss="modal" aria-hidden="true" type="button">Cancel</button>
		</div>
	</div>
<?php echo $this->Form->create('Product',array('action'=>'index',
															'class'=>'canvasForm',
															'id'=>'ProductCanvasForm',
															'model'=> 'Product',
															'canvas'=>'#ProductsTable'
														)
											);?>
<?php echo $this->Form->end();?>
<?php echo $this->Html->script(array('ui/uiTable1.1','utils/canvasTable'),array('inline'=>false));?>
	

	
