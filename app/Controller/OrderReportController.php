<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
//			debug($orders);exit;

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
//			 debug($portions);exit;


			$order_reports = array();
			foreach($orders AS $order){
				$OrderDetail = $order['OrderDetail'];
				$Items = array(); // mapping of menu item_id => qty
				foreach($OrderDetail AS $OrderItem){
					if(!array_key_exists( $OrderItem['item_id'], $Items)) $Items[$OrderItem['item_id']] = 0;
					$Items[$OrderItem['item_id']] += (int) $OrderItem['quantity'];
				}


				$ingredients = array();

				foreach($Items AS $item_id => $qty){
					$searched = array_filter($portions, function($item) use ($item_id) {
						return $item['Portion']['item_id'] == $item_id;
					});

					$portion = array_values($searched)[0];

					foreach($portion['PortionDetail'] AS $ingredient){
						if(!array_key_exists($ingredient['Part']['name'], $ingredients)) $ingredients[$ingredient['Part']['name']] = 0;
						$ingredients[$ingredient['Part']['name']] += (double) $ingredient['value'] * (double) $qty;
					}
				}

				ksort($ingredients);
				$order_reports[$order['Order']['name']] = $ingredients;
			}


			// To Do - write your own array in this format
//			$order_reports = array('Order 1' => array(
//										'Ingredient A' => 1,
//										'Ingredient B' => 12,
//										'Ingredient C' => 3,
//										'Ingredient G' => 5,
//										'Ingredient H' => 24,
//										'Ingredient J' => 22,
//										'Ingredient F' => 9,
//									),
//								  'Order 2' => array(
//								  		'Ingredient A' => 13,
//								  		'Ingredient B' => 2,
//								  		'Ingredient G' => 14,
//								  		'Ingredient I' => 2,
//								  		'Ingredient D' => 6,
//								  	),
//								);

//			$order_reports = $mapp

			// ...

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}