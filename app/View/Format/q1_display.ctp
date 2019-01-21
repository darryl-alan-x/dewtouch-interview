<div id="message1">

<?php
$type = $this->request->data['Type']['type'];
if ($type == '') {
	echo 'You did not select a type';
}
else {
	echo "You selected: " . $type;
}
?>

</div>
