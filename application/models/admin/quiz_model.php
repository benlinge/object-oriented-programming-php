<?php 

class Quiz_model extends MY_Model {
	
	// variables
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'quiz';
		$this->primary_key = 'quiz_id';
		$this->order_by = 'quiz_id ASC';
		$this->foreign_key = 'topic_id';
	}
	
}








