<?php
	class TransactionController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');

			$transactions = $this->Transaction->find('all',array('conditions'=>array('Transaction.valid'=>1),'recursive'=>-1));

//			debug($transactions);exit;

			$this->set('transactions',$transactions);
			
			$this->set('title',__('List Transactions'));
		}

		public function view($id){

			if($id != null){

				$this->loadModel('TransactionItem');
				$transaction_items = $this->TransactionItem->find('all',array('conditions'=>array('TransactionItem.valid'=>1,'TransactionItem.transaction_id'=>$id)));
				
//				debug($transaction_items);exit;

				$this->set('transaction_items',$transaction_items);

				$this->set('title',__('View Transaction Items'));

			}

		}
		
	}