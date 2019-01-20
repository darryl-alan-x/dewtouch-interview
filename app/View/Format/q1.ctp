<div id="message1">

<?php
echo $this->Form->create('Type',
	array(
		'id'=>'form_type',
		'type'=>'file',
		'class'=>'',
		'method'=>'POST',
		'url' => array('controller' => 'Format', 'action' => 'q1_display'),
		'autocomplete'=>'off',
		'inputDefaults'=>array(
			'label'=>false,
			'div'=>false,
			'type'=>'text',
			'required'=>false
		)
	)
)
?>

<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new =

	array(
 		'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue">Type1</span>
				<div id="dialog_1" class="hide dialog" title="Type 1">
					<span style="display:inline-block">
						<ul>
							<li>Description .......</li>
							<li>Description 2</li>
						</ul>
					</span>
 				</div>'),
		'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue">Type2</span>
				<div id="dialog_2" class="hide dialog" title="Type 2">
 					<span style="display:inline-block">
 						<ul>
 							<li>Desc 1 .....</li>
 							<li>Desc 2...</li>
						</ul>
					</span>
 				</div>')
		);
?>

<?php
echo
$this->Form->input('type',
	array(
		'legend'=>false,
		'type' => 'radio',
		'options'=>$options_new,
		'before'=>'<label class="radio line notcheck">',
		'after'=>'</label>',
		'separator'=>'</label><label class="radio line notcheck">'
	)
);
?>

<?php echo $this->Form->end('Save');?>

</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

.ui-dialog-titlebar {display:none}

.dialog {
	min-height:0 !important;
}



.ui-dialog::before, .ui-dialog::after {
	content: "";
	width: 0;
	height: 0;
	position: absolute;
	left: -10px;
	top:50%;
	transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	border-style: solid;
	border-width: 10px;
}

.ui-dialog::before {
	border-color: transparent #aaa transparent transparent;
	left: -21px;
}

.ui-dialog::after {
	border-color: transparent #fff transparent transparent;
	left: -20px;
}

.ui-dialog {
	overflow:visible;
	background-color:white !important;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

ul {
	margin: 0 0 0 20px !important;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){

	$(".dialog").dialog({
		autoOpen: false,
		width: 'auto',
		modal: false,
		// dialogClass: 'noTitleStuff',
	});


	$(".showDialog").mouseenter(function(){
		var $this = $(this);
		var id = $this.data('id');
		$("#"+id).dialog('option', 'position', { my: "left center", at: "right+20 center", of: $this}).dialog('open');
	});
	$(".showDialog").mouseleave(function(){
		var id = $(this).data('id');
		$("#"+id).dialog('close');
	});
})


</script>
<?php $this->end()?>