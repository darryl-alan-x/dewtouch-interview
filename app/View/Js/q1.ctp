<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo
htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
	<thead>
	<tr>
		<th style="width:4%;"><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false"><i class="icon-plus"></i></span></th>
		<th style="width:50%;">Description</th>
		<th style="width:23%;">Quantity</th>
		<th style="width:23%;">Unit Price</th>
	</tr>
	</thead>

	<tbody id="tbody">
		<tr>
			<td></td>
			<td><span class="editable">&nbsp;</span><textarea name="data[1][description]" class="m-wrap description required" rows="2"></textarea></td>
			<td><span class="editable">&nbsp;</span><input name="data[1][quantity]" class="quantity numeric"></td>
			<td><span class="editable">&nbsp;</span><input name="data[1][unit_price]" class="unit_price numeric"></td>
		</tr>

	</tbody>

</table>

<style>
	span.editable {
		display:block;
		/*background: red;*/
	}
	#tbody textarea, #tbody input {
		display:none;
		box-sizing: border-box;
		width: 100%;
	}

	/*#tbody tr:nth-child(even) td{*/
		/*background-color: white !important;*/
	/*}*/
	/*#tbody tr:nth-child(odd) td{*/
		/*background-color: #dddddd !important;*/
	/*}*/

</style>
<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

	$(document).on('input', ".numeric", function(e){
		var $target = $(e.target);
		var val = $target.val();
		var match = (val.match(/-?\d*\.?\d*/) || [''])[0];
		$target.val(match);
	});

	$("#add_item_button").click(function(){
		var count = $("#tbody tr").length + 1;
		$("#tbody").append($("#row_template").html().replace(/data\[\d+\]/g, 'data[' + count + ']'));
	});

	$("#tbody").on('click', ".editable", function(){
		var $this = $(this);
		$this.closest('td').find('textarea, input').show().focus();
		$this.hide();
	});

	$("#tbody").on('focusout', 'textarea, input', function(){
		var $this = $(this);
		$this.closest('td').find('span').show();
		$this.hide();
	});

	$("#tbody").on('change', 'textarea, input', function(){
		var $this = $(this);
		$this.closest('td').find('span').html($this.val());
	});
});
</script>
<script type="text/plain" id="row_template">
	<tr>
		<td></td>
		<td><span class="editable">&nbsp;</span><textarea name="data[1][description]" class="m-wrap description required" rows="2"></textarea></td>
		<td><span class="editable">&nbsp;</span><input name="data[1][quantity]" class="quantity"></td>
		<td><span class="editable">&nbsp;</span><input name="data[1][unit_price]" class="unit_price"></td>
	</tr>
</script>
<?php $this->end();?>

