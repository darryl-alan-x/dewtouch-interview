<div class="row-fluid">
	<table class="table table-bordered" id="table_orders">
		<thead>
			<tr>
				<th style="width:10%">ID</th>
				<th>MEMBER NAME</th>
				<th>DESCRIPTION</th>
				<th>DATE</th>
				<th>REF NO</th>
				<th>RECEIPT NO</th>
				<th>PAYMENT METHOD</th>
				<th>SUBTOTAL</th>
				<th>TAX</th>
				<th>TOTAL</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($transactions as $transaction):?>
			<tr>
				<td><?php echo $transaction['Transaction']['id']?></td>
				<td><?php echo $transaction['Transaction']['member_name']?></td>
				<td><?php echo $transaction['Transaction']['payment_type']?></td>
				<td><?php echo $transaction['Transaction']['date']?></td>
				<td><?php echo $transaction['Transaction']['ref_no']?></td>
				<td><?php echo $transaction['Transaction']['receipt_no']?></td>
				<td><?php echo $transaction['Transaction']['payment_method']?></td>
				<td><?php echo $transaction['Transaction']['subtotal']?></td>
				<td><?php echo $transaction['Transaction']['tax']?></td>
				<td><?php echo $transaction['Transaction']['total']?></td>
				<td><?php echo $this->Html->link('View Item','/Transaction/view/'.$transaction['Transaction']['id'],array('target'=>'_blank'))?></td>
			</tr>	
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_orders").dataTable({

	});
})
</script>
<?php $this->end()?>