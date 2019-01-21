<?php
	class Transaction extends AppModel{
		
		var $hasMany = array('TransactionItem' => array(
									'conditions' => array('TransactionItem.valid' => 1)
								)
							);

	}