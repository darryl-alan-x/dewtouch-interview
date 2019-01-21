<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __('Transaction Item')?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid view_info">
			<div class="span12 ">
				<div class="row-fluid">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width:10%">ID</th>
								<th>Description</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Sum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($transaction_items as $transaction_item):?>
							<tr>
								<td><?php echo $transaction_item['TransactionItem']['id']?></td>
								<td><?php echo $transaction_item['TransactionItem']['description']?></td>
								<td><?php echo $transaction_item['TransactionItem']['quantity']?></td>
								<td><?php echo $transaction_item['TransactionItem']['unit_price']?></td>
								<td><?php echo $transaction_item['TransactionItem']['sum']?></td>
							</tr>	
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){

})
</script>
<?php $this->end()?>