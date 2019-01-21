<?php
	class MemberController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			
			$members = $this->Member->find('all',array('conditions'=>array('Member.valid'=>1),'recursive'=>2));

// 			debug($members);exit;

			$this->set('members',$members);
			
			$this->set('title',__('List Members'));
		}
	}