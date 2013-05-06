<script>
	$(document).ready( function () {
		$('#table_id').dataTable();
	} );
</script>
	<table class="table table-striped table-condensed table-hover table-bordered table-center display" id="table_id">
		<thead>
			<tr class="text-center">
				<th class="w10 ">Item Code</th>
				<th class="w45 ">Item Description</th>
				<th class="w10 ">Qty</th>
				<th class="w10 ">Unit</th>	
				<th class="w10 ">SRP</th>
				<th class="w10 ">AVG PRICE</th>
				<th class="w5"><a>Action</a></th>
				
			</tr>
		</thead>
		<tbody >		
			<?php
			$i = 0;
			foreach ($products as $product):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>

				<td><?php echo $product['Product']['item_code']; ?>&nbsp;</td>
				<td><?php echo $product['Product']['name']; ?>&nbsp;</td>
				<td><?php echo $product['Product']['qty']; ?>&nbsp;</td>
				<td><?php echo $this->Html->link($product['Unit']['name'], array('controller' => 'units', 'action' => 'view', $product['Unit']['id'])); ?></td>
				<td><?php echo $product['Product']['selling_price']; ?>&nbsp;</td>
				<td><?php echo $product['Product']['avg_price']; ?>&nbsp;</td>
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

	
	
	
	
	
	
	