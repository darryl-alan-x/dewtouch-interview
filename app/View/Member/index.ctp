<div class="row-fluid">
	<table class="table table-bordered" id="table_members">
		<thead>
			<tr>
				<th style="width:10%">ID</th>
				<th>TYPE</th>
				<th>NO</th>
				<th>NAME</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($members as $member):?>
			<tr>
				<td><?php echo $member['Member']['id']?></td>
				<td><?php echo $member['Member']['type']?></td>
				<td><?php echo $member['Member']['no']?></td>
				<td><?php echo $member['Member']['name']?></td>
			</tr>	
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_members").dataTable({

	});
})
</script>
<?php $this->end()?>